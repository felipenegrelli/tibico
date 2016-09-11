<?php
include_once 'Calendario.php';
include_once 'CalendarioDAO.php';

class CalendarioController{

	public function __construct()
	{

	}

	public function listaCalendarios(){
		$calendarioDAO = new CalendarioDAO();
		$lista = $calendarioDAO->listAll();

		return $lista;
	}

}
?>