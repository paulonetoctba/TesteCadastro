<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_empresa' => $this->id_empresa,
            'nome' => $this->nome,
            'cpf_cnpj' => $this->cpf_cnpj,
            'rg' => $this->rg,
            'data_nascimento' => $this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'numero' => $this->numero
        ];
    }
}
