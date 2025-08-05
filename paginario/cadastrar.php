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
            font-family: Arial, sans-serif;
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

        .caixa {
            background-color: #9C6224;
            color: #E9A863;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            width: 450px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }

        .caixa h1 {
            font-size: 28px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .botao {
            display: block;
            width: 100%;
            margin: 15px 0;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: #9C6224;
            background-color: #E9A863;
            border: 3px solid #ffffff;
            border-radius: 40px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .botao:hover {
            background-color: #d49a47;
        }

        .rodape {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #A05A15;
            color: #fff;
            text-align: center;
            padding: 15px 10px;
            font-size: 14px;
        }

        .rodape a {
            color: #f5c184;
            text-decoration: none;
            margin: 0 10px;
        }

        .rodape a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="caixa">
        <h1>BIBLIOTECA VIRTUAL</h1>
        <a href="cadrastrar-leitor.php" class="botao">CADASTRAR LEITOR</a>
        <a href="cadastrarescrito.php" class="botao">CADASTRAR ESCRITOR</a>
    </div>

      <div class="rodape">
        <a href="#">Política de Privacidade</a>
        <a href="#">Termos de Uso</a>
        | Todos os direitos reservados (BR)
    </div>

</body>
</html>