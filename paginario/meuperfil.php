<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Georgia, serif;
      background-color: #ecb87f;
      color: #7f4d04;
      margin: 0;
    }

    header {
      background: #86541c;
      text-align: center;
      position: relative;
      padding: 5px 0;
      height: 40px;
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

    h1 {
      font-size: 30px;
      margin: 0;
      color: #fff;
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
      max-width: 900px;
      margin: 40px auto 80px auto;
      padding: 20px;
      background: #ffe7c6ff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .perfil {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .perfil img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #86541c;
      background: #fff;
    }

    .perfil-info h2 {
      margin: 0;
      font-size: 24px;
      color: #7f4d04;
    }

    .perfil-info p {
      margin: 5px 0;
    }

    .secao {
      margin-bottom: 25px;
    }

    .secao h3 {
      color: #86541c;
      border-bottom: 2px solid #86541c;
      padding-bottom: 5px;
      margin-bottom: 10px;
    }

    ul.livros {
      list-style: none;
      padding: 0;
    }

    ul.livros li {
      background: #fff;
      margin-bottom: 8px;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #c7a06e;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .botoes-perfil {
  margin-top: 15px;
}

.btn {
  background: #86541c;
  color: #fff;
  border: none;
  padding: 8px 15px;
  margin: 5px;
  border-radius: 8px;
  cursor: pointer;
  font-size: 14px;
  transition: background 0.3s;
}

.btn:hover {
  background: #a66a2c;
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
  </style>
</head>
<body>
  <header>
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

  <div class="bookshelf">
    <h1>MEU PERFIL</h1>
  </div>

  <main>
    <div class="perfil">
      <img src="img/WhatsApp Image 2025-08-16 at 10.31.16 AM.jpeg" alt="Foto do Usuário">
      <div class="perfil-info">
        <h2>Francilly da Paz</h2>
        <p><strong>Email:</strong> francielly1414@gmail.com</p>
        <p><strong>Membro desde:</strong> Março de 2025</p>
      </div>
    </div>

  <!-- Botões -->
  <div class="botoes-perfil">
    <button class="btn">Alterar Perfil</button>
    <button class="btn">Sair</button>
  </div>
</div>

    <div class="secao">
      <h3>📖 Livro Favorito</h3>
      <p><em>Dom Casmurro — Machado de Assis</em></p>
    </div>

    <div class="secao">
      <h3>📚 Livros Baixados Recentemente</h3>
      <ul class="livros">
        <li>O Alienista — Machado de Assis</li>
        <li>Orgulho e Preconceito — Jane Austen</li>
        <li>O Cortiço — Aluísio Azevedo</li>
      </ul>
    </div>
  </main>

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