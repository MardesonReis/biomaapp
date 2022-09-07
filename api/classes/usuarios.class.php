<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of usuarios
 *
 * @author user
 */
class usuarios extends Conexao {

    public function __construct() {
        parent::__construct();
    }

    function listarIndicacao($cpf = null) {
        $data = date("d-m-Y");

        $sql = "SELECT
  id
, nome_amigo
, email_amigo
, data_indicacao
, hora_indicacao
, cpf
, cpf_amigo
, telefone_amigo
, nova_indicacao
FROM bioma.indicacao_amigo ";
        

        if ($cpf) {
            $sql = $sql . " WHERE cpf = '" . $cpf . "' ";
        }

        $conexao = new Conexao();
        $consulta = $conexao->QueryDW($sql);
        if ($consulta) {

            while ($r = pg_fetch_assoc($consulta)) {
                $procedimentos[] = $r;
            }
//       
        } else {

            $procedimentos[] = pg_result_error($consulta) . '';
            $procedimentos[] = pg_last_error($this->conBio) . '';
        }
        return $procedimentos;
    }

    function AddParceiro($dado) {
        $data = date("d-m-Y H:i:s");

        $parceiro = null;
        $sql = " INSERT INTO tabparceiros"
                . "("
                //     . "   id_parceiro"
                . "  pa_tipo_parceiro"
                . ",  pa_descricao_parceiro"
                . ",  pa_contato_parceiro"
                . ",  pa_cnpj_parceiro"
                . ",  pa_telefone_parceiro"
                . ",  pa_email"
                . ",  pa_situacao"
                . ",  pa_datacadastro"
                . ",  pa_senha"
                . ",  pa_unidade_parceiro"
                . ")"
                . " VALUES "
                . "("
                //    . "   'NULL'"
                . "   '" . $dado['pa_tipo_parceiro'] . "'"
                . ",  '" . $dado['pa_descricao_parceiro'] . "'"
                . ",  '" . $dado['pa_contato_parceiro'] . "'"
                . ",  '" . $dado['pa_cnpj_parceiro'] . "'"
                . ",  '" . $dado['pa_telefone_parceiro'] . "'"
                . ",  '" . $dado['pa_email'] . "'"
                . ",  'A'"
                . ",  '" . $data . "'"
                . ",  '123456'"
                . ",  '1'"
                . ") ";

        $conexao = new Conexao();
        $consulta = $conexao->QueryBio($sql);
        if (pg_num_rows($consulta) >= 1) {
            //  return $sql;
            return $this->ParceiroExiste($dado['pa_cnpj_parceiro']);
        } else {
            return false;
        }
    }

    function ParceiroExiste($cpf) {

        $sql = "SELECT "
                . "  id_parceiro as id_parceiro"
                . ", trim(pa_tipo_parceiro) as pa_tipo_parceiro"
                . ", trim(pa_descricao_parceiro) as pa_descricao_parceiro"
                . ", trim(pa_contato_parceiro) as pa_contato_parceiro"
                . ", trim(pa_cnpj_parceiro) as pa_cnpj_parceiro"
                . ", trim(pa_telefone_parceiro) as pa_telefone_parceiro"
                . ", trim(pa_unidade_parceiro) as pa_unidade_parceiro"
                . ", pa_convenio as pa_convenio"
                . ", trim(pa_telefone_parceiro2) as pa_telefone_parceiro2"
                . ", trim(pa_email) as pa_email"
                . ", (pa_valor_clinica) as pa_valor_clinica"
                . ", (pa_valor_parceiro) as pa_valor_parceiro"
                . ", (pa_valor_galego) as pa_valor_galego"
                . ", pa_situacao as pa_situacao"
                . ", (pa_datacadastro) as pa_datacadastro"
                . ", (pa_alteradopor) as pa_alteradopor"
                . ", (pa_alteracao) as pa_alteracao"
                . ", trim(pa_tipologradouro) as pa_tipologradouro"
                . ", trim(pa_logradouro) as pa_logradouro"
                . ", trim(pa_bairro) as pa_bairro"
                . ", (pa_cep) as pa_cep"
                . ", trim(pa_uf) as pa_uf"
                . ", trim(pa_municipio) as pa_municipio"
                . ", trim(pa_nr) as pa_nr"
                . ", trim(pa_complemento) as pa_complemento"
                . ", (pa_pontuacao) as pa_pontuacao"
                . ", trim(pa_crm_medicoparceiro) as pa_crm_medicoparceiro"
                . ", trim(pa_senha) as pa_senha "
                . "FROM tabparceiros "
                . "WHERE true "
                . "AND "
                . "trim(pa_cnpj_parceiro) = '" . $cpf . "' LIMIT 1";

        $conexao = new Conexao();
        $consulta = $conexao->QueryBio($sql);
        $a = '';
        if (pg_num_rows($consulta) >= 1) {
            while ($r = pg_fetch_assoc($consulta)) {

                return $r;
            }
        } else {
            return false;
        }
    }

