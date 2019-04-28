<?php 

    $obj_mysqli = new mysqli("127.0.0.1", "root", "", "projeto");

    if ($obj_mysqli->connect_errno)
    {
        echo "Ocorreu um erro na conexão com o banco de dados.";
    }


    
?>