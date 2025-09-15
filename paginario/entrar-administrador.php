<?php
session_start();
require_once 'db/conexao.php';

$errors = [];
$success = false;
$cpf_administrador = $senha = "1401";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf_administrador = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if (!$cpf_administrador) {
        $errors[] = "O campo CPF é obrigatório.";
    }
    if (!$senha) {
        $errors[] = "O campo Senha é obrigatório.";
    }

    if (count($errors) === 0) {
        try {
            // Buscar administrador no banco
            $stmt = $conexao->prepare("SELECT cpf_administrador, login, senha FROM Administrador WHERE cpf_administrador = ?");
            $stmt->execute([$cpf_administrador]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin && password_verify($senha, $admin['senha'])) {
                // Login bem-sucedido
                $_SESSION['admin_cpf'] = $admin['cpf_administrador'];
                $_SESSION['admin_senha'] = $admin['senha'];

                $success = true;
                header('Location: admin.php'); // Página inicial administrativa
                exit();
            } else {
                $errors[] = "CPF ou senha incorretos.";
            }
        } catch (PDOException $e) {
            $errors[] = "Erro no sistema. Tente novamente mais tarde.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Login Administrador - Biblioteca Virtual</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            height: 100%;
            display: flex;
            flex-direction: column;
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
            padding: 40px 20px 80px;
        }
        .login-form {
            width: 420px;
            max-width: 95vw;
            background: #86541c;
            padding: 30px 30px 40px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .login-form h1 {
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
        .cpf { background-image: url('imgs/cpf.png'); }
        .senha { background-image: url('imgs/vector.svg'); }
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
        .login-form button {
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
        .login-form button:hover {
            background-color: #d1a25a;
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
    <a href="index.php" class="seta-topo seta-direita">⬅</a>
    <div class="background"></div>
    <main>
        <form class="login-form" method="post" action="" autocomplete="off" novalidate>
            <h1>BIBLIOTECA VIRTUAL</h1>

            <?php if (count($errors) > 0): ?>
                <div class="error-message" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="custom-input">
                <div class="icon cpf" aria-hidden="true"></div>
                <input type="text" name="cpf" placeholder="CPF" value="<?= htmlspecialchars($cpf_administrador) ?>" <?= $success ? "readonly" : "" ?> required />
            </div>

            <div class="custom-input">
                <div class="icon senha" aria-hidden="true"></div>
                <input type="password" name="senha" placeholder="Senha" value="<?= htmlspecialchars($senha) ?>" <?= $success ? "readonly" : "" ?> required />
            </div>

            <?php if (!$success): ?>
                <button type="submit">ENTRAR</button>
            <?php endif; ?>
        </form>
    </main>

    <footer class="main-footer">
        <a href="politicaprivacidade.html">Política de Privacidade</a> |
        <a href="politicaprivacidade.html">Termos de Uso</a> |
        <span>Todos os direitos reservados (BR)</span>
    </footer>
</body>
</html>
