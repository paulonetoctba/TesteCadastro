<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('company');
});


//Rotas GET de Empresas
//Route::get('/company', function () {
//    return view('company');
//});
Route::get('/company', [CompanyController::class, 'index']);

Route::get('/createcompany', function () {
    return view('createcompany');
});



//Rotas GET de Clientes

Route::get('/createclient', [ClientController::class, 'index']);

//Route::get('/client', function () {
//    return view('client');
//});
Route::get('/client', [ClientController::class, 'GetClients']);




//Rotas POST de Empresas
Route::post('/cadastrar', [CompanyController::class, 'cadastrar'])->name("cadastrarempresa");

//Rotas POST de Clientes
Route::post('/createClient', [ClientController::class, 'createClient'])->name("cadastrarcliente");
