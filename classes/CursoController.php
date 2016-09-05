<?php
include_once 'Curso.php';
include_once 'CursoDAO.php';

class CursoController{

	public function __construct()
	{

	}

	public function inseriCurso($numVagas, $idCalendario, $idDisciplina, $situacao, $idProfessor){

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

	public function listaCursos(){
		$cursoDAO = new CursoDAO();
		$lista = $cursoDAO->listAll();

		return $lista;
	}
}
?>