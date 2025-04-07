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
        $users = User::all(); // Carrega todos os usuários para o filtro
        $userId = $request->input('user_id'); // Obtém o ID do usuário da query string

        // Filtra as despesas com base no user_id, se fornecido
        $despesas = Despesa::when($userId, function ($query) use ($userId) {
            return $query->where('user_id', $userId);
        })->get();

        return view('despesas.index', compact('despesas', 'users')); // Passa as despesas e os usuários para a view
    }

    /**
     * Exibe o formulário de criação de despesa.
     */
    public function create()
    {
        $users = User::all();
        return view('despesas.create', compact('users'));
    }

    /**
     * Salva uma nova despesa no banco de dados.
     */
    public function store(CreateDespesa $request)
    {
        Despesa::create($request->validated());

        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso!');
    }

    /**
     * Lista todas as despesas (usada em /despesas/listar).
     */
    public function list()
    {
        $despesas = Despesa::all();
        return view('despesas.list', compact('despesas'));
    }

    /**
     * Exibe os detalhes de uma despesa específica.
     */
    public function show(Despesa $despesa)
    {
        return view('despesas.show', compact('despesa'));
    }

    /**
     * Exibe o formulário para edição da despesa.
     */
    public function edit(Despesa $despesa)
    {
        $users = User::all();
        return view('despesas.edit', compact('despesa', 'users'));
    }

    /**
     * Atualiza uma despesa no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|in:Casa,Carro,Contas,Outros',
            'valor' => 'required|numeric|min:0',
            'data' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $despesa = Despesa::findOrFail($id);
        $despesa->update($request->all());

        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada com sucesso!');
    }

    /**
     * Remove uma despesa do banco de dados.
     */
    public function destroy(Despesa $despesa)
    {
        $despesa->delete();
        return redirect()->route('despesas.index')->with('success', 'Despesa removida com sucesso!');
    }

    /**
     * Calcula a diferença entre o salário informado e o total de despesas.
     */
    public function calcular(Request $request)
    {
        $request->validate([
            'salario' => 'required|numeric|min:0'
        ]);

        $totalDespesas = Despesa::sum('valor');
        $diferenca = $request->salario - $totalDespesas;

        return view('despesas.result', compact('diferenca', 'totalDespesas'));
    }
}
