<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Exception;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::all();
        return view('company')->with(['companies'=>$companies]);
    }
    public function cadastrar(Request $request){
        try
        {
            $retorno ="Seu cadastro de empresa foi realizada com sucesso!";
            $empresa = new Company;
            $empresa->uf = $request->uf;
            $empresa->razao_social = $request->razao_social;
            $empresa->cnpj = $request->cnpj;
            if(!$empresa->save()){
                $retorno = "Não foi possível cadastrar a empresa";
            }
            return redirect('company')->with('success','Registro inserido com sucesso!',200);       
        }
        catch(Exception $e)
        {
           dd($e->getMessage());
        }
    }
}
