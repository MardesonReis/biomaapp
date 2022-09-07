<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php t
 * o edit this template
 */

$sql = "
 select
  pro_list.datamovimento
, pro_list.paciente
, pro_list.procedimento
, pro_list.status
, pro_list.codprofissional
, pro_list.unidade
, pro_list.especialidades
, pro_list.codtabela
, to_ascii(upper(conv.convenio::text),'LATIN1') as convenios_convenio
, to_ascii(upper(despro.descricaoprocedimento::text),'LATIN1') as procedimentos_descricaoprocedimento
, to_ascii(upper(prof.profissional::text),'LATIN1') as profissionais_profissional
, to_ascii(upper(uni.unidades::text),'LATIN1') as tab_unidades_unidades

from procedimentosagendados as pro_list

INNER JOIN convenios conv
ON  (conv.codconvenio = pro_list.codtabela)

INNER JOIN (
SELECT
  codprofissional
, profissional

FROM profissionais

)
prof
ON  (prof.codprofissional = pro_list.codprofissional)
   

INNER JOIN procedimentos despro
ON  (despro.codprocedimento = pro_list.procedimento)
   
INNER JOIN unidades uni
ON  (uni.codunidades = pro_list.unidade)

WHERE true 

";




