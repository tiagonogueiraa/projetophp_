<?php

$id = (int)$_GET["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];

    
    include_once("conexao.php");

    //$stmt = $obj_mysqli->prepare("INSERT INTO cliente (nome, email, cidade , uf ) VALUES (?,?,?,?)");
    //        $stmt->bind_param('ssss', $nome, $email, $cidade, $uf);   //    $mysqli_set_charset($obj)
    //        if (!$stmt->execute()) {
    //            $erro = $stmt->error;
    //        } else {
    //            $sucesso = "dados cadastrados com sucesso";
    //            echo " Bem vindo usuário: $email .";
    //        }

    $stmt = $obj_mysqli->prepare("UPDATE cliente SET nome=?, email=?, cidade=?, uf=? WHERE id=?");
            $stmt->bind_param('ssssi', $nome, $email, $cidade, $uf, $id);
          
            if(!$stmt->execute()){
                $erro = $stmt->error;
            } else {

                header("Location:lista.php");
            }


?>