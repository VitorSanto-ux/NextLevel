<?php

class InscricaoModel
{
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
            u.evento_id,
            u.participante_id
        FROM inscricoes u
        ORDER BY u.id DESC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function cadastrar($evento_id, $participante_id)
    {
        $sql = "INSERT INTO inscricoes (evento_id, participante_id) 
            VALUES (:evento_id, :participante_id)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':evento_id' => $evento_id,
            ':participante_id' => $participante_id
        ]);
    }


    public function listar()
    {
        $sql = "
        SELECT
        i.id,
        e.nome AS evento_nome,
        p.nome AS participante_nome
        FROM inscricoes i
        INNER JOIN eventos e ON i.evento_id = e.id
        INNER JOIN participantes p ON i.participante_id = p.id";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editar($evento_id, $participante_id, $id)
    {
        $sql = "UPDATE inscricoes SET evento_id=?, participante_id=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$evento_id, $participante_id, $id]);
    }

    public function deletar($id)
    {
        $sql = "DELETE FROM inscricoes WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM inscricoes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function contarInscricoes($evento_id)
    {
        $sql = "SELECT COUNT(*) as total FROM inscricoes WHERE evento_id = :evento_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':evento_id' => $evento_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function verificarInscricao($evento_id, $participante_id)
    {
        $sql = "SELECT * FROM inscricoes WHERE evento_id = :evento_id AND participante_id = :participante_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':evento_id' => $evento_id,
            ':participante_id' => $participante_id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
}
