<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Solicitacao";
$result = $conn->query($sql);
?>

<h2>Solicitações</h2>
<a href="criar.php">Nova Solicitação</a><br><br>

<table border="1">
    <tr>
        <th>ID Solicitação</th>
        <th>CPF Usuário</th>
        <th>ID Livro</th>
        <th>Data Solicitação</th>
        <th>CPF Administrador</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_solicitacao'] ?></td>
        <td><?= htmlspecialchars($row['cpf_usuario']) ?></td>
        <td><?= $row['id_livro'] ?></td>
        <td><?= $row['data_solicitacao'] ?></td>
        <td><?= htmlspecialchars($row['cpf_administrador']) ?></td>
        <td>
            <a href="editar.php?id_solicitacao=<?= $row['id_solicitacao'] ?>">Editar</a> |
            <a href="excluir.php?id_solicitacao=<?= $row['id_solicitacao'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
