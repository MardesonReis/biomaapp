<?php

define('VALID_USERNAME', 'redebioclinica@gmail.com');
define('VALID_PASSWORD', 'bio@2022');
define('VALID_TOKEN', '2ece8122bc80db2a816c2df41d6b2a1f');

$token = @$_POST['token'] ?? @$_GET['token'];

if($token == VALID_TOKEN){
 $_SERVER['PHP_AUTH_USER'] =  VALID_USERNAME;
 $_SERVER['PHP_AUTH_PW'] = VALID_PASSWORD;
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']))
{
    header('http/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Wonder Penguin"');
 
     

            $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      
            
             $a = 'Erro de login <a href="'.$URL_ATUAL.'">clique aqui para tentar Novamemte</a> ';
                        exit($a);


}
else
{
    if (($_SERVER['PHP_AUTH_USER'] != VALID_USERNAME) ||
        ($_SERVER['PHP_AUTH_PW'] != VALID_PASSWORD))
    {
        header('http/1.1 401 Unauthorized');
        header('WWW-Authenticate: Basic realm="Wonder Penguin"');
        session_abort();
        exit();
 
    }
    else
    {
        session_start();
        $_SESSION['token'] = VALID_TOKEN;
    }
}
?>