<?php
$servidor = "localhost";
$usuario = "root"; // ou o usuário do MySQL configurado
$senha = "senha_da_nasa"; // ou a senha configurada do MySQL
$banco = "clinica_db";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
