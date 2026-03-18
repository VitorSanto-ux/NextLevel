<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/ParticipanteController.php";

$participanteController = new ParticipanteController($pdo);

$participantes = $participanteController->listartodos();

echo "<section id='participantes'>";
//var_dump($participantes);
echo "<h1>Gerenciamento de Participantes</h1>";

if (empty($participantes)) {
    echo "<div class='links'>";
    echo "<p>Nenhum participante encontrado!</p>";
    echo "<br>
    <a href='participantes.php' class='cadastro'>Cadastrar novo Participante</a>";
    echo "</div>";
    echo "</section>";
    return;
} else {
    echo "<table class='tabela-usuarios'>";
    echo "<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
</thead>
<tbody>";

    foreach ($participantes as $participante) {

        $id = $participante['id'];

        echo "<tr>";
        echo "<td>{$participante['id']}</td>";
        echo "<td>{$participante['nome']}</td>";
        echo "<td>{$participante['email']}</td>";
        echo "<td>{$participante['telefone']}</td>";

        echo "<td>
        <a href='editar.php?id={$id}' class='btn-editar'>Editar</a> |
        <a href='deletar.php?id={$id}' class='btn-deletar'
            onclick=\"return confirm('Tem certeza que deseja excluir esse participante?')\">Deletar</a> |
        <a href='participantes.php' class='btn-cadastrar'>Cadastrar</a>
    </td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</section>";
}
