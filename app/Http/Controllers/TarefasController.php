<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    /**
     * Exibir a lista de tarefas (index)
     */
    public function index()
    {
        $tarefas = Tarefas::with('categoria')->orderBy('dia', 'asc')->get();

        return view('list.tarefas.index', compact('tarefas'));
    }

    /**
     * Exibir o formulário de criação de tarefas
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('list.tarefas.create', compact('categorias'));
    }

    /**
     * Salvar uma nova tarefa no banco de dados
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Tarefas::create([
            'nome' => $request->titulo,
            'observacao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa criada com sucesso!');
    }

    /**
     * Exibir uma tarefa específica (opcional)
     */
    public function show($id)
    {
        $tarefa = Tarefas::with('categoria')->findOrFail($id);
        return view('list.tarefas.show', compact('tarefa'));
    }

    /**
     * Exibir formulário de edição (opcional)
     */
    public function edit($id)
    {
        $tarefa = Tarefas::findOrFail($id);
        $categorias = Categoria::all();

        return view('list.tarefas.edit', compact('tarefa', 'categorias'));
    }

    /**
     * Atualizar a tarefa no banco
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descricao' => 'nullable|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $tarefa = Tarefas::findOrFail($id);

        $tarefa->update([
            'nome' => $request->titulo,
            'observacao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remover uma tarefa
     */
    public function destroy($id)
    {
        $tarefa = Tarefas::findOrFail($id);
        $tarefa->delete();

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Tarefa excluída com sucesso!');
    }
}
