<?php
include_once 'Aula.php';
include_once 'AulaDAO.php';

class AulaController{

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

	public function listaAulasPorTurma($id){
		$aulaDAO = new AulaDAO();
		$lista = $aulaDAO->findByIdTurma($id);
		return $lista;
	}

}
?>