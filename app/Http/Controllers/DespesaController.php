<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Http\Requests\CreateDespesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Exibe a listagem de todas as despesas.
     */
    public function index()
    {
        $despesas = Despesa::all();
        //dd($despesas);
        return view('despesas.index', compact('despesas'));
    }

    /**
     * Exibe o formulário de criação de despesa.
     */
    public function create()
    {
        return view('despesas.create');
    }

    /**
     * Salva uma nova despesa no banco de dados.
     */
    public function store(CreateDespesa $request)
    {
        // $despesa = new Despesa;
        // $despesa->valor = $request->get('valor');
        // $despesa->save();
        Despesa::create($request->validated());

        return redirect()->route('despesas.index')->with('success', 'Despesa cadastrada com sucesso!');
    }

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
        return view('despesas.edit', compact('despesa'));
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
        //dd($despesa->id);
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