    function VerificaOuCriaParceiro() {

        $data = date("d-m-Y H:i:s");

        $dado = $_POST;
        // $procedimentos[ ] = $_POST;
        //   var_dump($dado);
        $parceiro = $this->ParceiroExiste($dado['pa_cnpj_parceiro']);

        if ($parceiro) {

            $procedimentos[] = $parceiro;

            return $procedimentos;
        } else {
            if ($dado['pa_contato_parceiro'] != null) {
                $procedimentos[] = $this->AddParceiro($dado);
            } else {
                $procedimentos[] = 'Dados Incompletos';
            }

            return $procedimentos;
        }
    }

    function AddPaciente($dado) {
        $data = date("Y-m-d");

        $parceiro = null;
        $sql = "INSERT INTO paciente
(
  nomepaciente
, nr
, telefone
, datanascimento
, celular
, nomemae
, codantigopaciente
, sexo
, datacadastro
, estadocivil
, foto
, email
, dataatualizacao
, cpf
, rg
, codendereco
, tppaciente
, ocupacao
, formacao
, complemento
, nomemedico
--, codpaciente
, naturalidade
, procedencia
, restricao
, cartaosaude
, nacionalidade
, datatratamento
, grupopapg
, corgrupopapg
, ufnaturalidade
, ufprocedencia
, biometria
, ultimaconspapg
, biocadastrada
, caminhobio
, evento
, dedoinformadodig
, justificativabio
, tel_whatsapp
, cadeirante
, cep
, codio
, peso
, racacor
, altura
, datafimtratamento
, motivofimtratamento
, statussocio
, statusprogalternativo
, datainiciosocio
, datainiciopapgalternativo
, localdetrabalho
, autorizainformacoes
, pacientelaboratorio
, cadastrolaboratorio
, ultimoagendamentolaboratorio
, codpacientelaboratorio
, usuariocadastrou
, usuarioalterou
, autorizasms
, validade_anuidade_io
, renovacao_anuidade_io
, statusapg
, status
)
VALUES
(
  '" . $dado['nome_amigo'] . "' 
, '0' 
, '" . $dado['telefone_amigo'] . "' 
, '1111-11-11' 
, '" . $dado['telefone_amigo'] . "' 
, '' 
, '0' 
, 'M' 
, '" . $data . "' 
, '9' 
, '' 
, '" . $dado['email_amigo'] . "' 
, '" . $data . "' 
, '" . $dado['cpf_amigo'] . "' 
, '0' 
, '0' 
, '7' 
, '0' 
, '0' 
, '' 
, '' 
--, '0' 
, '' 
, '' 
, '' 
, '' 
, '' 
, '1111-11-11' 
, '\r' 
, '' 
, 'CE' 
, 'CE' 
, '' 
, '1111-11-11' 
, '0' 
, '' 
, '\r' 
, NULL 
, NULL 
, NULL 
, 'f' 
, NULL 
, '217169' 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 
, 't' 
, 'f' 
, NULL 
, NULL 
, NULL 
, 'f' 
, 'f' 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 
, NULL 

) RETURNING codpaciente";

        $conexao = new Conexao();

       $consulta = $conexao->QueryBio($sql);
        if (pg_num_rows($consulta) >= 1) {
            //  return $sql;
            return $this->PacienteExiste($dado[
                            'cpf_amigo']);
        } else {
            return false;
        }
    }

