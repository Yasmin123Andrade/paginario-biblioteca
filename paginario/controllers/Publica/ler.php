<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Publica";
$result = $conn->query($sql);
?>

<h2>Publicações</h2>
<a href="criar.php">Nova Publicação</a><br><br>

<table border="1">
    <tr>
        <th>ID Publicação</th>
        <th>ID Editora</th>
        <th>ID Livro</th>
        <th>Data Publicação</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_publicacao'] ?></td>
        <td><?= $row['id_editora'] ?></td>
        <td><?= $row['id_livro'] ?></td>
        <td><?= $row['data_publicacao'] ?></td>
        <td>
            <a href="editar.php?id_publicacao=<?= $row['id_publicacao'] ?>">Editar</a> |
            <a href="excluir.php?id_publicacao=<?= $row['id_publicacao'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
