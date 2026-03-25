<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/ParticipanteController.php";

$participanteController = new ParticipanteController($pdo);

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

$participante = $participanteController->buscar($id);

if (!$participante) {
    die("Participante não encontrado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $participanteController->editar(
        $id,
        $_POST['nome'],
        $_POST['email'],
        $_POST['telefone']
    );

    header("Location: /NextLevel/public/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Participante</title>
    <link rel="stylesheet" href="styleparticipantes.css">
</head>
<body>

<section id="participantes">
    <h1>Editar Participante</h1>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $participante['nome'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $participante['email'] ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" value="<?= $participante['telefone'] ?>"><br><br>

        <button type="submit">Atualizar</button>
        <a href="/NextLevel/public/index.php"><button type="button">Voltar</button></a>
    </form>
</section>

</body>
</html>