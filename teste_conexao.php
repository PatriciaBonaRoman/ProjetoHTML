<?php
require_once 'conexao.php';

$conexao = new conexao();
$db = $conexao->conectar();

if ($db) {
    echo "<p style='color:blue; '> ✅ Conexão com o banco de dados realizada com sucesso!</p>";
}
?>