<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$sql = "select 
   pro_list.nratendimento as movimento
,  pro_list.datamovimento
, pro_list.paciente
--, pro_list.procedimento
--, pro_list.status
--, pro_list.codprofissional
--, pro_list.unidade
--, pro_list.especialidades
--, pro_list.codtabela
, to_ascii(upper(conv.convenio::text),'LATIN1') as convenios_convenio
, to_ascii(upper(despro.descricaoprocedimento::text),'LATIN1') as procedimentos_descricaoprocedimento
, to_ascii(upper(prof.profissional::text),'LATIN1') as profissionais_profissional
, to_ascii(upper(uni.unidades::text),'LATIN1') as tab_unidades_unidades

--,   atf.idrefra
--,   atf.dataatendimento
--,   atf.paciente
--,   atf.profissional           
, to_ascii(upper(tipoRef.descricao::text), 'LATIN1')  as tipo_refracao

, to_ascii(upper(atf.cmbrefraesfod::text), 'LATIN1')  as esferico_d
, to_ascii(upper(atf.cmbrefraesfoe::text), 'LATIN1') as esferico_e
, to_ascii(upper(atf.cmbrefracilod::text), 'LATIN1') as cilindrico_d
, to_ascii(upper(atf.cmbrefraciloe::text), 'LATIN1') as cilindrico_e


, atf.cmbrefraeixood::text as eixo_d
, atf.cmbrefraeixooe::text as eixo_e

, to_ascii(upper(atf.astigmatismood::text), 'LATIN1') as astgmatismo_d
, to_ascii(upper(atf.astigmatismooe::text), 'LATIN1') as astgmatismo_e
, to_ascii(upper(biom.idbio::text), 'LATIN1') as idbio
--, to_ascii(upper(biom.paciente::text), 'LATIN1')
--, to_ascii(upper(biom.dataatendimento::text), 'LATIN1')
--, to_ascii(upper(biom.profissional::text), 'LATIN1')
, to_ascii(upper(biom.k1::text), 'LATIN1') as K1_D
, to_ascii(upper(biom.eixok1::text), 'LATIN1') as Eixo_de_K1_D
, to_ascii(upper(biom.k2::text), 'LATIN1') as K2_D
, to_ascii(upper(biom.eixok2::text), 'LATIN1') as Eixo_de_K2_D
, to_ascii(upper(biom.k1oe::text), 'LATIN1') as K1_E
, to_ascii(upper(biom.k2oe::text), 'LATIN1') as k2_E
, to_ascii(upper(biom.eixok1oe::text), 'LATIN1') as Eixo_de_K1_E
, to_ascii(upper(biom.eixok2oe::text), 'LATIN1') as Eixo_de_K2_E
, to_ascii(upper(biom.kmediood::text), 'LATIN1') as K_Medio_D
, to_ascii(upper(biom.kmediooe::text), 'LATIN1') as K_Medio_E
, to_ascii(upper(biom.difod::text), 'LATIN1') as dife_D
, to_ascii(upper(biom.difoe::text), 'LATIN1')  as dife_E
, to_ascii(upper(biom.txtanotacaobiood::text), 'LATIN1') as anotacoes_D
, to_ascii(upper(biom.txtanotacaobiooe::text), 'LATIN1') as anotacoes_E

from procedimentosagendados as pro_list


JOIN atendrefracao as atf
ON(pro_list.datamovimento = atf.dataatendimento AND pro_list.paciente = atf.paciente AND pro_list.codprofissional = atf.profissional)

JOIN tipodadorefrativo as tipoRef
ON (tipoRef.codtipo = atf.tprefracao)


JOIN atendbiomicroscopia as biom 
ON(atf.dataatendimento = biom.dataatendimento AND atf.paciente = biom.paciente AND atf.profissional = biom.profissional)

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


WHERE true  ";