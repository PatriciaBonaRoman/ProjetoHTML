<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $dataHora = date("Y-m-d H:i:s");
    $ip = $_SERVER['REMOTE_ADDR']; // captura o IP do visitante

    $linha = "$dataHora - $ip - $nome - $email" . PHP_EOL;

    file_put_contents("acessos.txt", $linha, FILE_APPEND);

    echo "Obrigado! Seus dados foram registrados.";
}
?>