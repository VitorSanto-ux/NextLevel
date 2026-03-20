<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/EventoController.php";

$eventoController = new EventoController($pdo);

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

$evento = $eventoController->buscar($id);

if (!$evento) {
    die("evento não encontrado");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventoController->editar(
        $id,
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['data'],
        $_POST['horario'],
        $_POST['local'],
        $_POST['maximo_participantes']
    );

    header("Location: ../public/index.php");
    exit;
}
?>

<h1>Editar Eventos</h1>

<form method="POST">
    Nome: <br>
    <input type="text" name="nome" value="<?= $evento['nome'] ?>" required><br><br>

    Descriçâo: <br>
    <input type="text" name="descricao" value="<?= $evento['descricao'] ?>" required><br><br>

    Data: <br>
    <input type="date" name="data" value="<?= $evento['data'] ?>"><br><br>

    Horário: <br>
    <input type="time" name="horario" value="<?=  $evento['horario'] ?>"><br><br>

    Local: <br>
    <input type="text" name="local" value="<?=  $evento['local'] ?>"><br><br>

    Máximo de Participantes: <br>
    <input type="number" name="maximo_participantes" value="<?= $evento['maximo_participantes'] ?>">

    <button type="submit">Atualizar</button>
    <a href="../public/index.php" class="btn-voltar">Voltar</a>
</form>