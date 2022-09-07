<?php
header('Content-Type: application/json; charset=utf-8');
require_once 'classes/auth.php';
require_once 'classes/Procedimentos.class.php';
require_once 'classes/agenda.class.php';
require_once 'classes/Dados_Paciente.class.php';
require_once 'classes/ferramentas.class.php';
require_once 'classes/pacientes.class.php';
require_once 'classes/medicos.class.php';
require_once 'classes/unidades.class.php';
require_once 'classes/especialidades.class.php';
require_once 'classes/convenios.class.php';
require_once 'classes/monobino.calss.php';
require_once 'classes/data.class.php';
require_once 'classes/agendaMedico.class.php';
require_once 'classes/usuarios.class.php';
require_once 'classes/fila.class.php';
require_once 'classes/localizacao.class.php';
require_once 'classes/fidelimax.class.php';





class Rest
{
	public static function open($requisicao)
	{
		$url = explode('/', $requisicao['url']);
		
		$classe = ucfirst($url[0]);
		array_shift($url);

		$metodo = $url[0];
		array_shift($url); // Elimina o array 0

		$parametros = array();
		$parametros = $url;
              
                
//                var_dump($parametros);

		try {
			if (class_exists($classe)) {
				if (method_exists($classe, $metodo)) {
					$retorno = call_user_func_array(array(new $classe, $metodo), $parametros);

					return json_encode((array) array('status' => 'sucesso', 'total' => count((array)$retorno), 'dados' => (array)$retorno));
				} else {
					return json_encode ( (array) array('status' => 'erro', 'dados' => 'Método inexistente!'));
				}
			} else {
				return json_encode((array)  array('status' => 'erro', 'dados' => 'Classe inexistente!'));
			}	
		} catch (Exception $e) {
			return json_encode((array)  array('status' => 'erro', 'dados' => $e->getMessage()));
		}
		
	}
}
if (isset($_REQUEST)) {
	echo Rest::open($_REQUEST);
}