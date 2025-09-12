<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Usuario";
$result = $conn->query($sql);
?>

<h2>Usuários</h2>
<a href="criar.php">Novo Usuário</a><br><br>

<table border="1">
    <tr>
        <th>CPF</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Login</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['cpf'] ?></td>
        <td><?= $row['nome_completo'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['login'] ?></td>
        <td><?= $row['telefone'] ?></td>
        <td>
            <a href="editar.php?cpf=<?= $row['cpf'] ?>">Editar</a> |
            <a href="excluir.php?cpf=<?= $row['cpf'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>