<?php
include("conexao.php");
$result = $conn->query("SELECT * FROM visitantes");
?>
<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Visitantes - Bona Sushi</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <h1>Lista de Visitantes<h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
           <?php
           while($row = $result->fetch_assoc()) { ?>

              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td> 
                <td><?= $row['email'] ?></td>
           <td> 
            <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
            <a href="deletar.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja deletar o visitantw?')">Deletar</a> 
              </td>
                </tr>

              <?php } ?>

              </table>
              <br>
              <a href="index.html">Voltar para o Formulário</a>
              </body>
              </html>