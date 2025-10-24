<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de feedback</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" require> <br>

        <label for="email">Email:</label>
        <input type="email" name="email" require> <br>

        <label for="mensagem">Mensagem:</label>
        <textarea name="mensagem" require> </textarea> <br>

        <button type="submit">Enviar</button>
        
    </form>

    <?php 
        //Verificar se o formulario foi eviado
        if ($_SERVER['REQUEST_METHOD'] =='POST') {
            // Recebe os valores enviados pelo formulario
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $mensagem = $_POST['mensagem'];

            // Valida se os campos não estão vazios 
            if (!empty($nome) && !empty($email) && filter_var ($email, FILTER_VALIDATE_EMAIL) && !empty($mensagem)) {
                echo "<p style='color: Darkgreen;'>Feedback enviado com sucesso!</p> ";
            } else {
                echo "<p style='color: Red;'>Preencha todos os campos corretamente.</p>";
            };       
        }
    ?>
</body>
</html>