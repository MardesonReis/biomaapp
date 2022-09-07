<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of ferramentas
 *
 * @author user
 */
class ferramentas {
    public $escala = Array();
    //put your code here
    public function __construct() {
        for ($index = -100; $index <= 101; $index= $index + 00.01) {
            $this->escala[] =  number_format($index, 2, '.', ''); 
        }
    }
    function trataNumero($tel) {
 // seria melhor cirar uma white list.
 // tratando manualmente
 $tel = str_replace("-", "", $tel);
 $tel = str_replace("(", "", $tel);
 $tel = str_replace(")", "", $tel);
 $tel = str_replace("_", "", $tel);
 $tel = str_replace(" ", "", $tel);
 $tel = str_replace("+", "", $tel);
 //---------------------

 // Se nao tiver DDD e 9 digito
 if (strlen($tel) == 8) {

  $tel = '9'.$tel;

 };

 // Se nao tiver DDD
 if (strlen($tel) == 9) {

  $tel = '85'.$tel;

 };

 // Se tiver DDD mas nao tiver o 9 digito
 if (strlen($tel) == 10) {

  $inicio = substr($tel, 0, 2);
  $fim =  substr($tel, 2, 10);
  $tel = $inicio.'9'.$fim;

 };

 //verificando se é celular
 $celReal = array ("9","8","7","6","5","4");

 // retirando espaços
 $tel = trim($tel);

 // Valida se esta com 55
 $ddi = strripos($tel, '55');
 $val_ddi = strlen($ddi);

 if ($val_ddi != 1) {

        $tel = '55'.$tel;

 }

 // Verifica se e celular mesmo
 if (strlen($tel) == 13) {

        $validaCel = substr($tel,5,1);
        if (in_array($validaCel, $celReal)){

                return $tel;

        } else {

                return false;

        }
 }

} 
    
public  function formartFloat($param=null) {

    if(is_numeric($param)){
     $param =  floatval ($param);
     return number_format($param, 2, '.', ''); 

    }else{
     $param = $param;
   
    }
        
        
    return $param;
    
    
    
} 

public function formataclasse($param = null) {
 

// sort($this->escala);
////  var_dump($values);
  $diff = $this->escala[count($this->escala)-1] - $this->escala[0];
// //echo $diff;
  $diff = $diff * 100.00;
//
  $k = (int) $diff;

  // queremos 5 grupos, então k precisa ser divisível por 5
  while ($k % 100.00 != 0){
    $k+=1;
  }
//
  $diff = $k / 100.00;

  $valorgrupo = $diff / 100;

  $basegrupo = $this->escala[0];

  $grupo = 1;
 
//$json[] = "GRUPO " . $grupo . " (" . ($basegrupo). " -> " . ($basegrupo + $valorgrupo) . ")</br>";
//  var_dump($values);

  foreach($this->escala as $valor){
    
      if (floatval($param) == floatval($valor) ) {
////            $json[] = " " . $grupo . " (" . ($basegrupo). " -> " . ($basegrupo + $valorgrupo) . ")</br>";
            $json = "[" . @number_format($basegrupo, 2, '.', ''). " a " .  @number_format(($basegrupo + $valorgrupo), 2, '.', ''). "]";
//    
      }

    if (round($valor, 2) >= round($basegrupo + $valorgrupo, 2)){
      $basegrupo += $valorgrupo;

      $grupo++;
//                      echo $valor."<br/>";


   
    }

//    echo $valor . "</br>";
  }
  if (!is_numeric($param)) {
    return '0.00';
    
  }
  return $json;
}
      function limpaCPF_CNPJ($valor){
 $valor = trim($valor);
 $valor = str_replace(".", "", $valor);
 $valor = str_replace(",", "", $valor);
 $valor = str_replace("-", "", $valor);
 $valor = str_replace("/", "", $valor);
 return $valor;
} 
    
}
