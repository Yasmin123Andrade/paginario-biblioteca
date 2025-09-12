<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$cpf_administrador = $_GET['cpf_administrador'];

if ($_POST) {
    $nome_completo = $_POST['nome_completo'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $login = $_POST['login'];

    $sql = "UPDATE Administrador SET nome_completo = ?, email = ?, telefone = ?, login = ? WHERE cpf_administrador = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome_completo, $email, $telefone, $login, $cpf_administrador]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Administrador WHERE cpf_administrador = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$cpf_administrador]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    CPF: <?= htmlspecialchars($admin['cpf_administrador']) ?> (não editável)<br><br>
    Nome completo: <input type="text" name="nome_completo" value="<?= htmlspecialchars($admin['nome_completo']) ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($admin['email']) ?>" required><br><br>
    Telefone: <input type="text" name="telefone" value="<?= htmlspecialchars($admin['telefone']) ?>"><br><br>
    Login: <input type="text" name="login" value="<?= htmlspecialchars($admin['login']) ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
