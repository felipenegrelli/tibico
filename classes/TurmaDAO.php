<?php
include_once 'DB.php';
include_once 'IDAO.php';

class TurmaDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM turmas WHERE id_turma = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM turmas";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	 
	public function insert($turma) {
		$sql = "INSERT INTO turmas (num_vagas, situacao, id_disciplina, id_calendario, id_professor) VALUES (:num_vagas, :situacao, :id_disciplina, :id_calendario, :id_professor)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":num_vagas", $turma->getNumVagas());
	    $stmt->bindParam(":situacao", $turma->getSituacao());
	    $stmt->bindParam(":id_disciplina", $turma->getDisciplina()->getId());
	    $stmt->bindParam(":id_calendario", $turma->getCalendario()->getId());
	    $stmt->bindParam(":id_professor", $turma->getProfessor()->getId());

	    $stmt->execute();
	}

	public function update($turma) {
		$sql = "UPDATE turmas SET num_vagas = :num_vagas, situacao = :situacao, id_disciplina = :id_disciplina, id_calendario = :id_calendario, id_professor = :id_professor WHERE id_turma = :id_turma";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":num_vagas", $turma->getNumVagas());
	    $stmt->bindParam(":situacao", $turma->getSituacao());
	    $stmt->bindParam(":id_disciplina", $turma->getDisciplina()->getId());
	    $stmt->bindParam(":id_calendario", $turma->getCalendario()->getId());
	    $stmt->bindParam(":id_professor", $turma->getProfessor()->getId());
	    $stmt->bindParam(":id_turma", $turma->getId();


		$stmt->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM turmas WHERE id_turma = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
}
?>