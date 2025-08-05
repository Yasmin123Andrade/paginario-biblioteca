<?php
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if ($usuario == "admin" && $senha == "1234") {
        $mensagem = "<p style='color:green;text-align:center;'>Bem-vindo à Biblioteca Virtual, $usuario!</p>";
    } else {
        $mensagem = "<p style='color:red;text-align:center;'>Usuário ou senha inválidos!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual</title>
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
         footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #995c12;
            color: #fff;
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
    <h1>BIBLIOTECA VIRTUAL</h1>
    <?php echo $mensagem; ?>
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
            <span>👤</span>
            <input type="text" e-mail="email" placeholder="email" required>
        </div>
        <button type="submit" class="btn" >CADASTRAR<a href="paginainicial.html"></a></button>
    </form>
</div>
    <div class="rodape">
        <a href="#">Política de Privacidade</a>
        <a href="#">Termos de Uso</a>
        | Todos os direitos reservados (BR)
    </div>
</body>
</html>

<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (usuario, senha, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $usuario, $senha, $email);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso! <a href='listar.php'>Ver lista</a>";
    } else {
        echo "Erro: " . $stmt->error;
    }
}
?>
<form method="POST">
    Usuário: <input type="text" name="usuario" required><br>
    Senha: <input type="password" name="senha" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Cadastrar">
</form>