<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

if ($_POST) {
    $cpf_usuario = $_POST['cpf_usuario'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $sql = "INSERT INTO Endereco_usuario (cpf_usuario, rua, numero, bairro, cidade) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf_usuario, $rua, $numero, $bairro, $cidade]);

    header('Location: ler.php');
    exit();
}
?>

<form method="post">
    CPF Usuário: <input type="text" name="cpf_usuario" maxlength="11" required><br><br>
    Rua: <input type="text" name="rua" required><br><br>
    Número: <input type="number" name="numero" required><br><br>
    Bairro: <input type="text" name="bairro" required><br><br>
    Cidade: <input type="text" name="cidade" required><br><br>
    <button type="submit">Cadastrar</button>
    <a href="ler.php">Voltar</a>
</form>
