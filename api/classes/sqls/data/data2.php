<?php

$sql = "

SELECT
DISTINCT 
--tbop.tabop_codprocedimento,
--tbop.tabop_quantidade

  trim(prof.codprofissional) as codprofissional
, trim(prof.profissional) as des_profissional
, convProc.codconveniomedico as cod_convenio
, convProc.profissional
, trim(convProc.nometabela) as desc_convenio 
, trim(p.codprocedimento) as cod_procedimentos
, trim(p.descricaoprocedimento) as des_procedimentos
, trim(p.descricaounificada) as des_procedimentos_uni
, trim(trata.tratamento) as tipo_tratamento
, trata.codtratamento as cod_tratamento
, tbop.tabop_quantidade
, tbop.tabop_valor
, prof.idademin as idade_mim
, prof.idademax as idade_max
, trim(prof.subespecialidade) as sub_especialidade
--, prof.especialidade
--, trim(prof.celular) as celular
, trim(prof.crm) as crm
--, extract(year from age(prof.datanascimento)) as idade

, trim(prof.cpf) as cpf
--, trim(prof.nomecompleto) as nomecompleto
--, trim(prof.tipoatendimento) as tipoatendimento
--, trim(prof.subespecialidade) as subespecialidade
, prof.especialidade as cod_especialidade
, trim(esp.especialidade)  as des_especialidade
, prof.idademin 
, prof.idademax

, unid.codunidades as cod_unidade
, trim(unid.unidades) as des_unidade
--, trim(prof.ativo) as ativo
, freq.requencia  as frequencia
--FROM tabelasoperadoras as tbop
FROM profissionais as prof






INNER JOIN profissionaisprocedimentos as proProc
ON( 

proProc.profissionais = prof.codprofissional 

)

INNER JOIN conveniosprofissionais as convProc
ON( 

convProc.profissional = prof.codprofissional 

)

INNER JOIN profissionaluni as unidProf
ON( 

unidProf.codprofissionaluni = prof.codprofissional 

)

INNER JOIN unidades as unid
ON( 

unid.codunidades = unidProf.unidade 

)

INNER JOIN especialidades esp
ON (esp.codespecialidade = prof.especialidade)

INNER JOIN tabelasoperadoras tbop
ON (
tbop.tabop_ativo = 'S'
AND CAST(tbop.tabop_datainicio AS DATE) <=  CAST(CURRENT_DATE AS DATE)  
AND CAST(tbop.tabop_datafim AS DATE) >=  CAST(CURRENT_DATE AS DATE)  
AND tbop.tabop_unidade = unid.codunidades
AND tbop.tabop_codconvenio = convProc.codconveniomedico
AND tbop.tabop_especialidade = prof.especialidade
AND tbop.tabop_codprocedimento = proProc.procedimentos

)

INNER JOIN procedimentos as p
ON (p.codprocedimento = proProc.procedimentos)

INNER JOIN tipotratamento trata
ON (trata.codtratamento = p.codtptratamento AND trata.especialidade = prof.especialidade)


INNER JOIN(
SELECT
  DISTINCT medico,  unidade , status

FROM agendamedicobioclinica

WHERE 
data >= CURRENT_DATE 
AND data <= CURRENT_DATE + 30
AND status = 'N'
) agdMedico ON (
agdMedico.medico = prof.codprofissional
AND agdMedico.unidade = unid.codunidades
)

INNER JOIN(
SELECT
  
DISTINCT  procedimento
, COUNT(*) as requencia

FROM procedimentosagendados

where  datamovimento > current_date - 1080 
AND status = 'R'  AND procedimento != ''

GROUP BY  procedimento

) freq ON (
--freq.unidade = unid.codunidades
--AND freq.codtabela = convProc.codconveniomedico
--AND freq.codprofissional = prof.codprofissional
 freq.procedimento = proProc.procedimentos



)

";
