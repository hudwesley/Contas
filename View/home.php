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

    if (!isset($_SESSION['id'])) {
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
                                <li><a href="#" onclick="abrirModal('modalLocal')"><i class="fa fa-plus"></i>Novo local</a></li>
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
                                <li><a href="#" onclick="abrirModal('modalCemig')"><i class="fa fa-line-chart"></i> <span>Nova fatura</span></a></li>
                                <li><a href="#"><i class="fa fa-plus"></i>Novo ponto</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar</a></li>
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
                                <li><a href="#" onclick="abrirModal('modalCopasa')"><i class="fa fa-line-chart"></i> <span>Nova fatura</span></a></li>
                                <li><a href="#"><i class="fa fa-plus"></i>Novo ponto</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar</a></li>
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
                                <li><a href="#" onclick="abrirModal('modalImpressora')"><i class="fa fa-line-chart"></i> <span>Nova fatura</span></a></li>
                                <li><a href="#"><i class="fa fa-plus"></i>Novo ponto</a></li>
                                <li><a href="#"><i class="fa fa-edit"></i>Editar</a></li>
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
                                <li><a href="#" onclick="abrirModal('modalUsuario')"><i class="fa fa-plus"></i>Cadastrar</a></li>
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


            <!-- formulários de cadastro do local -->
            <div class="div-formulario-cadastro" style="display: none;" id="modalLocal">
                <div class="botao-fechar-modal">
                    <button onclick="abrirModal('modalLocal')"><i class="fa fa-close"></i></button>
                </div>
                <form action="/Contas/Controller/Banco/LocalController.php" method="post" class="formulario-cadastro">
                    <div class="titulo">
                        <h2>Novo Local</h2>
                    </div>
                    <div class="input-group">
                        <div class="input-nome-local">
                            <input type="text" name="input-nome-local" placeholder="Nome do local" required>
                        </div>

                        <div class="input-cep-local">
                            <input type="text" name="input-cep-local" placeholder="CEP" id="cep" maxlength="8" required onblur="pesquisacep(this.value);">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-rua-local">
                            <input type="text" name="input-rua-local" placeholder="Rua" id="logradouro" disabled>
                        </div>

                        <div class="input-bairro-local">
                            <input type="text" name="input-bairro-local" placeholder="Bairro" id="bairro" disabled>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-numero-local">
                            <input type="text" name="input-numero-local" placeholder="Nº" required>
                        </div>

                        <div class="input-complemento-local">
                            <input type="text" name="input-complemento-local" placeholder="Complemento">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-referencia-local">
                            <input type="text" name="input-referencia-local" placeholder="Ponto de referência" required>
                        </div>

                        <div class="input-situacao-local">
                            <select name="input-situacao-local" id="input-situacao-local" required onchange="toggleVigenciaInputs()">
                                <option value="Default" selected disabled>Selecione a situação</option>
                                <option value="Proprio">Proprio</option>
                                <option value="Alugado">Alugado</option>
                                <option value="Cedido">Cedido</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group" id="div-vigencia-inputs" style="display: none;">
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data inicial</label>
                            <input type="date" name="input-vigencia-inicial">
                        </div>
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data final</label>
                            <input type="date" name="input-vigencia-final">
                        </div>
                    </div>

                    <div class="button-enviar">
                        <button>CRIAR</button>
                    </div>
                </form>
            </div>

            <!-- Formulário de cadastro de nova fatura - CEMIG -->
            <div class="div-formulario-cadastro" style="display: none;" id="modalCemig">
                <div class="botao-fechar-modal">
                    <button onclick="abrirModal('modalCemig')"><i class="fa fa-close"></i></button>
                </div>
                <form action="" class="formulario-cadastro">
                    <div class="titulo">
                        <h2>Nova Fatura - Cemig</h2>
                    </div>
                    <div class="input-group">
                        <div class="input-nome-local">
                            <input type="text" name="input-nome-local" placeholder="Nome do local" required>
                        </div>

                        <div class="input-cep-local">
                            <input type="text" name="input-cep-local" placeholder="CEP" id="cep" maxlength="8" required oninput="consultarCEP()">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-rua-local">
                            <input type="text" name="input-rua-local" placeholder="Rua" id="logradouro" disabled>
                        </div>

                        <div class="input-bairro-local">
                            <input type="text" name="input-bairro-local" placeholder="Bairro" id="bairro" disabled>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-numero-local">
                            <input type="text" name="input-numero-local" placeholder="Nº" required>
                        </div>

                        <div class="input-complemento-local">
                            <input type="text" name="input-complemento-local" placeholder="Complemento">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-referencia-local">
                            <input type="text" name="input-referencia-local" placeholder="Ponto de referência" required>
                        </div>

                        <div class="input-situacao-local">
                            <select name="input-situacao-local" required>
                                <option value="Default" selected disabled>Selecione a situação</option>
                                <option value="Proprio">Proprio</option>
                                <option value="Alugado">Alugado</option>
                                <option value="Cedido">Cedido</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data inicial</label>
                            <input type="date" name="input-vigencia-inicial">
                        </div>
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data final</label>
                            <input type="date" name="input-vigencia-final">
                        </div>
                    </div>

                    <div class="button-enviar">
                        <button>CRIAR</button>
                    </div>
                </form>
            </div>


            <!-- Formulário de cadastro de nova fatura - COPASA -->
            <div class="div-formulario-cadastro" style="display: none;" id="modalCopasa">
                <div class="botao-fechar-modal">
                    <button onclick="abrirModal('modalCopasa')"><i class="fa fa-close"></i></button>
                </div>
                <form action="" class="formulario-cadastro">
                    <div class="titulo">
                        <h2>Nova Fatura - Copasa</h2>
                    </div>
                    <div class="input-group">
                        <div class="input-nome-local">
                            <input type="text" name="input-nome-local" placeholder="Nome do local" required>
                        </div>

                        <div class="input-cep-local">
                            <input type="text" name="input-cep-local" placeholder="CEP" id="cep" maxlength="8" required oninput="consultarCEP()">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-rua-local">
                            <input type="text" name="input-rua-local" placeholder="Rua" id="logradouro" disabled>
                        </div>

                        <div class="input-bairro-local">
                            <input type="text" name="input-bairro-local" placeholder="Bairro" id="bairro" disabled>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-numero-local">
                            <input type="text" name="input-numero-local" placeholder="Nº" required>
                        </div>

                        <div class="input-complemento-local">
                            <input type="text" name="input-complemento-local" placeholder="Complemento">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-referencia-local">
                            <input type="text" name="input-referencia-local" placeholder="Ponto de referência" required>
                        </div>

                        <div class="input-situacao-local">
                            <select name="input-situacao-local" required>
                                <option value="Default" selected disabled>Selecione a situação</option>
                                <option value="Proprio">Proprio</option>
                                <option value="Alugado">Alugado</option>
                                <option value="Cedido">Cedido</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data inicial</label>
                            <input type="date" name="input-vigencia-inicial">
                        </div>
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data final</label>
                            <input type="date" name="input-vigencia-final">
                        </div>
                    </div>

                    <div class="button-enviar">
                        <button>CRIAR</button>
                    </div>
                </form>
            </div>

            <!-- Formulário de cadastro de nova fatura - IMPRESSORA  -->
            <div class="div-formulario-cadastro" style="display: none;" id="modalImpressora">
                <div class="botao-fechar-modal">
                    <button onclick="abrirModal('modalImpressora')"><i class="fa fa-close"></i></button>
                </div>
                <form action="" class="formulario-cadastro">
                    <div class="titulo">
                        <h2>Nova Fatura - Impressora</h2>
                    </div>
                    <div class="input-group">
                        <div class="input-nome-local">
                            <input type="text" name="input-nome-local" placeholder="Nome do local" required>
                        </div>

                        <div class="input-cep-local">
                            <input type="text" name="input-cep-local" placeholder="CEP" id="cep" maxlength="8" required oninput="consultarCEP()">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-rua-local">
                            <input type="text" name="input-rua-local" placeholder="Rua" id="logradouro" disabled>
                        </div>

                        <div class="input-bairro-local">
                            <input type="text" name="input-bairro-local" placeholder="Bairro" id="bairro" disabled>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-numero-local">
                            <input type="text" name="input-numero-local" placeholder="Nº" required>
                        </div>

                        <div class="input-complemento-local">
                            <input type="text" name="input-complemento-local" placeholder="Complemento">
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-referencia-local">
                            <input type="text" name="input-referencia-local" placeholder="Ponto de referência" required>
                        </div>

                        <div class="input-situacao-local">
                            <select name="input-situacao-local" required>
                                <option value="Default" selected disabled>Selecione a situação</option>
                                <option value="Proprio">Proprio</option>
                                <option value="Alugado">Alugado</option>
                                <option value="Cedido">Cedido</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data inicial</label>
                            <input type="date" name="input-vigencia-inicial">
                        </div>
                        <div class="input-vigencia-local">
                            <label for="vigencia">Data final</label>
                            <input type="date" name="input-vigencia-final">
                        </div>
                    </div>

                    <div class="button-enviar">
                        <button>CRIAR</button>
                    </div>
                </form>
            </div>

            <!-- Formulário de cadastro de nova fatura - IMPRESSORA  -->
            <div class="div-formulario-cadastro" style="display: none;" id="modalUsuario">
                <div class="botao-fechar-modal">
                    <button onclick="abrirModal('modalUsuario')"><i class="fa fa-close"></i></button>
                </div>
                <form action="/Contas/Controller/Banco/UsuarioController.php" method="POST" class="formulario-cadastro">
                    <div class="titulo">
                        <h2>Novo Usuário</h2>
                    </div>
                    <div class="input-group">
                        <div class="input-nome-usuario">
                            <input type="text" name="input-nome-usuario" placeholder="Nome" required>
                        </div>

                        <div class="input-cep-local">
                            <input type="text" name="input-sobrenome-usuario" placeholder="Sobrenome" required>
                        </div>
                    </div>

                    <div class="input-group">
                        <div class="input-rua-local">
                            <input type="text" name="input-username-usuario" placeholder="User" required>
                        </div>

                        <div class="input-bairro-local">
                            <input type="text" name="input-password-usuario" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="button-enviar">
                        <button>CRIAR</button>
                    </div>
                </form>
            </div>  
        </div>
    <?php
    }
    ?>
</body>

</html>