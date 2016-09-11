<?php
include_once 'DB.php';
include_once 'IDAO.php';

class TurmaDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM turmas t, disciplinas d, calendarios_academicos ca WHERE t.id_disciplina = d.id_disciplina AND t.id_calendario = ca.id_calendario AND id_turma = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function listAll() {
		$sql = "SELECT * FROM turmas t, professores p, usuarios u, calendarios_academicos ca, disciplinas d WHERE t.id_professor = p.id_professor AND p.id_usuario = u.id_usuario AND t.id_calendario = ca.id_calendario AND t.id_disciplina = d.id_disciplina";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listAllfromProfessor($id) {
		$sql = "SELECT * FROM turmas t, professores p, usuarios u, calendarios_academicos ca, disciplinas d WHERE t.id_professor = p.id_professor AND p.id_usuario = u.id_usuario AND t.id_calendario = ca.id_calendario AND t.id_disciplina = d.id_disciplina AND t.id_professor = :id";		
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listStudentsFromClass($idTurma) {
		$sql = "SELECT * FROM alunos_turmas at, alunos a, usuarios u WHERE at.id_aluno = a.id_aluno AND a.id_usuario = u.id_usuario AND at.id_turma = :id_turma";		
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_turma", $idTurma);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
	    $stmt->bindParam(":id_turma", $turma->getId());


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