    function PacienteExiste($cpf) {

        $sql = "set client_encoding = 'UTF8';
                SELECT
                pct.codpaciente as pacientes_id
                , to_ascii(upper(pct.nomepaciente::text), 'LATIN1') as pacientes_nomepaciente
                , to_ascii(upper(pct.datanascimento::text), 'LATIN1') as pacientes_datanascimento
                , to_ascii(upper(pct.sexo::text), 'LATIN1') as pacientes_sexo
                --, to_ascii(upper(pct.email::text), 'LATIN1') as pacientes_email
                , to_ascii(upper(pct.cpf::text), 'LATIN1') as pacientes_cpf
                --, to_ascii(upper(pct.rg::text), 'LATIN1') as pacientes_rg
                , to_ascii(upper(pct.codendereco::text), 'LATIN1') as pacientes_codendereco
                , to_ascii(upper(pct.nr::text), 'LATIN1') as pacientes_nr
                , to_ascii(upper(pct.tel_whatsapp::text), 'LATIN1') as pacientes_tel_whatsapp
                , to_ascii(upper(pct.celular::text), 'LATIN1') as pacientes_celular
                , to_ascii(upper(pct.telefone::text), 'LATIN1') as pacientes_telefone
                , to_ascii(upper(ocup.ocupacao::text), 'LATIN1') as pacientes_ocupacao
                , to_ascii(upper(cep.logradouro::text), 'LATIN1') as tabcep_logradouro
                , to_ascii(upper(cep.municipio::text), 'LATIN1') as tabcep_municipio
                , to_ascii(upper(cep.bairro::text), 'LATIN1') as tabcep_bairro
                , to_ascii(upper(cep.cep::text), 'LATIN1') as tabcep_cep
                , to_ascii(upper(cep.uf::text), 'LATIN1') as tabcep_uf
                , to_ascii(upper(cep.tplogradouro::text), 'LATIN1') as tabcep_tplogradouro
                , to_ascii(upper(cep.regional::text), 'LATIN1') as tabcep_regional
                , to_ascii(upper(cep.numerocep::text), 'LATIN1') as tabcep_numerocep
                , to_ascii(upper(cep.codlogradouro::text), 'LATIN1') as tabcep_codlogradouro
                , atend.PrimeiroAtendimento as PrimeiroAtendimento
                , extract(year from age(atend.PrimeiroAtendimento)) as PrimeiroAtendimentoEmAnos
                , to_ascii(upper(pct.datanascimento::text), 'LATIN1') as datanascimentoPaciente
                , extract(year from age(pct.datanascimento)) as idade

                FROM paciente pct

                LEFT JOIN tabcep cep
                ON (pct.codendereco = cep.sequencial)

                LEFT JOIN ocupacao ocup
                ON ( ocup.codocupacao = pct.ocupacao)

                LEFT JOIN (
                SELECT
                MIN(CAST (datamovimento AS DATE)) as PrimeiroAtendimento
                , paciente

                FROM procedimentosagendados
                group by paciente
                order by paciente desc
                ) atend
                ON(
                atend.paciente = pct.codpaciente
                )

                WHERE to_ascii(upper(pct.cpf::text), 'LATIN1') = '" . $cpf . "'

                order by pct.codpaciente LIMIT 1";

        $conexao = new Conexao();
        $consulta = $conexao->QueryBio($sql);
        if (pg_num_rows($consulta) >= 1) {
            while ($r = pg_fetch_assoc($consulta)) {

                return $r;
            }
        } else {
            return false;
        }
    }

    function VerificaOuCriaPaciente() {

        $data = date("d-m-Y H:i:s");

        // $procedimentos[ ] = $_POST;
        //   var_dump($dado);
        $busca = $this->PacienteExiste($_POST['cpf_amigo']);

        if ($busca) {

            $procedimentos[] = $busca;

            return $procedimentos;
        } else {
            if ($_POST['cpf_amigo'] != null) {
                $procedimentos[] = $this->AddPaciente($_POST);
            } else {
                $procedimentos[] = 'Dados Incompletos';
            }

            return $procedimentos;
        }
    }

    function IndicacaoAmigosBioma() {

        $data_indicacao = date("Y/m/d");
        $hora_indicacao = date("H:i");

        $parceiro = null;
        $sql = " INSERT INTO bioma.indicacao_amigo"
                . "("
                . "  
                    -- id
                      nome_amigo
                    , email_amigo
                    , data_indicacao
                    , hora_indicacao
                    , cpf
                    , cpf_amigo
                    , telefone_amigo
                    , nova_indicacao  
                    "
                . ")"
                . " VALUES "
                . "("
                //    . "   'NULL'"
                . "  '".$_POST['nome_amigo']."'"
                . "  , '".$_POST['email_amigo']."'"
                . "  , '".$data_indicacao."'"
                . "  , '".$hora_indicacao."'"
                . "  , '".$_POST['cpf']."'"
                . "  , '".$_POST['cpf_amigo']."'"
                . "  , '".$_POST['telefone_amigo']."'"
                . "  , '".$_POST['nova_indicacao']."'"
          
                . ") RETURNING id ";

        $conexao = new Conexao();
        $consulta = $conexao->QueryDW($sql);
        if (pg_num_rows($consulta) >= 1) {
            //  return $sql;
            return $this->listarIndicacao($_POST['cpf']);
        } else {
            return false;
        }
    }

}

?>
