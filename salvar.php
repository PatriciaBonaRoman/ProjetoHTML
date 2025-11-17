<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("conexao.php");

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);

if (!empty($nome) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

    try {
        $stmt = $conn->prepare("INSERT INTO clientes_promocoes (nome, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $nome, $email);
        $stmt->execute();
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Erro ao salvar: e-mail já cadastrado ou problema no servidor'); window.location.href='index.html';</script>";
    }

} else {
    echo "<script>alert('Dados inválidos'); window.location.href='index.html';</script>";
}
?>