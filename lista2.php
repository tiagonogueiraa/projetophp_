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

        .box {
            
            
        }
    </style>
</head>


<body>

    <?php

    include_once("conexao.php");

    //itens por pagina definicao
    $itens_por_pagina = 10;

    //pegar pagina atual
    if (empty($_GET['pagina'])) {
        $pagina = 0;
    } else {
        $pagina = intval($_GET['pagina']);
    }
    echo "$pagina <br>";


    $item = $pagina * $itens_por_pagina;
    //pegar a quantidade de objetos no banco de dads
    $sql = "SELECT nome, email FROM cliente LIMIT $item, $itens_por_pagina";
    $execute = $conn->query($sql);
    $cliente = $execute->fetch_assoc();
    $num = $execute->num_rows;
    //pegar a quantidade total de objetos no banco de dados
    $num_total = $conn->query("SELECT * FROM cliente")->num_rows;

    //definir numeros de paginas
    $num_paginas = ceil($num_total / $itens_por_pagina);
    echo "$num_paginas <br>";
    echo "$num_total <br>";
    ?>
    <div class="container-fluid">
<div class="row">
    <div class="span5">
        <?php if ($num > 0) {  ?>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Email</td>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                        <tr>
                            <td><?php echo $cliente['nome']; ?></td>
                            <td><?php echo $cliente['email']; ?></td>
                        </tr>
                    <?php } while ($cliente = $execute->fetch_assoc()); ?>
                </tbody>
            </table>
        <?php } ?>


        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="lista2.php?pagina=0">Previous</a></li>
                <?php for ($i = 0; $i < $num_paginas; $i++) {
                    $estilo = "";
                    if ($pagina == $i)
                        $estilo = "class=\"active\"";
                    ?>
                    <li class="page-item"><a class="page-link <?php echo $estilo; ?>" href="lista2.php?pagina=<?= $i ?>"><?php echo $i + 1; ?></a></li>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="lista2.php?pagina=<?= $num_paginas - 1; ?>">Next</a></li>
            </ul>
        </nav>

    </div>

    <?php for ($i = 0; $i < $num_total; $i++) {
        echo $cliente['nome'];
    }

    ?>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>