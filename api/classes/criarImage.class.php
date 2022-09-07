<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of criarImage
 *
 * @author user
 */
class criarImage {
    //put your code here

    
public function GerarImagem($imgTexto) {
        // cria uma imagem nas dimensões 50x10
$imagem = imagecreate( 50, 20);

// aloca uma cor na imagem, a saber preta.
$corFundo = imagecolorallocate($img, 0, 0, 0);

// aloca uma cor na string
$corTexto = imagecolorallocate($img, 215, 245, 247);


/* desenha a string na imagem criada - usei $_GET[texto] - ele pegará o texto que você escolher ao chamar o arquivo imagem.php - você pode usar a palavra que você escolher ao invés de usar isso. */
imagestring($img, 2, 2, 2, $imgTexto, $corTexto);

// transforma a imagem em tipo png
 $img_final = imagepng($img);

// destrói a imagem da memória
imagedestroy($img);
echo  $img_final;
    }
    
    
}
