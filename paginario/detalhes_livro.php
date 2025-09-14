<?php
require_once 'db/conexao.php';

if (!isset($_GET['id'])) {
    echo "Livro não especificado.";
    exit();
}

$id = intval($_GET['id']);

$stmt = $conexao->prepare("SELECT * FROM Livro WHERE id_livro = ?");
$stmt->execute([$id]);
$livro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livro) {
    echo "Livro não encontrado.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title><?=htmlspecialchars($livro['titulo'])?> — Detalhes</title>
    <style>
        /* Estilos adaptados do seu exemplo */
        body {
            font-family: 'Georgia', serif;
            background: #86541c;
            color: #333;
            line-height: 1.6;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background: url('img/fundoimagem.png') no-repeat center center;
            background-size: cover;
            color: #fff;
            width: 100%;
            min-height: 25vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        main {
            flex: 1;
        }
        .book-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            padding: 2rem;
            background-color: #ffd093ff;
            margin: -5vh 2rem 2rem 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(160, 54, 28, 0.93);
        }
        .book-cover img {
            width: 300px;
            height: auto;
            border-radius: 8px;
            margin-right: 2rem;
        }
        .book-info {
            max-width: 600px;
        }
        .book-info h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .book-info .author {
            font-style: italic;
            margin-bottom: 1rem;
        }
        .book-info .description {
            margin-bottom: 1rem;
        }
        .book-info .publication-info {
            margin-bottom: 1rem;
        }
        .book-info .download-links a {
            display: inline-block;
            background-color: #965603ff;
            color: #fff;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .book-info .download-links a:hover {
            background-color: #7a3e1cff;
        }
        .main-footer {
            text-align: center;
            padding: 14px 0;
            background-color: #a56e1a;
            color: #fff;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .main-footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 6px;
        }
        @media (max-width: 768px) {
            .book-details {
                flex-direction: column;
                align-items: center;
                margin: -5vh 1rem 2rem 1rem;
            }
            .book-cover img {
                margin-right: 0;
                margin-bottom: 1rem;
                width: 80%;
            }
            .book-info {
                max-width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Informações do Livro</h1>
</header>
<main>
    <section class="book-details">
        <div class="book-cover">
            <?php
            // Exibir a capa se houver link
            if (!empty($livro['link_arquivo'])): ?>
                <img src="<?=htmlspecialchars($livro['link_arquivo'])?>" alt="<?=htmlspecialchars($livro['titulo'])?>">
            <?php else: ?>
                <img src="img/placeholder.png" alt="Sem Capa">
            <?php endif; ?>
        </div>
        <div class="book-info">
            <h1><?=htmlspecialchars($livro['titulo'])?></h1>
            <p class="author"><?=htmlspecialchars($livro['autor'])?></p>
            <p class="description"><?=nl2br(htmlspecialchars($livro['sinopse']))?></p>
            <p class="publication-info">
                <strong>Editora:</strong> <?=htmlspecialchars($livro['editor'])?><br>
                <strong>Ano de Publicação:</strong> <?=htmlspecialchars($livro['ano_publicacao'])?><br>
                <strong>Gênero:</strong> <?=htmlspecialchars($livro['genero'])?><br>
                <strong>Formato:</strong> <?=htmlspecialchars($livro['formato'])?><br>
                <strong>Classificação Indicativa:</strong> <?=htmlspecialchars($livro['classificacao_indicativa'])?>+
            </p>
            <?php if (!empty($livro['link_arquivo'])): ?>
                <div class="download-links">
                    <a href="<?=htmlspecialchars($livro['link_arquivo'])?>" target="_blank" download>Baixar Arquivo</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<footer class="main-footer">
    <a href="politicaprivacidade.html">Política de Privacidade</a> |
    <a href="politicaprivacidade.html">Termos de Uso</a> |
    <span>Todos os direitos reservados (BR)</span>
</footer>
</body>
</html>
