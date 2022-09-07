<?php
$sql = "

SELECT
  codconvenio
, trim(convenio) as descricao
, codtabela
, ativo

FROM convenios

Where true

AND ativo = 'S'

";

        
        
        
