<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Grupos_de_cidades;
use Illuminate\Http\Request;

class GruposDeCidadesController extends Controller
{
    # Listando grupos de cidades
    public function index()
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $g = new Grupos_de_cidades();
            return json_encode($g->all());
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # cadastrando grupo de cidades
    public function store(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->create) && $permission->create === "Y")
        {
            $g = new Grupos_de_cidades;

            $g->nome = $request->input('nome');
            $g->descricao = $request->input('descricao');
            $g->status= $request->input('status');

            if($g->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # editando grupo de cidades
    public function edit(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            $g = Grupos_de_cidades::findOrFail($request->id);

            $g->nome = $request->input('nome');
            $g->descricao = $request->input('descricao');
            $g->status= $request->input('status');

            if($g->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # deletando grupo de cidades
    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            $g = Grupos_de_cidades::findOrFail($request->id);

            if($g->delete())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }
}
