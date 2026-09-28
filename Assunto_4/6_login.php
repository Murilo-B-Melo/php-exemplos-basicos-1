<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <!-- Campo para nome -->
         <label for="nome">Nome</label>
         <input type="text" name="nome"required>

         <!-- Campo para senha -->
          <label for="senha">Senha:</label>
          <input type="password" name="senha" required>

          <!-- Botão para entrar -->
           <button type="submit">Entrar</button>
    </form>

    <!-- Lógica de Login -->
     <?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores preenchidos (vindos do front-end)
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        // Abre o arquivo usuarios.txt para leitura
        $arquivo =fopen('../Assunto_3/usuarios.txt', 'r');
        $login_sucesso = false;

        // Lê cada linha do arquivo
        while (($linha = fgets($arquivo)) !== false) {
            // Divide a linha pelo delimitador (Neste caso ";")
            list($usuario_arquivo, $senha_arquivo) = explode(';', trim($linha));

            if ($nome == $usuario_arquivo && $senha == $senha_arquivo) {
                $login_sucesso = true;
                break;
            }
        }
        // Fecha o arquivo
        fclose($arquivo);

        // Exibe a mensagem (feedback) de sucesso ou erro "Processo de logar"
        if ($login_sucesso) {
            echo "<p style= 'color: darkgreen'>Login realizado com sucesso! <br> Bem-Vindo(a), $nome!<p>";
        } else {
             echo "<p style= 'color: red'> Usuário ou senha incorretos!<br>";
        }
     }

     ?>
    
</body>
</html>