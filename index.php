<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
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
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Lista de Pacientes</h2>
        <?php
        include 'db.php';

        $sql = "SELECT * FROM pacientes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead><tr><th>ID</th><th>Nome</th><th>Idade</th><th>Gênero</th><th>Endereço</th><th>Telefone</th><th>Email</th><th>Ações</th></tr></thead>';
            echo '<tbody>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["nome"] . '</td>';
                echo '<td>' . $row["idade"] . '</td>';
                echo '<td>' . $row["genero"] . '</td>';
                echo '<td>' . $row["endereco"] . '</td>';
                echo '<td>' . $row["telefone"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>';
                echo '<a href="edit.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">Editar</a> ';
                echo '<a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Excluir</a>';
                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="alert alert-info" role="alert">Nenhum paciente encontrado.</div>';
        }

        $conn->close();
        ?>
    </div>
    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3">
            © 2024 Clinica Médica
        </div>
    </footer>
</body>
</html>
