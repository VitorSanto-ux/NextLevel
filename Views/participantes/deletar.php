<?php

require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/ParticipanteController.php";

$participanteController = new ParticipanteController($pdo);

$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$participanteController->deletar($id);

header("Location: /NextLevel/public/index.php");
?>