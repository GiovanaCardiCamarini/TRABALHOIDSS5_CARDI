<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Paciente</title>
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
        <h2>Adicionar Paciente</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'db.php';
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $genero = $_POST['genero'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];

            $sql = "INSERT INTO pacientes (nome, idade, genero, endereco, telefone, email) VALUES ('$nome', '$idade', '$genero', '$endereco', '$telefone', '$email')";
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Novo paciente adicionado com sucesso</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro: ' . $sql . '<br>' . $conn->error . '</div>';
            }
            $conn->close();
        }
        ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" class="form-control" id="idade" name="idade" required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" class="form-control" id="genero" name="genero" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3">
            © 2024 Clinica Médica
        </div>
    </footer>
</body>
</html>
