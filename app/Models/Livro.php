<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'sinopse',
        'imagem',
        'autor',
        'quantidade_total',
        'quantidade_disponivel'
    ];

    public function categorias()
    {
        return $this->belongsToMany(
            Categoria::class,
            'categoria_livro',
            'livro_id',
            'categoria_id'
        )->withTimestamps();;
    }
    public function usuariosQueCurtiram(){
        return $this->belongsToMany(User::class, 'curtidas', 'livro_id', 'user_id')->withTimestamps();
    }
}
