<?php
    $sql = "

SELECT
  procedimentosagendados.datamovimento as data_movimento
, procedimentosagendados.paciente as cod_paciente
, trim(procedimentosagendados.procedimento) as cod_procedimento
, trim(procedimentos.descricaoprocedimento) as des_procedimento
, trim(procedimentos.descricaounificada) as des_uni_procedimentos
, procedimentosagendados.status
, procedimentosagendados.olho
, procedimentosagendados.dataatendimento
, profissionais.codprofissional as cod_profissional
, trim(profissionais.profissional) as des_profissional
, procedimentosagendados.unidade as cod_unidade
, trim(unidades.unidades) as des_unidade
, procedimentosagendados.especialidades as cod_especialidade
, trim(especialidades.especialidade) as des_especialidade
, procedimentosagendados.codtabela as cod_convenio
, trim(convenios.convenio) as des_convenio
, nratendimento as cod_atendimento
, procedimentosagendados.codparceiro as cod_parceiro
, trim(paciente.cpf) as cpf_paciente
, trim(tabparceiros.pa_cnpj_parceiro) as cpf_parceiro
, tbop.tabop_quantidade as quantidade
, trim(tbop.tabop_valor) as valor
, trim(age.horamarcacao) as hora_marcacao
FROM procedimentosagendados

LEFT JOIN paciente
ON (paciente.codpaciente = procedimentosagendados.paciente)

LEFT JOIN tabparceiros
ON (tabparceiros.id_parceiro = procedimentosagendados.codparceiro)

INNER JOIN procedimentos ON (procedimentos.codprocedimento = procedimentosagendados.procedimento)
INNER JOIN profissionais ON (profissionais.codprofissional = procedimentosagendados.codprofissional)
INNER JOIN unidades ON (unidades.codunidades = procedimentosagendados.unidade)
INNER JOIN especialidades ON (especialidades.codespecialidade = procedimentosagendados.especialidades)
INNER JOIN convenios ON (convenios.codconvenio = procedimentosagendados.codtabela)

INNER JOIN tabelasoperadoras tbop
ON (
tbop.tabop_ativo = 'S'
AND CAST(tbop.tabop_datainicio AS DATE) <=  CAST(CURRENT_DATE AS DATE)  
AND CAST(tbop.tabop_datafim AS DATE) >=  CAST(CURRENT_DATE AS DATE)  
AND tbop.tabop_unidade = procedimentosagendados.unidade
AND tbop.tabop_codconvenio = procedimentosagendados.codtabela
AND tbop.tabop_especialidade = procedimentosagendados.especialidades
AND tbop.tabop_codprocedimento = procedimentosagendados.procedimento
)

INNER JOIN agenda age
ON (age.movimento = procedimentosagendados.nratendimento)


WHERE true 


 "; 