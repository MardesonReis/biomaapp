<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$sql = "SELECT
  biom.idbio
, biom.paciente
, biom.dataatendimento
, biom.profissional
, biom.k1
, biom.eixok1
, biom.k2
, biom.eixok2
, biom.k1oe
, biom.k2oe
, biom.eixok1oe
, biom.eixok2oe
, biom.kmediood
, biom.kmediooe
, biom.difod
, biom.difoe
, biom.txtanotacaobiood
, biom.txtanotacaobiooe
FROM atendbiomicroscopia as biom 

WHERE true

limit 100


";
        