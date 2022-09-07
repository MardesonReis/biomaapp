<?php
// to_ascii(upper(pct.nomepaciente::text),'LATIN1') as pacientes_nomepaciente
$sql = "SELECT
    to_ascii(upper(a.movimento::text),'LATIN1') as tb_agenda_movimento
  , to_ascii(upper(a.datamovimento::text),'LATIN1') as tb_agenda_datamovimento
  , to_ascii(upper(a.paciente::text),'LATIN1') as tb_agenda_paciente
  , to_ascii(upper(a.status::text),'LATIN1') as tb_agenda_status
  , to_ascii(upper(a.horamarcacao::text),'LATIN1') as tb_agenda_horamarcacao
--, to_ascii(upper(a.telefoneagenda::text),'LATIN1') as tb_agenda_telefoneagenda
--, to_ascii(upper(a.observacao::text),'LATIN1') as tb_agenda_observacao
--, to_ascii(upper(a.codparceiro::text),'LATIN1') as tb_agenda_codparceiro


--, to_ascii(upper(p.tratamento::text),'LATIN1') as tb_pro_agen_tratamento
--, to_ascii(upper(p.procedimento::text),'LATIN1') as tb_pro_agen_procedimento
  , to_ascii(upper(p.status::text),'LATIN1') as tb_pro_agen_status
--, to_ascii(upper(p.olho::text),'LATIN1') as tb_pro_agen_olho
--, to_ascii(upper(p.codprofissional::text),'LATIN1') as tb_pro_agen_codprofissional
--, to_ascii(upper(p.unidade::text),'LATIN1') as tb_pro_agen_unidade
--, to_ascii(upper(p.especialidades::text),'LATIN1') as tb_pro_agen_especialidades
--, to_ascii(upper(p.codtabela::text),'LATIN1') as tb_pro_agen_codtabela
--, to_ascii(upper(p.nratendimento::text),'LATIN1') as tb_pro_agen_nratendimento
--, to_ascii(upper(p.id_codigo::text),'LATIN1') as tb_pro_agen_id_codigo

  , to_ascii(upper(pct.nomepaciente::text),'LATIN1') as pacientes_nomepaciente
  , to_ascii(upper(pct.datanascimento::text),'LATIN1') as pacientes_datanascimento
  , to_ascii(upper(pct.sexo::text),'LATIN1') as pacientes_sexo
--, to_ascii(upper(pct.email::text),'LATIN1') as pacientes_email
  , to_ascii(upper(pct.cpf::text),'LATIN1') as pacientes_cpf
--, to_ascii(upper(pct.rg::text),'LATIN1') as pacientes_rg
--, to_ascii(upper(pct.codendereco::text),'LATIN1') as pacientes_codendereco
--, to_ascii(upper(pct.nr::text),'LATIN1') as pacientes_nr
  , to_ascii(upper(pct.tel_whatsapp::text),'LATIN1') as pacientes_tel_whatsapp
  , to_ascii(upper(pct.celular::text),'LATIN1') as pacientes_celular
  , to_ascii(upper(pct.telefone::text),'LATIN1') as pacientes_telefone

--, to_ascii(upper(cep.logradouro::text),'LATIN1') as tabcep_logradouro
  , to_ascii(upper(cep.municipio::text),'LATIN1') as tabcep_municipio
  , to_ascii(upper(cep.bairro::text),'LATIN1') as tabcep_bairro
  , to_ascii(upper(cep.cep::text),'LATIN1') as tabcep_cep
--, to_ascii(upper(cep.uf::text),'LATIN1') as tabcep_uf
--, to_ascii(upper(cep.tplogradouro::text),'LATIN1') as tabcep_tplogradouro
--, to_ascii(upper(cep.regional::text),'LATIN1') as tabcep_regional
--, to_ascii(upper(cep.numerocep::text),'LATIN1') as tabcep_numerocep
--, to_ascii(upper(cep.codlogradouro::text),'LATIN1') as tabcep_codlogradouro

  , to_ascii(upper(conv.codconvenio::text),'LATIN1') as convenios_codconvenio
  , to_ascii(upper(conv.convenio::text),'LATIN1') as convenios_convenio

  , to_ascii(upper(prof.codprofissional::text),'LATIN1') as profissionais_codprofissional
  , to_ascii(upper(prof.profissional::text),'LATIN1') as profissionais_profissional

  , to_ascii(upper(despro.descricaoprocedimento::text),'LATIN1') as procedimentos_descricaoprocedimento
  , to_ascii(upper(despro.codprocedimento::text),'LATIN1') as procedimentos_codprocedimento
--, to_ascii(upper(despro.id_codigo::text),'LATIN1') as procedimentos_id_codigo
--, to_ascii(upper(despro.descricaounificada::text),'LATIN1') as procedimentos_descricaounificada

  , to_ascii(upper(uni.codunidades::text),'LATIN1') as tab_unidades_codunidades
  , to_ascii(upper(uni.unidades::text),'LATIN1') as tab_unidades_unidades
  , to_ascii(upper(uni.logradouro::text),'LATIN1') as tab_unidades_logradouro
  , to_ascii(upper(uni.numero::text),'LATIN1') as tab_unidades_numero
  , to_ascii(upper(uni.bairro::text),'LATIN1') as tab_unidades_bairro
  , to_ascii(upper(uni.municipio::text),'LATIN1') as tab_unidades_municipio



FROM agenda a
 
FULL OUTER JOIN procedimentosagendados p
    ON (a.movimento = p.nratendimento)
   
INNER JOIN paciente pct
    ON (pct.codpaciente = a.paciente)
   
LEFT  JOIN tabcep cep
ON  pct.codendereco = cep.sequencial

INNER JOIN convenios conv
ON  conv.codconvenio = p.codtabela

INNER JOIN profissionais prof
ON  prof.codprofissional = p.codprofissional
   

INNER JOIN procedimentos despro
ON  despro.codprocedimento = p.procedimento
   
INNER JOIN unidades uni
ON  uni.codunidades = p.unidade

   
WHERE true ";






/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

