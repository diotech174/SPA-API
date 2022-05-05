<?php

namespace App\Http\Controllers;

use App\Libraries\Authentication;
use App\Models\Produtos;
use Exception;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    # Listando todos os produtos
    public function index()
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $p = new Produtos();
            return json_encode($p->all());
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # cadastrando produtos
    public function store(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->create) && $permission->create === "Y")
        {
            $p = new Produtos();
            $p->nome = $request->input('nome');
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

    # mostrando porduto por ID
    public function show($id)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->show) && $permission->show === "Y")
        {
            $p = new Produtos();
            return json_encode($p->all()->where("id", "=", $id));
        }
        else{
            return json_encode(["status" => "A chave de acesso é inválida!"]);
        }
    }

    # alterando produtos
    public function edit(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->update) && $permission->update === "Y")
        {
            try{
                $p = Produtos::findOrFail($request->input('id'));

                $p->nome = $request->input('nome');
                $p->descricao = $request->input('descricao');
                $p->valor = $request->input('valor');
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


    # deletando produto
    public function destroy(Request $request)
    {
        # verificando permissões da chave da API
        $a = new Authentication();
        $permission = $a->Authorization(request()->header('x-api-key'));

        if(isset($permission->delete) && $permission->delete === "Y")
        {
            try{
                $p = Produtos::findOrFail($request->input('id'));

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
