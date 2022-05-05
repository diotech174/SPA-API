<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Campanhas;
use Illuminate\Http\Request;

class CampanhasController extends Controller
{

    public function index() # lista todas as campanhas
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $c = new Campanhas();
            return json_encode($c->all());
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    public function show($id) # lista todas as campanhas de um grupo de cidades
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $c = new Campanhas();
            return json_encode($c->all()->where("grupo_de_cidades_id", "=", $id));
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    public function store(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->create) && $permission->create === "Y")
        {
            $c = new Campanhas;
            $c->nome = $request->input('nome');
            $c->descricao = $request->input("descricao");
            $c->status = $request->input("status");
            $c->grupo_de_cidades_id = $request->input("grupo_de_cidades_id");

            if($c->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }


    public function edit(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            $c = Campanhas::findOrFail($request->id);

            $c->nome = $request->input('nome');
            $c->descricao = $request->input("descricao");
            $c->status = $request->input("status");
            $c->grupo_de_cidades_id = $request->input("grupo_de_cidades_id");

            if($c->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            $c = Campanhas::findOrFail($request->id);

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
