<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$sql = "SELECT * FROM Livro";
$result = $conn->query($sql);
?>

<h2>Livros</h2>
<a href="criar.php">Novo Livro</a><br><br>

<table border="1">
    <tr>
        <th>ID do Livro</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Ano de Publicação</th>
        <th>Editora</th>
        <th>Gênero</th>
        <th>Formato</th>
        <th>Classificação Indicativa</th>
        <th>Ações</th>
    </tr>
    <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id_livro'] ?></td>
        <td><?= htmlspecialchars($row['titulo']) ?></td>
        <td><?= htmlspecialchars($row['autor']) ?></td>
        <td><?= htmlspecialchars($row['ano_publicacao']) ?></td>
        <td><?= htmlspecialchars($row['editor']) ?></td>
        <td><?= htmlspecialchars($row['genero']) ?></td>
        <td><?= htmlspecialchars($row['formato']) ?></td>
        <td><?= htmlspecialchars($row['classificacao_indicativa']) ?></td>
        <td>
            <a href="editar.php?id_livro=<?= $row['id_livro'] ?>">Editar</a> |
            <a href="excluir.php?id_livro=<?= $row['id_livro'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
