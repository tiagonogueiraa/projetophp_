<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar</title>
</head>

<body>

    <?php

    include_once("conexao.php");

    $id = (int)$_GET["id"];

    $stmt = $obj_mysqli->prepare("SELECT * FROM cliente WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();

    $aux_query = $result->fetch_assoc();

    echo "" . $aux_query["nome"] . " ";

    $nome = $aux_query["nome"];
    $email = $aux_query["email"];
    $cidade = $aux_query["cidade"];
    $uf = $aux_query["uf"];
    $id = $aux_query["id"];

    $stmt->close();

    ?>

    <form action="controllerAtualizar.php?id=<?=$id?>" method="POST">

        <label for="">Nome:</label>
        <input type="text" name="nome" placeholder="nome" value="<?=$nome?>"  readonly ><br>
        <label for="">Email:</label>
        <input type="mail" name="email" placeholder="email" value="<?=$email?>"> <br>
        <label for="">Cidade:</label>
        <input type="text" name="cidade" placeholder="Cidade" value="<?=$cidade?>"><br>
        <label for="">UF</label>
        <input type="text" name="uf" placeholder="UF" value="<?=$uf?>"> <br>

        <button type="submit">Cadastrar</button>
    </form>



</body>

</html>