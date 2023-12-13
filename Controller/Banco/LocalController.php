<?php
require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");
require_once("/xampp/htdocs/Contas/Model/LocalModel.php");


$nome = $_POST['input-nome-local'];
$cep = $_POST['input-cep-local'];
$rua = $_POST['input-rua-local'];
$bairro = $_POST['input-bairro-local'];
$numero = $_POST['input-numero-local'];
$complemento = $_POST['input-complemento-local'];
$referencia = $_POST['input-referencia-local'];
$situacao = $_POST['input-situacao-local'];
$vigenciaInicial = $_POST['input-vigencia-inicial'];
$vigenciaFinal = $_POST['input-vigencia-final'];
$instrumento = "";

if($situacao === 'Alugado'){
    $instrumento = 'Contrato';
}
if($situacao === 'Cedido'){
    $instrumento = 'Convenio';
} 

?>
    <script>
        alert('<?= $instrumento ?>');
    </script>
<?php

$newLocal = new LocalModel($nome, $cep, $rua, $bairro, $numero, $complemento, $referencia, $situacao, $instrumento, $vigenciaInicial, $vigenciaFinal);

$newLocal->insertLocal($conn, $nome, $cep, $rua, $bairro, $numero, $complemento, $referencia, $situacao, $instrumento, $vigenciaInicial, $vigenciaFinal);

?>