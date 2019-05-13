<?php 

    
    /// TESTE VARIAVEL DINAMICAMENTE

    //criar variavel dinamicamente
    //verifica se existe post antes de mostrar as variaveis
    if (!isset($_POST) || empty($_POST)) {
        echo "nada foi postado.";
    } else {
        foreach ($_POST as $chave => $valor) {
            //remove as tags html
            //remove os espaco em branco do valor
            $$chave = trim(strip_tags($valor));
        }
    }


    if(isset($nome)){
        echo "nome obrigatorio";
    if (isset($cpf)){
        echo "cpf obrigatorio";
    if (isset($telefone)){
        echo "telefone obrigatorio";
    }
    }
}


    //print_r($_POST);


?>



<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

    <style>
        .menu {
            background-color: blue;
            height: 100px;
            width: 100%;
        }

        #form {
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>



    <div class="container-fluid">

        <div class="menu ">



        </div>

        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

                <div>
                    <h3>Cadastro Cliente</h3>
                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="Nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="">
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="Senha">Senha</label>
                        <input type="password" class="form-control" id="senha" placeholder="senha">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="">
                    </div>
                    <div class="form-group col-md-1 ">
                        <label for="inputAddress2">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero" placeholder="00">
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="inputCity">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <div class="form-group">
                            <label for="inputCity">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado">
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputAddress">Endereço</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Administrador
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>


    </div>

</body>

</html>