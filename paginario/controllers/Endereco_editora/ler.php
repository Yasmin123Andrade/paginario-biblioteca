<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Endereco_editora";
$result = $conn->query($sql);
?>

<h2>Endereços das Editoras</h2>
<a href="criar.php">Novo Endereço</a><br><br>

<table border="1">
    <tr>
        <th>ID Endereço</th>
        <th>ID Editora</th>
        <th>Rua</th>
        <th>Número</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_endereco'] ?></td>
        <td><?= $row['id_editora'] ?></td>
        <td><?= $row['rua'] ?></td>
        <td><?= $row['numero'] ?></td>
        <td><?= $row['bairro'] ?></td>
        <td><?= $row['cidade'] ?></td>
        <td>
            <a href="editar.php?id_endereco=<?= $row['id_endereco'] ?>">Editar</a> |
            <a href="excluir.php?id_endereco=<?= $row['id_endereco'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
