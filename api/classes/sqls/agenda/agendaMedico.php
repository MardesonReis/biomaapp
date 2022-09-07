<?php
$sql = "
SELECT
  medico
, data
, turno
, mesano
, trim(observacao) as observacao
, horario
, sequencial
, status
, tratamento
, reservado
, usuario
, unidade
, especialidade
, motivodesmarcar
, tipodeplantao
, trim(consultorio) as consultorio
, codconsultorio
, avulso
FROM agendamedicobioclinica

WHERE 
data >= CURRENT_DATE 
AND data <= CURRENT_DATE + 30

--AND medico = '001'
--AND status = 'N'




";


