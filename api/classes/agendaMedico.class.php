<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of agendaMedico
 *
 * @author user
 */
class agendaMedico extends Conexao{
    //put your code here
        public function __construct() {
        parent::__construct();
    }
    
           function listar($codProfissional = null, $status = null) {
        $_sql = '';
        $procedimentos = array();
 
     include getcwd().'/classes/sqls/agenda/agendaMedico.php';
     
    if(@$status){
        
          $status = explode('_', @$status);
            $i = 0;
            $s = '';
            foreach (@$status as $value) {


                if ($i == 0) {
                    @$s = @$s . " status  = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR status  = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . 'AND (' . $s . ') ';
        
        
      }
    if(@$codProfissional){
        
          $especialidade = explode('_', @$codProfissional);
            $i = 0;
            $s = '';
            foreach (@$especialidade as $value) {


                if ($i == 0) {
                    @$s = @$s . " medico  = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR medico  = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . 'AND (' . $s . ') ';
        
        
      }
    if(true){
       @$_sql = @$_sql . " order by data, horario asc";
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
    //put your code here
}
