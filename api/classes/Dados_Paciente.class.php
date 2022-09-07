<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of paciente
 *
 * @author user
 */
class paciente extends Conexao{
    //put your code here
public function __construct() {
        parent::__construct();
}


function ListarPacientesCampanhas($datai = null, $dataf = null,  $paciente = null, $data_niver) {
$bio = new Conexao();
$dataii =  $datai ?? date("d-m-Y", strtotime($oldDate.'- 2 days'));
$dataff =  $dataf ?? date("d-m-Y");

if($base){
 // @$_sql = $_sql . " AND a.movimento = '".$movimento."' ";
}
if($data_niver){
 @$_sql = $_sql .    " AND extract (month from pac.datanascimento) = extract (month from CAST ('".$data_niver."' as DATE) ) and  extract (day from pac.datanascimento) = extract (day from CAST ('".$data_niver."' as DATE))";
}else{
if(@$dataii){
  @$_sql = $_sql . " AND pro_list.datamovimento >= '".@$dataii."' ";
}
if(@$dataff){
  @$_sql = $_sql . " AND pro_list.datamovimento <= '".@$dataff."' ";
}
if(@$paciente){
  @$_sql = $_sql . " AND pro_list.paciente = '".@$paciente."' ";
}

}
if(true){
 // @$_sql = $_sql . " order by pro_list.datamovimento desc limit 1";
}


include getcwd().'/classes/sqls/paciente/pacientesSms.php';
$sql = $sql.''.$_sql;
// echo $sql;
$consulta = $bio->QueryBio($sql);
$agenda = array();
$sql = '';
// echo $sql;

        include_once getcwd().'/classes/ferramentas.class.php';
        $ferramenta = new ferramentas();
while($pacientes = pg_fetch_assoc($consulta)) {


    $i = @in_array(@$pacientes['paciente'], @array_column(@$arr, 'paciente'));
  
   
    if(!$i){
        
   if(@$pacientes['paciente']){



       //$consulta3 = $bio->QueryBio($sql);
//
//          while($dadosRefr = pg_fetch_assoc($consulta3)) {
//           $atendimento['dadosRefrativos'][]   = $dadosRefr;
//           $sql = '';
//          }
    
         
         
    // $pacientes['procedimentoAgendados'][]  = $atendimento;
     
//     }
          $sql = '';

     }
     
        
//        $esf = $ferramenta->formataclasse($ferramenta->formartFloat(@$pacientes['esferico_d']));
       $date = new DateTime( @$pacientes['datamovimento'] );
       @$pacientes['datamovimento'] = $date-> format( 'd-m-Y' ); 
       @$pacientes['esferico_d'] = $ferramenta->formartFloat(@$pacientes['esferico_d']); 
       @$pacientes['esferico_e'] = ($ferramenta->formartFloat(@$pacientes['esferico_e'])); 
       @$pacientes['cilindrico_d'] = ($ferramenta->formartFloat(@$pacientes['cilindrico_d'])); 
       @$pacientes['cilindrico_e'] = ($ferramenta->formartFloat(@$pacientes['cilindrico_e'])); 
       @$pacientes['eixo_d'] =  $ferramenta->formartFloat(@trim($pacientes['eixo_d'], "°")); 
       @$pacientes['eixo_e'] =  $ferramenta->formartFloat(@trim($pacientes['eixo_e'], "°")); 
       
    //  @$titulo = '<li>'.@$r['procedimentos_descricaoprocedimento'].'</li>';
     // $qtdPocedimento = 1 ;
    //  $r['procedimentos'] = array($r['procedimentos_codprocedimento'] => $r['procedimentos_descricaoprocedimento']);
    //  @$r['procedimentosList'] =  '<a title="<ul>'.@$titulo.'<ul/> " class="btn btn-info btn-lg" data-toggle="modal"><i class="fa fa-bars fa-flip-vertical fa-fw fa-lg"></i> '.@$r['procedimentos_descricaoprocedimento'].' <button class="badge">'.@$qtdPocedimento.'</button></a>
//';  //  
   //    $base = $r['tb_agenda_movimento'
      $fone = '&fone[]='.$pacientes['telefone']. '&fone[]='.$pacientes['celular'].'&fone[]='.$pacientes['tel_whatsapp'];

       $pacientes['acao'] = '<button codPaciente="'.$pacientes['codpaciente'].'" nomePaciente="'.$pacientes['nomepaciente'].'" id="'.@$base.'" fone="'.@$fone.'" class="enviarSMS ui-button ui-widget ui-corner-all" >
       <img  alt="Enviar SMS" src="https://biotvindoor.com/iAgenda/confirmacao/imagens/sms.png" width="30px">
       </button>';
       //  unset($r['procedimentos_codprocedimento']);
//         unset($r['procedimentos_descricaoprocedimento']);
       $arr[] = $pacientes;
    }else{
     //  @$titulo = @$titulo. '<li>'.@$r['procedimentos_descricaoprocedimento'].'</li>';
      // $qtdPocedimento = $qtdPocedimento+1 ;
      // $ii =  array_search(@$r['tb_agenda_movimento'], @array_column(@$arr, 'tb_agenda_movimento'));
//        echo $ii."<br/>";
      // $arr[$ii]['procedimentos'][$r['procedimentos_codprocedimento']] = $r['procedimentos_descricaoprocedimento'];
//       $arr[$ii]['procedimentosList'] =  '<button title="<ul>'.$titulo.'<ul/> " > '.@$r['procedimentos_descricaoprocedimento'].' <span class="'.$qtdPocedimento.'"></span></button>';
      // $arr[$ii]['procedimentosList'] =  '<a title="<ul>'.$titulo.'<ul/>" class="" style="width: 15%; white-space: normal; size:10" data-toggle=""><i class="fa "></i> '.@$r['procedimentos_descricaoprocedimento'].' <button   class="qtdPocedimento badge">'.$qtdPocedimento.'</button></a>
//';
      //  $arr[] = $r;
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
