<?php
$sql = "


SELECT
  trim(p.codprofissional) as cod_profissional
, trim(p.profissional) as des_profissional
, p.especialidade as cod_especialidade
, trim(p.celular) as celular
, trim(p.crm) as crm
, trim(p.cpf) as crm
, freq.requencia as atendimentos 
, pc.requencia as pacientes
FROM profissionais as p

INNER JOIN(
SELECT
DISTINCT  codprofissional
, COUNT(*) as requencia

FROM procedimentosagendados

where true

AND status = 'R'  AND procedimento != '' AND codtabela != '15'

GROUP BY  codprofissional

) freq ON (
 p.codprofissional = freq.codprofissional
)


INNER JOIN(
SELECT
DISTINCT  codprofissional
, COUNT(DISTINCT paciente) as requencia

FROM procedimentosagendados

where true

AND status = 'R'  AND procedimento != '' AND codtabela != '15'

GROUP BY  codprofissional


) pc ON (
 p.codprofissional = pc.codprofissional
)

where p.ativo = 'S'
";
