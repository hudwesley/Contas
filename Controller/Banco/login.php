<?php
require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");

session_start(); // Inicia a sessão


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $cpf = $conn->real_escape_string($_POST["user-login"]);
    $password = base64_encode($_POST["senha-login"]);

    $sql = "SELECT * FROM Usuario WHERE User = '$cpf' AND Password = '$password'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $dados = $resultado->fetch_assoc();
        $_SESSION["id"] = $dados["idUsuario"];
        $_SESSION["nome"] = $dados["Nome"];
        $_SESSION["sobrenome"] = $dados["Sobrenome"];

        sleep(1);
        header('location: /Contas/View/home.php');
    } else {
        sleep(1);
        $_SESSION["erro"] = 1;
        header('location: /Contas/View/index.php');
    }
} else {
?>
    <script>
        alert("Erro no envio do formulário");
    </script>
<?php
}

?>