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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Lista de Pacientes</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Lista de Pacientes</h2>
        <?php
        include 'db.php';
        $sql = "SELECT id, nome, idade, genero, endereco, telefone, email FROM pacientes";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<table class='table table-striped'><thead><tr><th>ID</th><th>Nome</th><th>Idade</th><th>Gênero</th><th>Endereço</th><th>Telefone</th><th>Email</th><th>Ações</th></tr></thead><tbody>";
            while($linha = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>".$linha["id"]."</td>
                        <td>".$linha["nome"]."</td>
                        <td>".$linha["idade"]."</td>
                        <td>".$linha["genero"]."</td>
                        <td>".$linha["endereco"]."</td>
                        <td>".$linha["telefone"]."</td>
                        <td>".$linha["email"]."</td>
                        <td>
                            <a class='btn btn-warning btn-sm' href='update.php?id=".$linha["id"]."'>Editar</a> 
                            <a class='btn btn-danger btn-sm' href='delete.php?id=".$linha["id"]."'>Excluir</a>
                        </td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<div class='alert alert-info' role='alert'>0 resultados</div>";
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
