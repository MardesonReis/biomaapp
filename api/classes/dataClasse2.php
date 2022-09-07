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

class data extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    function listar($codprofissional = null, $medicoLike = null) {
        $_sql = '';
        $procedimentos = array();

        include getcwd() . '/classes/sqls/data/data.php';

        if (@$medicoLike) {
            @$_sql = @$_sql . " AND prof.profissional  like '" . strtoupper(@$medicoLike) . "%' ";
        }
        if (@$codprofissional) {
            @$_sql = @$_sql . " AND prof.codprofissional  = '" . strtoupper(@$codprofissional) . "'";
        }
        if (true) {
            @$_sql = @$_sql . "  AND convProc.codconveniomedico = '40'  order by  p.codtptratamento, convProc.codconveniomedico , unid.codunidades desc ";
        }

        $sql = $sql . '' . $_sql;
        //  echo $sql;
        $consulta = $this->QueryBio($sql);
        if ($consulta) {

            while ($r = pg_fetch_assoc($consulta)) {
                $id = $r['codprofissional'];
                  $grupo = 'OUTROS PROCEDIMENTOS GERAIS';
                $sqlDW = "SELECT   codprocedimento , grupos FROM controle.procedimentos_grupos WHERE codprocedimento =  '" . trim($r['cod_procedimentos']) . "'";
                $consultaDW = $this->QueryDW($sqlDW);
                while ($rdw = pg_fetch_assoc(@$consultaDW)) {
                    $grupo = $rdw['grupos'];
                }
          $procedimentos[] = array(
                    'crm' => $r['crm'],
                    'cpf' => $r['cpf'],
                    'cod_profissional' => $r['codprofissional'],
                    'des_profissional'=>$r['des_profissional'],
                    'sub_especialidade'=>$r['sub_especialidade'],
                    'cod_especialidade' => $r['cod_especialidade'],
                    'des_especialidade'=>$r['des_especialidade'],
                    'grupo' => $grupo,
                    'idade_mim' => $r['idade_mim'],
                    'idade_max'=>$r['idade_max'],
                    'cod_unidade'=>$r['cod_unidade'],
                    'des_unidade'=>$r['des_unidade'],
                    'cod_convenio'=>$r['cod_convenio'],
                    'desc_convenio'=>$r['desc_convenio'],
                    'cod_unidade' => $r['cod_unidade'],
                    'des_unidade' => $r['des_unidade'],
                    'cod_procedimentos' => $r['cod_procedimentos'],
                    'des_procedimentos' =>  empty($r['des_procedimentos_uni']) ? $r['des_procedimentos'] : $r['des_procedimentos_uni'],
                    'cod_tratamento' => $r['cod_tratamento'],
                    'tipo_tratamento' =>   $r['tipo_tratamento'],
                    'tabop_quantidade' => $r['tabop_quantidade'],
                    'valor'=> number_format(doubleval(trim($r['tabop_valor'])), 2, '.', ''));
            }
           
          
         
        } else {

            $procedimentos[] = pg_result_error($consulta) . 'Erro';
        }


        return $procedimentos;
    }

}
