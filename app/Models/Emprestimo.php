<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Emprestimo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'dt_emprestimo',
        'dt_devolucao',
        'multa_atraso',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id', 'id'
        );
    }

    public function livros()
    {
        return $this->belongsToMany(
            Livro::class,
            'emprestimo_livro',
            'emprestimo_id',
            'livro_id'
        )->withTimestamps();
    }
}
