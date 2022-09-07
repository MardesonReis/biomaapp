<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of monobino
 *
 * @author user
 */
class monobino {
    //put your code here
    
    function listar($param) {

 $url = 'bioinfo.net.br/probioclinica/src/pages/templates/vermonobino.php';


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_PORT, 80);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{unidade: newuni,
		convenio: newconv,
		procedimento: newproc
	}");

$headers = array();
//$headers[] = 'Accept: application/json';
//$headers[] = 'Authorization: xxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
//$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

header('Content-Type: application/json');
die($result);
    }
}
