<?php

namespace App\Http\Controllers;

use App\Models\Tarefas;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TarefasController extends Controller
{


    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        return view('list.tarefas.create', compact('categorias'));
    }

    public function index()
    {
        $tarefas = Tarefas::with('categoria')->orderBy('dia', 'asc')->get();
        return view('list.tarefas.index', compact('tarefas'));
    }


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

    public function toggleStatus($id)
    {
        $tarefa = \App\Models\Tarefas::findOrFail($id);
        $tarefa->status = !$tarefa->status; // inverte o valor (true <-> false)
        $tarefa->save();

        return redirect()
            ->route('tarefas.index')
            ->with('success', 'Status da tarefa atualizado!');
    }
}
