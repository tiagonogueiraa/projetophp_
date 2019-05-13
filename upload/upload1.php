<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<?php



// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL ^ E_NOTICE);

// Report all PHP errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);



include_once("conn.php");


$msg = false;

//se existir um arquivo, temos que fazer isso
if (isset($_FILES['arquivo'])) {

    //pega os ultimos caracteres do nome arquivo e strtolower passa tudo para minusculo
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    //definir novo nome
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome); //efetua o upload


    $sql_code  = "INSERT INTO arquivo (arquivo, data) VALUES  ('$novo_nome', NOW())";
    if ($conn->query($sql_code) === TRUE) {
        $msg = "Table MyGuests created successfully";
    } else {
        $msg = "Error creating table: " . $conn->error;
    }
}


?>

<body>


    <h1>Upload de arquivo</h1>


    <?php
    //se existe mensagem, mostre
    if ($msg != false) echo "<p> $msg"; ?>


    <form action="upload1.php" method="POST" enctype="multipart/form-data">
        Arquivo: <input type="file" required name="arquivo" >
        <button type="submit">Salvar</button>
    </form>
</body>

</html>

<?php


?>