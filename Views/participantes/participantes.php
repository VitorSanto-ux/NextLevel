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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Participante</title>
    <link rel="stylesheet" href="styleparticipantes.css">
</head>
<body>

    <section id="participantes">
        <h1>Cadastrar Participante</h1>

        <form method="POST">

            <label>Nome:</label><br>
            <input type="text" name="nome" required><br><br>

            <label>E-mail:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Telefone:</label><br>
            <input type="text" name="telefone" required><br><br>
            <button type="submit">Cadastrar</button>
            <a href="/NextLevel/public/index.php"><button type="button">Voltar</button></a>
        </form>
    </section>

</body>
</html>