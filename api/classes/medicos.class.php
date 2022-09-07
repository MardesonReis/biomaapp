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

class medicos extends Conexao {

    public function __construct() {
        parent::__construct();
    }


    function listar($codprofissional = null, $medicoLike = null) {
        $_sql = '';
        $procedimentos = array();

        include getcwd() . '/classes/sqls/medicos/medicos.php';

        if (@$medicoLike) {
            @$_sql = @$_sql . " AND profissional  like '" . strtoupper(@$medicoLike) . "%' ";
        }
        if (@$codprofissional) {
            @$_sql = @$_sql . " AND codprofissional  = '" . strtoupper(@$codprofissional) . "'";
        }
        if (true) {
            @$_sql = @$_sql . "   order by   profissional asc ";
        }

        $sql = $sql . '' . $_sql;
        //  echo $sql;
        $consulta = $this->QueryBio($sql);
        $medico = array();
        if ($consulta) {

            while ($r = pg_fetch_assoc($consulta)) {
                $procedimentos[] = $r;
            }

//             
        } else {

            $procedimentos[] = pg_result_error($consulta) . 'Erro';
        }


        return $procedimentos;
    }
    
        function avaliacao($codprofissional = null) {
        $_sql = '';
        $procedimentos = array();

        include getcwd() . '/classes/sqls/medicos/avaliacao.php';

     
        if (@$codprofissional) {
            @$_sql = @$_sql . " AND p.codprofissional  = '" . strtoupper(@$codprofissional) . "'";
        }
        if (true) {
            @$_sql = @$_sql . "   order by  p.profissional asc ";
        }

        $sql = $sql . '' . $_sql;
        //  echo $sql;
        $consulta = $this->QueryBio($sql);
        $medico = array();
        if ($consulta) {

            while ($r = pg_fetch_assoc($consulta)) {
                $procedimentos[] = $r;
            }

//             
        } else {

            $procedimentos[] = pg_result_error($consulta) . 'Erro';
        }


        return $procedimentos;
    }
}
