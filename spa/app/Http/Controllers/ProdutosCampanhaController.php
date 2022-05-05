<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Produtos_de_campanhas;
use Exception;
use Illuminate\Http\Request;

class ProdutosCampanhaController extends Controller
{
    # listar todos os produtos de campanha
    public function index()
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            try{
                $p = new Produtos_de_campanhas();
                return json_encode($p->all());
            }
            catch(Exception $e)
            {
                return json_encode(["status" => $e->getMessage()]);
            }
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
            try{
                $p = new Produtos_de_campanhas();
                $p->produto_id = $request->input('produto_id');
                $p->campanha_id = $request->input('campanha_id');
                $p->status = $request->input('status');

                if($p->save())
                    return json_encode(["status" => "success"]);
                else
                    return json_encode(["status" => "fail"]);
            }
            catch(Exception $e)
            {
                return json_encode(["status" => $e->getMessage()]);
            }
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # listando produtos por campanha
    public function show($id)
    {
         # verificando permissões da chave da API
         $a = new Authentication();
         $permission = $a->Authorization(request()->header('x-api-key'));

         if(isset($permission->show) && $permission->show === "Y")
         {
            try{
                $p = new Produtos_de_campanhas();
                return json_encode($p->all()->where("campanha_id", "=", $id));
            }
            catch(Exception $e)
            {
                return json_encode(["status" => $e->getMessage()]);
            }
         }
         else{
             return json_encode(["status" => "A chave de acesso é inválida!"]);
         }
    }

    # alterando produto de campanha
    public function edit(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            try{
                $p = Produtos_de_campanhas::findOrFail($request->input('id'));
                $p->produto_id = $request->input('produto_id');
                $p->campanha_id = $request->input('campanha_id');
                $p->status = $request->input('status');

                if($p->save())
                    return json_encode(["status" => "success"]);
                else
                    return json_encode(["status" => "fail"]);
            }
            catch(Exception $e)
            {
                return json_encode(["status" => $e->getMessage()]);
            }
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # deletando produto de campanha
    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            try{
                $p = Produtos_de_campanhas::findOrFail($request->input('id'));

                if($p->delete())
                    return json_encode(["status" => "success"]);
                else
                    return json_encode(["status" => "fail"]);
            }
            catch(Exception $e)
            {
                return json_encode(["status" => $e->getMessage()]);
            }
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }
}
