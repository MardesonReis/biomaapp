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

class especialidades extends Conexao{
   
    public function __construct() {
        parent::__construct();
    }    
    
       function listar($codEspecialidade = null) {
        $_sql = '';
        $procedimentos = array();
 
     include getcwd().'/classes/sqls/especialidades/especialidades.php';
     
    if(@$codEspecialidade){
        
          $especialidade = explode('_', @$codEspecialidade);
            $i = 0;
            $s = '';
            foreach (@$especialidade as $value) {


                if ($i == 0) {
                    @$s = @$s . " tbop.tabop_especialidade  = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR tbop.tabop_especialidade  = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . 'AND (' . $s . ') ';
        
        
      }
    if(true){
       @$_sql = @$_sql . " GROUP BY   tbop.tabop_especialidade, especialidade Order by especialidade desc";
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
