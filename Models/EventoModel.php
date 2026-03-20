<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";

class EventoModel {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $sql = "
            SELECT
                u.id,
                u.nome,
                u.descricao,
                u.data,
                u.horario,
                u.local,
                u.maximo_participantes                    
                FROM eventos u
                ORDER BY u.id DESC";

    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $descricao, $data, $horario, $local, $maximo_participantes) {
    $sql = "INSERT INTO eventos (nome, descricao, data, horario, local, maximo_participantes) 
            VALUES (:nome, :descricao, :data, :horario, :local, :maximo_participantes)";

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':descricao' => $descricao,
        ':data' => $data,
        ':horario' => $horario,
        ':local' => $local,
        ':maximo_participantes' => $maximo_participantes
    ]);
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM eventos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nome, $descricao, $data, $horario, $local, $maximo_participantes){
        $sql = "UPDATE eventos
                SET nome = :nome,
                    descricao = :descricao,
                    data = :data,
                    horario = :horario,
                    local = :local,
                    maximo_participantes = :maximo_participantes
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':data' => $data,
            ':horario' => $horario,
            ':local' => $local,
            ':maximo_participantes' => $maximo_participantes
        ]);

    }

    public function deletar($id){
        $sql = "DELETE FROM eventos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>