<?php 
// Página de login (15a_sistema.php)
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

// Verifica se os dados são validos (usuário: admin, senha: 123)
if ($usuario == 'admin' && $senha == '123') {
    $_SESSION['usuario'] = $usuario; // Salva o nome do usuário na sessão
    header("Location: 15b_restrita.php");
    exit();
} else {
    $erro = "Usuário ou senha incorretos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <form   method="post" action="">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" required><br><br>

            <label for="usuario">Senha:</label>
            <input type="text" name="senha" required><br><br>

            <button type="submit">Entrar</button>
        </form>
        
        <?php 
        if (isset($erro)) {
            echo "<p style='color: red;'>$erro</p>";
        }
        ?>
</body>
</html>