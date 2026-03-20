<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/EventoController.php";

$eventoController = new EventoController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $maximo_participantes = $_POST['maximo_participantes'];

    $eventoController->cadastrar($nome, $descricao, $data, $horario, $local, $maximo_participantes);

    header("Location: /NextLevel/public/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Eventos</title>
</head>
<body>

    <h1>Cadastrar Eventos</h1>

    <form method="POST">

        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Descrição:</label><br>
        <input type="text" name="descricao" required><br><br>

        <label>Data:</label><br>
        <input type="date" name="data" required><br><br>

        <label>Horário:</label>
        <input type="time" name="horario" required><br><br>

        <label>Local:</label>
        <input type="text" name="local" required><br><br>

        <label>Máximo de Participantes</label>
        <input type="number" name="maximo_participantes" required><br><br>

        <button type="submit">Cadastrar</button><br><br>
        <a href="C:/Turma2/xampp/htdocs/NextLevel/public/index.php"><button>Voltar</button></a>
        

    </form>

</body>
</html>