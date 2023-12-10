<?php

require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");

session_start(); // Inicia a sessão

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="/Contas/View/style.css">
    <script src="/Contas/JS/script.js"></script>
</head>
<body>
    <div class="container">
        <!-- div do formulario -->
        <div class="div-formulario-login" id="div-formulario-login">



            <!-- FORMULÁRIO DE LOGIN DO USUÁRIO -->
            <form action="/Contas/Controller/Banco/login.php" class="formulario-login" method="POST" onsubmit="carregar()">

                <!-- Imagem cabeçalho formulário de login -->
                <div class="image-form-login">
                    <img src="/Contas/Image/logo1.png" alt="Ícone sistema">
                </div>

                <!--Campo de texto para o usuário -->
                <div class="input-usuario">
                    <input type="text" id="user-login" name="user-login" placeholder="Usuário" required>
                </div>

                <!-- Campo de texto para a senha -->
                <div class="input-senha">
                    <input type="password" id="senha-login" name="senha-login" autocomplete="off" placeholder="Senha" maxlength="15" required>

                </div>

                <!-- Mostrar a senha -->
                <div class="checkbox-mostrar-senha">
                    <input type="checkbox" id="show-password" onclick="showPassword()">
                    <label for="mostrarSenha">Mostrar Senha</label>
                </div>

                <!-- Botão de entrar -->
                <div class="btn-entrar">
                    <button type="submit" id="entrar">ENTRAR</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>