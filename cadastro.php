<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
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
        if (empty($_POST["nome"]) )
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


            $stmt = $obj_mysqli->prepare("INSERT INTO cliente (nome, email, cidade , uf ) VALUES (?,?,?,?)");
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


    <?php
    if (isset($erro))
        echo '<div style="color:#F00">' . $erro . '</div>';
    else
if (isset($sucesso))
        echo '<div style="color:#00f">' . $sucesso . '</div>';

    ?>


    </form>
    <p>
        <h1>Cadastrar</h1>
    </p><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

        <label for="">Nome:</label>
        <input type="text" name="nome" placeholder="Nome" require><br>
        <label for="">Email:</label>
        <input type="mail" name="email" placeholder="email"> <br>
        <label for="">Cidade:</label>
        <input type="text" name="cidade" placeholder="Cidade"><br>
        <label for="">UF</label>
        <input type="text" name="uf" placeholder="UF">

        <button type="submit">Cadastrar</button>
    </form>


</body>

</html>