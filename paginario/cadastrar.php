<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual</title>
    <style>
 * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Georgia, serif;
    }

    body {
        background-image: url('img/fundoimagem.png');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    /* ---- Seta no topo ---- */
    .seta-topo {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #E9A863;
        color: #804D07;
        font-size: 20px;
        font-weight: bold;
        padding: 10px 16px;
        border-radius: 50%;
        text-decoration: none;
        border: 2px solid #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        transition: background 0.3s;
    }

    .seta-topo:hover {
        background-color: #d1a25a;
    }

    .caixa {
        background-color: #9C6224;
        color: #d6a65a;
        padding: 40px;
        border-radius: 20px;
        text-align: center;
        width: 450px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    }

    .caixa h1 {
        margin-bottom: 30px;
        font-weight: bold;
        font-size: 40px;
        color: #d6a65a;
    }

    .botao {
        display: block;
        width: 100%;
        margin: 15px 0;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        background-color: #E9A863;
        color: #804D07;
        border: 2px solid #fff;
        border-radius: 40px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .botao:hover {
        background-color: #d1a25a;
    }

    .rodape {
        position: fixed;
        bottom: 0;
        width: 100%;
        padding: 14px 0;
        background: #86541c;
        color: #fff;
        text-align: center;
        font-size: 0.9rem;
    }

    .rodape a {
        color: #fff;
        text-decoration: none;
        margin: 0 6px;
    }
    </style>
</head>
<body>

   
    <a href="index.html" class="seta-topo">⬅</a>

    <div class="caixa">
        <h1>BIBLIOTECA VIRTUAL</h1>
        <a href="cadrastrar-leitor.php" class="botao">CADASTRAR LEITOR</a>
        <a href="cadastrarescrito.php" class="botao">CADASTRAR ESCRITOR</a>
    </div>

    <div class="rodape">
        <a href="politicaprivacidade.html">Política de Privacidade</a> |
        <a href="politicaprivacidade.html">Termos de Uso</a> |
        <span>Todos os direitos reservados (BR)</span>
    </div>

</body>
</html>
