<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $data_envio = $_POST['data_envio'];
    $estado = $_POST['estado'];
    $livro_id = $_POST['livro_id'];
    $autor_id = $_POST['autor_id'];

    $sql = "INSERT INTO Envio_Livro (data_envio, estado, livro_id, autor_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$data_envio, $estado, $livro_id, $autor_id]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    Data do Envio: <input type="date" name="data_envio" required><br><br>
    Estado: <input type="text" name="estado" required><br><br>
    ID do Livro: <input type="number" name="livro_id" required><br><br>
    ID do Autor: <input type="number" name="autor_id" required><br><br>
    <button type="submit">Cadastrar Envio</button>
    <a href="ler.php">Voltar</a>
</form>
