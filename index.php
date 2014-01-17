<style>
   .f{
      color:violet;
   }
   .m{
      color:red;
   }
</style>
<?php
   
   echo '<body bgcolor="lime">';
  
    require_once("menu.php");
    
    session_start();
    
    
    if(isset($_SESSION["cadastros"])){
        
        $cadastros = $_SESSION["cadastros"];
        
        echo "<dl>";
        foreach($cadastros as $pessoa){
            $sexo = $pessoa["sexo"];
            $aceito = $pessoa["aceito"];
            
        if($pessoa != null){
            echo '<fieldset>';
            echo "<dt class='$sexo'>Nome :" . $pessoa["nome"] . "</dt>";
            echo '<br>';
            echo "<dd>Sexo : "  . $pessoa["sexo"]  . "</dd>";
            echo '<br>';
            echo "<dd>Estado: " . $pessoa["estado"] . "</dd>";
            echo '<br>';
            echo "<dd>Fone : " . $pessoa["fone"] . "</dd>";
            echo '<br>';
            echo "<dd>CPF : " . $pessoa["cpf"] . "</dd>";
            echo '<br>';
            echo "<dd>Aceita o contrato: ";
            if($aceito){
                echo "sim";
            }
            else{
                echo "Não";
            }
            echo "</dd>";
            echo '<br>';
        }
            
    }
    echo "</dl>";
}
else{
    echo "Não existem pessoas cadastradas";
    echo '</fieldset>';
}
    
?>
