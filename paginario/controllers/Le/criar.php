<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $cpf_usuario = $_POST['cpf_usuario'];
    $id_livro = $_POST['id_livro'];
    $data_leitura = $_POST['data_leitura'];

    $sql = "INSERT INTO Le (cpf_usuario, id_livro, data_leitura) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf_usuario, $id_livro, $data_leitura]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    CPF do Usuário: <input type="text" name="cpf_usuario" maxlength="11" required><br><br>
    ID do Livro: <input type="number" name="id_livro" required><br><br>
    Data da Leitura: <input type="date" name="data_leitura"><br><br>
    <button type="submit">Cadastrar Leitura</button>
    <a href="ler.php">Voltar</a>
</form>
