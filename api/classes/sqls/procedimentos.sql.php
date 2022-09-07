<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 $sql = "
SELECT
DISTINCT
   tabOp.tabop_codprocedimento  as cod_procedimento

, tabOp.tabop_unidade as cod_unidade
, und.unidades as unidade


, tabOp.tabop_codconvenio as cod_convenio
, tabOp.tabop_convenio as convenio

, tabOp.tabop_especialidade as cod_especialidade
, esp.especialidade as especialidade

, tabOp.tabop_id  as cod_tabela
, tabOp.tabop_valor as valor
, tabOp.tabop_quantidade
, proceagd.frequencia_abs
, p.descricaoprocedimento as descricao
, p.codtptratamento
, p.descricaounificada
, trim(trata.tratamento) as tipo_tratamento
, trata.codtratamento as cod_tratamento
, trata.agendar
, trata.tptratamento
--, trata.especialidade
--, p.realiza
--, p.exibir
--, p.ativo as procedimento_ativo
--, p.visivel_app
--, p.indice
--, p.idmapa

--, und.ativo as unidades_ativo
--, und.logradouro as unidades_logradouro
--, und.numero unidades_numero
--, und.municipio unidades_municipio
--, und.uf unidades_uf
--, und.cep unidades_cep
--, und.cnpj unidades_cnpj
--, und.bairro unidades_bairro
  ,   proProc.id
  ,   proProc.profissionais
FROM procedimentos as p



INNER JOIN (

SELECT
  MAX(tbop.tabop_id) as tabop_id,
  tbop.tabop_unidade,
  tbop.tabop_convenio,
  tbop.tabop_codconvenio,
  tbop.tabop_especialidade,
  tbop.tabop_codprocedimento,
  tbop.tabop_quantidade,
  CAST(REPLACE(REPLACE(tbop.tabop_valor::text, '.', ''),',','.') AS DECIMAL(18,2)) as tabop_valor

FROM tabelasoperadoras as tbop


WHERE 
tbop.tabop_ativo = 'S'
AND CAST(tbop.tabop_datainicio AS DATE) <=  CAST(CURRENT_DATE AS DATE)  
AND CAST(tbop.tabop_datafim AS DATE) >=  CAST(CURRENT_DATE AS DATE)  

GROUP BY  
tbop.tabop_unidade,
tbop.tabop_convenio,
tbop.tabop_codconvenio,
tbop.tabop_especialidade,
tbop.tabop_codprocedimento,
tbop.tabop_quantidade,
CAST(REPLACE(REPLACE(tbop.tabop_valor::text, '.', ''),',','.') AS DECIMAL(18,2))



) tabOp 
ON (
    tabOp.tabop_codprocedimento =  p.codprocedimento
--AND tabOp.tabop_especialidade =  p.codespecialidade

)
LEFT JOIN especialidades esp
ON (esp.codespecialidade = tabOp.tabop_especialidade)

INNER JOIN tipotratamento trata
ON (trata.codtratamento = p.codtptratamento )

INNER JOIN unidades und
ON (und.codunidades = tabOp.tabop_unidade)


left JOIN(
     Select 
     pag.procedimento
     , pag.status
     , pag.codtabela
     ,COUNT(pag.procedimento) as frequencia_abs 
     
from procedimentosagendados as pag
WHERE 
pag.status = 'R'
AND datamovimento  > CURRENT_DATE - 90
AND procedimento != '10000021'
AND pag.codtabela != '15'
GROUP BY pag.procedimento, pag.status, pag.codtabela
ORDER BY pag.procedimento, pag.status, pag.codtabela

limit 1000
) proceagd ON (
p.codprocedimento = proceagd.procedimento
AND tabOp.tabop_codconvenio = proceagd.codtabela
)

left JOIN profissionaisprocedimentos as proProc
ON( 

proProc.procedimentos = p.codprocedimento 


)

WHERE 
p.realiza = 'S'
";

 