<?php
require_once 'C:/Turma2/xampp/htdocs/NextLevel/db/database.php';
class ParticipanteModel {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos()
{
    $sql = "
    SELECT
        u.id,
        u.nome,
        u.email,
        u.telefone
    FROM participantes u
    ORDER BY u.id DESC";

    $stmt = $this->pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function cadastrar($nome, $email, $telefone) {
    $sql = "INSERT INTO participantes (nome, email, telefone) 
            VALUES (:nome, :email, :telefone)";

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,

    ]);
    }

    public function buscarPorId($id){
        $sql = "SELECT * FROM participantes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nome, $email, $telefone){
        $sql = "UPDATE participantes
                SET nome = :nome,
                    email = :email,
                    telefone = :telefone
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':email' => $email,
            ':telefone' => $telefone
        ]);

    }

    public function deletar($id){
        $sql = "DELETE FROM participantes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>