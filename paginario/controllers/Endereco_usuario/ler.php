<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Endereco_usuario";
$result = $conn->query($sql);
?>

<h2>Endereços dos Usuários</h2>
<a href="criar.php">Novo Endereço</a><br><br>

<table border="1">
    <tr>
        <th>CPF Usuário</th>
        <th>Rua</th>
        <th>Número</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= htmlspecialchars($row['cpf_usuario']) ?></td>
        <td><?= $row['rua'] ?></td>
        <td><?= $row['numero'] ?></td>
        <td><?= $row['bairro'] ?></td>
        <td><?= $row['cidade'] ?></td>
        <td>
            <a href="editar.php?cpf_usuario=<?= htmlspecialchars($row['cpf_usuario']) ?>">Editar</a> |
            <a href="excluir.php?cpf_usuario=<?= htmlspecialchars($row['cpf_usuario']) ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
