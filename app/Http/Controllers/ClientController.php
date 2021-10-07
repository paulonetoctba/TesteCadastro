<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Exception;

class ClientController extends Controller
{
    public function index(){
        $companies = Company::all();
        return view('createclient')->with(['companies'=>$companies]);
    }
    public function GetClients(){
        //$clients = Client::where();
        $clients = Client::join('company', 'client.id_empresa', '=', 'company.id')->get();
        return view('client')->with(['clients'=>$clients]);
    }
    public function createClient(Request $request){
        try
        {
            $retorno ="Seu cadastro de cliente foi realizada com sucesso!";
            $Cliente = new Client;
            $Cliente->id_empresa = $request->id_empresa;
            $Cliente->nome = $request->nome;
            $Cliente->cpf_cnpj = $request->cpf_cnpj;
            $Cliente->rg = $request->rg;
            $Cliente->data_nascimento = $request->data_nascimento;
            $Cliente->telefone = $request->telefone;
            $Cliente->email = $request->email;
            $Cliente->cep = $request->cep;
            $Cliente->endereco = $request->endereco;
            $Cliente->numero = $request->numero;
            if(!$Cliente->save()){
                $retorno = "Não foi possível cadastrar o Cliente!";
            }
            return redirect('client')->with('success','Registro inserido com sucesso!',200);       
        }
        catch(Exception $e)
        {
           dd($e->getMessage());
        }
    }
}
