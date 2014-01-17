<style>
   .f{
      color:pink;
   }
   .m{
      color:blue;
   }
</style>
<?php
   
   echo '<body bgcolor="orange">';
  
    require_once("menu.php");
    
    session_start();
    
    
    if(isset($_SESSION["cadastros"])){
        
        $cadastros = $_SESSION["cadastros"];
        
        echo "<dl>";
        foreach($cadastros as $pessoa){
            $sexo = $pessoa["sexo"];
            $aceito = $pessoa["aceito"];
            
        if($pessoa != null){
            echo "<dt class='$sexo'>Nome :" . $pessoa["nome"] . "</dt>";
            echo '<br>';
            echo "<dd>Sexo : "  . $pessoa["sexo"]  . "</dd>";
            echo '<br>';
            echo "<dd>Estado: " . $pessoa["estado"] . "</dd>";
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
}
    
?>
