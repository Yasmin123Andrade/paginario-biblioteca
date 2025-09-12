<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $id_editora = $_POST['id_editora'];
    $id_livro = $_POST['id_livro'];
    $data_publicacao = $_POST['data_publicacao'];

    $sql = "INSERT INTO Publica (id_editora, id_livro, data_publicacao) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_editora, $id_livro, $data_publicacao]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    ID Editora: <input type="number" name="id_editora" required><br><br>
    ID Livro: <input type="number" name="id_livro" required><br><br>
    Data Publicação: <input type="date" name="data_publicacao" required><br><br>
    <button type="submit">Cadastrar</button>
    <a href="ler.php">Voltar</a>
</form>
