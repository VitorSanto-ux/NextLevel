<?php

require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/EventoController.php";

$eventoController = new EventoController($pdo);

$id = $_GET['id'] ?? null;

if(!$id){
    die("ID inválido");
}

$eventoController->deletar($id);

header("Location: /NextLevel/public/index.php");
?>