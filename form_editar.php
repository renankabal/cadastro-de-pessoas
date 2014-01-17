<html>
    <head>
        <title>Cadastro</title>
    </head>
    
    <body bgcolor ="green">
<?php

    require_once("menu.php");

?>       <center> 
        <form action="editar.php" method="post">
            
            <font color="white"><label>Digite Codigo para editar :</label><br>
            
            <label>Nº do Codigo</label><input type="text" name="id" />
            
            <br><br>
                
            <label>Digite o novo nome da pessoa :</label>
            <br></font>
                
            <?php require_once("campos_pessoa.php"); ?>                              
            <br>
            <input type="submit" value="Editar" />
        </form></center>     
    </body>
  
</html>    
    
    
<?php
   
    require_once("menu.php");
    
    session_start();
    
    
    if(isset($_SESSION["cadastros"])){
        
        $cadastros = $_SESSION["cadastros"];
        
        foreach($cadastros as $id => $pessoa){
            if($pessoa != null){
                echo "[$id] => " . $pessoa["nome"] . "<br>";
            }
            
        }
        
        
        
        
        
    }
    
    else{
        echo '<br>';
        echo '<center>';
        echo "Não existem pessoas cadastradas";
        echo '</center>';
    }
    





    
?>
