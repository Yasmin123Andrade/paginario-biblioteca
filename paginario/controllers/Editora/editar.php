<?php
require 'paginario-biblioteca/paginario/controllers/db/conexao.php';

$id_editora = $_GET['id_editora'];

if ($_POST) {
    $nome_editora = $_POST['nome_editora'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'] ?: null;
    $email = $_POST['email'];

    $sql = "UPDATE Editora SET nome_editora=?, cnpj=?, telefone=?, email=? WHERE id_editora=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome_editora, $cnpj, $telefone, $email, $id_editora]);

    header('Location: ler.php');
    exit();
}

$sql = "SELECT * FROM Editora WHERE id_editora = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id_editora]);
$editora = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="post">
    ID da Editora: <?= $editora['id_editora'] ?> (não editável)<br><br>
    Nome da Editora: <input type="text" name="nome_editora" value="<?= htmlspecialchars($editora['nome_editora']) ?>" required><br><br>
    CNPJ: <input type="text" name="cnpj" maxlength="14" value="<?= htmlspecialchars($editora['cnpj']) ?>" required><br><br>
    Telefone: <input type="tel" name="telefone" maxlength="11" value="<?= htmlspecialchars($editora['telefone']) ?>"><br><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($editora['email']) ?>" required><br><br>
    <button type="submit">Salvar</button>
    <a href="ler.php">Cancelar</a>
</form>
