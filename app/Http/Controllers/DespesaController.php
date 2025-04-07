<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\User;
use App\Http\Requests\CreateDespesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Exibe a listagem de todas as despesas ou filtradas por usuário.
     */
    public function index(Request $request)
    {
        // Carrega todos os usuários para o filtro
        $users = User::all(); 
        // Obtém o ID do usuário da query string
        $userId = $request->input('user_id'); 

        // Filtra as despesas com base no user_id, se fornecido
        $despesas = Despesa::when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get(); // Obtém as despesas filtradas ou todas as despesas

        // Retorna a view com as despesas filtradas (ou não) e os usuários para o filtro
        return view('despesas.index', compact('despesas', 'users'));
    }

    /**
     * Exibe o formulário de criação de despesa.
     */
    public function create()
    {
        $users = User::all(); // Carrega todos os usuários para o formulário
        return view('despesas.create', compact('users'));
    }

    /**
     * Salva uma nova despesa no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação explícita dos dados da requisição
        $request->validate([
            'user_id' => 'required|exists:users,id', // Valida que o user_id existe na tabela de users
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|in:Casa,Carro,Contas,Outros',
            'valor' => 'required|numeric|min:0',
            'data' => 'required|date',
        ]);

        // Criação da despesa com os dados validados
        Despesa::create([
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
            'data' => $request->data,
            'user_id' => $request->user_id, // Associe corretamente o user_id
        ]);

        // Redireciona após salvar com sucesso
        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso!');
    }

    /**
     * Lista todas as despesas (usada em /despesas/listar).
     */
    public function list()
    {
        $despesas = Despesa::all(); // Obtém todas as despesas
        return view('despesas.index', compact('despesas')); // Passa as despesas para a view
    }

    /**
     * Exibe os detalhes de uma despesa específica.
     */
    public function show(Despesa $despesa)
    {
        return view('despesas.show', compact('despesa')); // Passa os detalhes da despesa para a view
    }

    /**
     * Exibe o formulário para edição da despesa.
     */
    public function edit(Despesa $despesa)
    {
        $users = User::all(); // Carrega todos os usuários para o formulário de edição
        return view('despesas.edit', compact('despesa', 'users')); // Passa a despesa e os usuários para a view
    }

    /**
     * Atualiza uma despesa no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados da requisição
        $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|in:Casa,Carro,Contas,Outros',
            'valor' => 'required|numeric|min:0',
            'data' => 'required|date',
        ]);

        // Localiza a despesa e atualiza com os novos dados
        $despesa = Despesa::findOrFail($id);
        $despesa->update([
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
            'data' => $request->data,
        ]);

        // Redireciona após a atualização
        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada com sucesso!');
    }

    /**
     * Remove uma despesa do banco de dados.
     */
    public function destroy(Despesa $despesa)
    {
        $despesa->delete(); // Exclui a despesa
        return redirect()->route('despesas.index')->with('success', 'Despesa removida com sucesso!');
    }

    /**
     * Calcula a diferença entre o salário informado e o total de despesas.
     */
    public function calcular(Request $request)
    {
        // Valida a requisição para o salário
        $request->validate([
            'salario' => 'required|numeric|min:0'
        ]);

        // Calcula o total de despesas e a diferença com o salário
        $totalDespesas = Despesa::sum('valor');
        $diferenca = $request->salario - $totalDespesas;

        // Retorna a view com o cálculo da diferença
        return view('despesas.result', compact('diferenca', 'totalDespesas'));
    }
}
