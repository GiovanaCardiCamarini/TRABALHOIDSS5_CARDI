<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Paciente</h2>
        <?php
        include 'db.php';

        // Verifica se o ID está presente na URL
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM pacientes WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();

                // Processa o formulário de atualização
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nome = $_POST['nome'];
                    $idade = $_POST['idade'];
                    $genero = $_POST['genero'];
                    $endereco = $_POST['endereco'];
                    $telefone = $_POST['telefone'];
                    $email = $_POST['email'];

                    $updateSql = "UPDATE pacientes SET nome='$nome', idade='$idade', genero='$genero', endereco='$endereco', telefone='$telefone', email='$email' WHERE id=$id";

                    if ($conn->query($updateSql) === TRUE) {
                        echo '<div class="alert alert-success">Paciente atualizado com sucesso!</div>';
                    } else {
                        echo '<div class="alert alert-danger">Erro ao atualizar paciente: ' . $conn->error . '</div>';
                    }
                }
        ?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" value="<?php echo htmlspecialchars($row['idade']); ?>" required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero</label>
                <select class="form-control" id="genero" name="genero" required>
                    <option value="Masculino" <?php echo ($row['genero'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?php echo ($row['genero'] == 'Feminino') ? 'selected' : ''; ?>>Feminino</option>
                    <option value="Outro" <?php echo ($row['genero'] == 'Outro') ? 'selected' : ''; ?>>Outro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo htmlspecialchars($row['endereco']); ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo htmlspecialchars($row['telefone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
            <a href="index.php" class="btn btn-info">Voltar para a Lista</a>
        </form>
        <?php
            } else {
                echo '<div class="alert alert-warning">Paciente não encontrado.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">ID do paciente não especificado.</div>';
        }

        $conn->close();
        ?>
    </div>
    <footer class="bg-dark text-white text-center p-3 mt-4">
        © 2024 GIOVANA CARDI CAMARINI
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
