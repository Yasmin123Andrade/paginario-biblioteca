<?php
session_start();
require_once 'db/conexao.php';


$errors = [];
$success = false;

$titulo = $autor = $ano_publicacao = $editor = $genero = $formato = $sinopse = "";
$classificacao_indicativa = "";
$capa_path = "";
$link_arquivo_path = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
    $ano_publicacao = filter_input(INPUT_POST, 'ano_publicacao', FILTER_SANITIZE_NUMBER_INT);
    $editor = filter_input(INPUT_POST, 'editor', FILTER_SANITIZE_STRING);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $formato = filter_input(INPUT_POST, 'formato', FILTER_SANITIZE_STRING);
    $sinopse = filter_input(INPUT_POST, 'sinopse', FILTER_SANITIZE_STRING);
    $classificacao_indicativa = filter_input(INPUT_POST, 'classificacao_indicativa', FILTER_SANITIZE_NUMBER_INT);

    // Validações obrigatórias
    if (!$titulo) $errors[] = "O campo título é obrigatório.";
    if (!$autor) $errors[] = "O campo autor é obrigatório.";
    if (!$genero) $errors[] = "O campo gênero é obrigatório.";
    if (!$sinopse) $errors[] = "O campo sinopse é obrigatório.";
    if (!$classificacao_indicativa) $errors[] = "A classificação indicativa é obrigatória.";

    // Upload da capa (imagem)
    if (isset($_FILES['capa']) && $_FILES['capa']['error'] !== UPLOAD_ERR_NO_FILE) {
        $allowed_types_img = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['capa']['type'], $allowed_types_img)) {
            if ($_FILES['capa']['size'] <= 2 * 1024 * 1024) { // 2MB
                $ext = pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);
                $nome_arquivo = uniqid('capa_') . '.' . $ext;
                $destino = 'uploads/' . $nome_arquivo;
                if (!move_uploaded_file($_FILES['capa']['tmp_name'], $destino)) {
                    $errors[] = "Falha ao salvar a imagem da capa.";
                } else {
                    $capa_path = $destino;
                }
            } else {
                $errors[] = "A imagem da capa deve ter no máximo 2MB.";
            }
        } else {
            $errors[] = "Tipo de arquivo da capa inválido. Use JPG, PNG ou GIF.";
        }
    } else {
        $errors[] = "É obrigatório enviar uma imagem de capa.";
    }

    // Upload do PDF/EPUB
    if (isset($_FILES['link_arquivo']) && $_FILES['link_arquivo']['error'] !== UPLOAD_ERR_NO_FILE) {
        $allowed_types_file = ['application/pdf', 'application/epub+zip'];
        if (in_array($_FILES['link_arquivo']['type'], $allowed_types_file)) {
            if ($_FILES['link_arquivo']['size'] <= 10 * 1024 * 1024) { // 10MB
                $ext = pathinfo($_FILES['link_arquivo']['name'], PATHINFO_EXTENSION);
                $nome_pdf = uniqid('livro_') . '.' . $ext;
                $destino_pdf = 'uploads/' . $nome_pdf;
                if (!move_uploaded_file($_FILES['link_arquivo']['tmp_name'], $destino_pdf)) {
                    $errors[] = "Falha ao salvar o arquivo do livro.";
                } else {
                    $link_arquivo_path = $destino_pdf;
                }
            } else {
                $errors[] = "O arquivo do livro deve ter no máximo 10MB.";
            }
        } else {
            $errors[] = "O arquivo do livro deve ser PDF ou EPUB.";
        }
    } else {
        $errors[] = "É obrigatório enviar o arquivo PDF ou EPUB do livro.";
    }

    if (count($errors) === 0) {
        $sql = "INSERT INTO Livro 
            (titulo, autor, ano_publicacao, editor, genero, formato, link_arquivo, sinopse, classificacao_indicativa, cpf_administrador, capa) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        try {
            $stmt->execute([
                $titulo,
                $autor,
                $ano_publicacao ?: null,
                $editor ?: null,
                $genero,
                $formato ?: null,
                $link_arquivo_path,
                $sinopse,
                $classificacao_indicativa,
                $_SESSION['user_cpf'],
                $capa_path
            ]);
            $success = true;
            header("Location: detalhes_livro.php?id=" . $conexao->lastInsertId());
            exit();
        } catch (PDOException $e) {
            $errors[] = "Erro ao cadastrar livro: " . $e->getMessage();
            if ($capa_path && file_exists($capa_path)) unlink($capa_path);
            if ($link_arquivo_path && file_exists($link_arquivo_path)) unlink($link_arquivo_path);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro - Biblioteca Virtual</title>
    <style>
        * {margin:0; 
            padding:0; 
            box-sizing:border-box;
        }

        body, html {
            height:100%;
            color:#d6a65a;
            display:flex;
            flex-direction:column;
        }

        .background {
            background:url('img/image.png') no-repeat center center;
            background-size:cover;
            position:fixed;
            top:0;
            left:0;
            width:100vw;
            height:100vh;
            z-index:-1;
            filter:brightness(0.6);
        }
        main {
            flex:1;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px 20px 80px;
        }
        .registration-form {
            width:500px;
            max-width:95vw;
            background:#86541c;
            padding:30px 30px 40px;
            border-radius:15px;
            display:flex;
            flex-direction:column;
            gap:20px;
        }
        .registration-form h1 {
            font-size:40px;
            color:#d6a65a;
            font-weight:bold;
            text-align:center;
        }
        .custom-input {
            display:flex;
            align-items:center;
            background-color:#fff;
            border-radius:50px;
            border:1px solid #e9a863cc;
            padding:10px 15px;
            color:#9D9375;
            font-weight:bold;
            box-sizing:border-box;
            margin-bottom:10px;
        }
        .custom-input input, .custom-input textarea {
            border:none;
            outline:none;
            font-size:1rem;
            color:#804D07;
            flex-grow:1;
            background:transparent;
            font-weight:bold;
            padding:0;
            min-width:0;
        }

        .registration-form button {
            background-color:#E9A863;
            color:#804D07;
            border:2px solid #fff;
            border-radius:50px;
            padding:12px 0;
            font-weight:800;
            font-size:20px;
            letter-spacing:1px;
            transition:background-color 0.3s ease;
            margin-top:10px;
            cursor:pointer;
        }

        .registration-form button:hover {
            background-color:#d1a25a;
        }

        .error-message {
            color:red;
            background-color:white;
            padding:8px;
            border-radius:50px;
            margin:5px 0;
            font-weight:bold;
            font-size:0.9rem;
            text-align:center;}
    </style>
</head>
<body>
    <div class="background"></div>
    <main>
        <form class="registration-form" method="post" action="" enctype="multipart/form-data" autocomplete="off" novalidate>
            <h1>Cadastro de Livro</h1>
            <?php if (count($errors) > 0): ?>
                <div class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="custom-input">
                <input type="text" name="titulo" placeholder="Título" value="<?= htmlspecialchars($titulo) ?>" required />
            </div>
            <div class="custom-input">
                <input type="text" name="autor" placeholder="Autor" value="<?= htmlspecialchars($autor) ?>" required />
            </div>
            <div class="custom-input">
                <input type="number" name="ano_publicacao" placeholder="Ano da Publicação" value="<?= htmlspecialchars($ano_publicacao) ?>" />
            </div>
            <div class="custom-input">
                <input type="text" name="editor" placeholder="Editora" value="<?= htmlspecialchars($editor) ?>" />
            </div>
            <div class="custom-input">
                <input type="text" name="genero" placeholder="Gênero" value="<?= htmlspecialchars($genero) ?>" required />
            </div>
            <div class="custom-input">
                <input type="text" name="formato" placeholder="Formato" value="<?= htmlspecialchars($formato) ?>" />
            </div>
            <div class="custom-input">
                <input type="file" name="capa" accept="image/png, image/jpeg, image/gif" required />
            </div>
            <div class="custom-input">
                <input type="file" name="link_arquivo" accept="application/pdf,application/epub+zip" required />
            </div>
            <div class="custom-input">
                <textarea name="sinopse" placeholder="Sinopse" required><?= htmlspecialchars($sinopse) ?></textarea>
            </div>
            <div class="custom-input">
                <input type="number" name="classificacao_indicativa" placeholder="Classificação Indicativa" min="0" max="18" value="<?= htmlspecialchars($classificacao_indicativa) ?>" required />
            </div>
            <button type="submit">CADASTRAR LIVRO</button>
        </form>
    </main>
</body>
</html>