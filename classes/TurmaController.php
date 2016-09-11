<?php
include_once 'Turma.php';
include_once 'TurmaDAO.php';
include_once 'Calendario.php';
include_once 'Professor.php';
include_once 'Disciplina.php';

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
		$disciplina->setId($idDisciplina);

		$turma = new Turma();
		$turma->setNumVagas($numVagas);
		$turma->setCalendario($calendario);
		$turma->setDisciplina($disciplina);
		$turma->setProfessor($professor);
		$turma->setNumVagas($numVagas);
		$turma->setSituacao($situacao);

		$turmaDAO = new TurmaDAO();
		$turmaDAO->insert($turma);
	}

	public function atualizaTurma($idTurma, $numVagas, $idCalendario, $idDisciplina, $situacao, $idProfessor){

		$calendario = new Calendario();
		$calendario->setId($idCalendario);

		$professor = new Professor();
		$professor->setId($idProfessor);

		$disciplina = new Disciplina();
		$disciplina->setId($idDisciplina);

		$turma = new Turma();
		$turma->setId($idTurma);
		$turma->setNumVagas($numVagas);
		$turma->setCalendario($calendario);
		$turma->setDisciplina($disciplina);
		$turma->setProfessor($professor);
		$turma->setNumVagas($numVagas);
		$turma->setSituacao($situacao);

		$turmaDAO = new TurmaDAO();
		$turmaDAO->update($turma);
	}

	public function listaTurmas(){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listAll();

		return $lista;
	}

	public function pegaTurmaPorId($id){
		$turmaDAO = new TurmaDAO();
		$turma = $turmaDAO->findById($id);

		return $turma;
	}

	public function listaTurmasProfessor($id){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listAllfromProfessor($id);

		return $lista;
	}

	public function listaTurmasAtivasProfessor($id){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listAllActivefromProfessor($id);

		return $lista;
	}

	public function listaTurmasDisciplina($id){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listClassesFromSubject($id);

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