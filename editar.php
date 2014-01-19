<?php
    echo '<body bgcolor="silver">';


    require_once("menu.php");

    session_start();
    
    
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
        $observacao = $_REQUEST["observacao"];
        $sexo = $_REQUEST["sexo"];
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
    
    $fone = trim($fone);
    if(empty($fone)){
        echo "O campo TELEFONE é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($fone) !==9){
        echo "Tamanho do TELEFONE é invalido!!<br>";
        $camposValidados = false;
    }
    $cpf = trim($cpf);
    if(empty($cpf)){
        echo "O campo CPF é obrigatório!<br>";
        $camposValidos = false;
    }
    else if(strlen($cpf) !==14){
        echo "Tamanho do CPF é invalido!!<br>";
        $camposValidos = false;
    }
    $email = trim($email);
    if(empty($email)){
        echo "O campo email é obrigatório!<br>";
        $camposValidos = false;
    }
    
    $site = trim($site);
    if(empty($site)){
        echo "O campo site é obrigatório!<br>";
        $camposValidos = false;
    }
    
    $observacao = trim($observacao);
    if(empty($comentario)){
        echo "O campo é obrigatório,comente!<br>";
        $camposValidos = false;
    }
    
    if($camposValidos){
        $pessoa = array();
        $pessoa["nome"] = $nome;
        $pessoa["cpf"] = $cpf;
        $pessoa["fone"] = $fone;
        $pessoa["site"] = $site;
        $pessoa["email"] = $email;
        $pessoa["sexo"] = $sexo;
        $pessoa["aceito"] = $aceito;
        $pessoa["estado"] = $estado;
        $pessoa["observacao"] = $observacao;
        
        
        $cadastros =& $_SESSION["cadastros"];
        $cadastros[$id] = $pessoa;    
        echo "Edição Bem Sucedida!!";
    
    
    }
    else{
    echo "<input type='button' onclick='history.go (-1)' value='voltar' />";
    }
    
?>
