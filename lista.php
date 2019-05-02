<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>


<body>

    <?php

    include_once("conexao.php");


    ?>
    <table>
        <tr>
            <td>Código</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Cidade</td>
            <td>UF</td>
            <td cellspacing="2">Opção</td>
        </tr>
        <?php
        $result = $obj_mysqli->query("SELECT * FROM cliente");

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
</body>

</html>