<!-- Passar id via URL -->
<!-- http://localhost/php-basicos1/13_exclusao.php?id=1-->

<?php
// Conecta ao banco de dados
$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "exercicio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o id foi passado via URL (id a ser excluído)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Deleta o registro do cliente com ID específicado
    $sql = "DELETE FROM clientes WHERE id='$id'";

    // Mensagem (Feedback Para usuário)
    if ($conn->query($sql) === TRUE) {
        echo "<p>Cliente excluído com sucesso!</p>";
    } else {
        echo "<p>Erro ao excluir cliente</p>";
    }

}


// Fecha a conexão
$conn->close();
?>
