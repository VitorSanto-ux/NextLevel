<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/ParticipanteController.php";

$participanteController = new ParticipanteController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $participanteController->cadastrar($nome, $email, $telefone);

    header("Location: /NextLevel/public/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Participante</title>
</head>
<body>

    <h1>Cadastrar Participante</h1>

    <form method="POST">

        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>E-mail:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" required><br><br>

        <button type="submit">Cadastrar</button><br><br>
        <a href="C:/Turma2/xampp/htdocs/NextLevel/public/index.php"><button>Voltar</button></a>
        

    </form>

</body>
</html>