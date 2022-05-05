<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Descontos;
use Illuminate\Http\Request;

class DescontosController extends Controller
{
    # listando todos os descontos
    public function index()
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $d = new Descontos();
            return json_decode($d->all());
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # cadastrar desconto
    public function store(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            $p = new Descontos;
            $p->produto_campanha_id = $request->input('produto_campanha_id');
            $p->descricao = $request->input('descricao');
            $p->valor = $request->input('valor');
            $p->status = $request->input('status');

            if($p->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # listando todos os descontos de um produto de campanha
    public function show($id)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $d = new Descontos();
            return json_decode($d->all()->where("produto_campanha_id", "=", $id));
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # alterar desconto
    public function edit(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            $p = Descontos::findOrFail($request->input('id'));
            $p->descricao = $request->input('descricao');
            $p->valor = $request->input('valor');
            $p->status = $request->input('status');

            if($p->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    #
    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            $p = Descontos::findOrFail($request->input('id'));

            if($p->delete())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }
}
