<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of fidelimax
 *
 * @author user
 */
include_once 'auth.php';
require_once 'conexao.php';
require_once 'ferramentas.class.php';


class fidelimax {
    //put your code here

 
  

function CredenciaisConsumidor() {
    if(!$_POST['cpf'])        return;
    $cabecalho =  array(
  'Content-Type: application/json',
  'AuthToken: d0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478',
  'Access-Control-Allow-Origin: *',
  'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accep',
);

$auth = 'd0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478';

 $url = 'https://api.fidelimax.com.br/api/Integracao/CredenciaisConsumidor';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cpf": '.$_POST['cpf'].',
    "senha":0
}',
    
  CURLOPT_HTTPHEADER => $cabecalho,
));

$response = curl_exec($curl);

curl_close($curl);
return json_decode($response);

}
function ConsultaConsumidor() {
    $cabecalho =  array(
  'Content-Type: application/json',
  'AuthToken: d0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478',
  'Access-Control-Allow-Origin: *',
  'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accep',
);
$auth = 'd0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478';

 $url = 'https://api.fidelimax.com.br/api/Integracao/ConsultaConsumidor';


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cpf": '.$_POST['cpf'].',
    "categoria":'.$_POST['categoria'].',
}',
    
  CURLOPT_HTTPHEADER => $cabecalho,
));

$response = curl_exec($curl);

curl_close($curl);
return json_decode($response);
}
    
function RetornaDadosCliente() {
    $cabecalho =  array(
  'Content-Type: application/json',
  'AuthToken: d0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478',
  'Access-Control-Allow-Origin: *',
  'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accep',
);
$auth = 'd0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478';

 $url = 'https://api.fidelimax.com.br/api/Integracao/RetornaDadosCliente';

$curl = curl_init();


curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cpf": '.$_POST['cpf'].',
}',
    
  CURLOPT_HTTPHEADER => $cabecalho,
));

$response = curl_exec($curl);

curl_close($curl);
return json_decode($response);
}
function ExtratoConsumidor() {
$cabecalho =  array(
  'Content-Type: application/json',
  'AuthToken: d0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478',
  'Access-Control-Allow-Origin: *',
  'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accep',
);
$auth = 'd0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478';

 $url = 'https://api.fidelimax.com.br/api/Integracao/ExtratoConsumidor';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "cpf": '.$_POST['cpf'].',
    "skip": '.$_POST['skip'].',
    "take": '.$_POST['take'].',
}',
    
  CURLOPT_HTTPHEADER => $cabecalho,
));


$response = curl_exec($curl);

curl_close($curl);
return json_decode($response);
}
function CadastrarConsumidor() {
$cabecalho =  array(
  'Content-Type: application/json',
  'AuthToken: d0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478',
  'Access-Control-Allow-Origin: *',
  'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accep',
);
$auth = 'd0c1f55a-2fcc-408b-9a86-cf70c6605d2c-478';

 $url = 'https://api.fidelimax.com.br/api/Integracao/CadastrarConsumidor';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "nome":"'.$_POST['nome'].'",
    "cpf":"'.$_POST['cpf'].'",
    "sexo":"'.$_POST['sexo'].'",
    "email":"'.$_POST['email'].'",
    "nascimento":"'.$_POST['nascimento'].'",
    "telefone":"'.$_POST['telefone'].'",
}',
    
  CURLOPT_HTTPHEADER => $cabecalho,
));


$response = curl_exec($curl);

curl_close($curl);
return json_decode($response, true);
}
}
