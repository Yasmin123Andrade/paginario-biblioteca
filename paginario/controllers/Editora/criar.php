<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $nome_editora = $_POST['nome_editora'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'] ?: null;
    $email = $_POST['email'];

    $sql = "INSERT INTO Editora (nome_editora, cnpj, telefone, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome_editora, $cnpj, $telefone, $email]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    Nome da Editora: <input type="text" name="nome_editora" required><br><br>
    CNPJ: <input type="text" name="cnpj" maxlength="14" required><br><br>
    Telefone: <input type="tel" name="telefone" maxlength="11"><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit">Cadastrar Editora</button>
    <a href="ler.php">Voltar</a>
</form>
