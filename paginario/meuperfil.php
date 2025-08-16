<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil</title>
  <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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

.pagina {
  display: flex;
 flex-direction: column;
min-height: 100vh;
}

.container {
 width: 100%;
 height: 100%;
 background-color: #d99951;
 padding: 0;
 flex: 1;
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
  width: 30px;
  height: 30px;
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

.bookshelf {
    background: url('img/image.png') no-repeat center top;
    color: #fff;
    background-size: cover;
    height: 80px;
    margin-bottom: 10px;
    width:100vw;
    display:flex;
    justify-content: center;
    align-items: center;
}

.perfil {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
  
}

.foto-perfil img {
  border-radius: 50%;
  width: 120px;
  height: 120px;
  padding: 20px;
}

.dados, .favorito {
  flex: 1;
  margin:  20px;
  background-color: #6b3f0e;
  padding: 10px;
  border-radius: 20px;

}

.dados h2, .favorito h2 {
  font-size: 18px;
  margin-bottom: 10px;
  color:  #d99951;
  
}

input {
  display: block;
  width: 50%;
  margin: 8px 0;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  margin: 5px 5px 0 0;
  padding: 8px 16px;
  background-color: #d99951;
  border: none;
  color: white;
  border-radius: 5px;
  cursor: pointer;
}

.salvar {
  background-color: #d99951;
}

.favorito img {
  width: 100px;
  margin:  0;
  padding: 10px;
 
}

.titulo {
  font-weight: bold;
  margin-top: 10px;
  color:  #d99951;
}

.estrelas {
  color: gold;
}

.baixados {
  background-color: #6b3f0e;
  color: #d99951;
  margin: 20px auto;
  padding: 10px;
  font-size: 18px;
  border-radius: 8px;
  width: 40%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.baixados span {
  display: block;
  font-size: 32px;
  font-weight: bold;
  margin-top: 5px;
}

footer {
  background-color: #6b3f0e;
  display: flex;
  justify-content: center;
  font-size: 18px;
  padding: 5px;
  color: #ce9a5f;
  text-align: center; 
  align-items: center; 
  gap: 50px;
  flex-wrap: wrap;
}
footer a {
  color: #ce9a5f;
}
  </style>
  <link href="img">
  <link href="https://fonts.google.com/share?selection.family=Bebas+Neue" rel="stylesheet">
</head>
<body>
  <div class="pagina">
  <div class="container">
    <header>
      <h2>MEU PERFIL</h2>
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

    <div class="bookshelf">
    </div>

    <main class="perfil">
      <div class="foto-perfil">
        <img src="foto_perfil.webp" alt="Foto do usuário">
      </div>

      <form action="salvar.php" method="POST" class="dados">
        <h2>DADOS PESSOAIS</h2>
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="email" name="email" placeholder="e-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="button" class="alterar">ALTERA SENHA</button>
        <button type="submit" class="salvar">SALVAR</button>
      </form>

      <div class="favorito">
        <h2>FAVORITO</h2>
        <img src="livro.webp" alt="Livro favorito">
        <p class="titulo">Orgulho e Preconceito<br><small>JANE AUSTEN</small></p>
        <p class="estrelas">⭐⭐⭐⭐⭐</p>
      </div>
    </main>

    <div class="baixados">
      <p>LIVROS BAIXADOS</p>
      <span>10</span>
    </div>
    </div>

    <footer>
      <p>Política de Privacidade</p>
      <p>Termos de Uso</p>
      <p>Todos os direitos reservados (BR)</p>
    </footer>
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