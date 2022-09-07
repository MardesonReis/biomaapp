<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$sql = "
    
select 
    atf.idrefra
,   atf.dataatendimento
,   atf.paciente
,   atf.profissional           
, to_ascii(upper(tipoRef.descricao::text), 'LATIN1')  as tipo_refracao

, to_ascii(upper(atf.cmbrefraesfod::text), 'LATIN1')  as esferico_d
, to_ascii(upper(atf.cmbrefraesfoe::text), 'LATIN1') as esferico_e
, to_ascii(upper(atf.cmbrefracilod::text), 'LATIN1') as cilindrico_d
, to_ascii(upper(atf.cmbrefraciloe::text), 'LATIN1') as cilindrico_e
--

, to_ascii(upper(atf.cmbrefraeixood::text), 'LATIN1') as eixo_d
, to_ascii(upper(atf.cmbrefraeixooe::text), 'LATIN1') as eixo_e
--
, to_ascii(upper(atf.astigmatismood::text), 'LATIN1') as astgmatismo_d
, to_ascii(upper(atf.astigmatismooe::text), 'LATIN1') as astgmatismo_e


, biom.idbio
, biom.paciente
, biom.dataatendimento
, biom.profissional
, biom.k1
, biom.eixok1
, biom.k2
, biom.eixok2
, biom.k1oe
, biom.k2oe
, biom.eixok1oe
, biom.eixok2oe
, biom.kmediood
, biom.kmediooe
, biom.difod
, biom.difoe
, biom.txtanotacaobiood
, biom.txtanotacaobiooe


from atendrefracao as atf

JOIN tipodadorefrativo as tipoRef
ON (tipoRef.codtipo = atf.tprefracao)


JOIN atendbiomicroscopia as biom 
ON(atf.dataatendimento = biom.dataatendimento AND atf.paciente = biom.paciente AND atf.profissional = biom.profissional)

WHERE true



";