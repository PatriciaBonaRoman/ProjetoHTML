<?php
include("conexao.php");

$result = $conn->query("SELECT * FROM clientes_promocoes ORDER BY data_cadastro DESC");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lista de Emails</title>
</head>
<body>
<h1>Clientes cadastrados</h1>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Data Cadastro</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nome'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['data_cadastro'] ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
