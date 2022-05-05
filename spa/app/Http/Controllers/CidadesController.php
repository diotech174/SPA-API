<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Cidades;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    # Listando cidades
    public function index()
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $c = new Cidades();
            return json_encode($c->all());
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # Listando cidades por grupo
    public function show($id)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $c = new Cidades();
            return json_encode($c->all()->where("grupo_de_cidades_id", "=", $id));
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # cadastrando cidades
    public function store(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->create) && $permission->create === "Y")
        {
            $c = new Cidades;

            $c->nome = $request->input('nome');
            $c->uf = $request->input('uf');
            $c->status= $request->input('status');
            $c->grupo_de_cidades_id= $request->input('grupo_de_cidades_id');

            if($c->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    #editando cidade
    public function edit(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            $c = Cidades::findOrFail($request->id);

            $c->nome = $request->input('nome');
            $c->uf = $request->input('uf');
            $c->status= $request->input('status');
            $c->grupo_de_cidades_id= $request->input('grupo_de_cidades_id');

            if($c->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # deletando cidade
    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            $c = Cidades::findOrFail($request->id);

            if($c->delete())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }
}
