<?php
require "index.php";

class User {

    public $nome;
    public $cpf;
    public $email;
    //public $image;
    //public $defeito;
    

    public function __construct($nome, $cpf, $email) {

        $this->nome = $_POST['nome'];
        $this->cpf = $_POST['cpf'];
        $this->email = $_POST['email'];
        $this->image = $_FILES['image']['name'];        
    }

    function validaCPF($cpf) {
 
        // Extrai somente os números
        $numeros =$_POST['cpf'];
        $cpf = preg_replace( '/[^0-9]/is', '', $this->cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            echo "<h1 align='center'>CPF IRREGULAR</h1>";
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        else if (preg_match('/(\d)\1{10}/', $cpf)) {
            echo "<h1 align='center'>CPF IRREGULAR</h1>";
        }
        else {

            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    echo "<h1 align='center'>CPF IRREGULAR</h1>";
                    break;
                } else {
                    echo "<h1 align='center'>CPF REGULAR</h1>";
                    break;
                }
            }
        }
        
    
    }
    public function obterimagem(){
        if(isset($_FILES['image']))
        {
            $ext = strtolower(substr($_FILES['image']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = './imagens/'; //Diretório para uploads
            move_uploaded_file($_FILES['image']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            
        }
    }

    public function apresentacao() {
      
            echo("<div align='center'><h1>Cadastro</h1><p>Nome Completo: $this->nome</p><p>CPF: $this->cpf.<p/><p>Email: $this->email</p></div>");

        
    }

    public function mostrarimagem($new_name){
        
            echo 
             '<div align="center">
              <img src="./imagens/' . $new_name . '"width="200"> 
              <br><br>
              <a href="index.php">
              <button>Novo Cadastro
              </a></div>';
        
    }


    }

$pessoa1 = new User($nome, $cpf, $email);
$pessoa1->obterimagem();
$pessoa1->apresentacao();
$pessoa1->validaCPF($cpf);
$pessoa1->mostrarimagem($new_name);

?>