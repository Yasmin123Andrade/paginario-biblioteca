<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $cpf_usuario = $_POST['cpf_usuario'];
    $id_livro = $_POST['id_livro'];
    $data_solicitacao = $_POST['data_solicitacao'];
    $cpf_administrador = $_POST['cpf_administrador'];

    $sql = "INSERT INTO Solicitacao (cpf_usuario, id_livro, data_solicitacao, cpf_administrador) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf_usuario, $id_livro, $data_solicitacao, $cpf_administrador]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    CPF Usuário: <input type="text" name="cpf_usuario" maxlength="11" required><br><br>
    ID Livro: <input type="number" name="id_livro" required><br><br>
    Data Solicitação: <input type="date" name="data_solicitacao" required><br><br>
    CPF Administrador: <input type="text" name="cpf_administrador" maxlength="11" required><br><br>
    <button type="submit">Cadastrar Solicitação</button>
    <a href="ler.php">Voltar</a>
</form>
