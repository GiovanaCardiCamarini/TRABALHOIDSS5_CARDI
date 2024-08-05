<?php
$servidor = "localhost";
$usuario = "root";
$senha = "senha_da_nasa"; // Coloque a senha do seu MySQL se houver
$banco = "clinica_db";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>