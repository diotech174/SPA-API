<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Documentação | API</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        .cursor-pointer
        {
            cursor: pointer;
            color: rgb(27, 123, 168);
        }
        .new
        {
            color: rgb(66, 204, 77);
        }rgb(27, 168, 69)rgb(44, 182, 85)
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="/">Documentação API</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Indice
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#credenciais">Obtendo Credenciais da API</a>
                        <hr>
                        <a class="dropdown-item" href="#grupos_de_cidades">Grupo de Cidades</a>
                        <a class="dropdown-item" href="#cidades">Cidades</a>
                        <a class="dropdown-item" href="#campanhas">Campanhas</a>
                        <a class="dropdown-item" href="#produtos">Produtos</a>
                        <a class="dropdown-item" href="#produtos_de_campanha">Produtos de Campanha</a>
                        <a class="dropdown-item" href="#descontos">Descontos</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <main class="container mt-5">

        <div class="p-2" id="credenciais">
            <h3>Obtendo Credenciais da API</h3>
            <br>
            <p class="text-left font-weight-bold">
                Criando acesso da API
            </p>
            <p class="text-left text-success">
                <span class="text-primary">SQL COMMAND'S:</span><br><br><br>
                #Criando usuário:<br><br>
                <span class="text-dark">
                    INSERT INTO `users`(`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)<br>
                    VALUES (1,'MASTER','seuemail@email.com','2022-05-01 00:00:00','suasenha','token123','2022-05-01 00:00:00','2022-05-01 00:00:00');<br><br>
                </span>
                #Criando chave de API:<br><br>
                <span class="text-dark">
                    INSERT INTO `api_keys`(`id`, `created_at`, `updated_at`, `key`, `permissions`, `user_id`, `status`)<br>
                    VALUES (1,'2022-05-01 00:00:00','2022-05-01 00:00:00','KEY_81B6791E667FB8D613D294C921FBBD33','{\"show\":\"Y\",\"create\":\"Y\",\"update\":\"Y\",\"delete\":\"Y\"}',1,'A');
                </span>
            </p>
            <br>
            <hr>
        </div>

        <!-- Sessão de Grupode de Cidades =========================================================== -->

        <div class="p-2" id="grupos_de_cidades">
            <h3 class="text-center">Grupo de Cidades</h3>

            <span class="font-weight-bold">Requisições HTTP:</span><br><br><br>

            <!-- Listar grupos -->
            <span class="font-weight-bold">Listar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#g_listar">[GET] {{ url("/api/grupos/listar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="g_listar">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/grupos/listar') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "nome":"SP",
                            "descricao":"Grupos de S\u00e3o Paulo",
                            "status":"A"
                        }
                    ]
                </textarea>
            </div>
            <!-- Listar grupos -->

            <!-- cadastrar grupos -->
            <span class="font-weight-bold">Cadastrar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#g_cadastrar">[POST] {{ url("/api/grupos/cadastrar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="g_cadastrar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/grupos/cadastrar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "nome" => "{nome do gruo de cidades}",
                        "descricao" => "{descrição do grupo de cidades}",
                        "status" => "A"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- cadastrar grupos -->

            <!-- alterar grupos -->
            <span class="font-weight-bold">Editar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#g_alterar"> [POST] {{ url("/api/grupos/editar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="g_alterar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/grupos/editar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => "{ID do grupo de cidades}"
                        "nome" => "{nome do gruo de cidades}",
                        "descricao" => "{descrição do grupo de cidades}",
                        "status" => "A"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- alterar grupos -->

            <!-- deletar grupos -->
            <span class="font-weight-bold">Excluir</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#g_excluir">[POST] {{ url("/api/grupos/excluir") }}</span><br><br>

            <div class="collapse bg-light p-4" id="g_excluir">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/grupos/excluir') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => "{ID do grupo de cidades}"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- deletar grupos -->
            <hr>

        </div>

        <!-- Sessão de Cidades ====================================================================== -->

        <div class="p-2 mt-5" id="cidades">
            <h3 class="text-center">Cidades</h3>

            <span class="font-weight-bold">Requisições HTTP:</span><br><br><br>

            <!-- Listar cidades -->
            <span class="font-weight-bold">Listar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#c_listar">[GET] {{ url("/api/cidades/listar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="c_listar">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/cidades/listar') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "nome":"SP",
                            "uf":"Osasco",
                            "status":"A"
                        }
                    ]
                </textarea>
            </div>
            <!-- Listar cidades -->

            <!-- Listar cidades por grupo
            <span class="font-weight-bold text-success">Listar por grupo:</span> <br><span class="cursor-pointer ml-4 new" data-toggle="collapse" data-target="#c_listar_por_grupo">[GET] {{ url("/api/cidades_por_grupo/{grupo_de_cidades_id}") }}</span><br><br>

            <div class="collapse bg-light p-4" id="c_listar_por_grupo">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/cidades_por_grupo/{grupo_de_cidades_id}') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "nome":"SP",
                            "uf":"Osasco",
                            "status":"A"
                        },
                        {
                            ...
                        }
                    ]
                </textarea>
            </div>
            Listar cidades por grupo -->

            <!-- cadastrar cidades -->
            <span class="font-weight-bold">Cadastrar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#c_cadastrar">[POST] {{ url("/api/cidades/cadastrar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="c_cadastrar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/cidades/cadastrar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "nome" => "{nome da cidade}",
                        "uf" => "{UF da cidade}",
                        "status" => "A",
                        "grupo_de_cidades_id" => {ID do grupo de cidades}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- cadastrar cidades -->

            <!-- alterar cidades -->
            <span class="font-weight-bold">Editar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#c_alterar"> [POST] {{ url("/api/cidades/editar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="c_alterar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/cidades/editar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID da cidades},
                        "nome" => "{nome da cidade}",
                        "uf" => "{UF da cidade}",
                        "status" => "A",
                        "grupo_de_cidades_id" => {ID do grupo de cidades}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- alterar cidades -->

            <!-- deletar cidades -->
            <span class="font-weight-bold">Excluir</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#c_excluir">[POST] {{ url("/api/cidades/excluir") }}</span><br><br>

            <div class="collapse bg-light p-4" id="c_excluir">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/cidades/excluir') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID da cidades}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- deletar cidades -->
            <hr>

        </div>

        <!-- Campanhas ===============================================================================-->

        <div class="p-2 mt-5" id="campanhas">
            <h3 class="text-center">Campanhas</h3>

            <span class="font-weight-bold">Requisições HTTP:</span><br><br><br>

            <!-- Listar campanhas -->
            <span class="font-weight-bold">Listar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#cp_listar">[GET] {{ url("/api/campanhas/listar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="cp_listar">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/campanhas/listar') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "nome":"campanha",
                            "descricao":"camapanha de verão",
                            "status":"A"
                        }
                    ]
                </textarea>
            </div>
            <!-- Listar campanhas -->

            <!-- Listar campanhas por grupo
            <span class="font-weight-bold text-success">Listar por grupo:</span> <br><span class="cursor-pointer ml-4 new" data-toggle="collapse" data-target="#cp_listar_por_grupo">[GET] {{ url("/api/campanhas_por_grupo/{grupo_de_cidades_id}") }}</span><br><br>

            <div class="collapse bg-light p-4" id="cp_listar_por_grupo">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/campanhas_por_grupo/{grupo_de_cidades_id}') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    {
                        "id":1,
                        "created_at":"2022-05-04T13:29:04.000000Z",
                        "updated_at":"2022-05-04T13:29:04.000000Z",
                        "nome":"campanha",
                        "descricao":"camapanha de verão",
                        "status":"A"
                    }
                </textarea>
            </div>
            Listar campanhas por grupo -->

            <!-- cadastrar campanhas -->
            <span class="font-weight-bold">Cadastrar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#cp_cadastrar">[POST] {{ url("/api/campanhas/cadastrar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="cp_cadastrar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/campanhas/cadastrar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "nome" => "{nome da campanha}",
                        "descricao" => "{descrição da campanha}",
                        "status" => "A",
                        "grupo_de_cidades_id" => {ID do grupo de cidades}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- cadastrar campanhas -->

            <!-- alterar campanhas -->
            <span class="font-weight-bold">Editar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#cp_alterar"> [POST] {{ url("/api/campanhas/editar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="cp_alterar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/campanhas/editar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID da campanha},
                        "nome" => "{nome da campanha}",
                        "descricao" => "{descrição da campanha}",
                        "status" => "A",
                        "grupo_de_cidades_id" => {ID do grupo de cidades}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- alterar campanhas -->

            <!-- deletar campanhas -->
            <span class="font-weight-bold">Excluir</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#cp_excluir">[POST] {{ url("/api/campanhas/excluir") }}</span><br><br>

            <div class="collapse bg-light p-4" id="cp_excluir">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/campanhas/excluir') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID da campanha}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- deletar campanhas -->
            <hr>

        </div>

        <!-- Produtos ================================================================================-->

        <div class="p-2 mt-5" id="produtos">
            <h3 class="text-center">Produtos</h3>

            <span class="font-weight-bold">Requisições HTTP:</span><br><br><br>

            <!-- Listar produtos -->
            <span class="font-weight-bold">Listar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#p_listar">[GET] {{ url("/api/produtos/listar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="p_listar">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/produtos/listar') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "nome":"protetor solar",
                            "descricao":"protetor solar",
                            "valor": "5.00",
                            "status":"A"
                        }
                    ]
                </textarea>
            </div>
            <!-- Listar produtos -->

            <!-- Obter produto pelo ID
            <span class="font-weight-bold text-success">Obter produto pelo ID:</span> <br><span class="cursor-pointer ml-4 new" data-toggle="collapse" data-target="#p_getproduto">[GET] {{ url("/api/getproduto/{id}") }}</span><br><br>

            <div class="collapse bg-light p-4" id="p_getproduto">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/getproduto/{id}') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    {
                        "id":1,
                        "created_at":"2022-05-04T13:29:04.000000Z",
                        "updated_at":"2022-05-04T13:29:04.000000Z",
                        "nome":"protetor solar",
                        "descricao":"protetor solar",
                        "valor": "5.00",
                        "status":"A"
                    }
                </textarea>
            </div>
            Obter produto pelo ID -->

            <!-- cadastrar produtos -->
            <span class="font-weight-bold">Cadastrar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#p_cadastrar">[POST] {{ url("/api/produtos/cadastrar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="p_cadastrar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/produtos/cadastrar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "nome" => "{nome do produto}",
                        "descricao" => "{descrição do produto}",
                        "valor" => {valor do produto},
                        "status" => "A",
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- cadastrar produtos -->

            <!-- alterar produtos -->
            <span class="font-weight-bold">Editar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#p_alterar"> [POST] {{ url("/api/produtos/editar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="p_alterar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/produtos/editar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID do produto},
                        "nome" => "{nome do produto}",
                        "descricao" => "{descrição do produto}",
                        "valor" => {valor do produto},
                        "status" => "A",
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- alterar produtos -->

            <!-- deletar produtos -->
            <span class="font-weight-bold">Excluir</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#p_excluir">[POST] {{ url("/api/produtos/excluir") }}</span><br><br>

            <div class="collapse bg-light p-4" id="p_excluir">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/produtos/excluir') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID do produto}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- deletar produtos -->
            <hr>

        </div>

        <!-- Produtos de campanha ====================================================================-->
        <div class="p-2 mt-5" id="produtos_de_campanha">
            <h3 class="text-center">Produtos de campanha</h3>

            <span class="font-weight-bold">Requisições HTTP:</span><br><br><br>

            <!-- Listar produtos de campanha -->
            <span class="font-weight-bold">Listar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#pc_listar">[GET] {{ url("/api/produtos_de_campanhas/listar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="pc_listar">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/produtos_de_campanhas/listar') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "produto_id":1,
                            "campanha_id":1
                        }
                    ]
                </textarea>
            </div>
            <!-- Listar produtos de campanha -->

            <!-- Listar produtos de campanha
            <span class="font-weight-bold text-success">Listar produtos por campanha:</span> <br><span class="cursor-pointer ml-4 new" data-toggle="collapse" data-target="#pc_listar_por_campanha">[GET] {{ url("/api/getprodutos_de_campanhas/{campanha_id}") }}</span><br><br>

            <div class="collapse bg-light p-4" id="pc_listar_por_campanha">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/getprodutos_de_campanhas/{campanha_id}') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "produto_id":1,
                            "campanha_id":1
                        }
                    ]
                </textarea>
            </div>
            Listar produtos de campanha -->

            <!-- cadastrar produtos de campanha -->
            <span class="font-weight-bold">Cadastrar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#pc_cadastrar">[POST] {{ url("/api/produtos_de_campanhas/cadastrar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="pc_cadastrar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/produtos_de_campanhas/cadastrar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "produto_id" => {ID do produto}",
                        "campanha_id" => {ID da campanha},
                        "status" => "A"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- cadastrar produtos de campanha -->

            <!-- alterar produtos de campanha -->
            <span class="font-weight-bold">Editar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#pc_alterar">[POST] {{ url("/api/produtos_de_campanhas/editar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="pc_alterar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/produtos_de_campanhas/editar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "produto_id" => {ID do produto}",
                        "campanha_id" => {ID da campanha},
                        "status" => "{status do produto de campanha}"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- alterar produtos de campanha -->

            <!-- deletar produtos de campanha -->
            <span class="font-weight-bold">Excluir</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#pc_excluir">[POST] {{ url("/api/produtos_de_campanhas/excluir") }}</span><br><br>

            <div class="collapse bg-light p-4" id="pc_excluir">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/produtos_de_campanhas/excluir') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID do produto de campanha}"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- deletar produtos de campanha -->
            <hr>

        </div>

        <!-- Descontos ===============================================================================-->

        <div class="p-2 mt-5" id="descontos">
            <h3 class="text-center">Descontos</h3>

            <span class="font-weight-bold">Requisições HTTP:</span><br><br><br>

            <!-- Listar descontos -->
            <span class="font-weight-bold">Listar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#d_listar">[GET] {{ url("/api/descontos/listar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="d_listar">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/descontos/listar') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "produto_de_campanha_id":1,
                            "descricao":"desconto de verão",
                            "valor":10.00,
                            "status":"A"
                        }
                    ]
                </textarea>
            </div>
            <!-- Listar descontos -->

            <!-- Listar descontos por produto de campanha
            <span class="font-weight-bold text-success">Listar descontos por produto de campanha:</span> <br><span class="cursor-pointer ml-4 new" data-toggle="collapse" data-target="#d_listar_por_produto_decampanha">[GET] {{ url("/api/getdescontos/{produto_campanha_id}") }}</span><br><br>

            <div class="collapse bg-light p-4" id="d_listar_por_produto_decampanha">
                Request PHP
                <textarea class="form-control mt-2" rows="9" readonly>
                    $ch = curl_init();

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, '{{ url('/api/getdescontos/{produto_campanha_id}') }}');
                    $result = curl_exec($ch);
                    curl_close($ch);

                    var_dump($result);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="12" readonly>
                    [
                        {
                            "id":1,
                            "created_at":"2022-05-04T13:29:04.000000Z",
                            "updated_at":"2022-05-04T13:29:04.000000Z",
                            "produto_de_campanha_id":1,
                            "descricao":"desconto de verão",
                            "valor":10.00,
                            "status":"A"
                        }
                    ]
                </textarea>
            </div>
             Listar descontos por produto de campanha -->

            <!-- cadastrar descontos -->
            <span class="font-weight-bold">Cadastrar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#d_cadastrar">[POST] {{ url("/api/descontos/cadastrar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="d_cadastrar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/descontos/cadastrar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "descricao" => {descrição do desconto}",
                        "valor" => {valor do desconto},
                        "status" => "A"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- cadastrar descontos -->

            <!-- alterar descontos -->
            <span class="font-weight-bold">Editar</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#d_alterar">[POST] {{ url("/api/descontos/editar") }}</span><br><br>

            <div class="collapse bg-light p-4" id="d_alterar">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/descontos/editar') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID do desconto},
                        "descricao" => {descrição do desconto}",
                        "valor" => {valor do desconto},
                        "status" => "A"
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- alterar descontos -->

            <!-- deletar descontos -->
            <span class="font-weight-bold">Excluir</span>: <br><span class="cursor-pointer ml-4" data-toggle="collapse" data-target="#d_excluir">[POST] {{ url("/api/descontos/excluir") }}</span><br><br>

            <div class="collapse bg-light p-4" id="d_excluir">
                Request PHP
                <textarea class="form-control mt-2" rows="16" readonly>
                    $ch = curl_init("{{ url('/api/descontos/excluir') }}");

                    $headers = [
                        'x-api-key: {sua chave de api}',
                        'Accept: application/json',
                        'Content-Type: application/json'
                    ];

                    $data = [
                        "id" => {ID do desconto}
                    ];

                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                    $response = curl_exec($ch);

                    curl_close ($ch);

                    var_dump($response);
                </textarea>
                <br>
                Response JSON Exemplo
                <textarea class="form-control mt-2" rows="4" readonly>
                    {
                        "status":"success"
                    }
                </textarea>
            </div>
            <!-- deletar descontos -->

        </div>

        <!-- Descontos ===============================================================================-->
    </main>


    <!-- Rodapé-->
    <footer class="container text-center mb-5 mt-5">
        &copy {{ date("Y") }} - Diógenes Calheiros da Silva
    </footer>
</body>
</html>
