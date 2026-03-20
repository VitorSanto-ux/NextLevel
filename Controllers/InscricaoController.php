<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/Models/InscricaoModel.php";

class InscricaoController
{
    private $inscricoesModel;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->inscricoesModel = new InscricaoModel($pdo);
    }

    public function listar()
    {
        $inscricoes = $this->inscricoesModel->buscarTodos();
        require 'C:/Turma2/xampp/htdocs/NextLevel/Views/listarincricoes.php';
    }

    public function listartodos()
    {
        return $inscricoes = $this->inscricoesModel->buscarTodos();
    }

    public function buscar($id)
    {
        return $this->inscricoesModel->buscarPorId($id);
    }

    public function cadastrar($evento_id, $participante_id)
    {
        // verifica se o usuário já está inscrito no evento
        if ($this->inscricoesModel->verificarInscricao($evento_id, $participante_id)) {
            header("Location: /NextLevel/Views/usuarioJaInscrito.php");
            exit();
        }

        // pega total atual
        $total = $this->inscricoesModel->contarInscricoes($evento_id);

        // pega limite do evento
        require_once "C:/Turma2/xampp/htdocs/NextLevel/Models/EventoModel.php";
        $eventoModel = new EventoModel($this->pdo);
        $evento = $eventoModel->buscarPorId($evento_id);

        if ($total >= $evento['maximo_participantes']) {
            header("Location: /NextLevel/Views/eventoLotado.php");
            exit();
        }

        return $this->inscricoesModel->cadastrar($evento_id, $participante_id);
    }

    public function editar($evento_id, $participante_id, $id)
    {
        return $this->inscricoesModel->editar($evento_id, $participante_id, $id);
    }

    public function deletar($id)
    {
        return $this->inscricoesModel->deletar($id);
    }

}
