<?php

require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");

session_start(); // Inicia a sessão

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Funções Javascript -->
    <script src="/Contas/JS/script.js"></script>
    <!-- CSS da pagina -->
    <link rel="stylesheet" href="/Contas/View/style.css">
    <!-- Ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php

    if (!isset($_SESSION['idUsuario'])) {
    ?>
        <script>
            alert("Faça login primeiro");
            window.location = "/Contas/View/index.php"
        </script>
    <?php

    } else {

    ?>
        <div class="container">
            <div class="sidebar">

                <!-- Logotipo da aplicação -->
                <div class="logo-container">
                    <h2>DASHBOARD</h2>
                </div>

                <!-- Lista de opções de menu -->
                <ul class="menu-list">

                    <!-- Opção de menu "Local" com dropdown -->
                    <li>
                        <a href="#" onclick="toggleDropdown('localDropdown')">
                            <i class="fa fa-map"></i>
                            <span>Local</span>
                        </a>
                        <div class="dropdown" id="localDropdown">
                            <ul>
                                <li><a href="#"><i class="fa fa-plus"></i>Novo local</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar local</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Opção de menu "Cemig" com dropdown -->
                    <li>
                        <a href="#" onclick="toggleDropdown('cemigDropdown')">
                            <i class="fa fa-bolt"></i>
                            <span>Cemig</span>
                        </a>
                        <div class="dropdown" id="cemigDropdown">
                            <ul>
                                <li><a href="#"><i class="fa fa-plus"></i>Cadastrar</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar</a></li>
                                <li><a href="#"><i class="fa fa-line-chart"></i> <span>Gráfico de consumo</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Opção de menu "Copasa" com dropdown -->
                    <li>
                        <a href="#" onclick="toggleDropdown('copasaDropdown')">
                            <i class="fa fa-tint"></i>
                            <span>Copasa</span>
                        </a>
                        <div class="dropdown" id="copasaDropdown">
                            <ul>
                                <li><a href="#"><i class="fa fa-plus"></i>Cadastrar</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar</a></li>
                                <li><a href="#"><i class="fa fa-line-chart"></i> <span>Gráfico de consumo</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Opção de menu "Impressora" com dropdown -->
                    <li>
                        <a href="#" onclick="toggleDropdown('impressoraDropdown')">
                            <i class="fa fa-print"></i>
                            <span>Impressora</span>
                        </a>
                        <div class="dropdown" id="impressoraDropdown">
                            <ul>
                                <li><a href="#"><i class="fa fa-plus"></i>Cadastrar</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar</a></li>
                                <li><a href="#"><i class="fa fa-line-chart"></i> <span>Gráfico de consumo</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Opção de menu "Usuários" com dropdown -->
                    <li>
                        <a href="#" onclick="toggleDropdown('usuariosDropdown')">
                            <i class="fa fa-table"></i>
                            <span>Usuários</span>
                        </a>
                        <div class="dropdown" id="usuariosDropdown">
                            <ul>
                                <li><a href="#"><i class="fa fa-user-circle"></i>Minha conta</a></li>
                                <li><a href="#"><i class="fa fa-plus"></i>Cadastrar</a></li>
                                <li><a href="#"><i class="fa fa-users"></i>Usuários</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Opção de menu "Configurações" -->
                    <li>
                        <a href="#" onclick="toggleDropdown('configDropdown')">
                            <i class="fa fa-cogs"></i>
                            <span>Configurações</span>
                        </a>
                    </li>

                    <!-- Opção de menu "Sair" -->
                    <li>
                        <a href="/Contas/Controller/Banco/logout.php">
                            <i class="fa fa-sign-out"></i>
                            <span>Sair</span>
                        </a>
                    </li>

                </ul>
            </div>

            <!-- Formulario de cadastro de Local 
        <div class="modal" id="modalFormularioLocal">

            <div class="div-formulario-local">
                <form id="form-cadastro">
                    <h2>Cadastro de Novo Local</h2>
                    <div class="input-nome-local">
                        <input type="text" name="nome-local" placeholder="Nome do local">
                    </div>

                    <div class="input-cep">
                        <input type="text" id="cep" name="cep" maxlength="8" placeholder="Digite o CEP" required oninput="consultarCEP()">
                    </div>

                    <div class="input-logradouro">
                        <input type="text" id="logradouro" name="logradouro" placeholder="Logradouro" required readonly>
                    </div>

                    <div class="input-bairro">
                        <input type="text" id="bairro" name="bairro" placeholder="Bairro" required readonly>
                    </div>

                    <div class="input-num-local">
                        <input type="text" name="num-local" placeholder="Nº da residência" required>
                    </div>

                    <div class="input-complemento">
                        <input type="text" name="complemento" placeholder="Complemento">
                    </div>

                    <div class="input-referencia">
                        <input type="text" name="referencia" placeholder="Ponto de referência">
                    </div>

                    <div class="input-situacao">
                        <select name="situacao">
                            <option value="0" selected disabled>Selecione a situação do imóvel</option>
                            <option value="Proprio">Proprio</option>
                            <option value="Alugado">Alugado</option>
                            <option value="Cedido">Cedido</option>
                        </select>
                    </div>

                    <div class="vigencia-inicial">
                        <input type="date" name="vigencia-inicial">
                    </div>

                    <div class="vigencia-final">
                        <input type="date" name="vigencia-final">
                    </div>
                </form>
            </div>
        </div>

-->
        </div>
    <?php
    }
    ?>
</body>

</html>