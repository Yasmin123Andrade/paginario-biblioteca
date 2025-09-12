<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Autor";
$result = $conn->query($sql);
?>

<h2>Autores</h2>
<a href="criar.php">Novo Autor</a><br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome Completo</th>
        <th>Nacionalidade</th>
        <th>Data de Nascimento</th>
        <th>Biografia</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= htmlspecialchars($row['id_autor']) ?></td>
        <td><?= htmlspecialchars($row['nome_completo']) ?></td>
        <td><?= htmlspecialchars($row['nacionalidade']) ?></td>
        <td><?= htmlspecialchars($row['data_nascimento']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['biografia'])) ?></td>
        <td>
            <a href="editar.php?id_autor=<?= $row['id_autor'] ?>">Editar</a> |
            <a href="excluir.php?id_autor=<?= $row['id_autor'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
