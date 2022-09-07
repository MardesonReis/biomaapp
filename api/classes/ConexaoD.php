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

class ConexaoD extends ConexaoT{
 protected $conDW = null;
 protected $conBio = null;

function __construct(){
    parent::__construct();
    parent::open();
    $this->open();
    
} //método construtor

#método que inicia conexao 
function open(){
 $this->conDW = @pg_connect("host=biotvindoor.com user=postgres
 password=12101993 dbname=biotvind_dw");
 
 $this->conBio = @pg_connect("host=177.19.134.162 user=appbio
 password=s85q0wLhX9kAZRr dbname=bioclinica");
 return $this->con;
 }

#método que encerra a conexao
 function close(){
 @pg_close($this->con);
 }
 
 function  Query($sql){
   // echo $sql;
     $consulta =  pg_query($this->con, $sql);
     return $consulta;
 }

#método verifica status da conexao
 function statusCon(){
 if(!$this->con){
     return "O sistema não está conectado à  [$this->dbname] em [$this->host]";
 exit;
 }
 else{
    return "O sistema está conectado à  [$this->dbname] em [$this->host].";
 }
 }
}
