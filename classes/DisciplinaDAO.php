<?php
include_once 'DB.php';
include_once 'IDAO.php';

class DisciplinaDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM disciplinas WHERE id_disciplina = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM disciplinas d, cursos c WHERE d.id_curso = c.id_curso ORDER BY d.nome_disciplina";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listAllFromStudent($idAluno) {
		$sql = "SELECT * from disciplinas
				right join turmas on turmas.id_disciplina = disciplinas.id_disciplina
				right join alunos_turmas on alunos_turmas.id_turma = turmas.id_turma
				right join cursos on cursos.id_curso = disciplinas.id_curso 

				where alunos_turmas.id_aluno = :idAluno";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":idAluno",$idAluno);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	 
	public function insert($disciplina) {
		$sql = "INSERT INTO disciplinas (nome, num_creditos, periodo_correspondente, area_disciplina, id_curso) VALUES (:nome, :num_creditos, :periodo_correspondente, :area_disciplina, :id_curso)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":nome", $disciplina->getNome());
	    $stmt->bindParam(":num_creditos", $disciplina->getNumCreditos());
	    $stmt->bindParam(":periodo_correspondente", $disciplina->getPeriodoCorrespondente());
	    $stmt->bindParam(":area_disciplina", $disciplina->getAreaDisciplina());
	    $stmt->bindParam(":id_curso", $disciplina->getCurso()->getId());

	    $stmt->execute();
	}

	public function update($disciplina) {
		$sql = "UPDATE disciplinas SET nome = :nome, num_creditos = :num_creditos, periodo_correspondente = :periodo_correspondente, area_disciplina = :area_disciplina, id_curso = :id_curso WHERE id_disciplina = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":nome", $disciplina->getNome());
	    $stmt->bindParam(":num_creditos", $disciplina->getNumCreditos());
	    $stmt->bindParam(":periodo_correspondente", $disciplina->getPeriodoCorrespondente());
	    $stmt->bindParam(":area_disciplina", $disciplina->getAreaDisciplina());
	    $stmt->bindParam(":id_curso", $disciplina->getId());

		$stmt->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM disciplinas WHERE id_disciplina = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
}
?>