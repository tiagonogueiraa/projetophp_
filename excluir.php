<?php

$id = (int)$_GET["id"];

include_once("conexao.php");


$stmt = $obj_mysqli->prepare("DELETE FROM cliente WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();

$stmt->close();

header("Location: lista.php");



?>