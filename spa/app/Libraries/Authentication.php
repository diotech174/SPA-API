<?php

namespace App\Libraries;

use App\Models\Api_keys;

class Authentication
{

    /*
    *    Biblioteca de verificação de chave de API
    */

    public function Authorization($key)
    {
        $a = new Api_keys();
        $access = $a->all()->where("key", "=", $key)->first();

        if(isset($access["permissions"]))
            return json_decode($access["permissions"]);
        else
            return null;
    }
}
