/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  user
 * Created: 19 de fev de 2022
 */
SELECT
  descricaoprocedimento
, codprocedimento
, id_codigo
, codigoamb
, realiza
, exibir
, ativo
, visivel_app
, descricaounificada
, indice
, codespecialidade
, idmapa
, tabOp.tabop_id 
, tabOp.tabop_valor 
, tabOp.tabop_codprocedimento
, tabOp.tabop_codconvenio
, tabOp.tabop_convenio
, tabOp.tabop_especialidade

FROM "public".procedimentos as p



LEFT JOIN (





SELECT
  MAX(tbop.tabop_id) as tabop_id,
  tbop.tabop_codprocedimento,
  tbop.tabop_codconvenio,  
  tbop.tabop_convenio,
  tbop.tabop_especialidade,
  CAST(REPLACE(REPLACE(tbop.tabop_valor::text, '.', ''),',','.') AS DECIMAL(18,2)) as tabop_valor

FROM "public".tabelasoperadoras as tbop


WHERE 
tbop.tabop_ativo = 'S'
AND CAST(tbop.tabop_datainicio AS DATE) <=  CAST(CURRENT_DATE AS DATE)  
AND CAST(tbop.tabop_datafim AS DATE) >=  CAST(CURRENT_DATE AS DATE)  

GROUP BY  tbop.tabop_codprocedimento,  tbop.tabop_codconvenio, tbop.tabop_convenio, tbop.tabop_especialidade, CAST(REPLACE(REPLACE(tbop.tabop_valor::text, '.', ''),',','.') AS DECIMAL(18,2))



) tabOp 
ON (
    tabOp.tabop_codprocedimento =  p.codprocedimento
AND tabOp.tabop_especialidade =  p.codespecialidade

)

WHERE 
p.visivel_app = 'S'
AND descricaoprocedimento like '%CONSULTA%'
