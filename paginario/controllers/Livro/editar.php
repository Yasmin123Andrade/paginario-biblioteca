<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_livro = $_GET['id_livro'];

if ($_POST) {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano_publicacao = $_POST['ano_publicacao'] ?: null;
    $editor = $_POST['editor'] ?: null;
    $genero = $_POST['genero'];
    $formato = $_POST['formato'] ?: null;
    $link_arquivo = $_POST['link_arquivo'] ?: null;
    $sinopse = $_POST['sinopse'];
    $classificacao_indicativa = $_POST['classificacao_indicativa'];
    $genero_id = $_POST['genero_id'] ?: null;
    $cpf_administrador = $_POST['cpf_administrador'] ?: null;

    $sql = "UPDATE Livro SET titulo=?, autor=?, ano_publicacao=?, editor=?, genero=?, formato=?, link_arquivo=?, sinopse=?, classificacao_indicativa=?, genero_id=?, cpf_administrador=? WHERE id_livro=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $titulo,
        $autor,
        $ano_publicacao,
        $editor,
        $genero,
        $formato,
        $link_arquivo,
        $sinopse,
        $classificacao_indicativa,
        $genero_id,
        $cpf_administrador,
        $id_livro
    ]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Livro WHERE id_livro = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_livro]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID Livro: <?= $book['id_livro'] ?> (não editável)<br><br>
    Título: <input type="text" name="titulo" value="<?= htmlspecialchars($book['titulo']) ?>" required><br><br>
    Autor: <input type="text" name="autor" value="<?= htmlspecialchars($book['autor']) ?>" required><br><br>
    Ano de Publicação: <input type="number" name="ano_publicacao" value="<?= htmlspecialchars($book['ano_publicacao']) ?>"><br><br>
    Editor: <input type="text" name="editor" value="<?= htmlspecialchars($book['editor']) ?>"><br><br>
    Gênero: <input type="text" name="genero" value="<?= htmlspecialchars($book['genero']) ?>" required><br><br>
    Formato: <input type="text" name="formato" value="<?= htmlspecialchars($book['formato']) ?>"><br><br>
    Link do Arquivo: <input type="text" name="link_arquivo" value="<?= htmlspecialchars($book['link_arquivo']) ?>"><br><br>
    Sinopse: <textarea name="sinopse" required><?= htmlspecialchars($book['sinopse']) ?></textarea><br><br>
    Classificação Indicativa: <input type="number" name="classificacao_indicativa" value="<?= htmlspecialchars($book['classificacao_indicativa']) ?>" required><br><br>
    ID do Gênero: <input type="number" name="genero_id" value="<?= htmlspecialchars($book['genero_id']) ?>"><br><br>
    CPF do Administrador: <input type="text" name="cpf_administrador" maxlength="11" value="<?= htmlspecialchars($book['cpf_administrador']) ?>"><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
