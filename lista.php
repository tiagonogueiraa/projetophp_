<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
     /*   table, th, td {
            border: 1px solid black;
        } */
    </style>
</head>


<body>

    <?php

    include_once("conexao.php");


    ?>

    <div class="container">
        <table class="table">
            <tr>
                <td scope="col">Código</td>
                <td scope="col">Nome</td>
                <td scope="col">Email</td>
                <td scope="col">Cidade</td>
                <td scope="col">UF</td>
                <td scope="col" cellspacing="2">Opção</td>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM cliente");

            while ($aux_query = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<td> ' . $aux_query["id"] . '</td>';
                echo '<td>' . $aux_query["nome"] . '</td>';
                echo '<td>' . $aux_query["email"] . '</td>';
                echo '<td>' . $aux_query["cidade"] . '</td>';
                echo '<td>' . $aux_query["uf"] . '</td>';
                echo '<td><a href="atualizar.php?id=' . $aux_query["id"] . '">Alterar</a>
                <a href="excluir.php?id=' . $aux_query["id"] . '">Excluir</a>          
                </td>';
                echo "</tr>";
            }


            ?>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>