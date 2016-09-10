<?php
include_once 'DB.php';
include_once 'IDAO.php';

class AvaliacaoDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM avaliacoes WHERE id_avaliacao = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM avaliacoes";
		$stmt = DB::prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function listAllByClass($id) {
		$sql = "SELECT * FROM avaliacoes WHERE id_turma = :id_turma";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_turma", $id);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	 
	public function insert($avaliacao) {
		$tipo = $avaliacao->getTipoAvaliacao();
		$peso = $avaliacao->getPeso();
		$data = $avaliacao->getData();
		$descricao = $avaliacao->getDescricao();
		$idTurma = $avaliacao->getTurma()->getId();

		$sql = "INSERT INTO avaliacoes (tipo_avaliacao, peso, data, descricao, id_turma) VALUES (:tipo_avaliacao, :peso, :data, :descricao, :id_turma)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":tipo_avaliacao", $tipo);
	    $stmt->bindParam(":peso", $peso);
	    $stmt->bindParam(":data", $data);
	    $stmt->bindParam(":descricao", $descricao);
	    $stmt->bindParam(":id_turma", $idTurma);

	    $stmt->execute();
	}

	public function update($avaliacao) {
		$id = $avaliacao->getId();
		$tipo = $avaliacao->getTipoAvaliacao();
		$peso = $avaliacao->getPeso();
		$data = $avaliacao->getData();
		$descricao = $avaliacao->getDescricao();
		$idTurma = $avaliacao->getTurma()->getId();

		$sql = "UPDATE avaliacoes SET tipo_avaliacao = :tipo_avaliacao, peso = :peso, data = :data, descricao = :descricao, id_turma = :id_turma WHERE id_avaliacao = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":tipo_avaliacao", $tipo);
	    $stmt->bindParam(":peso", $peso);
	    $stmt->bindParam(":data", $data);
	    $stmt->bindParam(":descricao", $descricao);
	    $stmt->bindParam(":id_turma", $idTurma);
	    $stmt->bindParam(":id", $id);

		$stmt->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM avaliacoes WHERE id_avaliacao = :id_avaliacao";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_avaliacao",$id, PDO::PARAM_INT);

		$stmt->execute();
	}

	public function insertGrade($idAvaliacao, $idAluno, $nota) {
		$sql = "INSERT INTO resultados_avaliacoes (id_avaliacao, id_aluno, nota) VALUES (:id_avaliacao, :id_aluno, :nota)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":id_avaliacao", $idAvaliacao);
	    $stmt->bindParam(":id_aluno", $idAluno);
	    $stmt->bindParam(":nota", $nota);

	    $stmt->execute();
	}

	public function updateGrade($idAvaliacao, $idAluno, $nota) {
		$sql = "UPDATE resultados_avaliacoes SET nota = :nota WHERE id_avaliacao = :id_avaliacao AND id_aluno = :id_aluno";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":id_avaliacao", $idAvaliacao);
	    $stmt->bindParam(":id_aluno", $idAluno);
	    $stmt->bindParam(":nota", $nota);

	    $stmt->execute();
	}

	public function getGrade($idAvaliacao, $idAluno) {
	 	$sql = "SELECT nota FROM resultados_avaliacoes WHERE id_avaliacao = :id_avaliacao AND id_aluno = :id_aluno";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_avaliacao",$idAvaliacao, PDO::PARAM_INT);
		$stmt->bindParam(":id_aluno",$idAluno, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}
?>