<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    use HasFactory;

    // Campos que podem ser preenchidos
    protected $fillable = [
        'nome',
        'dia',
        'horario',
        'status',
        'observacao',
        'categoria_id',
    ];

    /**
     * Relacionamento: uma tarefa pertence a uma categoria
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Escopo opcional para facilitar a busca de tarefas ativas/inativas
     */
    public function scopeAtivas($query)
    {
        return $query->where('status', true);
    }

    public function scopeInativas($query)
    {
        return $query->where('status', false);
    }
}
