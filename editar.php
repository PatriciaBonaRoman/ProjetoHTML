<?php
include("conexao.php");

if (!isset($_GET['id'])) {
    echo "ID do visitante não fornecido.";
}

$id = (int) $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

   if (!empty($nome) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("UPDATE visitantes SET nome = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nome, $email, $id);

        if ($stmt->execute()) {
            header("Location: listar.php");
            exit();
        } else {
            echo "Houve um problema ao tentar fazer a atualização.: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Por gentileza, preencha todos os campos de forma correta.";
    }
} else { 
    $stmt = $conn->prepare("SELECT nome, email FROM visitantes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $visitante = $resultado->fetch_assoc();
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Visitante - Bona Sushi</title>
</head>
<body>
    <h1>Editar Visitante<h1>
    <form method="post">
        Nome: <input type="text" name="nome" value="<?= htmlspecialchars($visitante['nome']) ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= htmlspecialchars($visitante['email']) ?>" required><br><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>

        
        