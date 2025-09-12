<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

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

    $sql = "INSERT INTO Livro (titulo, autor, ano_publicacao, editor, genero, formato, link_arquivo, sinopse, classificacao_indicativa, genero_id, cpf_administrador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
        $cpf_administrador
    ]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    Título: <input type="text" name="titulo" required><br><br>
    Autor: <input type="text" name="autor" required><br><br>
    Ano de Publicação: <input type="number" name="ano_publicacao"><br><br>
    Editor: <input type="text" name="editor"><br><br>
    Gênero: <input type="text" name="genero" required><br><br>
    Formato: <input type="text" name="formato"><br><br>
    Link do Arquivo: <input type="text" name="link_arquivo"><br><br>
    Sinopse: <textarea name="sinopse" required></textarea><br><br>
    Classificação Indicativa: <input type="number" name="classificacao_indicativa" required><br><br>
    ID do Gênero: <input type="number" name="genero_id"><br><br>
    CPF do Administrador: <input type="text" name="cpf_administrador" maxlength="11"><br><br>
    <button type="submit">Cadastrar Livro</button>
    <a href="ler.php">Voltar</a>
</form>
