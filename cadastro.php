<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>


    <?php

    include_once("conexao.php");



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


    

    //validar se tem dados 
    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"])) {
        if (empty($_POST["nome"]))
            $erro = "Campo nome obrigatório.";
        else 
            if (empty($_POST["email"]) || !filter_var($email, FILTER_VALIDATE_EMAIL))
            $erro = "campo e-mail inválido ou não digitado";

        else {

            //realiza o cadastro

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];


            $stmt = $conn->prepare("INSERT INTO cliente (nome, email, cidade , uf ) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $nome, $email, $cidade, $uf);   //    $mysqli_set_charset($obj)
            if (!$stmt->execute()) {
                $erro = $stmt->error;
            } else {
                $sucesso = "dados cadastrados com sucesso";
                echo " Bem vindo usuário: $email .";
            }
        }
    }

    ?>






    <div class="container">

        <?php
        if (isset($erro))
            echo '<div class style="color:#F00">' . $erro . '</div>';

        if (isset($sucesso))
            echo '<div style="color:#00f">' . $sucesso . '</div>';

        ?>
        </form>
        <p>
            <h1>Cadastrar</h1>
        </p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group col-md-6">
                <label for="">Nome:</label>
                <input type="text" name="nome" placeholder="Nome" class="form-control" require><br>
                <label for="">Email:</label>
                <input type="mail" name="email" placeholder="email" class="form-control"> <br>
                <label for="">Cidade:</label>
                <input type="text" name="cidade" placeholder="Cidade" class="form-control"><br>
                <label for="">UF</label>
                <input type="text" name="uf" placeholder="UF" class="form-control"><br>

                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>