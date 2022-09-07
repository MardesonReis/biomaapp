<?php
$sql = "

SELECT
  codprofissional as cod_profissional
, trim(profissional) as des_profissional 
, especialidade as cod_especialidade
, trim(celular) as celular
, trim(crm) as crm
, datanascimento as data_nascimento
, trim(cpf) as cpf
, trim(nomecompleto) as nomeCompleto
, ativo as ativo
, trim(email) as emial
, trim(subespecialidade) as subespecialidade
, idademin as idademin
, idademax as idademax
FROM profissionais
Where true
";

 
