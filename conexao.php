<?php 

    $conn = mysqli_connect("127.0.0.1", "root", "", "projeto");

    if (!$conn)
    {
        echo "Ocorreu um erro na conexão com o banco de dados." . mysqli_connect_error();
    }


    
?>