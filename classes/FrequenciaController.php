<?php
include_once 'Frequencia.php';
include_once 'FrequenciaDAO.php';


	if($_REQUEST['acao']){
		$frequenciaDAO = new FrequenciaDAO();
		$resultado = false;
		switch ($_REQUEST['acao']) {
			case 'inserir':
				$frequencia = new Frequencia();
				$frequencia->idAula = $_REQUEST['idAula'];
				$frequencia->idAluno = $_REQUEST['idAluno'];
				$frequencia->numFaltas = $_REQUEST['faltas'];
				$resultado = $frequenciaDAO->insert($frequencia);
				break;
		}
		echo $resultado;
	}


?>