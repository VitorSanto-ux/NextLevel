<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/InscricaoController.php";

$inscricaoController = new InscricaoController($pdo);

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die("ID inválido");
}

// ✅ método correto
$inscricao = $inscricaoController->buscar($id);

if (!$inscricao) {
    die("Inscrição não encontrada");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evento_id = $_POST['evento_id'];
    $participante_id = $_POST['participante_id'];

    // ✅ ordem correta
    $inscricaoController->editar($evento_id, $participante_id, $id);

    header("Location: ../public/index.php");
    exit;
}
?>

<h1>Editar Inscrição</h1>

<form method="POST">

    Evento ID:<br>
    <input type="number" name="evento_id" value="<?= $inscricao['evento_id'] ?>" required><br><br>

    Participante ID:<br>
    <input type="number" name="participante_id" value="<?= $inscricao['participante_id'] ?>" required><br><br>

    <button type="submit">Atualizar</button>
    <a href="../public/index.php">Voltar</a>

</form>