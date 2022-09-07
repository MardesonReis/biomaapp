<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of medicos
 *
 * @author user
 */
require_once 'conexao.php';

class unidades extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    function listar($codunidades = null, $unidadeLike = null) {
        $_sql = '';
        $procedimentos = array();
        $unidade[1] = 'Rede Bioclinica';
        $unidade[2] = 'Rede Bioclinica ';
        $unidade[3] = 'Rede Bioclinica ';
        $unidade[6] = 'Rede Bioclinica ';
        
        include getcwd() . '/classes/sqls/unidades/unidades.php';
        if (@$codunidades) {
            @$_sql = @$_sql . " AND codunidades  = '" . (@$codunidades) . "' ";
        }
        if (@$unidadeLike) {
            @$_sql = @$_sql . " AND unidades  like '" . strtoupper(@$unidadeLike) . "%' ";
        }
        if (true) {
            @$_sql = @$_sql . " AND ativo = 'S' ";
        }



        $sql = $sql . '' . $_sql;
       // echo $sql;
        $consulta = $this->QueryBio($sql);
        if ($consulta) {

            while ($r = pg_fetch_assoc($consulta)) {
                $r['unidades'] =  $unidade[$r['codunidades']] ?? $r['unidades'];
                $procedimentos[] = $r;
               
            }
//       
        } else {

            $procedimentos[] = pg_result_error($consulta) . '';
            $procedimentos[] = pg_last_error($this->conBio) . '';
        }
        return $procedimentos;
    }

}
