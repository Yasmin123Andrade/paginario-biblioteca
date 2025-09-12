<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Envio_Livro";
$result = $conn->query($sql);
?>

<h2>Envios de Livro</h2>
<a href="criar.php">Novo Envio</a><br><br>

<table border="1">
    <tr>
        <th>ID do Envio</th>
        <th>Data do Envio</th>
        <th>Estado</th>
        <th>ID do Livro</th>
        <th>ID do Autor</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_envio'] ?></td>
        <td><?= htmlspecialchars($row['data_envio']) ?></td>
        <td><?= htmlspecialchars($row['estado']) ?></td>
        <td><?= htmlspecialchars($row['livro_id']) ?></td>
        <td><?= htmlspecialchars($row['autor_id']) ?></td>
        <td>
            <a href="editar.php?id_envio=<?= $row['id_envio'] ?>">Editar</a> |
            <a href="excluir.php?id_envio=<?= $row['id_envio'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
