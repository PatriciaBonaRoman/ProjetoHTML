<?php
include("conexao.php");

$result = $conn->query("SELECT email FROM clientes_promocoes");

// --- CONFIGURAÇÃO DO EMAIL ---
$assunto = "Promoções BONA Sushi";
$mensagem = "
<h2>Promoções BONA Sushi 🍣🔥</h2>
<p>Confira nossas ofertas especiais desta semana!</p>
";

// Cabeçalho para HTML
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: BONA Sushi <contato@bonasushi.com.br>\r\n";

// ENVIA PARA TODOS OS EMAILS
while ($row = $result->fetch_assoc()) {
    mail($row['email'], $assunto, $mensagem, $headers);
}

echo "E-mails enviados com sucesso!";
