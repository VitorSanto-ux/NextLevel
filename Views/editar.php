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

    header("Location: index.php");
    exit;
}
?>

<h1>Editar Participante</h1>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome" value="<?= $participante['nome'] ?>" required><br><br>

    Email: <br>
    <input type="email" name="email" value="<?= $participante['email'] ?>" required><br><br>

    Telefone: <br>
    <input type="text" name="telefone" value="<?= $participante['telefone'] ?>"><br><br>

    <button type="submit">Atualizar</button>
    <a href="index.php" class="btn-voltar">Voltar</a>
</form>