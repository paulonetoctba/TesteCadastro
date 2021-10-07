<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    public $timestamps = false;

    protected $fillable = [
        'id_empresa',
        'nome',
		'cpf_cnpj',
		'rg',
		'data_nascimento',
		'telefone',
		'email',
		'cep',
		'endereco',
		'numero'
    ];
}