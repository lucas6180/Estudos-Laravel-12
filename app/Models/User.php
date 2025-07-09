<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'endereco_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function isAdm(): bool{
        return in_array($this->email, config('custom.admins'));
    }
    public function emprestimos(){
        return $this->hasMany(Emprestimo::class, 'user_id', 'id');
    }
    public function endereco(){
        return $this->belongsTo(Endereco::class);
    }
    public function livrosCurtidos(){
        return $this->belongsToMany(Livro::class, 'curtidas', 'user_id', 'livro_id')->withTimestamps();
    }
}
