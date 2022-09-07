<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of convenios
 *
 * @author user
 */
require_once 'conexao.php';

class convenios extends Conexao{
    //put your code herepublic function __construct() {
 public function __construct() {
        parent::__construct();
    }    
    
       function listar($cpf = null) {
        $_sql = '';
        $procedimentos = array();
 
     include getcwd().'/classes/sqls/convenios/convenios.php';
     
      
    if(@$cpf){
       @$_sql = @$_sql . " AND p.cpf = '".@$cpf."' ";
      }
    if(true){
       @$_sql = @$_sql . "  ORDER BY descricao ASC ";
      }
       $sql = $sql.''.$_sql;
  //   echo $sql;
       $consulta = $this->QueryBio($sql);
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
