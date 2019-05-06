<?php

    $servename = "localhost";
    $database = "projeto";
    $username = "root";
    $password = "";


    //cria conexão

    $conn = mysqli_connect($servename,$username,$password, $database);


    //checar conexão

    if (!$conn){
        die("Conexão falhou; ". mysqli_connect_error());
    }

    echo "conectado com sucesso.";

?>