<?php
require '../../db/conexao.php';

if ($_POST) {
    $nome_completo = $_POST['nome_completo'];
    $nacionalidade = $_POST['nacionalidade'];
    $data_nascimento = $_POST['data_nascimento'];
    $biografia = $_POST['biografia'];
    
    $sql = "INSERT INTO Autor (nome_completo, nacionalidade, data_nascimento, biografia) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$nome_completo, $nacionalidade, $data_nascimento, $biografia]);
    
    header('Location: ler.php');
    exit();
}
?>
<form method="post">
    Nome completo: <input type="text" name="nome_completo" required><br><br>
    Nacionalidade: <input type="text" name="nacionalidade"><br><br>
    Data de nascimento: <input type="date" name="data_nascimento"><br><br>
    Biografia:<br>
    <textarea name="biografia" rows="5" cols="40"></textarea><br><br>
    <button type="submit">Cadastrar Autor</button>
</form>
    <a href="ler.php">Voltar</a>
</form>

