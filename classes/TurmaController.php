<?php
include_once 'Turma.php';
include_once 'TurmaDAO.php';
include_once 'Calendario.php';
include_once 'Professor.php';
include_once 'Disciplina.php';

if($_REQUEST){
	$turmaDAO = new TurmaDAO();
	$resultado = false;
	switch ($_REQUEST['acao']) {
		case 'inserir':
			$resultado = $turmaDAO->insertInAlunoTurma($_REQUEST['aluno'],$_REQUEST['turma']);
			break;
	}
	echo $resultado;
}


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

	public function listaTurmasAbertas($idCalendario){
		$turmaDAO = new TurmaDAO();
		$lista = $turmaDAO->listOpen($idCalendario);

		return $lista;
	}

	public function pegaTurmaPorId($id){
		$turmaDAO = new TurmaDAO();
		$turma = $turmaDAO->findById($id);

		return $turma;
	}

	public function pegaFaltasAluno($idTurma, $idAluno){
		$turmaDAO = new TurmaDAO();
		$faltas = $turmaDAO->getAbsensesFromStudent($idTurma, $idAluno);

		return $faltas;
	}

	public function pegaQuantAulasTurma($idTurma){
		$turmaDAO = new TurmaDAO();
		$quant = $turmaDAO->getNumberClassDays($idTurma);

		return $quant;
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

	public function atualizaResultadoAluno($idTurma, $idAluno, $faltas, $nota_final, $situacao_aprovacao){
		$turmaDAO = new TurmaDAO();
		$turmaDAO->updateStudentResults($idTurma, $idAluno, $faltas, $nota_final, $situacao_aprovacao);
	}

	public function atualizaStatusTurma($idTurma, $status){
		$turmaDAO = new TurmaDAO();
		$turmaDAO->updateStatus($idTurma, $status);
	}

	// UTILIZADO NA ETAPA DE MATRICULA
	public function turmasAptasPorAluno($idAluno){
		$turmaDAO = new TurmaDAO();
		$listaTurmas = $turmaDAO->turmasParaMatricula($idAluno);
		return $listaTurmas;
	}


}
?>