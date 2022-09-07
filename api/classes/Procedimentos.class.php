<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Procedimentos
 *
 * @author user
 */
require_once 'conexao.php';

class Procedimentos extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    function listar($unidade = null, $convenio = null, $procedimento = null, $especialidade = null) {
        //  var_dump($unidade);
        $_sql = '';
        $procedimentos = array();
        $_total = 0;

        //  $con = new ConexaoD();
        include getcwd() . '/classes/sqls/procedimentos.sql.php';

        if (@$unidade) {

            $unidade = explode('_', $unidade);
            $i = 0;
            $s = '';
            foreach (@$unidade as $value) {


                if ($i == 0) {
                    @$s = @$s . " tabOp.tabop_unidade = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR tabOp.tabop_unidade = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . 'AND (' . $s . ') ';
        }
        if (@$convenio) {
            $convenio = explode('_', $convenio);
            $i = 0;
            $s = '';

            foreach (@$convenio as $value) {

                if ($i == 0) {
                    @$s = @$s . " tabOp.tabop_codconvenio = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR tabOp.tabop_codconvenio = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . 'AND (' . $s . ') ';
        }

        if (@$procedimento) {
            $procedimento = explode('_', $procedimento);
            $i = 0;
            $s = '';
            foreach (@$procedimento as $value) {

                if ($i == 0) {
                    @$s = @$s . " p.codprocedimento = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR p.codprocedimento = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . 'AND (' . $s . ')';
        }
        if (@$especialidade) {
            $especialidade = explode('_', $especialidade);
            $i = 0;
            $s = '';
            foreach (@$especialidade as $value) {

                if ($i == 0) {
                    @$s = @$s . " tabOp.tabop_especialidade = '" . @$value . "' ";
                } else {
                    @$s = @$s . " OR tabOp.tabop_especialidade = '" . @$value . "' ";
                }
                $i++;
            }
            @$_sql = @$_sql . ' AND (' . $s . ')';
        }
        if (true) {

            //@$_sql = @$_sql . " ORDER BY proceagd.frequencia_abs desc";
        }


        $sql = $sql . '' . $_sql;
//        /  echo $sql;
        $consulta = $this->QueryBio($sql);
        if ($consulta) {
            while ($r = pg_fetch_assoc($consulta)) {
                $grupo = 'OUTROS PROCEDIMENTOS GERAIS';
                $sqlDW = "SELECT   codprocedimento , grupos FROM controle.procedimentos_grupos WHERE codprocedimento =  '" . trim($r['cod_procedimento']) . "'";
                $consultaDW = $this->QueryDW($sqlDW);
                while ($rdw = pg_fetch_assoc(@$consultaDW)) {
                    $grupo = $rdw['grupos'];
                }
                $r['grupo'] = $grupo;
                $_total = $r['frequencia_abs'] + $_total;
                // $r['grupo'] =  explode(' ', trim($r['descricao']))[0];
                //$r['grupo'] = 'OUTROS';
                //      $r['ativo'] = trim($r['ativo']);
                $r['descricao'] = trim($r['descricao']);
                $r['descricaounificada'] = trim($r['descricaounificada']);
                $r['cod_procedimento'] = trim($r['cod_procedimento']);
                $r['cod_convenio'] = trim($r['cod_convenio']);
                $r['convenio'] = trim($r['convenio']);
                $r['especialidade'] = trim($r['especialidade']);
                $r['unidade'] = trim($r['unidade']);
                $r['valor'] = number_format(doubleval(trim($r['valor'])), 2, '.', '');

                //        $r['unidades_ativo'] = trim($r['unidades_ativo']);
                //    $r['unidades_logradouro'] = trim($r['unidades_logradouro']);
                //   $r['unidades_numero'] = trim($r['unidades_numero']);
                //   $r['unidades_municipio'] = trim($r['unidades_municipio']);
                //     $r['unidades_uf'] = trim($r['unidades_uf']);
                //      $r['unidades_cep'] = trim($r['unidades_cep']);
                //       $r['unidades_cnpj'] = trim($r['unidades_cnpj']);
                //        $r['unidades_bairro'] = trim($r['unidades_bairro']);
                $procedimentos[] = $r;
            }
            for ($index = 0; $index < count($procedimentos); $index++) {
                $procedimentos[$index]['frequencia'] = number_format(($procedimentos[$index]['frequencia_abs'] / $_total) * 100, 2, '.', '');
            }
        } else {
            $procedimentos[] = pg_last_error();
        }


        return $procedimentos;
    }

    function ProcedimentosAgendados($cpf_cliente = null, $cpf_parceiro = null) {
        if (@$cpf_cliente) {
            @$_sql = " and paciente.cpf = '" . @$cpf_cliente . "' ";
        }
        if (@$cpf_parceiro) {
            @$_sql = " AND pa_cnpj_parceiro = '" . @$cpf_parceiro . "' ";
        }
        if (true) {

            @$_sql = @$_sql . " ORDER BY procedimentosagendados.datamovimento desc limit 100";
        }

        include getcwd() . '/classes/sqls/procedimentos/procedimentosAgendados.php';
        $sql = $sql . '' . $_sql;
        //echo $sql;
        $consulta = $this->QueryBio($sql);
        if ($consulta) {
            while ($r = pg_fetch_assoc($consulta)) {
               if(date($r['data_movimento']) < date('Y-m-d') && $r['status'] != 'R'){
                $r['status'] = 'X'; 
               }
                $r['valor'] = str_replace(',', '.', str_replace('.', '', trim($r['valor'])));
                $r['des_procedimento'] = empty($r['des_uni_procedimentos']) ? $r['des_procedimento'] : $r['des_uni_procedimentos'];
                $r['cod_convenio'] == '40' ? $r['des_convenio'] = 'PARTICULAR' : $r['des_convenio'] = $r['desc_convenio'];
                $procedimentos[] = $r;
            };
        };
        return $procedimentos;
    }

}
