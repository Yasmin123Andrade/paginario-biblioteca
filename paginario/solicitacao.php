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
    <link hrf="img">
    <style>
 * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Georgia, serif;
        background-color: #ecb87f;
        color: #7f4d04;
    }

    .menu-icon img {
        width: 40px;
        height: 40px;
        cursor: pointer;
    }

    .side-menu {
        position: fixed;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background-color: #86541c;
        padding-top: 60px;
        box-shadow: 2px 0 5px rgba(0,0,0,0.5);
        transition: left 0.3s ease;
        z-index: 1000;
    }

    .side-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .side-menu ul li {
        margin: 20px 0;
        text-align: center;
    }

    .side-menu ul li a {
        color: #eab97f;
        text-decoration: none;
        font-weight: bold;
        font-size: 1.1em;
    }

    .side-menu.open {
        left: 0;
    }

    .close-icon {
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close-icon img {
        width: 100%;
        height: 100%;
    }

    .topo {
        background: #845c26;
        padding: 20px;
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        position: relative;
    }

    .menu-icon {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
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

<div class="topo">
            <div class="menu-icon">   
          <img src="img/component 1.svg" alt="Abrir Menu" />
        </div>
SOLICITAÇÃO DE LIVROS</div>
    <nav id="side-menu" class="side-menu">
          <div class="close-icon">
    <img src="img/component 1.svg" alt="Fechar Menu"/>
  </div>
  <ul>
    <li><a href="inicio.html" style="color: antiquewhite;">Página Inicial</a></li>
    <li><a style="color: peru;">------------------------------</a></li>
    <li><a style="color: antiquewhite;">Filtros</a></li>
    <li><a href="genero-literario.html">Gênero</a></li>
    <li><a href="autores.php">Autor</a></li>
    <li><a href="editora.html">Editora</a></li>
    <li><a href="#">Faixa Etária</a></li>
    <li><a style="color: peru;">------------------------------</a></li>
    <li><a href="solicitacao.php" style="color: antiquewhite;">Solicitação de livros</a></li>
     <li><a style="color: peru;">------------------------------</a></li>
    <li><a href="meuperfil.php" style="color: antiquewhite;">Meu Perfil</a></li>
  </ul>
</nav>
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

<script>
const menuIcon = document.querySelector('.menu-icon');
const sideMenu = document.getElementById('side-menu');
const closeIcon = document.querySelector('.close-icon');

menuIcon.addEventListener('click', () => {
    sideMenu.classList.add('open'); 
});

closeIcon.addEventListener('click', () => {
    sideMenu.classList.remove('open');
});
</script>

</body>
</html>