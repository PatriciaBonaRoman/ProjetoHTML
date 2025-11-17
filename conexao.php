<?php
$host = "sql207.byetcluster.com";
$user = "if0_40232865";
$pass = "2c2fp6GptYwQmL";
$dbname = "if0_40232865_bona_sushi";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
