<?php
include_once 'Turma.php';
include_once 'TurmaDAO.php';
include_once 'CalendarioAcademico.php';
include_once 'Professor.php';

class TurmaController{

	public function __construct()
	{

	}

	public function inseriTurma($numVagas, $idCalendario, $idDisciplina, $situacao, $idProfessor){

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

	public function listaTurmasPorId($id){
		$turmaDAO = new TurmaDAO();
		$turma = $turmaDAO->findById($id);

		return $turma;
	}

	public function listaTurmasProfessor($id){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listAllfromProfessor($id);

		return $lista;
	}

	public function listaAlunosTurma($idTurma){
		$turmaDAO = new TurmaDAO();
		$listaAlunos = $turmaDAO->listStudentsFromClass($idTurma);

		return $listaAlunos;
	}

	public function listaTurmasAluno($idTurma){
		$turmaDAO = new TurmaDAO();
		$listaAlunos = $turmaDAO->listAllFromStudent($idTurma);

		return $listaAlunos;
	}
}
?>