<?php
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = true;

    if ($success) {
        header('Location: inicio.html');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Biblioteca Virtual</title>
    <link rel="stylesheet" href="imgs" />
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            height: 100%;
            color: #d6a65a;
        }

        .background {
            background: url('imgs/image.png') no-repeat center center;
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
            padding: 40px 20px 80px;
        }

        .registration-form {
            width: 100%;
            background-color: #804D07;
            width: 420px;
            max-width: 95vw;
            padding: 30px 30px 40px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .registration-form h1 {
            font-family: "Staatliches", Helvetica, Arial, sans-serif;
            font-size: 40px;
            color: #d6a65a;
            font-weight: bold;
            text-align: center;
        }

        .custom-input {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 50px;
            border: 1px solid #e9a863cc;
            padding: 10px 15px;
            color: #9D9375;
            font-weight: bold;
            box-sizing: border-box;
        }

        .custom-input .icon {
            width: 26px;
            height: 26px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
        }

        .usuario {
            background-image: url('imgs/vector (1).svg');
            width: 25px !important;
            height: 25px !important;
        }

        .senha {
            background-image: url('imgs/vector.svg');
            width: 25px !important;
            height: 25px !important;
        }

        .email {
            background-image: url('imgs/image 2.png');
            width: 25px !important;
            height: 25px !important;
        }

        .nome-livro {
            background-image: url('imgs/image 14.png');
            width: 37px !important;
            height: 37px !important;
        }

        .sinopse {
            background-image: url('imgs/image 12.png');
            width: 26px !important;
            height: 26px !important;
        }

        .nome-autor {
            background-image: url('imgs/image 13.png');
            width: 28px !important;
            height: 28px !important;
        }

        .custom-input .title {
            color: #9D9375;
            -webkit-text-stroke: 1px #e9a863;
            padding-left: 10px;
            font-family: "Sahitya-Regular", Helvetica;
            font-size: 1rem;
            white-space: nowrap;
        }

        .custom-input input {
            border: none;
            outline: none;
            font-size: 1rem;
            color: #050505ff;
            flex-grow: 1;
            background: transparent;
            font-weight: bold;
            padding: 0;
            min-width: 0;
        }

        .custom-input input::plachoelder {
            color: #804D07;
        }

        .registration-form button {
            background-color: #E9A863;
            font-family: "Sahitya", Helvetica, Arial, sans-serif;
            color: #804D07;
            border: 2px solid #fff;
            border-radius: 50px;
            padding: 10px 0;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: 1px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            cursor: pointer;
        }

        .registration-form button:hover {
            background-color: #d1a25a;
        }

        footer {
            background-color: #804D07;
            font-family: Arial, Helvetica, sans-serif;
            color: #E9A863;
            font-size: 0.9rem;
            padding: 12px 0;
            text-align: center;
            font-weight: 600;
            letter-spacing: 0.03em;
            user-select: none;
        }

        footer a {
            color: #E9A863;
            margin: 0 16px;
            text-decoration: none;
            border-bottom: 1px solid #f0dfb3;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        footer a:hover {
            opacity: 0.7;
        }

        footer span {
            margin-left: 16px;
        }

        .error-message {
            color: red;
            background-color: white;
            font-family: "Sahitya", Helvetica, Arial, sans-serif;
            padding: 8px;
            border-radius: 50px;
            margin: 5px 0;
            font-weight: bold;
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="background"></div>
    <main>
        <form class="registration-form" method="post" action="" autocomplete="off" novalidate>
            <h1>BIBLIOTECA VIRTUAL</h1>

    <div class="custom-input">
    <div class="icon usuario" aria-hidden="true"></div>
    <input type="text" name="usuario" placeholder="Usuário" value="<?= isset($usuario) ? htmlspecialchars($usuario) : '' ?>" <?= $success ? "readonly" : "" ?> required />
</div>

<div class="custom-input">
    <div class="icon senha" aria-hidden="true"></div>
    <input type="password" name="senha" placeholder="Senha" value="<?= isset($senha) ? htmlspecialchars($senha) : '' ?>" <?= $success ? "readonly" : "" ?> required />
</div>

<div class="custom-input">
    <div class="icon email" aria-hidden="true"></div>
    <input type="email" name="email" placeholder="E-mail" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" <?= $success ? "readonly" : "" ?> required />
</div>

<div class="custom-input">
    <div class="icon nome-livro" aria-hidden="true"></div>
    <input type="text" name="nome-livro" placeholder="Nome do livro" value="<?= isset($nomeLivro) ? htmlspecialchars($nomeLivro) : '' ?>" <?= $success ? "readonly" : "" ?> required />
</div>

<div class="custom-input">
    <div class="icon sinopse" aria-hidden="true"></div>
    <input type="text" name="sinopse" placeholder="Sinopse" value="<?= isset($sinopse) ? htmlspecialchars($sinopse) : '' ?>" <?= $success ? "readonly" : "" ?> required />
</div>

<div class="custom-input">
    <div class="icon nome-autor" aria-hidden="true"></div>
    <input type="text" name="autor" placeholder="Autor(a)" value="<?= isset($autor) ? htmlspecialchars($autor) : '' ?>" <?= $success ? "readonly" : "" ?> required />
</div>

            <?php if (!$success) : ?>
                <button type="submit">CADASTRAR</button>
            <?php endif; ?>
        </form>
    </main>

     <div class="rodape">
        <a href="#">Política de Privacidade</a>
        <a href="#">Termos de Uso</a>
        | Todos os direitos reservados (BR)
    </div>

</body>

</html>
