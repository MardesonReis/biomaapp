<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$sql = "
SELECT
  (codunidades) as codunidades
, trim(unidades) as unidades
, trim(contato) as contato
, trim(logo) as logo
, trim(ativo) as ativo
, trim(nomecompleto) as nomecompleto
, trim(logradouro) as logradouro
, trim(numero) as numero
, trim(complemento) as complemento
, trim(municipio) as municipio
, trim(uf) as uf
, trim(codibge) as codibge
, trim(cep) as cep
, trim(cnpj) as cnpj
, trim(bairro) as bairro
, trim(novidades) as novidades
, (cnes) as cnes
FROM unidades

WHERE true

";
