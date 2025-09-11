
    try {
        // Buscar dados completos do usuário
        $sql = "SELECT * FROM Usuario WHERE cpf = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$cpf]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$usuario) {
            $erro = "Usuário não encontrado.";
        }
    } catch (PDOException $e) {
        $erro = "Erro ao buscar usuário: " . $e->getMessage();
    }
} else {
    $erro = "CPF não fornecido.";
}

// Buscar estatísticas do usuário se encontrado
$estatisticas = ['leituras' => 0, 'acessos' => 0, 'solicitacoes' => 0];
if ($usuario) {
    try {
        // Contar leituras
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM Le WHERE cpf_usuario = ?");
        $stmt->execute([$cpf]);
        $estatisticas['leituras'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        // Contar acessos
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM Acesso WHERE cpf_usuario = ?");
        $stmt->execute([$cpf]);
        $estatisticas['acessos'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        
        // Contar solicitações
        $stmt = $conn->prepare("SELECT COUNT(*) as total FROM Solicitacao WHERE cpf_usuario = ?");
        $stmt->execute([$cpf]);
        $estatisticas['solicitacoes'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    } catch (PDOException $e) {
        // Ignorar erros de estatísticas
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário - Biblioteca Virtual</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Georgia, serif;
        }

        body {
            background-image: url('../../img/fundoimagem.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(156, 98, 36, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #d6a65a;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #E9A863;
            color: #804D07;
            border: 2px solid #fff;
            border-radius: 50px;
            padding: 12px 25px;
            font-weight: 800;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin: 5px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #d1a25a;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .user-details {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: bold;
            color: #804D07;
            width: 30%;
        }

        .detail-value {
            color: #333;
            width: 65%;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #804D07;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        .error-message {
            background-color: #ff6b6b;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .actions {
            text-align: center;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .detail-row {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .detail-label, .detail-value {
                width: 100%;
            }
            
            .detail-value {
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>DETALHES DO USUÁRIO</h1>
            <a href="ler.php" class="btn">← VOLTAR À LISTA</a>
        </div>

        <?php if ($erro): ?>
            <div class="error-message">
                <?= htmlspecialchars($erro) ?>
            </div>
        <?php elseif ($usuario): ?>
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number"><?= $estatisticas['leituras'] ?></div>
                    <div class="stat-label">Livros Lidos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?= $estatisticas['acessos'] ?></div>
                    <div class="stat-label">Acessos</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?= $estatisticas['solicitacoes'] ?></div>
                    <div class="stat-label">Solicitações</div>
                </div>
            </div>

            <div class="user-details">
                <div class="detail-row">
                    <div class="detail-label">CPF:</div>
                    <div class="detail-value"><?= htmlspecialchars($usuario['cpf']) ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nome Completo:</div>
                    <div class="detail-value"><?= htmlspecialchars($usuario['nome_completo']) ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div class="detail-value"><?= htmlspecialchars($usuario['email']) ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Telefone:</div>
                    <div class="detail-value"><?= htmlspecialchars($usuario['telefone'] ?: 'Não informado') ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Login:</div>
                    <div class="detail-value"><?= htmlspecialchars($usuario['login']) ?></div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">ID de Acesso:</div>
                    <div class="detail-value"><?= htmlspecialchars($usuario['id_acesso'] ?: 'Não definido') ?></div>
                </div>
            </div>

            <div class="actions">
                <a href="editar.php?cpf=<?= urlencode($usuario['cpf']) ?>" class="btn btn-warning">
                    ✏️ Editar Usuário
                </a>
                <a href="excluir.php?cpf=<?= urlencode($usuario['cpf']) ?>" 
                   class="btn btn-danger" 
                   onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                   🗑️ Excluir Usuário
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
