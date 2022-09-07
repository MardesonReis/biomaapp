<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of pacientes
 *
 * @author user
 */
require_once 'conexao.php';
require_once 'ferramentas.class.php';

class pacientes extends Conexao{
   
    public function __construct() {
        parent::__construct();
    }    
    
       function listar($cpf = null, $likeName = null) {
           $f = new ferramentas();
           $cpf = $f->limpaCPF_CNPJ($cpf);
        $_sql = '';
        $procedimentos = array();
 
     include getcwd().'/classes/sqls/paciente/pacientes.php';
  //   @$cpf = true;
    if(@$cpf){
       @$_sql = @$_sql . " AND pct.cpf = '".@$cpf."' ";
      }
        if (@$likeName) {
            @$_sql = @$_sql . " AND pct.nomepaciente  like '" . strtoupper(@$likeName) . "%' ";
        }
    if(@$cpf){
       @$_sql = @$_sql . " limit 1 ";
      }
   
      
       $sql = $sql.''.$_sql;
  //echo $sql;
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
