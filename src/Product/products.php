<?php
include_once "../src/bd.php";

function getProducts(){

    $bd = connect();
    
    $sql = "SELECT p.*,
                i.nome_arquivo
         FROM produto p
         INNER JOIN imagem i
         ON p.codigo_prod  = i.codigo_prod ";
    
    $result = $bd->query($sql);
    
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
             return "<div class='card'>
             <div class='cover'>
                 <img  src='../covers/".$data['nome_arquivo']."' alt=''>
             </div>
            <h3 class='gameTitle'>".$data["nome_pro"]."</h3>
             <div class='info'>
                 <div class='price-info'>
                     <div>
                         <h3 class='price'>Valor</h3>
                         <h3 class='price'>".$data["valor_unitario"]."</h3>
                     </div>
                     <label for=''>
                         <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                     </label>
                 </div>
             </div>
         </div>";   
        }
}
 function searchProduct($cod){
    $bd = connect();
    $sql = "SELECT p.*,
            i.nome_arquivo
            FROM produto p
            INNER JOIN imagem i
                ON p.codigo_prod  = i.codigo_prod
            WHERE p.codigo_prod = $cod";

    $result = $bd->query($sql);
    $data = $result->fetch(PDO::FETCH_ASSOC);
    
    echo "<div class='card'>
        <div class='cover'>
            <img  src='../covers/".$data['nome_arquivo']."' alt=''>
        </div>
        <h3 class='gameTitle'>".$data["nome_pro"]."</h3>
        <div class='info'>
            <div class='price-info'>
                <div>
                    <h3 class='price'>Valor</h3>
                    <h3 class='price'>".$data["valor_unitario"]."</h3>
                </div>
                <label for=''>
                    <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                </label>
            </div>
            </div>
        </div>";   
        
}




?>