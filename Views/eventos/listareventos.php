<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/EventoController.php";


$eventoController = new EventoController($pdo);

$eventos = $eventoController->listartodos();

echo "<section id='eventos'>";

echo "<h1>Gerenciamento de Eventos</h1>";

if (empty($eventos)) {
    echo "<div class='links'>";
    echo "<p>Nenhum evento encontrado!</p>";
    echo "<br>
    <a href='eventos.php' class='cadastro'>Cadastrar novo Evento</a>";
    echo "</div>";
    echo "</section>";
    return;
} else {
    echo "<table class='tabela-usuario'>";
    echo "<thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descricao</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Local</th>
        <th>Maximo_participantes</th>
        <th>Ações</th>
    </tr>
</thead>
<tbody>";

    foreach ($eventos as $evento) {

        $id = $evento['id'];

        echo "<tr>";
        echo "<td>{$evento['id']}</td>";
        echo "<td>{$evento['nome']}</td>";
        echo "<td>{$evento['descricao']}</td>";
        echo "<td>{$evento['data']}</td>";
        echo "<td>{$evento['horario']}</td>";
        echo "<td>{$evento['local']}</td>";
        echo "<td>{$evento['maximo_participantes']}</td>";

        echo "<td>
        <a href='editareventos.php?id={$id}' class='btn-editar'>Editar</a> |
        <a href='deletareventos.php?id={$id}' class='btn-deletar'
            onclick=\"return confirm('Tem certeza que deseja excluir esse evento?')\">Deletar</a> |
        <a href='eventos.php' class='btn-cadastrar'>Cadastrar</a>
    </td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</section>";
}
?>