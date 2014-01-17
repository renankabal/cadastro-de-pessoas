<?php

    echo '<body bgcolor="silver">';




    require_once("menu.php");

    session_start();
    
    
    if(!isset($_SESSION["cadastros"])){
        echo "Não existem cadastros para remover.";
    }
    else{
        $id = $_REQUEST["id"];
        
        
        $cadastros =& $_SESSION["cadastros"];
        $cadastros[$id] = null;    
    
        echo "Remoção Bem Sucedida!!";
    
    
    }
    
    
    
    
        
    
    





?>
