<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <?php

    include_once("conexao.php");


    ?>
    <table>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Cidade</td>
            <td>UF</td>
        </tr>
        <?php
            $result = $obj_mysqli->query("SELECT * FROM cliente");

            while($aux_query = $result->fetch_assoc())
            {
                echo "<tr>";
                echo '<td> '. $aux_query["id"] . '</td>';
                echo '<td>' . $aux_query["nome"] . '</td>';
                echo '<td>' . $aux_query["email"] . '</td>';
                echo '<td>' . $aux_query["cidade"] . '</td>';
                echo '<td>' . $aux_query["uf"] . '</td>';
                echo "</tr>";

            }
        ?>
    </table>
</body>

</html>