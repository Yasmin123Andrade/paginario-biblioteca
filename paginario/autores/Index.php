<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Biblioteca | Autores </title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5cc99;
      color: #4d2e00;
    }

    header {
      background-color: #7a4a00;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 20px;
    }

    .menu-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .filtro {
      font-size: 18px;
      font-weight: bold;
    }

    .logo {
      font-size: 14px;
      font-weight: bold;
    }

    main {
      text-align: center;
    }

    h1 {
      margin: 20px 0;
      font-size: 26px;
    }

    .livros {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 10px;
    }

    .livro {
      width: 150px;
      position: relative;
      background-color: #fff3e0;
      border-radius: 5px;
      padding: 10px;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
      transition: transform 0.2s;
    }

    .livro:hover {
      transform: scale(1.03);
    }

    .livro img {
      width: 100%;
      border-radius: 4px;
    }

    .livro p {
      margin: 10px 0 0;
      font-weight: bold;
      font-size: 14px;
    }

    .selo {
      position: absolute;
      top: 8px;
      right: 8px;
      background: red;
      color: white;
      font-size: 12px;
      padding: 2px 6px;
      border-radius: 50%;
    }

    footer {
      background-color: #7a4a00;
      color: #fff;
      text-align: center;
      padding: 10px;
      font-size: 13px;
    }

    footer a {
      color: #ffcc80;
      margin: 0 10px;
      text-decoration: none;
    }

    footer span {
      display: inline-block;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <header>
    <div class="menu-icon">☰</div>
    <div class="filtro">FILTRO DE PESQUISA</div>
    <div class="logo"> PAGINÁRIO</div>
  </header>

  <main>
    <h1>MACHADO DE ASSIS</h1>

    <section class="livros">
      <?php
        $livros = [
          ["titulo" => "Memórias Póstumas de Brás Cuba", "img" => "https://m.media-amazon.com/images/I/51whHTZRLxL.jpg"],
          ["titulo" => "Seus Trinta Melhores Contos", "img" => "https://m.media-amazon.com/images/I/81R45z9g38L.jpg"],
          ["titulo" => "Dom Casmurro", "img" => "https://m.media-amazon.com/images/I/81ZPrKaN8TL.jpg"],
          ["titulo" => "O Cortiço", "img" => "https://m.media-amazon.com/images/I/91ySbkzzs7L.jpg"],
          ["titulo" => "A Mão e a Luva", "img" => "https://m.media-amazon.com/images/I/81XwzFOHTaL.jpg"],
          ["titulo" => "Quincas Borba", "img" => "https://m.media-amazon.com/images/I/71T9J6e1zLL.jpg"],
          ["titulo" => "O Alienista", "img" => "https://m.media-amazon.com/images/I/71yk0Rj0taL.jpg"],
          ["titulo" => "Helena", "img" => "https://m.media-amazon.com/images/I/81wsD9eM7-L.jpg"]
        ];

        foreach ($livros as $livro) {
          echo '<div class="livro">';
          echo '<img src="'.$livro["img"].'" alt="'.$livro["titulo"].'">';
          echo '<span class="selo">16+</span>';
          echo '<p>'.$livro["titulo"].'</p>';
          echo '</div>';
        }
      ?>
    </section>
  </main>

  <footer>
    <a href="#">Política de Privacidade</a>
    <a href="#">Termos de Uso</a>
    <span>| Todos os direitos reservados (BR)</span>
  </footer>
</body>
</html>