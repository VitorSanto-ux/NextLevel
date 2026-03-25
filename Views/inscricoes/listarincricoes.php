<?php
require_once "C:/Turma2/xampp/htdocs/NextLevel/db/database.php";
require_once "C:/Turma2/xampp/htdocs/NextLevel/Controllers/InscricaoController.php";

$inscricaoController = new InscricaoController($pdo);

$inscricoes = $inscricaoController->listartodos();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Inscrições</title>
    <link rel="stylesheet" href="styleinscricoes.css">
</head>
<body>

<?php

echo "<section id='inscricoes'>";

echo "<h1>Gerenciamento de Inscrições</h1>";

if (empty($inscricoes)) {
    echo "<div class='links'>";
    echo "<p>Nenhuma inscrição encontrada!</p>";
    echo "<br>
    <a href='inscricoes.php' class='cadastro'>Cadastrar nova Inscrição</a>";
    echo "</div>";
    echo "</section>";
    return;
} else {
    echo "<table class='tabela-usuario'>";
    echo "<thead>
    <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Participante</th>
        <th>Ações</th>
    </tr>
</thead>
<tbody>";

    foreach ($inscricoes as $inscricao) {

        $id = $inscricao['id'];

        echo "<tr>";
        echo "<td>{$inscricao['id']}</td>";
        echo "<td>{$inscricao['evento_id']}</td>";
        echo "<td>{$inscricao['participante_id']}</td>";

        echo "<td>
        <a href='editarinscricoes.php?id={$id}' class='btn-editar'>Editar</a> |
        <a href='deletarinscricoes.php?id={$id}' class='btn-deletar'
            onclick=\"return confirm('Tem certeza que deseja excluir essa inscrição?')\">Deletar</a> |
        <a href='inscricoes.php' class='btn-cadastrar'>Cadastrar</a>
    </td>";

        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "<br>";
    echo "<a href='/NextLevel/public/index.php' class='cadastro'>Voltar</a>";
    echo "</section>";
}
?>

</body>
</html>