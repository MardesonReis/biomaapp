<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexaoT
 *
 * @author user
 */
class ConexaoT {

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConBancoBio
 *
 * @author Marketing
 */


 protected $host = "177.19.134.162";
 protected $user = "appbio";
 protected $pswd = "s85q0wLhX9kAZRr";
 protected $dbname = "bioclinica";
 protected $con = null;

function __construct(){
    $this->open();
} //método construtor

#método que inicia conexao 
function open(){
 $this->con = @pg_connect("host=$this->host user=$this->user
 password=$this->pswd dbname=$this->dbname");
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

?>
