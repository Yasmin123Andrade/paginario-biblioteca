<?php
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? "";
    $autor = $_POST["autor"] ?? "";
    $email = $_POST["email"] ?? "";
    $sinopse = $_POST["sinopse"] ?? "";
    $idade = $_POST["idade"] ?? "";

    $mensagem = "Solicitação registrada com sucesso! Você será avisado por e-mail.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Solicitação de Livros</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #d29c66;
            color: #5b391f;
        }

        .topo {
            background: #845c26;
            padding: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        .livros {
            background: url('img/fundoimagem.png') no-repeat center;
            background-size: cover;
            height: 150px;
        }

        .conteudo {
            padding: 20px;
            max-width: 700px;
            margin: 20px auto;
            background: #e5b481;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        .conteudo p {
            margin-bottom: 20px;
            font-size: 18px;
        }

        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 25px;
            border: none;
            font-size: 16px;
        }

        form textarea {
            resize: vertical;
            height: 100px;
        }

        form button {
            width: 100%;
            padding: 15px;
            background: #845c26;
            color: white;
            font-size: 18px;
            border-radius: 25px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background: #6e4c20;
        }

        .rodape {
            background: #845c26;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
            font-size: 14px;
        }

        .mensagem {
            background: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="topo">SOLICITAÇÃO DE LIVROS</div>
<div class="livros"></div>

<div class="conteudo">

    <?php if ($mensagem): ?>
        <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <p>Parece que o livro que você procura ainda não está disponível no sistema.
        Você pode solicitar sua inclusão preenchendo os campos abaixo:</p>

    <form method="post">
        <input type="text" name="nome" placeholder="📚 Nome do livro:" required>

        <input type="text" name="autor" placeholder="👤 Autor(a):" required>

        <input type="email" name="email" placeholder="✉️ e-mail:" required>

        <textarea name="sinopse" placeholder="📖 Sinopse:"></textarea>

        <input type="text" name="idade" placeholder="👥 Indicativo etário:">

        <button type="submit">Enviar Solicitação</button>
    </form>
</div>

<div class="rodape">
    <a href="#" style="color:white; text-decoration: underline;">Política de Privacidade</a> | 
    <a href="#" style="color:white; text-decoration: underline;">Termos de Uso</a> |
    Todos os direitos reservados (BR)
</div>

</body>
</html>