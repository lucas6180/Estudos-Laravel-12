<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Endereco extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'rua',
        'numero',
        'complemento',
        'referencia',
        'cep',
        'cidade',
        'estado'
    ];
    public function usuarios(){
        return $this->hasMany(User::class);
    }
}
