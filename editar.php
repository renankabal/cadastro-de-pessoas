<?php
    echo '<body bgcolor="silver">';


    require_once("menu.php");

    session_start();
    setlocale(LC_ALL, "pt_BR", "ptb");
    
    
    if(!isset($_SESSION["cadastros"])){
        echo "Não existem cadastros para editar.";
    }
    else{
        $id = $_REQUEST["id"];
        $nome = $_REQUEST["nome"];
        $cpf = $_REQUEST["cpf"];
        $fone = $_REQUEST["fone"];
        $email = $_REQUEST["email"];
        $site = $_REQUEST["site"];
        $estado = $_REQUEST["estado"];
        $comentario = $_REQUEST["comentario"];
        $sexo = $_REQUEST["sexo"];
        $data = $_REQUEST["data"];
        $hoje = $_REQUEST["hoje"];
        $saldo = $_REQUEST["saldo"];
    }    
        
        
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
    $hoje = trim($hoje);
    if(empty($hoje)){
        echo "O campo Hoje é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($hoje) !==10){
        echo "Tamanho DATA DE HOJE é invalido!!<br>";
        $camposValidos = false;
    }
    if (!preg_match("/^\d{2}\\/\d{2}\\/\d{4}$/", $hoje)){
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
        $pessoa["hoje"] = $hoje;
        $pessoa["saldo"] = $saldo;
        
        
        $cadastros =& $_SESSION["cadastros"];
        $cadastros[$id] = $pessoa;    
        echo "Edição Bem Sucedida!!";
    
    
    }
    else{
    echo "<input type='button' onclick='history.go (-1)' value='voltar' />";
    }
    
?>
