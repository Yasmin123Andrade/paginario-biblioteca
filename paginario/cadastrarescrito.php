<?php
$errors = [];
$success = false;
$nome_completo = $nacionalidade = $data_nascimento = $biografia = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_STRING);
    $data_nascimento = filter_input(INPUT_POST, 'datanascimento', FILTER_SANITIZE_EMAIL);
    $biografia = filter_input(INPUT_POST, 'biografia', FILTER_SANITIZE_STRING);

    if (!$nome_completo) {
        $errors[] = "O campo Nome Completo é obrigatório.";
    }
    if (!$nacionalidade) {
        $errors[] = "O campo Nacionalidade é obrigatório.";
    }
    if (!$data_nascimento) {
        $errors[] = "O campo Data de Nascimento é obrigatório.";
    }
    if (!$biografia) {
        $errors[] = "O campo Biografia é obrigatório.";
    }

    if (count($errors) === 0) {
        $success = true;
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
        body, html {
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
            width: 420px;
            max-width: 95vw;
            background: #86541c;
            padding: 30px 30px 40px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .registration-form h1 {
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
            margin-right: 10px;
        }
        .nome { background-image: url('imgs/nome.png'); }
        .senha { background-image: url('imgs/vector.svg'); }
        .nascimento { background-image: url('imgs/calendario.png'); }
        .nacionalidade { background-image: url('imgs/no-mundo-todo.png'); }
        .sinopse { background-image: url('imgs/image 12.png'); }
        .biografia { background-image: url('imgs/image 12.png'); }

        .custom-input input {
            border: none;
            outline: none;
            font-size: 1rem;
            color: #804D07;
            flex-grow: 1;
            background: transparent;
            font-weight: bold;
            padding: 0;
            min-width: 0;
        }
        .custom-input input:focus {
            color: #131212ff;
            
        }
        .registration-form button {
            background-color: #E9A863;
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
        .error-message {
            color: red;
            background-color: white;
            padding: 8px;
            border-radius: 50px;
            margin: 5px 0;
            font-weight: bold;
            font-size: 0.9rem;
            text-align: center;
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
    </style>
</head>

<body>
 <a href="cadastrar.php" class="seta-topo seta-direita">⬅</a>
    <div class="background"></div>
    <main>
        <form class="registration-form" method="post" action="" autocomplete="off" novalidate>
            <h1>BIBLIOTECA VIRTUAL</h1>

            <?php if (count($errors) > 0): ?>
                <div class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="custom-input">
                <div class="icon nome" aria-hidden="true"></div>
                <input type="text" name="nome_completo" placeholder="Nome Completo" value="<?= htmlspecialchars($nome_completo) ?>" <?= $success ? "readonly" : "" ?> required />
            </div>

            <div class="custom-input">
                <div class="icon nacionalidade" aria-hidden="true"></div>
                <input type="text" name="nacionalidade" placeholder="Nacionalidade" value="<?= htmlspecialchars($nacionalidade) ?>" <?= $success ? "readonly" : "" ?> required />
            </div>

            <div class="custom-input">
                <div class="icon nascimento" aria-hidden="true"></div>
                <input type="date" name="datanascimento" placeholder="Data de Nascimento" value="<?= htmlspecialchars($data_nascimento) ?>" <?= $success ? "readonly" : "" ?> required />
            </div>

            <div class="custom-input">
                <div class="icon biografia" aria-hidden="true"></div>
                <input type="text" name="biografia" placeholder="Biografia" value="<?= htmlspecialchars($biografia) ?>" <?= $success ? "readonly" : "" ?> required />
            </div>

            <?php if (!$success): ?>
                <button type="submit">CADASTRAR</button>
            <?php endif; ?>

        </form>
    </main>

  <footer class="main-footer">
    <a href="#">Política de Privacidade</a> |
    <a href="#">Termos de Uso</a> |
    <span>Todos os direitos reservados (BR)</span>
  </footer>

</body>
</html>
