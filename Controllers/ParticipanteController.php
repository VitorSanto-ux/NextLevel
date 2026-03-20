<?php

require_once "C:/Turma2/xampp/htdocs/NextLevel/Models/ParticipanteModel.php";

class ParticipanteController{
    private $participantesModel;

    public function __construct($pdo){
        $this->participantesModel = new ParticipanteModel($pdo);
    }

    public function listar(){
        $participantes = $this->participantesModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/NextLevel/Views/listar.php";
        return;
    }

    public function listartodos(){
        return $participantes = $this->participantesModel->buscarTodos();
        
    }

    public function cadastrar($nome, $email, $telefone ){
        return $this->participantesModel->cadastrar($nome, $email, $telefone);
    }

    public function buscar($id){
        return $this->participantesModel->buscarPorId($id);
    }

    public function editar($id, $nome, $email, $telefone){
        return $this->participantesModel->editar($id, $nome, $email, $telefone);
    }

    public function deletar($id){
        return $this->participantesModel->deletar($id);
    }

}
?>