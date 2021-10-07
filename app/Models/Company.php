<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'uf',
        'razao_social',
		'cnpj',
        'created_at',
        'updated_at'
    ];
}