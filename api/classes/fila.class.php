<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of fila
 *
 * @author user
 */
require_once 'conexao.php';

class fila extends Conexao {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function Agendar() {

        $procedimentos = array();

        $_sql = ""
                . "INSERT INTO agenda"
                . "("
                // . "movimento"
                . " datamovimento"
                . ", paciente"
                . ", codprofissional"
                . ", status"
                . ", convenio"
                . ", horamarcacao"
                . ", tratamento"
                . ", telefoneagenda"
                . ", formapgto"
                . ", transacao"
                . ", codusuario"
                . ", observacao"
                . ", unidade"
                . ", dataagendamento"
                . ", horaagendamento"
                . ", usuarioagendamento"
                . ", nomepaciente"
                . ", especialidade"
                . ", visivel"
                . ", unidadeagendamento"
                . ", procedimentos"
                . ", codparceiro"
                . ", regime"
                . ", teleatendimento"
                . ", confirmadorobo "
                . ")"
                . " VALUES"
                . "("
                // . "movimento"
                . "  '" . $_POST['datamovimento'] . "'"
                . ", '" . $_POST['paciente'] . "'"
                . ", '" . $_POST['codprofissional'] . "'"
                . ", '" . $_POST['status'] . "'"
                . ", '" . $_POST['convenio'] . "'"
                . ", '" . $_POST['horamarcacao'] . "'"
                . ", '" . $_POST['tratamento'] . "'"
                . ", '" . $_POST['telefoneagenda'] . "'"
                . ", '" . $_POST['formapgto'] . "'"
                . ", '" . $_POST['transacao'] . "'"
                . ", '" . $_POST['codusuario'] . "'"
                . ", '" . $_POST['observacao'] . "'"
                . ", '" . $_POST['unidade'] . "'"
                . ", '" . $_POST['dataagendamento'] . "'"
                . ", '" . $_POST['horaagendamento'] . "'"
                . ", '" . $_POST['usuarioagendamento'] . "'"
                . ", '" . $_POST['nomepaciente'] . "'"
                . ", '" . $_POST['especialidade'] . "'"
                . ", '" . $_POST['visivel'] . "'"
                . ", '" . $_POST['unidadeagendamento'] . "'"
                . ", '" . $_POST['procedimentos'] . "'"
                . ", '" . $_POST['codparceiro'] . "'"
                . ", '" . $_POST['regime'] . "'"
                . ", '" . $_POST['teleatendimento'] . "'"
                . ", '" . $_POST['confirmadorobo'] . "'"
                . ") "
                . " RETURNING movimento;";
        $json = json_decode($json);
        $a = '';
        //$procedimentos[] = $_sql;
        $consulta = $this->QueryBio($_sql);
        if ($consulta) {
            while ($r = pg_fetch_assoc($consulta)) {

                $procedimentos[] = $r;
            }
        } else {
            // $procedimentos[] = 'Erro'. pg_last_error($consulta);
        }
        foreach ($json as $key => $value) {
            //   $a .= ", '".$value."'";
        }
        return $procedimentos;
    }

    function procedimentosAgendados() {
        $procedimentos = array();
        // id_nragendado = sequencial_auto
        //nratendimento = seguencial_agenda
        $_sql = "
INSERT INTO procedimentosagendados(
  datamovimento 
, paciente
, tratamento
, procedimento
, status
, pacientereserva
, olho
, quantidade
, parecermedico
, dataatendimento
, codprofissional
, unidade
, especialidades
, codtabela
, nratendimento
, biometriapro
, id_codigo
, encaminhadopor
, origem
, atendente
, codparceiro
, usuarioagendamento
)
VALUES (
  '" . $_POST['datamovimento'] . "'
, '" . $_POST['paciente'] . "'
, '" . $_POST['tratamento'] . "'
, '" . $_POST['procedimento'] . "'
, '" . $_POST['status'] . "'
, '" . $_POST['pacientereserva'] . "'
, '" . $_POST['olho'] . "'
, '" . $_POST['quantidade'] . "'
, '" . $_POST['parecermedico'] . "'
, '" . $_POST['dataatendimento'] . "'
, '" . $_POST['codprofissional'] . "'
, '" . $_POST['unidade'] . "'
, '" . $_POST['especialidades'] . "'
, '" . $_POST['codtabela'] . "'
, '" . $_POST['nratendimento'] . "'
, '" . $_POST['biometriapro'] . "'
, '" . $_POST['id_codigo'] . "'
, '" . $_POST['encaminhadopor'] . "'
, '" . $_POST['origem'] . "'
, '" . $_POST['atendente'] . "'
, '" . $_POST['codparceiro'] . "'
, '" . $_POST['usuarioagendamento'] . "'
) RETURNING id_nragendado;

";

        //  $procedimentos[] = $_sql;
        $consulta = $this->QueryBio($_sql);
        if ($consulta) {


            while ($r = pg_fetch_assoc($consulta)) {

                $procedimentos[] = $r;
            }
        } else {
            $procedimentos[] = 'Erro' . pg_last_error($consulta);
        }


        return $procedimentos;
    }

