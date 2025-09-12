<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Administrador";
$result = $conn->query($sql);
?>

<h2>Administradores</h2>
<a href="criar.php">Novo Administrador</a><br><br>

<table border="1">
    <tr>
        <th>CPF</th>
        <th>Nome Completo</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Login</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= htmlspecialchars($row['cpf_administrador']) ?></td>
        <td><?= htmlspecialchars($row['nome_completo']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['telefone']) ?></td>
        <td><?= htmlspecialchars($row['login']) ?></td>
        <td>
            <a href="editar.php?cpf_administrador=<?= $row['cpf_administrador'] ?>">Editar</a> |
            <a href="excluir.php?cpf_administrador=<?= $row['cpf_administrador'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
