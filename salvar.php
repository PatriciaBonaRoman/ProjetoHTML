<?php
include("Conexao.php");

$conexao = new Conexao();
$conn = $conexao->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    if (!empty($nome) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $stmt = $conn->prepare("INSERT INTO visitantes (nome, email) VALUES (:nome, :email)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                header("Location: listar.php");
                exit();
            } else {
                echo "❌ Erro ao salvar no banco de dados.";
            }

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

    } else {
        echo "⚠️ Por favor, preencha todos os campos corretamente.";
    }
}
?>
