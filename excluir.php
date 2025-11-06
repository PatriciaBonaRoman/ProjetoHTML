<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM visitantes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: listar.php");
        exit();
    } else {
        echo "Erro ao deletar: " . $stmt->error;
    }

    $stmt->close();

}
$conn->close();
?>