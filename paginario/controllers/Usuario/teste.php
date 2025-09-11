
/**
 * Arquivo de teste para verificar a conexão e estrutura do banco
 * Execute este arquivo para testar se tudo está funcionando
 */

require_once '../../db/conexao.php';

echo "<h1>Teste do Sistema de Usuários</h1>";

try {
    // Testar conexão
    echo "<h2>✅ Teste de Conexão</h2>";
    echo "<p>Conexão com o banco estabelecida com sucesso!</p>";
    
    // Verificar se a tabela Usuario existe
    echo "<h2>✅ Teste de Estrutura</h2>";
    $stmt = $conn->prepare("DESCRIBE Usuario");
    $stmt->execute();
    $colunas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<p>Tabela Usuario encontrada com as seguintes colunas:</p>";
    echo "<ul>";
    foreach ($colunas as $coluna) {
        echo "<li><strong>{$coluna['Field']}</strong> - {$coluna['Type']}</li>";
    }
    echo "</ul>";
    
    // Contar usuários existentes
    echo "<h2>📊 Estatísticas</h2>";
    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM Usuario");
    $stmt->execute();
    $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    echo "<p>Total de usuários cadastrados: <strong>$total</strong></p>";
    
    // Verificar arquivos do CRUD
    echo "<h2>📁 Arquivos do CRUD</h2>";
    $arquivos = [
        'criar.php' => 'Criar usuário',
        'ler.php' => 'Listar usuários', 
        'editar.php' => 'Editar usuário',
        'excluir.php' => 'Excluir usuário',
        'detalhes.php' => 'Detalhes do usuário'
    ];
    
    echo "<ul>";
    foreach ($arquivos as $arquivo => $descricao) {
        if (file_exists($arquivo)) {
            echo "<li>✅ <strong>$arquivo</strong> - $descricao</li>";
        } else {
            echo "<li>❌ <strong>$arquivo</strong> - $descricao (ARQUIVO NÃO ENCONTRADO)</li>";
        }
    }
    echo "</ul>";
    
    echo "<h2>🚀 Sistema Pronto!</h2>";
    echo '<p><a href="ler.php" style="background: #E9A863; color: #804D07; padding: 10px 20px; text-decoration: none; border-radius: 25px; font-weight: bold;">Acessar Sistema de Usuários</a></p>';
    
} catch (PDOException $e) {
    echo "<h2>❌ Erro de Conexão</h2>";
    echo "<p style='color: red;'>Erro: " . $e->getMessage() . "</p>";
    echo "<p>Verifique se:</p>";
    echo "<ul>";
    echo "<li>O MySQL está rodando</li>";
    echo "<li>O banco 'biblioteca_paginario' existe</li>";
    echo "<li>As credenciais em db/conexao.php estão corretas</li>";
    echo "<li>A tabela Usuario foi criada com o script.sql</li>";
    echo "</ul>";
}
?>

<style>
body {
    font-family: Georgia, serif;
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #f5f5f5;
}
h1 { color: #804D07; }
h2 { color: #9C6224; margin-top: 30px; }
ul { background: white; padding: 20px; border-radius: 10px; }
li { margin: 5px 0; }
</style>
