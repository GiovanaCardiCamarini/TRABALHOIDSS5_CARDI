<?php
include 'db.php';

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$genero = $_POST['genero'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "INSERT INTO pacientes (nome, idade, genero, endereco, telefone, email) VALUES ('$nome', '$idade', '$genero', '$endereco', '$telefone', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit(); // Garantir que o script pare aqui após o redirecionamento
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
