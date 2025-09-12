<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_solicitacao = $_GET['id_solicitacao'];

if ($_POST) {
    $cpf_usuario = $_POST['cpf_usuario'];
    $id_livro = $_POST['id_livro'];
    $data_solicitacao = $_POST['data_solicitacao'];
    $cpf_administrador = $_POST['cpf_administrador'];

    $sql = "UPDATE Solicitacao SET cpf_usuario=?, id_livro=?, data_solicitacao=?, cpf_administrador=? WHERE id_solicitacao=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf_usuario, $id_livro, $data_solicitacao, $cpf_administrador, $id_solicitacao]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Solicitacao WHERE id_solicitacao = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_solicitacao]);
$solicitacao = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID Solicitação: <?= $solicitacao['id_solicitacao'] ?> (não editável)<br><br>
    CPF Usuário: <input type="text" name="cpf_usuario" maxlength="11" value="<?= htmlspecialchars($solicitacao['cpf_usuario']) ?>" required><br><br>
    ID Livro: <input type="number" name="id_livro" value="<?= $solicitacao['id_livro'] ?>" required><br><br>
    Data Solicitação: <input type="date" name="data_solicitacao" value="<?= $solicitacao['data_solicitacao'] ?>" required><br><br>
    CPF Administrador: <input type="text" name="cpf_administrador" maxlength="11" value="<?= htmlspecialchars($solicitacao['cpf_administrador']) ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
