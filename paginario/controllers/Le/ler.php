<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Le";
$result = $conn->query($sql);
?>

<h2>Leituras</h2>
<a href="criar.php">Nova Leitura</a><br><br>

<table border="1">
    <tr>
        <th>ID da Leitura</th>
        <th>CPF do Usuário</th>
        <th>ID do Livro</th>
        <th>Data da Leitura</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_leitura'] ?></td>
        <td><?= htmlspecialchars($row['cpf_usuario']) ?></td>
        <td><?= htmlspecialchars($row['id_livro']) ?></td>
        <td><?= htmlspecialchars($row['data_leitura']) ?></td>
        <td>
            <a href="editar.php?id_leitura=<?= $row['id_leitura'] ?>">Editar</a> |
            <a href="excluir.php?id_leitura=<?= $row['id_leitura'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
