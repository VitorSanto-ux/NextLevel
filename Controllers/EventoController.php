<?php

require_once "C:/Turma2/xampp/htdocs/NextLevel/Models/EventoModel.php";

class EventoController{
    private $eventosModel;

    public function __construct($pdo){
        $this->eventosModel = new EventoModel($pdo);
    }

    public function listar(){
        $eventos = $this->eventosModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/NextLevel/Views/listareventos.php";
        return;
    }

    public function listartodos(){
        return $eventos = $this->eventosModel->buscarTodos();
        
    }

    public function cadastrar($nome, $descricao, $data, $horario, $local, $maximo_participan6tes){
        return $this->eventosModel->cadastrar($nome, $descricao, $data, $horario, $local, $maximo_participan6tes);
    }

    public function buscar($id){
        return $this->eventosModel->buscarPorId($id);
    }

    public function editar($id, $nome, $descricao, $data, $horario, $local, $maximo_participantes){
        return $this->eventosModel->editar($id, $nome, $descricao, $data, $horario, $local, $maximo_participantes);
    }

    public function deletar($id){
        return $this->eventosModel->deletar($id);
    }

}
?>