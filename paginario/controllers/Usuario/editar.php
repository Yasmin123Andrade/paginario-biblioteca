<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$cpf = $_GET['cpf'];

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    
    $sql = "UPDATE Usuario SET nome_completo=?, email=?, login=? WHERE cpf=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $email, $login, $cpf]);
    
    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Usuario WHERE cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$cpf]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    CPF: <?= $user['cpf'] ?> (não editável)<br><br>
    Nome: <input type="text" name="nome" value="<?= $user['nome_completo'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $user['email'] ?>" required><br><br>
    Login: <input type="text" name="login" value="<?= $user['login'] ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
