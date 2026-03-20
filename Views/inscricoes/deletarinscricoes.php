<?php

require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/InscricaoController.php";

$inscricaoController = new InscricaoController($pdo);

$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$inscricaoController->deletar($id);

header("Location: ../public/index.php");
?>