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
                        name='adress'
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
                        name='neig'
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
