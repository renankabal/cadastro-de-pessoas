<?php
    
    echo '<body bgcolor="silver">';
    
    
    
    require_once("menu.php");
    echo '<center>';
    session_start();
    setlocale(LC_ALL, "pt_BR", "ptb");
    
    
    if(!isset($_SESSION["cadastros"])){
        $_SESSION["cadastros"] = array();
    
    }
    $saldo = $_REQUEST["saldo"];
    $nascimento = $_REQUEST["nascimento"];
    $data = $_REQUEST["data"];
    $nome = $_REQUEST["nome"];
    $fone = $_REQUEST["fone"];
    $cpf = $_REQUEST["cpf"];
    $email = $_REQUEST["email"];
    $site = $_REQUEST["site"];
    $sexo = $_REQUEST["sexo"];
    $sexo = null;
    if(isset($_REQUEST["sexo"])){
        $sexo = $_REQUEST["sexo"];
    }
    else{
        echo "Selecione uma opção no sexo!";
        $camposValidos = false;
    }
    $estado = $_REQUEST["estado"];
    $comentario = $_REQUEST["comentario"];
    
    $aceito = false;
    if(isset($_REQUEST["aceito"])){
        
        $aceito = true;   
    }
    
    $camposValidos = true;
    
    if($sexo == null){
        echo "Por favor, selecione um sexo <br>";
        $camposValidos = false;
    }
    
    if($estado == -1){
        echo "Por favor, selecione um estado <br>";
        $camposValidos = false;
    }
    
    
    $nome = trim($nome);
    if(empty($nome)){
        echo "O campo nome é obrigatório!<br>";
        $camposValidos = false;
    }
    if(!ctype_alpha($nome)){
        echo "Digite somente letras em nome<br>";
        $camposValidos = false;
    }
    
    $fone = trim($fone);
    if(empty($fone)){
        echo "O campo TELEFONE é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($fone) !=9 and strlen($fone) !=8 ){
        echo "Tamanho do TELEFONE é invalido!!<br>";
        $camposValidos = false;
    }
    if (!preg_match("/^\d{4}-\d{4}$/", $fone)){
        echo "Formato inválido para o campo telefone<br>";
         $camposValidos = false;
    }
    $cpf = trim($cpf);
    if(empty($cpf)){
        echo "O campo CPF é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($cpf) !=14 and strlen($cpf) !=11){
        echo "Tamanho do CPF é invalido!!<br>";
        $camposValidos = false;
    }
    if (!preg_match("/^\d{3}\\.\d{3}\\.\d{3}\\-\d{2}$/", $cpf)){
        echo "Formato inválido para o campo cpf<br>";
            $camposValidos = false;
    }
    $email = trim($email);
    if(empty($email)){
        echo "O campo email é obrigatório!<br>";
        $camposValidos = false;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email inválido<br>";
        $camposValidos = false;
    }
    
    $site = trim($site);
    if(empty($site)){
        echo "O campo site é obrigatório!<br>";
        $camposValidos = false;
    }
    if(!filter_var($site, FILTER_VALIDATE_URL)){
        echo "Site inválido<br>";
        $camposValidos = false;
    }
    
    $comentario = trim($comentario);
    if(empty($comentario)){
        echo "O campo é obrigatório,comente!<br>";
        $camposValidos = false;
    }
    if(!ctype_alnum($comentario)){
        echo "Digite somente letras e numeros em comentario<br>";
        $camposValidos = false;
    }
    $data = trim($data);
    if(empty($data)){
        echo "O campo Data de nascimento é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($data) !==10){
        echo "Tamanho da DATA DE NASCIMENTO é invalido!!<br>";
        $camposValidos = false;
    }
    if (!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/", $data)){
        echo "Formato inválido para o campo data de nascimento<br>";
        $camposValidos = false;
    }
    else{
            $pedacos = explode('/', $data);
            $dia = $pedacos[0];
            $mes = $pedacos[1];
            $ano = $pedacos[2];    

            if(!checkdate($mes, $dia, $ano)){
                echo "Data inválida";
                $camposValidos = false;                           
            }
            //Quando entra aqui, a data já foi validada corretamente, agora somente comparações
            else{
                //no PHP datas brasileiras tem de ser convertidas para o formato YYYYMMDD
                $dataYmd = $ano.$mes.$dia;
                $dataAtual = date('Ymd');

                if($dataAtual > $dataYmd){
                    echo "Já passou<br>";
                }
                else if($dataAtual < $dataYmd){
                    echo "É no futuro<br>" ;
                }
                else{
                    echo "É hoje<br>";            
                }
            }
        }
    $nascimento = trim($nascimento);
    if(empty($nascimento)){
        echo "O campo Hoje é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($nascimento) !==10){
        echo "Tamanho DATA DE HOJE é invalido!!<br>";
        $camposValidos = false;
    }
    if (!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/", $nascimento)){
        echo "Formato inválido para o campo data de hoje<br>";
        $camposValidos = false;
    }
    
    $saldo = trim($saldo);
    if(empty($saldo)){
        echo "O campo saldo é obrigatório!<br>";
        $camposValidos = false;
    }
    if (preg_match("/^R\\$\s(\d)+\\,(\d){2}$/", $saldo)){
        echo "Formato inválido para o campo data de nascimento<br>";
        $camposValidos = false;
    }

    if($camposValidos){
        $pessoa = array();
        $pessoa["nome"] = $nome;
        $pessoa["sexo"] = $sexo;
        $pessoa["aceito"] = $aceito;
        $pessoa["estado"] = $estado;
        $pessoa["comentario"] = $comentario;
        $pessoa["cpf"] = $cpf;
        $pessoa["fone"] = $fone;
        $pessoa["email"] = $email;
        $pessoa["site"] = $site;
        $pessoa["data"] = $data;
        $pessoa["nascimento"] = $nascimento;
        $pessoa["saldo"] = $saldo;

    
    
    
    array_push($_SESSION["cadastros"], $pessoa);
    
    
    
        echo "Cadastro bem sucedido!!<br>";
    
   }
   else{
   echo "<input type='button' onclick='history.go (-1)' value='voltar' />";
    }
            echo '</center>';

?>