    function GerarFilaIndicacao() {
        $procedimentos = array();

        $_sql = ""
                . "INSERT INTO bioma.fila_indicacao "
                . "("
                // . "id_indicacao"
                . "  descricao"
                . ", status"
                . ", data_criacao"
                . ", hora_criacao"
                . ", autor"
                . ", visivel"
                . ")"
                . " VALUES"
                . "("
                // . "movimento"
                . "  '" . $_POST['descricao'] . "'"
                . ", '" . $_POST['status'] . "'"
                . ", '" . $_POST['data_criacao'] . "'"
                . ", '" . $_POST['hora_criacao'] . "'"
                . ", '" . $_POST['autor'] . "'"
                . ", '" . $_POST['visivel'] . "'"
                . ") "
                . " RETURNING id_indicacao;";
        //$json = json_decode($json);
        $a = '';
        //    $procedimentos[] = $_sql;
        $consulta = $this->QueryDW($_sql);
        if ($consulta) {
            while ($r = pg_fetch_assoc($consulta)) {

                $procedimentos[] = $r;
            }
        } else {
            $procedimentos[] = 'Erro' . pg_last_error($consulta);
        }
        foreach ($json as $key => $value) {
            //   $a .= ", '".$value."'";
        }
        // $procedimentos = $_POST;

        return $procedimentos;
    }

    function indicar() {
        $procedimentos = array();

        $_sql = ""
                . "INSERT INTO bioma.indicacao_itens "
                . "("
                // id_servico
                . "  id_indicacao"
                . ",  cod_procedimento"
                . ",  des_procedimento"
                . ",  cod_convenio"
                . ",  des_convenio"
                . ",  cod_tratamento"
                . ",  des_tratamento"
                . ",  cod_especialista"
                . ",  des_especialista"
                . ",  cod_unidade"
                . ",  des_unidade"
                . ",  cod_especialidade"
                . ",  des_especialidade"
                . ",  status"
                . ",  valor"
                . ",  olho"
                . ",  quantidade"
                . ",  obs"
                . ",  data"
                . ",  hora"
                . ")"
                . " VALUES"
                . "("
                // . "id_servico"
                . "  '"  . $_POST['id_indicacao'] . "'"
                . ",  '" . $_POST['cod_procedimento'] . "'"
                . ",  '" . $_POST['des_procedimento'] . "'"
                . ",  '" . $_POST['cod_convenio'] . "'"
                . ",  '" . $_POST['des_convenio'] . "'"
                . ",  '" . $_POST['cod_tratamento'] . "'"
                . ",  '" . $_POST['des_tratamento'] . "'"
                . ",  '" . $_POST['cod_especialista'] . "'"
                . ",  '" . $_POST['des_especialista'] . "'"
                . ",  '" . $_POST['cod_unidade'] . "'"
                . ",  '" . $_POST['des_unidade'] . "'"
                . ",  '" . $_POST['cod_especialidade'] . "'"
                . ",  '" . $_POST['des_especialidade'] . "'"
                . ",  '" . $_POST['status'] . "'"
                . ",  '" . $_POST['valor'] . "'"
                . ",  '" . $_POST['olho'] . "'"
                . ",  '" . $_POST['quantidade'] . "'"
                . ",  '" . $_POST['obs'] . "'"
                . ",  '" . $_POST['data'] . "'"
                . ",  '" . $_POST['hora'] . "'"
                . ") "
                . " RETURNING id_servico;";
        //$json = json_decode($json);
        $a = '';
        // $procedimentos[] = $_sql;
            $consulta = $this->QueryDW($_sql);
        if ($consulta) {
            while ($r = pg_fetch_assoc($consulta)) {

                $procedimentos[] = $r;
            }
        } else {
            $procedimentos[] = 'Erro' . pg_last_error($consulta);
        }
        foreach ($json as $key => $value) {
            //   $a .= ", '".$value."'";
        }
        //$procedimentos = $_POST;

        return $procedimentos;
    }

    function loadIndicacoes($cpf, $id_indicacao, $id_servico) {
        $_sql = '';
        $procedimentos = array();
        if (@$cpf) {
            $_sql = $_sql . " AND fila.autor = '" . @$cpf . "'";
        };
        if (@$id_indicacao) {
            $_sql = $_sql . " AND fila.id_indicacao = '" . @$id_indicacao . "'";
        };
        if (@$id_servico) {
            $_sql = $_sql . " AND itens.id_servico = '" . @$id_servico . "'";
        };
        $sql = "
SELECT

  fila.id_indicacao
, iten.id_indicacao
, iten.id_servico
, fila.descricao
, fila.status
, fila.data_criacao
, fila.hora_criacao
, fila.autor
, fila.visivel
, iten.cod_procedimento
, iten.des_procedimento
, iten.cod_convenio
, iten.des_convenio
, iten.cod_tratamento
, iten.des_tratamento
, iten.cod_especialista
, iten.des_especialista
, iten.cod_unidade
, iten.des_unidade
, iten.cod_especialidade
, iten.des_especialidade
, iten.status
, iten.valor
, iten.olho
, iten.quantidade
, iten.obs
, iten.data
, iten.hora

FROM bioma.fila_indicacao as fila
INNER JOIN bioma.indicacao_itens iten
ON (fila.id_indicacao = iten.id_indicacao)

WHERE true ";

        $sql = $sql . $_sql;
        //  echo  $sql;
        //$json = json_decode($json);
        $a = '';
        // $procedimentos[] = $_sql;
        $consulta = $this->QueryDW($sql);
        if ($consulta) {
            while ($r = pg_fetch_assoc($consulta)) {
                $procedimentos[] = $r;
            }
        } else {
            $procedimentos[] = 'Erro' . pg_last_error($consulta);
        }
        foreach ($json as $key => $value) {
            //   $a .= ", '".$value."'";
        }
        // $procedimentos = $_POST;

        return $procedimentos;
    }

}
