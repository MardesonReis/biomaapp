<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexaoD
 *
 * @author user
 */

class Conexao {
 protected $conDW = null;
 protected $conBio = null;
 protected $conBioteste = null;

function __construct(){
    $this->open();
    
} //método construtor

#método que inicia conexao 
function open(){
 $this->conDW = @pg_connect("host=108.167.176.178 user=postgres password=12101993 dbname=biotvind_dw");
 

 $this->conBio = @pg_connect("host=127.0.0.1 port=17000 user=appbio password=bio5410 dbname=bioclinica")or die('Erro in bioinfo conexão'); 
// $this->conBio = @pg_connect("host=177.153.229.10 port=17000 user=appbio password=bio5410 dbname=bioclinica")or die('Erro in bioinfo conexão'); 

 //$this->conBioteste = @pg_connect("host=177.19.134.162 port=5432 user=redebioclinica password=061yfmtx7obwzkk dbname=bioclinica")or die(pg_last_error($this->conBioteste).'Erro in bioinfo conexão'); // Banco de Teste
 
 
 
// $this->conBio = pg_connect("host=177.153.229.10 port=17000 user=redebioclinica password=061yfmtx7obwzkk   dbname=bioclinica") or die( .'Erro in bioclinica conexão'); // Banco Fix
 
 }


#método que encerra a conexao
 function close($con){
 @pg_close($con);
 
 }
 
 function  QueryBio($sql){
   
     $consulta =  pg_query($this->conBio, $sql)or die();
       return $consulta;

 }
  function  QueryBioTeste($sql){
   // echo $sql;
     $consulta =  pg_query($this->conBioteste, $sql)or die( );
       return $consulta;

 }
 function  QueryDW($sql){
   // echo $sql;
     $consulta =  pg_query($this->conDW, $sql)or die();
     return $consulta;
 }
   function  QueryDWRun($sql){
 echo $sql;
    $consulta = $this->QueryDW($sql);
     $dados = array();
     
     if($consulta){
           
       while($r = pg_fetch_assoc($consulta)) {
         $dados[] = $sql;  
         $dados[] = $r;  
       }
//       
       }else{
           
        $dados[] = pg_result_error($consulta).'';
        $dados[] = pg_last_error($this->conDW).'';


       }
        return $dados;

        //var_dump($dado);
 }
  function  QueryBioRun($sql){
// echo $sql;
    $consulta = $this->QueryBio($sql);
     $dados = array();
     
     if($consulta){
           
       while($r = pg_fetch_assoc($consulta)) {
         $dados[] = $sql;  
         $dados[] = $r;  
       }
//       
       }else{
           
        $dados[] = pg_result_error($consulta).'';
        $dados[] = 'pg_last_error($this->conBio)'.'';


       }
        return $dados;

        //var_dump($dado);
 }


#método verifica status da conexao
 function statusCon(){
 if(!$this->conBio){
     
     return "O sistema não está conectado ao banco transacional ". 'pg_last_error($this->conBio)';
 exit;
 }
 else{
    return "O sistema está conectado à";
 }
 }
}
