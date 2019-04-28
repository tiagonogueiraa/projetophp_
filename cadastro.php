<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
<body>



<div style="color:black">Hello world</div>


    <?php

include_once("conexao.php");

    //validar se tem dados 
    if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"]))
    {
        if(empty($_POST["nome"]))
        $erro = "campo nome e email obrigatório"; 
        else 
            if(empty($_POST["email"]))
                $erro = "campo e-mail obrigatório";
            
            else {

                //realiza o cadastro

               $nome = $_POST['nome'];
               $email = $_POST['email'];
               $cidade = $_POST['cidade'];
               $uf = $_POST['uf'];

            
		$stmt = $obj_mysqli->prepare("INSERT INTO `cliente` (`nome`,`email`,`cidade`,`uf`) VALUES (?,?,?,?)");
		$stmt->bind_param('ssss', $nome, $email, $cidade, $uf);   //    $mysqli_set_charset($obj)
                if(!$stmt->execute())
                {
                     $erro = $stmt->error;

                }
                else {
                     $sucesso = "dados cadastrados com sucesso";
                }
            }
            
        }
    
?>


<?php
if(isset($erro))
	echo '<div style="color:#F00">'.$erro.'</div>';
else
if(isset($sucesso))
	echo '<div style="color:#00f">'.$sucesso.'</div>';
 
?>


</form>
<p><h1>Cadastrar</h1></p><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

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
