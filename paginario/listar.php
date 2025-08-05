<?php
include 'conexao.php';
$resultado = $conn->query("SELECT * FROM usuarios");

echo "<h2>Usuários Cadastrados</h2><a href='cadastrar.php'>Novo Usuário</a><br><br>";

while ($row = $resultado->fetch_assoc()) {
    echo "ID: " . $row["id"] . " | Usuário: " . $row["usuario"] . 
         " | Email: " . $row["email"] .
         " | <a href='editar.php?id=" . $row["id"] . "'>Editar</a> " .
         "| <a href='excluir.php?id=" . $row["id"] . "' onclick=\"return confirm('Tem certeza?')\">Excluir</a><br>";
}
?>