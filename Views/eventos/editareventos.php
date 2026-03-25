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

    header("Location: /NextLevel/public/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Eventos</title>
    <link rel="stylesheet" href="styleeventos.css">
</head>
<body>

<section id="eventos">
    <h1>Editar Eventos</h1>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= $evento['nome'] ?>" required><br><br>

        <label>Descrição:</label><br>
        <input type="text" name="descricao" value="<?= $evento['descricao'] ?>" required><br><br>

        <label>Data:</label><br>
        <input type="date" name="data" value="<?= $evento['data'] ?>"><br><br>

        <label>Horário:</label><br>
        <input type="time" name="horario" value="<?=  $evento['horario'] ?>"><br><br>

        <label>Local:</label><br>
        <input type="text" name="local" value="<?=  $evento['local'] ?>"><br><br>

        <label>Máximo de Participantes:</label><br>
        <input type="number" name="maximo_participantes" value="<?= $evento['maximo_participantes'] ?>"><br><br>

        <button type="submit">Atualizar</button>
        <a href="/NextLevel/public/index.php"><button type="button">Voltar</button></a>
    </form>
</section>

</body>
</html>