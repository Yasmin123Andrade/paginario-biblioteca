<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_leitura = $_GET['id_leitura'];

if ($_POST) {
    $cpf_usuario = $_POST['cpf_usuario'];
    $id_livro = $_POST['id_livro'];
    $data_leitura = $_POST['data_leitura'];

    $sql = "UPDATE Le SET cpf_usuario=?, id_livro=?, data_leitura=? WHERE id_leitura=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$cpf_usuario, $id_livro, $data_leitura, $id_leitura]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Le WHERE id_leitura = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_leitura]);
$leitura = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID da Leitura: <?= $leitura['id_leitura'] ?> (não editável)<br><br>
    CPF do Usuário: <input type="text" name="cpf_usuario" maxlength="11" value="<?= htmlspecialchars($leitura['cpf_usuario']) ?>" required><br><br>
    ID do Livro: <input type="number" name="id_livro" value="<?= htmlspecialchars($leitura['id_livro']) ?>" required><br><br>
    Data da Leitura: <input type="date" name="data_leitura" value="<?= htmlspecialchars($leitura['data_leitura']) ?>"><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
