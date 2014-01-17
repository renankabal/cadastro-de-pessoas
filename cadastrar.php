<?php
    echo '<body bgcolor="silver">';
    
    require_once("menu.php");
    session_start();
    
    if(!isset($_SESSION["cadastros"])){
        $_SESSION["cadastros"] = array();
    }
    
    $nome = $_REQUEST["nome"];
    $estado = $_REQUEST["estado"];
    $observacao = $_REQUEST["observacao"]; 
    $sexo = $_REQUEST["sexo"];
    $fone = $_REQUEST["fone"];
    $cpf = $_REQUEST["cpf"];
    
    $sexo = null;
    if(isset($_REQUEST["sexo"])){
        $sexo = $_REQUEST["sexo"];
    }

    $aceito = false;
    if(isset($_REQUEST["aceito"])){
        $aceito = true;
    }
    
    $camposValidados = true;
        
    if($sexo == null){
        echo "Por favor deixe de preguiça digite o sexo!!!<br>";
        $camposValidados = false;
    }
    
    if($estado == -1){
        echo "Por favor deixe de preguiça digite o seu estado!!!<br>";
        $camposValidados = false;
    }
    $nome = trim($nome);
    if(empty($nome)){
        echo "Por favor deixe de preguiça digite o nome!!!<br>";
        $camposValidados = false;
    }
    else if(strlen($fone) !==8){
        echo "Tamanho invalido!!<br>";
        $camposValidados = false;
    }
    $cpf = trim($cpf);
    if(empty($cpf)){
        echo "Por favor deixe de preguiça digite o nome!!!<br>";
        $camposValidados = false;
    }
    else if(strlen($cpf) !==11){
        echo "Cpf invalido!!<br>";
        $camposValidados = false;
    }
    
    $observacao = trim($observacao);
    if(empty($observacao)){
        echo "O campo observação é obrigatorio!!!<br>";
        $camposValidados = false;
    }

    
    if($camposValidados){
        $pessoa = array();
        $pessoa["nome"] = $nome;
        $pessoa["sexo"] = $sexo;
        $pessoa["aceito"] = $aceito;
        $pessoa["estado"] = $estado;
        $pessoa["observacao"] = $observacao;
        $pessoa["cpf"] = $cpf;
        $pessoa["fone"] = $fone;
        
        array_push($_SESSION["cadastros"], $pessoa);
    
        echo "Cadastro bem sucedido!!";
    }
    else{
        echo '<br>';    
        echo "<input type='button' onclick='history.go (-1)' value='voltar' />";
    }
?>
