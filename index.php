<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmarExclusao() {
            return confirm("Você tem certeza que deseja excluir este paciente?");
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Lista de Pacientes</h2>
        <a href="create.php" class="btn btn-primary mb-3">Adicionar Paciente</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Gênero</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM pacientes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["nome"] . "</td>
                                    <td>" . $row["idade"] . "</td>
                                    <td>" . $row["genero"] . "</td>
                                    <td>" . $row["endereco"] . "</td>
                                    <td>" . $row["telefone"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>
                                        <a href='edit.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Editar</a>
                                        <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirmarExclusao()'>Excluir</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>Nenhum paciente encontrado</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer class="bg-dark text-white text-center p-3 mt-4">
        © 2024 Clinica Médica
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
