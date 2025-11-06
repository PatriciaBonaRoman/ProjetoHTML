<?php
class Conexao {
    // Credenciais do InfinityFree
    private $host = "sql207.infinityfree.com";
    private $usuario = "if0_40232865";
    private $senha = "2c2fp6GptYwqmL";
    private $dbname = "if0_40232865_bona_sushi";

    public function conectar() {
        try {
            $conexao = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->usuario,
                $this->senha
            );

            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexao;

        } catch (PDOException $e) {
            echo "<p style='color:red; font-family:Arial;'>
                    ⚠️ Erro ao conectar ao banco de dados: {$e->getMessage()}
                  </p>";
            return null;
        }
    }
}
