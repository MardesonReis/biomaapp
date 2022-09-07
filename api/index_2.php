<?php 
Header ("Content-type: image/png"); 
// cria uma imagem nas dimensões 50x10
$imagem = imagecreate( 50, 20);

// aloca uma cor na imagem, a saber preta.
$corFundo = imagecolorallocate($imagem, 255, 255, 255);

// aloca uma cor na string
$corTexto = imagecolorallocate($imagem, 215, 245, 247);


/* desenha a string na imagem criada - usei $_GET[texto] - ele pegará o texto que você escolher ao chamar o arquivo imagem.php - você pode usar a palavra que você escolher ao invés de usar isso. */
imagestring($imagem, 2, 2, 2, '/n', $corTexto);
imagestring($imagem, 2, 2, 2, 'Consulta', $corTexto);
imagestring($imagem, 2, 2, 2, '/n', $corTexto);

// transforma a imagem em tipo png
imagepng($imagem);

// destrói a imagem da memória
imagedestroy($imagem);
?>


<!--/*
Entedendo o código: 
ImageString ($img_handle, 331, 200, 300,  $texto."Seu IP: $ip", $color); <br>
o primeiro parâmetro informa o nome da imagem;
o segundo parametro informa o tamanho do texto dentro da imagem;
o terceiro parametro é a posição esquerda da imagem;
o quarto parametro informa a posição superior da imagem;
o quinto parametro é o texto a ser inserido;
e por fim a cor do texto.

veja exemplo em http://www.i9se.com/exemplos/exemplo1.php
*/
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
Header ("Content-type: image/png"); 
$texto = $_GET["texto"];
if ($texto=="") //Se a variavel estiver vazia preencha com um texto qualquer
{$texto="SALVA A AMAZONIA!";}
 
$img_handle = imageCreateFromPNG("salveamazonia.png"); informe o caminho e nome da imagem
$color = ImageColorAllocate ($img_handle, 100, 100, 100);
$ip = $_SERVER['REMOTE_ADDR'];
ImageString ($img_handle, 331, 200, 300,  $texto."   Seu IP: $ip", $color); 
ImagePng ($img_handle); 
ImageDestroy ($img_handle); 
?> -->
<center><img src=exemplo1.php style='background:white'></center>



    
    