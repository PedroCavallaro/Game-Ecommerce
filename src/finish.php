<?php
include_once "../src/bd.php";

$bd = connect();
$cod =  $_COOKIE["buy"];
$id = $_GET["id"];
$arrCod = explode(",",$cod);
$arrQtd = explode(",", $_COOKIE["qtd"]);
$total = $_COOKIE["total"];
$arrUnityValue = explode(",",$_COOKIE["unity"]);
$username = $_GET["username"];

$sql = "SELECT numero_compra FROM compra
        ORDER BY numero_compra DESC";

$commision = $total * 0.15;
$ship = $total * 1.10;
$result = $bd->query($sql);

$data = $result->fetch(PDO::FETCH_ASSOC);

$buyNumber = isset($data["numero_compra"]) ? $data["numero_compra"] + 1 : 1;




$ven = "SELECT cpf_cnpj_vend 
    FROM vendedor
    ORDER BY cpf_cnpj_vend";

$result2 = $bd->query($ven);
$data2 = $result2->fetch(PDO::FETCH_ASSOC);

$trans = "SELECT cpf_cnpj_transp
            FROM transportadora
            ORDER BY cpf_cnpj_transp";


$result3 = $bd->query($trans);
$data3 = $result3->fetch(PDO::FETCH_ASSOC);


$sql = "INSERT INTO `compra`(
            `numero_compra`,
            `data`,
            `valor_comissao`,
            `valor_transporte`,
            `cpf_cnpj_vend`,
            `cpf_cnpj_transp`,
            `cpf_cnpj_cli`
        )
        VALUES(
            '$buyNumber',
            '".date('Y-m-d')."',
            '$commision',
            '$ship',
            '".$data2["cpf_cnpj_vend"]."',
            '".$data3["cpf_cnpj_transp"]."',
            '$id'
        )";

        $bd->beginTransaction();
        $bd->exec($sql);
        $bd->commit();

        for ($i=1; $i < count($arrCod) ; $i++) { 
            $sql2 = "INSERT INTO `possui`(
                `numero_compra`,
                `codigo_prod`,
                `valor`,
                `quantidade`
            )
            VALUES(
                '$buyNumber',
                '".$arrCod[$i]."',
                '".$arrUnityValue[$i]."',
                '".$arrQtd[$i]."'
            )";       
            
            $bd->beginTransaction();
            $bd->exec($sql2);
            $bd->commit();
            
            $update = "UPDATE produto SET `quantidade`= quantidade - ".$arrQtd[$i]." 
                    WHERE codigo_prod = ".$arrCod[$i]."";

            $bd->beginTransaction();
            $bd->exec($update);
            $bd->commit();
        }
header("location:../views/payment.php?username=$username&s=1")








?>