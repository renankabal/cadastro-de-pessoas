<style>
    .masculino{
      color:yellow;
      font-size:30px;
     
    }
    .feminino{
      color: purple;
    }
 
 
 
 
 
</style>




<?php
   
   echo '<body bgcolor="orange">';
  
    require_once("menu.php");
    
    session_start();
    
     echo '<center>';
    
    if(isset($_SESSION["cadastros"])){
        
        $cadastros = $_SESSION["cadastros"];
        
        echo "<dl>";
        foreach($cadastros as $pessoa){
            $sexo = $pessoa["sexo"];
            $aceito = $pessoa["aceito"];
        echo '<br>';    
        if($pessoa != null){
            
            echo "<dt class='$sexo'>" . $pessoa["nome"] . "</dt><br>";
            echo "<dd>Sexo : "  . $sexo  . "</dd>";
            echo "<dd>Hoje : " . $pessoa["hoje"] . "</dd><br>";
            echo "<dd>Nascimento : " . $pessoa["data"] . "</dd><br>";           
            echo "<dd>Estado: " . $pessoa["estado"] . "</dd><br>";
            echo "<dd>Comentario: " . $pessoa["comentario"] . "</dd><br>";
            echo "<dd>Fone : " . $pessoa["fone"] . "</dd><br>";
            echo "<dd>CPF : " . $pessoa["cpf"] . "</dd><br>";
            echo "<dd>Saldo R$ : " . $pessoa["saldo"] . "</dd><br>";
            echo "<dd>Site Preferido : " . $pessoa["site"] . "</dd><br>";
            echo "<dd>Emaill : " . $pessoa["email"] . "</dd><br>";
            echo "<dd>Aceita o contrato: ";
            if($aceito){
                echo "sim";
            }
            else{
                echo "Não";
                echo '<br>';
            }
            echo "</dd>";
        }
            
    }
    echo "</dl>";
}
else{
    echo "Não existem pessoas cadastradas";
}
     
     echo '</center>';
     require_once("menu.php");
?>
