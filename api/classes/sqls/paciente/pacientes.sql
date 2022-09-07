SELECT
  to_ascii(upper(p.nomepaciente::text), 'LATIN1') as nomepaciente
, to_ascii(upper(p.telefone::text), 'LATIN1') as telefone
, to_ascii(upper(p.celular::text), 'LATIN1') as celular
, to_ascii(upper(p.codpaciente::text), 'LATIN1') as codpaciente
, to_ascii(upper(p.tel_whatsapp::text), 'LATIN1') as tel_whatsapp
, to_ascii(upper(p.datanascimento::text), 'LATIN1') as datanascimentoPaciente


, pro_list.datamovimento
--, pro_list.paciente
--, pro_list.procedimento
, pro_list.status
, pro_list.codprofissional
--, pro_list.unidade
--, pro_list.especialidades
--, pro_list.codtabela

, to_ascii(upper(conv.convenio::text),'LATIN1') as convenios_convenio
, to_ascii(upper(despro.descricaoprocedimento::text),'LATIN1') as procedimentos_descricaoprocedimento
, to_ascii(upper(prof.profissional::text),'LATIN1') as profissionais_profissional
, to_ascii(upper(uni.unidades::text),'LATIN1') as tab_unidades_unidades



, extract(year from age(datanascimento)) as idade
--, at_ref_id
--, tipoRef_id
, biomic.id_biomic
, cmbrefrasc_od as refracao_sc_d
, cmbrefrasc_oe as refracao_sc_e

--, cmbrefraavod
--, cmbrefraavoe



--, cmbrefraadicaood as refracao_ad_d
--, cmbrefraadicaooe as refracao_ad_e

, to_ascii(upper(pro_ag.lc::text), 'LATIN1')  as usuario_lc


, to_ascii(upper(tipoRef.descricao::text), 'LATIN1')  as tipo_refracao


, CAST (atendrefracao.dataatendimento AS DATE) as UltimaRefracao
,  extract(year from age(atendrefracao.dataatendimento)) as UltimaRefracaoEmAnos

, to_ascii(upper(cmbrefraesfod::text), 'LATIN1')  as esferico_d
, to_ascii(upper(cmbrefraesfoe::text), 'LATIN1') as esferico_e



, to_ascii(upper(cmbrefracilod::text), 'LATIN1') as cilindrico_d
, to_ascii(upper(cmbrefraciloe::text), 'LATIN1') as cilindrico_e
--

, to_ascii(upper(cmbrefraeixood::text), 'LATIN1') as eixo_d
, to_ascii(upper(cmbrefraeixooe::text), 'LATIN1') as eixo_e
--
, to_ascii(upper(astigmatismood::text), 'LATIN1') as astgmatismo_d
, to_ascii(upper(astigmatismooe::text), 'LATIN1') as astgmatismo_e

--, to_ascii(upper(alvood::text), 'LATIN1') as alvo_d
--, to_ascii(upper(alvooe::text), 'LATIN1') as alvo_e

, atendbiomicroscopia.k1
, atendbiomicroscopia.eixok1
, atendbiomicroscopia.k2
, atendbiomicroscopia.eixok2
, atendbiomicroscopia.k1oe
, atendbiomicroscopia.k2oe
, atendbiomicroscopia.eixok1oe
, atendbiomicroscopia.eixok2oe
, atendbiomicroscopia.kmediood
, atendbiomicroscopia.kmediooe
, atendbiomicroscopia.difod
, atendbiomicroscopia.difoe


FROM paciente as p

LEFT JOIN (
select
  MAX(atendrefracao.idrefra) as at_ref_id
, atendrefracao.paciente
--, atendrefracao.tprefracao as tipoRef_id


FROM atendrefracao

JOIN tipodadorefrativo
ON (tipodadorefrativo.codtipo = atendrefracao.tprefracao)

WHERE tipodadorefrativo.codtipo = '11'
      OR tipodadorefrativo.codtipo = '12'
      OR tipodadorefrativo.codtipo = '19'
      OR tipodadorefrativo.codtipo = '04'
      OR tipodadorefrativo.codtipo = '03'
      OR tipodadorefrativo.codtipo = '02'
      OR tipodadorefrativo.codtipo = '01'
      OR tipodadorefrativo.codtipo = '00'
      OR tipodadorefrativo.codtipo = '10'
      OR tipodadorefrativo.codtipo = '09'
      OR tipodadorefrativo.codtipo = '15'

group by atendrefracao.paciente
order by atendrefracao.paciente desc
) at_ref
ON (to_ascii(upper(at_ref.paciente::text), 'LATIN1') = to_ascii(upper(p.codpaciente::text), 'LATIN1')
)

JOIN atendrefracao
ON (atendrefracao.idrefra = at_ref_id)

LEFT JOIN (
select
  datamovimento
, paciente
, procedimento
, status
, codprofissional
, unidade
, especialidades
, codtabela

from procedimentosagendados
) pro_list ON (
to_ascii(upper(pro_list.paciente::text), 'LATIN1') = to_ascii(upper(p.codpaciente::text), 'LATIN1')
)

LEFT JOIN (
select
 to_ascii(upper(paciente::text), 'LATIN1') as paciente
, COUNT (to_ascii(upper(procedimento::text), 'LATIN1')) as lc

from procedimentosagendados
WHERE
   to_ascii(upper(procedimento::text), 'LATIN1') = '10013102'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10012104'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011321'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011986'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10012101'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011660'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011871'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011981'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011761'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '00000602'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011657'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011542'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011661'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011872'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10012103'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011991'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011211'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011989'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011333'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011654'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10013105'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10013101'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011656'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011662'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011322'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011766'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011990'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011659'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '00011540'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '00011320'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011658'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10013104'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011762'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011335'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10012102'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011650'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '00012199'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011763'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011327'
OR to_ascii(upper(procedimento::text), 'LATIN1') = '10011334'


group by paciente, procedimento
order by paciente desc
) pro_ag ON (
to_ascii(upper(pro_ag.paciente::text), 'LATIN1') = to_ascii(upper(p.codpaciente::text), 'LATIN1')
)


LEFT JOIN
(

select
   atendbiomicroscopia.paciente
,  MAX(atendbiomicroscopia.idbio) as id_biomic

FROM atendbiomicroscopia

group by atendbiomicroscopia.paciente
order by atendbiomicroscopia.paciente desc

) biomic ON (
biomic.paciente = p.codpaciente
)

JOIN atendbiomicroscopia
ON (atendbiomicroscopia.idbio = biomic.id_biomic)

JOIN tipodadorefrativo as  tipoRef
ON (tipoRef.codtipo = atendrefracao.tprefracao)

INNER JOIN convenios conv
ON  (conv.codconvenio = pro_list.codtabela)

INNER JOIN (
SELECT
  codprofissional
, profissional

FROM profissionais

)
prof
ON  (prof.codprofissional = pro_list.codprofissional)
   

INNER JOIN procedimentos despro
ON  (despro.codprocedimento = pro_list.procedimento)
   
INNER JOIN unidades uni
ON  (uni.codunidades = pro_list.unidade)

WHERE true 

select 
to_ascii(upper(atf.cmbrefraesfod::text), 'LATIN1') as esferico_d
, Trim(coalesce(REPLACE(atf.cmbrefraesfod::text, 'PLANO', '0'),'8')) as tabop_valor
from atendrefracao as atf

WHERE true
select

coalesce(REPLACE(REPLACE(REPLACE(atf.cmbrefraesfod::text, 'PLANO', '0') ,'' , '0'), '-', '0') '0')
from atendrefracao as atf
WHERE true


