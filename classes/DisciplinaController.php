<?php
include_once 'Disciplina.php';
include_once 'DisciplinaDAO.php';

class DisciplinaController{

	public function __construct()
	{

	}

	public function inseriDisciplina($numVagas, $idCalendario, $idDisciplina, $situacao, $idProfessor){

		$calendario = new Calendario();
		$calendario->setId($idCalendario);

		$professor = new Professor();
		$professor->setId($idProfessor);

		$disciplina = new Disciplina();
		$disciplina->setId($idProfessor);

		$turma = new Turma();
		$turma->setNumVagas($numVagas);
		$turma->setCalendario($disciplina);
		$turma->setProfessor($professor);
		$turma->setNumVagas($numVagas);
		$turma->setSituacao($situacao);

		$turmaDAO = new TurmaDAO();
		$turmaDAO->insert($turma);
	}

	public function listaDisciplinas(){
		$disciplinaDAO = new DisciplinaDAO();
		$lista = $disciplinaDAO->listAll();

		return $lista;
	}

	public function listaDisciplinasAluno($idAluno){
		$disciplinaDAO = new DisciplinaDAO();
		$lista = $disciplinaDAO->listAllFromStudent($idAluno);

		return $lista;
	}


}
?>