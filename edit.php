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
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM pacientes WHERE id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
        ?>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $row['idade']; ?>" required>
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
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $row['endereco']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo
