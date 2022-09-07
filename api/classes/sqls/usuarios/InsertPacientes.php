<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$sql ="
INSERT INTO paciente
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
, '".$dado['nome_amigo']."' 
, '0' 
, '".$dado['telefone_amigo']."' 
, '1111-11-11' 
, '".$dado['telefone_amigo']."' 
, '' 
, '0' 
, 'M' 
, '".$data."' 
, '9' 
, '' 
, '".$dado['email_amigo']."' 
, '".$data."' 
, '".$dado['cpf_amigo']."' 
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
, 'null' 
, 'null' 
, 'null' 
, 'f' 
, 'null' 
, '217169' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 't' 
, 'f' 
, 'null' 
, 'null' 
, 'null' 
, 'f' 
, 'f' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 
, 'null' 

) RETURNING codpaciente

";