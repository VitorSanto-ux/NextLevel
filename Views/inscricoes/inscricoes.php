<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/InscricaoController.php";

$inscricaoController = new InscricaoController($pdo);

// 🔥 BUSCAR DADOS DO BANCO
$eventos = $pdo->query("SELECT id, nome FROM eventos")->fetchAll();
$participantes = $pdo->query("SELECT id, nome FROM participantes")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento_id = $_POST['evento_id'] ?? null;
    $participante_id = $_POST['participante_id'] ?? null;

    if ($evento_id && $participante_id) {
        $inscricaoController->cadastrar($evento_id, $participante_id);
        header("Location: /NextLevel/public/index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Inscrições</title>
</head>
<body>

<h1>Cadastrar Inscrições</h1>

<form method="POST">

    <label>Evento:</label><br>
    <select name="evento_id" required>
        <?php foreach ($eventos as $e): ?>
            <option value="<?= $e['id'] ?>">
                <?= $e['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Participante:</label><br>
    <select name="participante_id" required>
        <?php foreach ($participantes as $p): ?>
            <option value="<?= $p['id'] ?>">
                <?= $p['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Cadastrar</button><br><br>

    <a href="/NextLevel/public/index.php">Voltar</a>

</form>

</body>
</html>