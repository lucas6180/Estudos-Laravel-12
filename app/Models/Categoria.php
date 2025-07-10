<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['tipo'];

    public function livros(){
    return $this->belongsToMany(Livro::class, 'categoria_livro', 'categoria_id','livro_id');
    }
}
