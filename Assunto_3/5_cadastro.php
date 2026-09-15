<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário</title>
</head>
<body>

    <form method="post" action="">

        <!-- Campo nome -->
        <label for="Nome">Nome:</label>
        <input type="text" name="nome" required>

        <!-- Compo senha -->
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>

        <!-- Botão de enviar -->
        <button type="submt">cadastrar</button>

    </form>
    
    <?php
    // Se o usuário enviou (formulario) eu capturo os valores
    if ($_SERVER['REQUEST_METHOD']== 'POST' ) {
        // Recebo os valores 
        $nome = $_POST ['nome'];
        $senha = $_POST ['senha'];

        // Gravando as informações recebidas em um arquivo de texto
        // O "fopen" significa (file open ou abrir arquivo) e o 'a' append que significa acrescentar.
       $arquivo = fopen('usuarios.txt', 'a');

        // Cria uma linha com o nome e senha separados por;
        $linha = $nome . ';' . $senha . "\n";

        // Escreve a linha no arquivo (insere de fato)
        fwrite($arquivo, $linha);

        // Fecha o arquivo
        fclose($arquivo);

        //Redireciona para a própria página após o cadastro
        header("Location: " . $_SERVER['PHP_SELF'] . '?sucesso=1');
        exit;
         }
         
    if (isset($_GET['sucesso'])) {
        //Mensagem de sucesso (Feedback para o usuário)
        echo "<p>Usuário cadastrado com sucesso!</p>";

    // Atualiza a página após 5 segundos (Força a mensagem a sumir)
        header('Refresh: 5; url=' . $_SERVER['PHP_SELF']);
    }
    ?>
</body>
</html>