<?php
include_once 'Professor.php';
include_once 'ProfessorDAO.php';

class ProfessorController{

	public function __construct()
	{

	}

	public function inseriProfessor($idUsuario, $formacaoAcademica, $areaAtuacao){
		$professor = new Professor();
		$professor->setFormacaoAcademica($formacaoAcademica);
		$professor->setAreaAtuacao($areaAtuacao);

		$professorDAO = new ProfessorDAO();
		$professorDAO->insert($professor);
	}

	public function listaProfessores(){
		$professorDAO = new ProfessorDAO();
		$lista = $professorDAO->listAll();

		return $lista;
	}

	public function listaProfessorIdUsuario($id){
		$professorDAO = new ProfessorDAO();
		$lista = $professorDAO->findByUserId($id);

		return $lista;
	}

	
}
?>