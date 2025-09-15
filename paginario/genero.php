<?php
require_once 'db/conexao.php';
require_once 'auth.php';

verificarLogin();

$usuario_logado = obterUsuarioLogado();

// Buscar livros
$sql = "SELECT L.id_livro, L.titulo, L.autor, L.classificacao_indicativa, L.capa, L.genero FROM Livro L ORDER BY L.titulo";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gêneros – Filtro de Pesquisa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Georgia, serif;
            background-color: #ecb87f;
        }
        header {
            background: #86541c;
            position: relative;
            padding: 5px 20px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center; 
        }
        header h1 {
            margin: 0;
            font-size: 30px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            position: absolute;
            left: 50%;
            transform: translateX(-50%); 
        }
        .search-container {
            position: absolute;
            right: 20px;
            display: flex;
            align-items: center;
        }
        .search-container input {
            padding: 6px 12px;
            font-size: 14px;
            border-radius: 20px;
            border: none;
            outline: none;
            width: 200px;
        }
        .menu-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
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
        .side-menu ul li a:hover {
            color: #ffffff;
            transition: color 0.3s ease, background-color 0.3s ease;
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
        h1 {
            font-size: 30px;
            margin: 0;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6); 
        }
        h2 {
            margin: 5px 0 20px;
            font-size: 22px;
            text-transform: uppercase;
            color: #562f05;
        }
        .publisher-banner {
            background: url('img/image.png') no-repeat center top;
            color: #fff;
            background-size: cover;
            height: 80px;
            margin-bottom: 10px;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            cursor: pointer;
            transition: transform 0.2s ease; 
        }
        .publisher-banner:active {
            transform: scale(0.98);
        }
        .icon-wrapper {
            background-color: #3d2815;
            border-radius: 50%;
            padding: 10px;
            position: absolute;
            left: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
        }
        .book-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 36px;
            padding: 20px;
            border-radius: 8px;
            justify-items: center;
        }
        .book-card {
            text-align: center;
        }
        .book-card h2 {
            font-family: 'Georgia', serif;
            font-size: 1rem;
            margin-bottom: 10px;
            color: #5b3d1f;
        }
        .cover-container {
            position: relative;
            display: inline-block;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .cover-container:hover {
            transform: scale(1.1);
            z-index: 1;
        }
        .cover-container img {
            width: 240px;   
            height: 360px; 
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.1s ease, box-shadow 0.3s ease;
            object-fit: cover; 
        }
        .cover-container:hover img {
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
        .cover-container:active {
            transform: scale(0.95) rotate(-2deg);
        }
        .badge {
            position: absolute;
            top: 6px;
            right: 6px;
            background-color: #e63946;
            color: #fff;
            font-size: 0.75rem;
            padding: 4px 6px;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        .main-footer {
            text-align: center;
            padding: 14px 0;
            background: #86541c;
            color: #fff;
            font-size: 0.9rem;
        }
        .main-footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 6px;
        }
        header input[type="text"] {
            padding: 5px 10px;
            font-size: 1rem;
            border-radius: 4px;
            border: none;
            outline: none;
            width: 250px;
        }
        #myInput {
            width: 250px;
            font-size: 16px;
            padding: 12px 20px 12px 40px; 
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            background-image: url('img/magnifying-glass-1976105_1280.png'); 
            background-position: 10px center; 
            background-repeat: no-repeat;
            background-size: 18px 18px; 
        }
        #myInput:focus {
            outline: none;
            border-color: #86541c;
        }
    </style>
</head>
<body>
<header>
    <div class="background"></div>
    <div class="menu-icon">   
        <img src="img/component 1.svg" alt="Abrir Menu" />
    </div>

    <h1>FILTRO DE PESQUISA</h1>

    <div class="search-container">
        <input type="text" id="myInput" placeholder="Pesquisar Gêneros..." title="Digite o nome do Livro">
    </div>
</header>

<script>
function myFunction() {
    var input, filter, cards, h2, img, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    cards = document.getElementsByClassName("book-card");

    for (i = 0; i < cards.length; i++) {
        h2 = cards[i].getElementsByTagName("h2")[0];
        img = cards[i].getElementsByTagName("img")[0];

        txtValue = "";
        if (h2) txtValue += h2.textContent || h2.innerText;
        if (img) txtValue += " " + (img.alt || "");

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
}

document.getElementById("myInput").addEventListener("keyup", myFunction);
</script>

<nav id="side-menu" class="side-menu">
    <div class="close-icon">
        <img src="img/component 1.svg" alt="Fechar Menu"/>
    </div>
    <ul>
        <li><a href="inicio.php" style="color: antiquewhite;">Página Inicial</a></li>
        <li><a style="color: peru;">------------------------------</a></li>
        <li><a style="color: antiquewhite;">Filtros</a></li>
        <li><a href="genero.php">Gênero</a></li>
        <li><a href="autores.php">Autor</a></li>
        <li><a href="editora.php">Editora</a></li>
        <li><a href="faixaetaria.php">Faixa Etária</a></li>
        <li><a style="color: peru;">------------------------------</a></li>
        <li><a href="solicitacao.php" style="color: antiquewhite;">Solicitação de livros</a></li>
        <li><a style="color: peru;">------------------------------</a></li>
        <li><a href="meuperfil.php" style="color: antiquewhite;">Meu Perfil</a></li>
    </ul>
</nav>

<section class="publisher-section">
    <div class="publisher-banner">
        <div class="icon-wrapper">
            <img src="./img/paginario.png" alt="Logo Paginário" class="book-icon" style="width: 50px; height: 50px;">
        </div>
        <h1>GÊNEROS</h1>
    </div>

    <div class="book-grid">
        <?php foreach ($livros as $livro): ?>
            <div class="book-card">
                <a href="detalhes_livro.php?id=<?= $livro['id_livro']; ?>" style="text-decoration: none; color: inherit;">
                    <h2><?= htmlspecialchars($livro['genero']); ?></h2><br>
                    <div class="cover-container">
                        <img src="<?= htmlspecialchars($livro['capa']); ?>" alt="<?= htmlspecialchars($livro['titulo']); ?>">
                        <span class="badge"><?= (int)$livro['classificacao_indicativa']; ?>+</span>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<footer class="main-footer">
    <a href="politicaprivacidade.html">Política de Privacidade</a> |
    <a href="politicaprivacidade.html">Termos de Uso</a> |
    <span>Todos os direitos reservados (BR)</span>
</footer>

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

