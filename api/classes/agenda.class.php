<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of agenda
 *
 * @author user
 */
class agenda extends Conexao{
    //put your code here
        public function __construct() {
        parent::__construct();
    }
    
    function ListarAgendaCampanhas($data = null, $movimento = null, $unidades = null, $profissional = null) {
       $bio = new Conexao();
//$bio->statusCon();
$dataMovimento =  $data ?? date("d-m-Y");
$movimento = $movimento ?? base64_decode($movimento);


if(@$dataMovimento){
  @$_sql = $_sql . " AND a.datamovimento = '".@$dataMovimento."' ";
}
if(@$unidades){
  @$_sql = $_sql . " AND p.unidade = '".@$unidades."' ";
}
if(@$profissional){
  @$_sql = $_sql . " AND p.codprofissional = '".@$profissional."' ";
}

include getcwd().'/classes/sqls/agenda/agendaSms.php';
$sql = $sql.''.$_sql;
//secho $sql;
$consulta = $bio->QueryBio($sql);
$agenda = array();




while($r = pg_fetch_assoc($consulta)) {
    $i = @in_array(@$r['tb_agenda_movimento'], @array_column(@$arr, 'tb_agenda_movimento'));
  
   
    if(!$i){
       $date = new DateTime( $r['tb_agenda_datamovimento'] );
       $r['tb_agenda_datamovimento'] = $date-> format( 'd-m-Y' ); 
       
      @$titulo = '<li>'.@$r['procedimentos_descricaoprocedimento'].'</li>';
      $qtdPocedimento = 1 ;
      $r['procedimentos'] = array($r['procedimentos_codprocedimento'] => $r['procedimentos_descricaoprocedimento']);
      @$r['procedimentosList'] =  '<a title="<ul>'.@$titulo.'<ul/> " class="btn btn-info btn-lg" data-toggle="modal"><i class="fa fa-bars fa-flip-vertical fa-fw fa-lg"></i> '.@$r['procedimentos_descricaoprocedimento'].' <button class="badge">'.@$qtdPocedimento.'</button></a>
';    
       $base = $r['tb_agenda_movimento'];
    
      $fone = '&fone[]='.$r['pacientes_tel_whatsapp']. '&fone[]='.$r['pacientes_celular'].'&fone[]='.$r['pacientes_telefone'];

       $r['acao'] = '<button codPaciente="'.$r['tb_agenda_paciente'].'" nomePaciente="'.$r['pacientes_nomepaciente'].'" id="'.@$base.'" datamovimento="'.$r['tb_agenda_datamovimento'].'" fone="'.@$fone.'" class="enviarSMS ui-button ui-widget ui-corner-all" >
       <img  alt="Enviar SMS" src="https://biotvindoor.com/iAgenda/confirmacao/imagens/sms.png" width="30px">
       </button>';
         unset($r['procedimentos_codprocedimento']);
         unset($r['procedimentos_descricaoprocedimento']);
       $arr[] = $r;
    }else{
       @$titulo = @$titulo. '<li>'.@$r['procedimentos_descricaoprocedimento'].'</li>';
       $qtdPocedimento = $qtdPocedimento+1 ;
       $ii =  array_search(@$r['tb_agenda_movimento'], @array_column(@$arr, 'tb_agenda_movimento'));
//        echo $ii."<br/>";
       $arr[$ii]['procedimentos'][$r['procedimentos_codprocedimento']] = $r['procedimentos_descricaoprocedimento'];
//       $arr[$ii]['procedimentosList'] =  '<button title="<ul>'.$titulo.'<ul/> " > '.@$r['procedimentos_descricaoprocedimento'].' <span class="'.$qtdPocedimento.'"></span></button>';
       $arr[$ii]['procedimentosList'] =  '<a title="<ul>'.$titulo.'<ul/>" class="" style="width: 15%; white-space: normal; size:10" data-toggle=""><i class="fa "></i> '.@$r['procedimentos_descricaoprocedimento'].' <button   class="qtdPocedimento badge">'.$qtdPocedimento.'</button></a>
';
      
    }
 
}
$agenda  = $arr;





header('Content-Type: application/json');


$json = ["sEcho" => 1,
        	"iTotalRecords" => count($agenda),
        	"iTotalDisplayRecords" => count($agenda),
        	"aaData" => $agenda];


            return die(json_encode($json));
    }    
}
