<?php
require_once("/xampp/htdocs/Contas/Controller/Connection/Conexao.php");
session_start();

class UsuarioModel
{

    public $nome;
    public $sobrenome;
    public $user;
    public $password;

    
    public function __construct(){}

    // Construtor com parâmetros
    public function __constructWithParameters($nome, $sobrenome, $user, $password){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->user = $user; 
        $this->password = $password;
    }
    // getter e setter

    public function getNome(){ return $this->nome; }

    public function setNome($nome){ $this->nome = $nome; }

    public function getSobrenome(){ return $this->sobrenome; }

    public function setSobrenome($sobrenome){ $this->sobrenome = $sobrenome; }

    public function getUser(){ return $this->user; }

    public function setUser($user){ $this->user = $user; }

    public function getPassword(){ return $this->password; }

    public function setPassword($password){ $this->password = $password; }

    // inserir um novo usuário no banco de dados
    public function insertUser($conn, $nome, $sobrenome, $user, $password)
    {
        
            $stmt = $conn->prepare("INSERT INTO Usuario (Nome, Sobrenome, User, Password) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $nome, $sobrenome, $user, $password);
            if($stmt->execute()){
                $_SESSION['successConta'] = true; // modal de sucesso
                header("location: /Contas/View/home.php"); // redireciona para a página inicial
            }else{
                $_SESSION['errorConta'] = true;
            }
    }
    public function selectAllUsers($conn)
    {
        try {
            $stmt = $conn->prepare("SELECT * FROM Usuario");
            $stmt->execute();

            $result = $stmt->get_result();

            $lista = array();
            while($item = $result->fetch_assoc()){
                $lista[] = $item;
            }
            return $lista;

        } catch (Exception $ex) {
            echo $ex;
        }
    }

    // select um usuário específico 
    public function selectUser($conn, $idUsuario)
    {
        try {
            $stmt = $conn->prepare("SELECT * FROM Usuario where idUsuario = '$idUsuario'");

            $stmt->execute($_GET['idUsuario']);

            foreach ($stmt as $row) {
                echo $row['Nome'];
                echo $row['Sobrenome'];
                echo $row['Usuario'];
            }
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    // atualizar as informações de um usuário específico 
    public function updateUser($conn, $idUsuario)
    {
        try {
            $nome = $_POST['input-nome-usuario'];
            $sobrenome = $_POST['input-sobrenome-usuario'];
            $user = $_POST['input-username-usuario'];
            $password = $_POST['input-password-usuario'];

            $stmt = $conn->prepare("UPDATE Usuario SET nome = ?, sobrenome = ?, user = ?, password = ? WHERE idUsuario = $idUsuario");

            $stmt->bind_param("ssss", $nome, $sobrenome, $user, $password);

            $stmt->execute() ? $_SESSION['successConta'] = true : $_SESSION['errorConta'] = true;
            header("location: /Contas/View/home.php"); // redireciona para a página inicial

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    // excluir um usuário
    public function deleteUser($conn, $idUsuario){
        try{
            $stmt = $conn->prepare("DELETE FROM Usuario WHERE idUsuario = $idUsuario");
            $stmt->execute() ? $_SESSION['successConta'] = true : $_SESSION['errorConta'] = true;
            header("location: /Contas/View/home.php"); // redireciona para a página inicial

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    // update user

    // delete user
}
