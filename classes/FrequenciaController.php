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

	/*public function __construct()
	{

	}

	public function inseriFrequencia($idAula, $idAluno, $faltas){

		$avaliacao = new Avaliacao();
		$turma = new Turma();
		$turma->setId($idTurma);

		$avaliacao->setTipoAvaliacao($tipo);
		$avaliacao->setPeso($peso);
		$avaliacao->setData($data);
		$avaliacao->setDescricao($descricao);
		$avaliacao->setTurma($turma);

		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacaoDAO->insert($avaliacao);
	}

	public function atualizaAvaliacao($idAvaliacao, $tipo, $peso, $data, $descricao, $idTurma){

		$avaliacao = new Avaliacao();
		$turma = new Turma();
		$turma->setId($idTurma);

		$avaliacao->setId($idAvaliacao);
		$avaliacao->setTipoAvaliacao($tipo);
		$avaliacao->setPeso($peso);
		$avaliacao->setData($data);
		$avaliacao->setDescricao($descricao);
		$avaliacao->setTurma($turma);

		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacaoDAO->update($avaliacao);
	}

	public function listaAvaliacoesTurma($id_turma){
		$avaliacaoDAO = new AvaliacaoDAO();
		$lista = $avaliacaoDAO->listAllByClass($id_turma);

		return $lista;
	}

	public function pegaAvaliacaoPorId($id_avaliacao){
		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacao = $avaliacaoDAO->findById($id_avaliacao);

		return $avaliacao;
	}

	public function deletaAvaliacao($id_avaliacao){
		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacao = $avaliacaoDAO->delete($id_avaliacao);

		return $avaliacao;
	}

	public function inseriNotaAvaliacao($idAvaliacao, $idAluno, $nota){
		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacaoDAO->insertGrade($idAvaliacao, $idAluno, $nota);
	}

	public function pegaNotaAvaliacao($idAvaliacao, $idAluno){
		$avaliacaoDAO = new AvaliacaoDAO();
		$nota = $avaliacaoDAO->getGrade($idAvaliacao, $idAluno);

		return $nota;
	}

	public function atualizaNotaAvaliacao($idAvaliacao, $idAluno, $nota){
		$avaliacaoDAO = new AvaliacaoDAO();
		$avaliacaoDAO->updateGrade($idAvaliacao, $idAluno, $nota);
	}*/
?>