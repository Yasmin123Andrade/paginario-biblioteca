<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $cpf_administrador = $_POST['cpf_administrador'];
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'] ?? null;
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO Administrador (cpf_administrador, nome_completo, email, telefone, login, senha) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf_administrador, $nome_completo, $email, $telefone, $login, $senha]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    CPF: <input type="text" name="cpf_administrador" maxlength="11" required><br><br>
    Nome completo: <input type="text" name="nome_completo" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Telefone: <input type="text" name="telefone" maxlength="11"><br><br>
    Login: <input type="text" name="login" required><br><br>
    Senha: <input type="password" name="senha" required><br><br>
    <button type="submit">Cadastrar Administrador</button>
</form>
<a href="ler.php">Voltar</a>
