<?php
include 'db.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$genero = $_POST['genero'];
$endereco = $_POST['endereco'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

$sql = "UPDATE pacientes SET nome='$nome', idade='$idade', genero='$genero', endereco='$endereco', telefone='$telefone', email='$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
