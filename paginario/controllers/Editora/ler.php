<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Editora";
$result = $conn->query($sql);
?>

<h2>Editoras</h2>
<a href="criar.php">Nova Editora</a><br><br>

<table border="1">
    <tr>
        <th>ID da Editora</th>
        <th>Nome</th>
        <th>CNPJ</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_editora'] ?></td>
        <td><?= htmlspecialchars($row['nome_editora']) ?></td>
        <td><?= htmlspecialchars($row['cnpj']) ?></td>
        <td><?= htmlspecialchars($row['telefone']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td>
            <a href="editar.php?id_editora=<?= $row['id_editora'] ?>">Editar</a> |
            <a href="excluir.php?id_editora=<?= $row['id_editora'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

