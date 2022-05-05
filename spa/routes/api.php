<?php

use App\Http\Controllers\CampanhasController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\DescontosController;
use App\Http\Controllers\GruposDeCidadesController;
use App\Http\Controllers\ProdutosCampanhaController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// documentação
Route::get('/', function () {
    return view('api_documentacao');
});

// grupo de cidades
Route::get('/grupos/listar', [GruposDeCidadesController::class, 'index']);
Route::get('/grupos/{id}', [GruposDeCidadesController::class, 'show']);
Route::post('/grupos/cadastrar', [GruposDeCidadesController::class, 'store']);
Route::post('/grupos/editar', [GruposDeCidadesController::class, 'edit']);
Route::post('/grupos/excluir', [GruposDeCidadesController::class, 'destroy']);

// cidades
Route::get('/cidades/listar', [CidadesController::class, 'index']);
Route::get('/cidades_por_grupo/{id}', [CidadesController::class, 'show']);
Route::post('/cidades/cadastrar', [CidadesController::class, 'store']);
Route::post('/cidades/editar', [CidadesController::class, 'edit']);
Route::post('/cidades/excluir', [CidadesController::class, 'destroy']);

// campanhas
Route::get('/campanhas/listar', [CampanhasController::class, 'index']);
Route::get('/campanhas_por_grupo/{id}', [CampanhasController::class, 'show']);
Route::post('/campanhas/cadastrar', [CampanhasController::class, 'store']);
Route::post('/campanhas/editar', [CampanhasController::class, 'edit']);
Route::post('/campanhas/excluir', [CampanhasController::class, 'destroy']);

// produtos
Route::get('/produtos/listar', [ProdutosController::class, 'index']);
Route::get('/getproduto/{id}', [ProdutosController::class, 'show']);
Route::post('/produtos/cadastrar', [ProdutosController::class, 'store']);
Route::post('/produtos/editar', [ProdutosController::class, 'edit']);
Route::post('/produtos/excluir', [ProdutosController::class, 'destroy']);

// produtos de campanha
Route::get('/produtos_de_campanhas/listar', [ProdutosCampanhaController::class, 'index']);
Route::get('/getprodutos_de_campanhas/{id}', [ProdutosCampanhaController::class, 'show']);
Route::post('/produtos_de_campanhas/editar', [ProdutosCampanhaController::class, 'edit']);
Route::post('/produtos_de_campanhas/cadastrar', [ProdutosCampanhaController::class, 'store']);
Route::post('/produtos_de_campanhas/excluir', [ProdutosCampanhaController::class, 'destroy']);

// descontos de produtos da campanha
Route::get('/descontos/listar', [DescontosController::class, 'index']);
Route::get('/getdescontos/{id}', [DescontosController::class, 'show']);
Route::post('/descontos/cadastrar', [DescontosController::class, 'store']);
Route::post('/descontos/editar', [DescontosController::class, 'edit']);
Route::post('/descontos/excluir', [DescontosController::class, 'destroy']);
