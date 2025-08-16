<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Biblioteca | Autores</title>
  <link rel=stylesheet href="img">
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
header {
    background: #86541c;
    text-align: center;
    position: relative;
    justify-content: center;
    padding: 5px 0;
    height: 40px;
}

h1 {
  font-size: 30px;
  margin: 0;
  color: #fff;
}

h2 {
  margin: 5px 0 20px;
  font-size: 22px;
  text-transform: uppercase;
  color: #E9A863;
}

.menu-icon img {
  width: 40px;
  height: 40px;
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

.menu-icon {
  cursor: pointer;
  left: 20px;
  top: 50%;
  transform: translateY(-50%);
  position: absolute;
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

    .logo {
      font-size: 14px;
      font-weight: bold;
    }

    .bookshelf {
      background: url('img/image.png') no-repeat center top;
      color: #fff;
      background-size: cover;
      height: 80px;
      margin-bottom: 10px;
      width: 100vw;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    main {
      text-align: center;
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
        <h2>FILTRO DE PESQUISA</h2>
    <div class="menu-icon">   
      <img src="img/component 1.svg" alt="Abrir Menu" />
    </div>
  </header>
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

  <main>
    <div class="bookshelf">
      <h1>MACHADO DE ASSIS</h1>
    </div>

    <section class="livros">
      <?php
        $livros = [
          ["titulo" => "Memórias Póstumas de Brás Cuba", "img" => "img/memoriaspostumas.png"],
          ["titulo" => "Seus Trinta Melhores Contos", "img" => "img/image 15.png"],
          ["titulo" => "Dom Casmurro", "img" => "img/image 11.png"],
          ["titulo" => "A Mão e a Luva", "img" => "img/image 23.png"],
          ["titulo" => "Quincas Borba", "img" => "img/image 21.png"],
          ["titulo" => "O Alienista", "img" => "img/oalienista.png"],
          ["titulo" => "Helena", "img" => "img/helena.png"]
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