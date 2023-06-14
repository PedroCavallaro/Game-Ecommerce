<?php

include_once "../../src/bd.php";


function renderInfo($id){
    $bd = connect();

    $sql = "SELECT c.*
                FROM  cliente c
                WHERE cpf_cnpj_cli = $id";

    $result = $bd->query($sql);

    $data = $result->fetch(PDO::FETCH_ASSOC);
        return "  <div class='user-info-container'>
                <div class='user-info'>
                    <div class='fields'>
                        <label for='addres'>Endereço</label>
                        <input 
                        class='info' 
                        readonly 
                        type='text' 
                        id='adress'
                        name='address'
                        value='".$data["endereco_cli"]."'
                        >
                    </div>
                    <div class='fields'>
                        <label for='neig'>Bairro</label>
                        <input 
                        class='info' 
                        readonly 
                        type='text' 
                        id='neig' 
                        name='neigb'
                        value='".$data["bairro_cli"]."'
                        >
                    </div>
                </div>
                <div class='user-info'>
                    <div class='fields'>
                        <label for='city'>Cidade</label>
                        <input 
                        class='info' 
                        readonly 
                        type='text' 
                        id='city' 
                        name='city'
                        value='".$data["cidade_cli"]."'
                        >
                    </div>
                    <div class='fields'>
                        <label for='state'>Estado</label>
                        <input 
                        class='info' 
                        readonly 
                        type='text' 
                        id='state' 
                        name='state'
                        value='".$data["estado_cli"]."'>
                    </div>
                </div>
                    <div class='user-info'>
                        <div class='fields'>
                            <label for='cep'>Cep</label>
                            <input 
                            class='info' 
                            readonly 
                            type='text' 
                            id='cep' 
                            name='cep'
                            value='".$data["cep_cli"]."'
                            >
                        </div>
                    <div class='fields'>
                        <label for='number'>Numero</label>
                        <input 
                        class='info' 
                        readonly 
                        type='text' 
                        id='number'
                        name='number'
                        value='".$data["numero_cli"]."'
                        >
                    </div>
                </div>
            </div>";
    }
function renderPreviousBuys($id){
    $bd = connect();
    $tittles = "";
    $qtd = "";
    $arrBuys = [];
    $sql = "SELECT c.numero_compra,
                c.valor_transporte,
                v.nome_vend,
                t.nome_tras
                FROM compra c
                INNER JOIN vendedor v
                    ON c.cpf_cnpj_vend = v.cpf_cnpj_vend
                INNER JOIN transportadora t 
                    ON c.cpf_cnpj_transp = t.cpf_cnpj_transp
                WHERE c.cpf_cnpj_cli = $id";


    $html = "";
    $TransArr = [];
    $vendArr = [];
    $valueArr = [];
    $result = $bd->query($sql);
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($arrBuys, $data["numero_compra"]);
        array_push($TransArr, $data["nome_tras"]);
        array_push($vendArr, $data["nome_vend"]);
        array_push($valueArr, $data["valor_transporte"]);
    }
    
    for ($i=0; $i < count($arrBuys) ; $i++) { 
        $sql2 = "SELECT p.quantidade,
                    prod.nome_pro
                    FROM possui p
                    INNER JOIN produto prod 
                        ON p.codigo_prod = prod.codigo_prod 
                    WHERE numero_compra = ".$arrBuys[$i]."";
        $result2 = $bd->query($sql2);

        while($data2 = $result2->fetch(PDO::FETCH_ASSOC)){
            $tittles = $tittles."<p>".$data2["nome_pro"]."</p>";
            $qtd = $qtd."<p>".$data2["quantidade"]."x</p>";
        }
        echo "<tr>
        
                <td>".$arrBuys[$i]."</td>
                <td>".$tittles."</td>
                <td>".$qtd."</td>
                <td>".$valueArr[$i]."</td>
                <td>".$vendArr[$i]."</td>
                <td>".$TransArr[$i]."</td>
            <tr/>";
        $tittles = "";
        $qtd = "";
    }
}