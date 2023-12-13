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


        public function __construct(){}
        // Construtor da classe
        public function __constructWithParameters($nome, $cep, $rua, $bairro, $numero, $complemento, $pontoReferencia, $situacao, $instrumento, $vigenciaInicial, $vigenciaFinal)
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

        public function getNome(){return $this->nome;}

        public function setNome($nome){$this->nome = $nome;}

        public function getCep(){return $this->cep;}

        public function setCep($cep){$this->cep = $cep;}

        public function getRua(){return $this->rua;}

        public function setRua($rua){$this->rua = $rua;}

        public function getBairro(){return $this->bairro;}

        public function setBairro($bairro){$this->bairro = $bairro;}

        public function getNumero(){return $this->numero;}

        public function setNumero($numero){$this->numero = $numero;}

        public function getComplemento(){return $this->complemento;}

        public function setComplemento($complemento){$this->complemento = $complemento;}

        public function getPontoReferencia(){return $this->pontoReferencia;}

        public function setPontoReferencia($pontoReferencia){$this->pontoReferencia = $pontoReferencia;}

        public function getSituacao(){return $this->situacao;}

        public function setSituacao($situacao){$this->situacao = $situacao;}

        public function getInstrumento(){return $this->instrumento;}

        public function setInstrumento($instrumento){$this->instrumento = $instrumento;}

        public function getVigenciaInicial(){return $this->vigenciaInicial;}

        public function setVigenciaInicial($vigenciaInicial){$this->vigenciaInicial = $vigenciaInicial;}

        public function getVigenciaFinal(){return $this->vigenciaFinal;}

        public function setVigenciaFinal($vigenciaFinal){$this->vigenciaFinal = $vigenciaFinal;}


        public function insertLocal($conn, $nome, $cep, $rua, $bairro, $numero, $complemento, $pontoReferencia,$situacao, $instrumento, $vigenciaInicial, $vigenciaFinal){
            // comando SQL
            try{

                $stmt = $conn->prepare("INSERT INTO Local (nome, cep, rua, bairro, numero, complemento, pontoReferencia, situacao, instrumento, vigenciaInicial, vigenciaFinal) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param("sssssssssss", $nome, $cep, $rua, $bairro, $numero, $complemento, $pontoReferencia, $situacao, $instrumento, $vigenciaInicial, $vigenciaFinal);
                $stmt->execute();

                $_SESSION['successLocal'] = true; // modal de sucesso
                header("location: /Contas/View/home.php"); // redireciona para a página inicial

            }catch(Exception $ex){
                echo $ex;
            }


        }
    }
