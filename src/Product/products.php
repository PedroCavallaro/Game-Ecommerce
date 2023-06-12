<?php
include_once "../src/bd.php";


function getImages(){
    $bd = connect();
    
    $sql = "SELECT i.*
            FROM imagem i
            GROUP BY codigo_prod";
    
    $result = $bd->query($sql);
    
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        echo "
        <a href='./productPage.php?username=ola&id=".$data["codigo_prod"]."'>
            <img class='i'  src='../covers/".$data["nome_arquivo"]."' alt=''>
        </a>";
    }

}
function getProducts($username){

    $bd = connect();
    
    $sql = "SELECT p.*,
                i.nome_arquivo
         FROM produto p
         INNER JOIN imagem i
         ON p.codigo_prod  = i.codigo_prod 
         GROUP BY codigo_prod";
    
    $result = $bd->query($sql);
    
        while($data = $result->fetch(PDO::FETCH_ASSOC)){
            if($data["quantidade"] != 0){

                echo "
                <div class='card'>
                <div class='cover'>
                    <img  src='../covers/".$data['nome_arquivo']."' alt=''>
                </div>
               <h3 class='gameTitle'>".$data["nome_pro"]."</h3>
               <img role='button' draggable='false' class='add' src='../assets/add-to-cart.png'>
                <div class='info'>
                    <div class='price-info'>
                        <div>
                            <h3 class='price'>Valor</h3>
                            <h3 class='price unity'>".$data["valor_unitario"]."</h3>
                        </div>
                        <label for=''>
                           <a href='./productPage.php?username=$username&id=".$data["codigo_prod"]."' >
                               <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                           </a>
                        </label>
                    </div>
                </div>
            </div>";   
            }
        }
    }   
    function renderProduct($id){
        $bd = connect();
        $sql = "SELECT i.nome_arquivo
                FROM imagem i 
                WHERE i.codigo_prod = $id";

        $result = $bd->query($sql);
        $img = [];

        for ($i=0; $i < 3 ; $i++) { 
            $data = $result->fetch(PDO::FETCH_ASSOC);
            array_push($img, $data["nome_arquivo"]);
        }
        $sql2 = "SELECT * 
                FROM produto
                WHERE codigo_prod = $id";

        $result = $bd->query($sql2);
        $data = $result->fetch(PDO::FETCH_ASSOC);

        echo " 
        <div class='poduct-main-container'>
        <aside class='preview'>
            <div class='background'>
                <img class='preview-img img' src='../covers/".$img[2]."' alt=''>
             </div>
             <div>
                 <img class='preview-img img' src='../covers/".$img[1]."' alt=''>
             </div>
              </aside>
              <div>
                	<img class='main-img' src='../covers/".$img[0]."' alt='' srcset=''>
              </div>
              <div class='product-info'>
                	<div class='top-info'>
                  		<h2 id='value'>R$".$data["valor_unitario"]."</h2>
                  		<label id='product-label' for='add-to-cart'>
                          <img id='shop-cart' src='../assets/shopcart.png' alt=''>
                          <p>Comprar</p>  
                    	</label>
               	 	</div>
					<div class='product-desc'>
                        <h2 >".$data["nome_pro"]."</h2>
						<p id='desc'>".$data["descricao"]."</p>
					</div>
              	</div>";
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
                            <h3 class='price'>R$ ".$data["valor_unitario"]."</h3>
                        </div> 
                        <label for=''>
                            <img class='arrow' src='../assets/arrow-rigth.png' alt=''>
                        </label>
                    </div>
                    </div>
                </div>";   
                
        }




?>