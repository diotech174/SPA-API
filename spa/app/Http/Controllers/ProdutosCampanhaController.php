<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Produtos_campanha;
use Illuminate\Http\Request;

class ProdutosCampanhaController extends Controller
{
    # listar todos os produtos de camapanha
    public function index()
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $p = new Produtos_campanha();
            return json_encode($p->all());
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # cadastrando produtos de campanha
    public function store(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->create) && $permission->create === "Y")
        {
            $p = new Produtos_campanha();
            $p->produto_id = $request->input('produto_id');
            $p->campanha_id = $request->input('campanha_id');

            if($p->save())
                return json_encode(["status" => "success"]);
            else
                return json_encode(["status" => "fail"]);
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # listando produtos por camapanha
    public function show($id)
    {
         # verificando permissões da chave da API
         $a = new Authentication();
         $permission = $a->Authorization(request()->header('x-api-key'));

         if(isset($permission->show) && $permission->show === "Y")
         {
             $p = new Produtos_campanha();
             return json_encode($p->all()->where("campanha_id", "=", $id));
         }
         else{
             return json_encode(["status" => "A chave de acesso é inválida!"]);
         }
    }

    # deletando produto de camapanha
    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            $p = Produtos_campanha::findOrFail($request->input('id'));

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
