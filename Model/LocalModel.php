<?php
require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");
session_start();


class LocalModel
{

    public String $nome;
    public String $cep;
    public String $rua;
    public String $bairro;
    public String $numero;
    public String $complemento;
    public String $pontoReferencia;
    public String $situacao;
    public String $instrumento;
    public String $vigenciaInicial;
    public String $vigenciaFinal;


    // Construtor da classe
    public function __construct($nome, $cep, $rua, $bairro, $numero, $complemento, $pontoReferencia, $situacao, 
    $instrumento, $vigenciaInicial, $vigenciaFinal)
    {
        $this->nome = $nome;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->pontoReferencia = $pontoReferencia;
        $this->situacao = $situacao;
        $this->instrumento = $instrumento;
        $this->vigenciaInicial = $vigenciaInicial;
        $this->vigenciaFinal = $vigenciaFinal;
    }

    // getter e setter

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    


}
