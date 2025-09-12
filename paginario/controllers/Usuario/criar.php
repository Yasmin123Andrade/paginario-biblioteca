<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO Usuario (cpf, nome_completo, email, login, senha) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf, $nome, $email, $login, $senha]);
    
    header('Location: ler.php');
    exit();
}
?>
<form method="post">
    CPF: <input type="text" name="cpf" required><br><br>
    Nome: <input type="text" name="nome" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Login: <input type="text" name="login" required><br><br>
    Senha: <input type="password" name="senha" required><br><br>
    <button type="submit">Cadastrar</button>
    <a href="ler.php">Voltar</a>
</form>