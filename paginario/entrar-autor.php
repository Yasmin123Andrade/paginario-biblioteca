<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Entrada do Autor</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #86541c;
            font-family: Georgia, serif;
            margin: 0;
        }
        .background {
            background: url('img/image.png') no-repeat center center;
            background-size: cover;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            filter: brightness(0.6);
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
        .entrar {
            height: 150px;
            width: 400px;
            background: #86541c;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .button-autor {
            background-color: #E9A863;
            color: #804D07;
            padding: 20px 40px;
            border-radius: 50px;
            font-weight: 800;
            text-align: center;
            font-size: 24px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .button-autor:hover {
            background-color: #d1a25a;
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
    <div class="background"></div>
    <main>
        <div class="entrar">
            <a href="inicio_autor.php" class="button-autor">ENTRE COMO AUTOR</a>
        </div>
    </main>

    <footer class="main-footer">
        <a href="politicaprivacidade.html">Política de Privacidade</a> |
        <a href="politicaprivacidade.html">Termos de Uso</a> |
        <span>Todos os direitos reservados (BR)</span>
    </footer>
</body>
</html>
