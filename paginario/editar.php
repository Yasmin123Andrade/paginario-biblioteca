<?php
include 'conexao.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conn->query($sql);
    $dados = $resultado->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];

    $sql = "UPDATE usuarios SET usuario=?, email=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $usuario, $email, $id);
    $stmt->execute();

    header("Location: listar.php");
}
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $dados['id'] ?>">
    Usuário: <input type="text" name="usuario" value="<?= $dados['usuario'] ?>"><br>
    Email: <input type="email" name="email" value="<?= $dados['email'] ?>"><br>
    <input type="submit" value="Salvar">
</form>