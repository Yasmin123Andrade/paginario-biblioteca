<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Meu Perfil</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.google.com/share?selection.family=Bebas+Neue" rel="stylesheet">
</head>
<body>
  <div class="pagina">
  <div class="container">
    <header>
      <h1>MEU PERFIL</h1>
      <div class="estante"></div>
    </header>

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
</body>
</html>