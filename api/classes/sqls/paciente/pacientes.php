<?php
$sql = "set client_encoding = 'UTF8';
SELECT
pct.codpaciente as pacientes_id
, to_ascii(upper(pct.nomepaciente::text),'LATIN1') as pacientes_nomepaciente
, to_ascii(upper(pct.cpf::text),'LATIN1') as pacientes_cpf
, to_ascii(upper(pct.datanascimento::text),'LATIN1') as  pacientes_datanascimento
, to_ascii(upper(pct.sexo::text),'LATIN1') as pacientes_sexo
--, to_ascii(upper(pct.email::text),'LATIN1') as pacientes_email
--, to_ascii(upper(pct.cpf::text),'LATIN1') as pacientes_cpf
--, to_ascii(upper(pct.rg::text),'LATIN1') as pacientes_rg
, to_ascii(upper(pct.codendereco::text),'LATIN1') as pacientes_codendereco
, to_ascii(upper(pct.nr::text),'LATIN1') as pacientes_nr
, to_ascii(upper(pct.tel_whatsapp::text),'LATIN1') as pacientes_tel_whatsapp
, to_ascii(upper(pct.celular::text),'LATIN1') as pacientes_celular

, to_ascii(upper(pct.telefone::text),'LATIN1') as pacientes_telefone
, to_ascii(upper(pct.email::text),'LATIN1') as pacientes_email
, to_ascii(upper(ocup.ocupacao::text),'LATIN1') as pacientes_ocupacao

, to_ascii(upper(cep.logradouro::text),'LATIN1')  as tabcep_logradouro
, to_ascii(upper(cep.municipio::text),'LATIN1') as tabcep_municipio
, to_ascii(upper(cep.bairro::text),'LATIN1') as tabcep_bairro
, to_ascii(upper(cep.cep::text),'LATIN1') as tabcep_cep
, to_ascii(upper(cep.uf::text),'LATIN1') as tabcep_uf
, to_ascii(upper(cep.tplogradouro::text),'LATIN1') as tabcep_tplogradouro
, to_ascii(upper(cep.regional::text),'LATIN1') as tabcep_regional
, to_ascii(upper(cep.numerocep::text),'LATIN1') as tabcep_numerocep
, to_ascii(upper(cep.codlogradouro::text),'LATIN1') as tabcep_codlogradouro
--, atend.PrimeiroAtendimento as PrimeiroAtendimento
--,  extract(year from age(atend.PrimeiroAtendimento)) as PrimeiroAtendimentoEmAnos
, to_ascii(upper(pct.datanascimento::text), 'LATIN1') as datanascimentoPaciente
--, extract(year from age(pct.datanascimento)) as idade
--, atende.UltimoAtendimento as UltimoAtendimento
--,  extract(year from age(atende.UltimoAtendimento)) as UltimoAtendimentoEmAnos
FROM paciente pct
   
LEFT JOIN tabcep cep
ON  (pct.codendereco = cep.sequencial)

LEFT JOIN ocupacao ocup
ON ( ocup.codocupacao = pct.ocupacao)





WHERE true 

";

        
        

//LEFT JOIN (
//SELECT
//  MIN(CAST (datamovimento AS DATE)) as PrimeiroAtendimento
//, paciente 
//
//FROM procedimentosagendados
//group by paciente
//order by paciente desc
//) atend 
//ON(
//atend.paciente = pct.codpaciente
//)
//
//LEFT JOIN (
//SELECT
//  MAX(CAST (datamovimento AS DATE)) as UltimoAtendimento
//, paciente 
//
//FROM procedimentosagendados
//group by paciente
//order by paciente desc
//) atende 
//ON(
//atend.paciente = pct.codpaciente
//)
//        

