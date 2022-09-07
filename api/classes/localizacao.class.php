<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of localizacao
 *
 * @author user
 */
require_once 'conexao.php';
class localizacao extends Conexao{
  
    public function __construct() {
        parent::__construct();
    }    
    
       function listar($codUnidade = null) {
        $_sql = '';
        $procedimentos = array();
 
     include getcwd().'/classes/sqls/localizacao/localizacao.php';
     
    if(@$codUnidade){
        
     @$_sql = @$_sql . " WHERE cod_estabelecimento = '".$codUnidade."'";
        
        
      }
 
      
       $sql = $sql.''.$_sql;
  //   echo $sql;
       $consulta = $this->QueryDW($sql);
    if($consulta){
           
       while($r = pg_fetch_assoc($consulta)) {
         $procedimentos[] = $r;  
       }
//       
       }else{
           
        $procedimentos[] = pg_result_error($consulta).'';
        $procedimentos[] = pg_last_error($this->conBio).'';


       }
        return $procedimentos;

      
      
    }
}
