<?php
$sql = "

SELECT
 
 tbop.tabop_especialidade as cod_especialidade
, trim(esp.especialidade)  as descricao
FROM tabelasoperadoras as tbop

INNER JOIN especialidades esp
ON (esp.codespecialidade = tbop.tabop_especialidade)

WHERE 
tbop.tabop_ativo = 'S'
AND CAST(tbop.tabop_datainicio AS DATE) <=  CAST(CURRENT_DATE AS DATE)  
AND CAST(tbop.tabop_datafim AS DATE) >=  CAST(CURRENT_DATE AS DATE)  

";

    
        
        
