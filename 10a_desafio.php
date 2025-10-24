<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome do produto:</label>        
        <input type="text" name="nome" required> <br><br>

        <label for="preco">Preço:</label>
        <input::-webkit-outer-spin-button>
        <input type="number" name="preco" step="0.01" required> <br><br>

        <button type="submit">Cadastrar produto</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recebe os valores enviados pelo formulário
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];

        // Valida o preço
        if ($preco > 0) {
            // Conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "Senai@118";
            $dbname = "exercicio";

            // Cria a conexão
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Insere o registro no banco de dados
            $sql = "INSERT INTO produtos (nome, preco) VALUES ('$nome', '$preco')";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color:Darkgreen;'>Produto registrado com sucesso!</p>";
            } else {
                echo "<p style='color:Red;'>Erro ao registrar produto: " . $conn->error . "</p>";
            }

            // Fecha a conexão
            $conn->close();
        } else {
            echo "<p style='color:red;'>O preço deve ser maior que zero.</p>";
        }
    }
    ?>
</body>
</html>