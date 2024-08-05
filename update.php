<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Paciente</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Clinica Médica</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Adicionar Paciente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Lista de Pacientes</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Atualizar Paciente</h2>
        <?php
        include 'db.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM pacientes WHERE id=$id";
            $resultado = $conn->query($sql);
            $paciente = $resultado->fetch_assoc();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $genero = $_POST['genero'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];

            $sql = "UPDATE pacientes SET nome='$nome', idade='$idade', genero='$genero', endereco='$endereco', telefone='$telefone', email='$email' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Paciente atualizado com sucesso</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro: ' . $sql . '<br>' . $conn->error . '</div>';
            }
            $conn->close();
        }
        ?>

        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $paciente['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $paciente['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $paciente['idade']; ?>" required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $paciente['genero']; ?>" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $paciente['endereco']; ?>">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $paciente['telefone']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $paciente['email']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
    <footer class="bg-light text-center
