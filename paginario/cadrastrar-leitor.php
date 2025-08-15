<?php
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!empty($_POST["usuario"]) && !empty($_POST["senha"]) && !empty($_POST["email"])) {
 
        header("Location: inicio.html");
        exit;
    } else {
        $erro = "Por favor, preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Biblioteca Virtual</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('img/fundoimagem.png') no-repeat center center;
            background-size: cover;
        }
        .login-box {
            background-color: #995c12;
            width: 400px;
            margin: 10% auto;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            color: #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }
        .login-box h1 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #ffc673;
        }
        .input-box {
            position: relative;
            margin-bottom: 20px;
        }
        .input-box input {
            width: 100%;
            padding: 12px 12px 12px 45px; 
            border: none;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            color: #000;
            box-sizing: border-box;
        }
        .input-box span {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #6b4f1d; 
            pointer-events: none;
        }
        .btn {
            background-color: #f5b971;
            color: #000;
            font-size: 18px;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #d49543;
        }
        .erro {
            color: red;
            margin-bottom: 15px;
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
<div class="login-box">
    <h1>CADASTRO - BIBLIOTECA VIRTUAL</h1>
    <?php
        if (!empty($erro)) {
            echo "<p class='erro'>$erro</p>";
        }
    ?>
    <form method="POST">
        <div class="input-box">
            <span>👤</span>
            <input type="text" name="usuario" placeholder="Usuário" required>
        </div>
        <div class="input-box">
            <span>🔑</span>
            <input type="password" name="senha" placeholder="Senha" required>
        </div>
        <div class="input-box">
            <span>✉️</span>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <button type="submit" class="btn">CADASTRAR</button>
    </form>
</div>
<div class="rodape">
        <a href="politicaprivacidade.html">Política de Privacidade</a>
        <a href="#">Termos de Uso</a>
        | Todos os direitos reservados (BR)
    </div>
</body>
</html>
