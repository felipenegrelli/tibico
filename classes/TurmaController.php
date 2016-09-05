<?php
include_onde 'Turma.php';
include_onde 'TurmaDAO.php';
include_onde 'Calendario.php';
include_onde 'Professor.php';

class TurmaController{

	public function __construct()
	{

	}

	public void inseriTurma($numVagas, $idCalendario, $idDisciplina, $situacao, $idProfessor){

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

	public function listaTurmas(){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listAll();

		return $lista;
	}
}
?>