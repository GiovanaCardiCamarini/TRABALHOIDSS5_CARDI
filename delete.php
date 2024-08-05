<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Paciente</title>
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
        <h2>Excluir Paciente</h2>
        <?php
        include 'db.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM pacientes WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Paciente excluído com sucesso</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro: ' . $sql . '<br>' . $conn->error . '</div>';
            }
            $conn->close();
        }
        ?>
        <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3">
            © 2024 Clinica Médica
        </div>
    </footer>
</body>
</html>
