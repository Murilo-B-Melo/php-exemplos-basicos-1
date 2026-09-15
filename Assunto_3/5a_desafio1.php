<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de maioridade</title>
</head>
<body>
    <form method="post" action="">
        <!-- Campo Nome -->
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <!-- Campo Senha -->
        <label for="ano_nascimento">Ano de nascimento:</label>
        <input type="number" name="ano_nascimento" required>

        <!-- Botão de enviar -->
        <button type="submit">Verificar</button>
    </form>

    <!-- Lógica de cadastro (PHP) -->
    <?php
    if($_SERVER['REQUEST_METHOD'] =='POST') {
        // Recebo os valores
        $nome = $_POST['nome'];
        $ano_nascimento = $_POST['ano_nascimento'];

        // Calcula a idade subtraindo o ano de nascimento do ano atual
        $idade = date('Y') - $ano_nascimento;

        // Verifica se a idade é maior ou igual a 18
        if ($idade >= 18) {
            echo "<h2>Acesso permitido, $nome! Idade atual: $idade.</h2>";

            // 
            $arquivo = fopen('log_acessos.txt', 'a');
            // 
            $linha = "Nome: $nome, Idade: $idade\n";
            // 
            fwrite($arquivo, $linha);
            fclose($arquivo);
        } else {
            // 
            echo "<h2>Acesso negado, $nome! Idade atual: $idade.</h2>";
        }

        // 
        echo '<meta http-equiv="refresh" content="5;url=' .$_SERVER['PHP_SELF']. '">';
    }
    
    
    ?>
</body>
</html>