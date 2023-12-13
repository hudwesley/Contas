<?php
require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");
require_once("/xampp/htdocs/Contas/Model/UsuarioModel.php");


$nome = $_POST['input-nome-usuario'];
$sobrenome = $_POST['input-sobrenome-usuario'];
$user = $_POST['input-username-usuario'];
$password = base64_encode($_POST['input-password-usuario']);

$newUser = new UsuarioModel($nome, $sobrenome, $user, $password);

$newUser->insertUser($conn, $nome, $sobrenome, $user, $password);
?>
''