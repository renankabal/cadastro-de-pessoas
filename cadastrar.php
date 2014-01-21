<?php
    
    echo '<body bgcolor="silver">';
    
    
    
    require_once("menu.php");
    echo '<center>';
    session_start();
    
    
    if(!isset($_SESSION["cadastros"])){
        $_SESSION["cadastros"] = array();
        

    }
    
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
    if(!ctype_digit($fone)){
        echo "Digite somente numeros em Fone<br>";
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
        echo "Site inválido<br><br>";
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
    
    
    
    array_push($_SESSION["cadastros"], $pessoa);
    
    
    
        echo "Cadastro bem sucedido!!<br>";
    
   }
   else{
   echo "<input type='button' onclick='history.go (-1)' value='voltar' />";
    }
            echo '</center>';

?>
