<?php
include_once 'DB.php';
include_once 'IDAO.php';

class TurmaDAO extends DB implements IDAO {

	public function findById($id) {

	 	$sql = "SELECT * 
	 			FROM turmas t, 
	 			disciplinas d, 
	 			calendarios_academicos ca 
	 			WHERE t.id_disciplina = d.id_disciplina 
	 			AND t.id_calendario = ca.id_calendario 
	 			AND id_turma = :id";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function listAll() {

		$sql = "SELECT * 
				FROM turmas t, 
				professores p, 
				usuarios u, 
				calendarios_academicos ca, 
				disciplinas d 
				WHERE t.id_professor = p.id_professor 
				AND p.id_usuario = u.id_usuario 
				AND t.id_calendario = ca.id_calendario 
				AND t.id_disciplina = d.id_disciplina";

		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listOpen($idCalendario) {

		$sql = "SELECT * 
				FROM turmas t, 
				professores p, 
				usuarios u, 
				calendarios_academicos ca, 
				disciplinas d 
				WHERE t.id_professor = p.id_professor 
				AND p.id_usuario = u.id_usuario 
				AND t.id_calendario = ca.id_calendario 
				AND t.id_disciplina = d.id_disciplina
				AND situacao_turma = 1
				AND ca.id_calendario = :id";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $idCalendario);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listAllfromProfessor($id) {

		$sql = "SELECT * 
				FROM turmas t, 
				professores p, 
				usuarios u, 
				calendarios_academicos ca, 
				disciplinas d 
				WHERE t.id_professor = p.id_professor 
				AND p.id_usuario = u.id_usuario 
				AND t.id_calendario = ca.id_calendario 
				AND t.id_disciplina = d.id_disciplina 
				AND t.id_professor = :id";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listAllFromStudent($id) {
		$sql = "SELECT turmas.id_turma, disciplinas.nome_disciplina, calendarios_academicos.identificador,
				usuarios.nome

				from alunos_turmas

				LEFT JOIN turmas on alunos_turmas.id_turma = turmas.id_turma
				LEFT JOIN calendarios_academicos on calendarios_academicos.id_calendario = turmas.id_calendario
				LEFT JOIN disciplinas on turmas.id_disciplina = disciplinas.id_disciplina
				LEFT join professores on turmas.id_professor = professores.id_professor
				LEFT JOIN usuarios on usuarios.id_usuario = professores.id_usuario

				WHERE alunos_turmas.id_aluno = :id";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listStudentsFromClass($idTurma) {

		$sql = "SELECT * 
				FROM alunos_turmas at, 
				alunos a, 
				usuarios u 
				WHERE at.id_aluno = a.id_aluno 
				AND a.id_usuario = u.id_usuario 
				AND at.id_turma = :id_turma";	

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_turma", $idTurma);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listClassesFromSubject($idDisciplina) {

		$sql = "SELECT * 
				FROM turmas t, professores p, usuarios u, calendarios_academicos ca, disciplinas d 
				WHERE t.id_professor = p.id_professor 
				AND p.id_usuario = u.id_usuario 
				AND t.id_calendario = ca.id_calendario 
				AND t.id_disciplina = d.id_disciplina 
				AND t.id_disciplina = :id";	

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $idDisciplina);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAbsensesFromStudent($idTurma, $idAluno) {

		$sql = "SELECT SUM(f.num_faltas) as 'faltas'
				FROM turmas t, 
				aulas a, 
				frequencias f, 
				alunos al
				WHERE t.id_turma = a.id_turma 
				AND a.id_aula = f.id_aula
				AND f.id_aluno = al.id_aluno
				AND t.id_turma = :id_turma
				AND f.id_aluno = :id_aluno";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_turma", $idTurma);
		$stmt->bindParam(":id_aluno", $idAluno);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getNumberClassDays($idTurma) {

		$sql = "SELECT SUM(quantidade_aulas) as 'aulas'
				FROM aulas
				WHERE id_turma = :id_turma";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_turma", $idTurma);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	 
	 
	public function insert($turma) {

		$numVagas = $turma->getNumVagas();
		$situacao = $turma->getSituacao();
		$idDisciplina = $turma->getDisciplina()->getId();
		$idCalendario = $turma->getCalendario()->getId();
		$idProfessor = $turma->getProfessor()->getId();

		$sql = "INSERT INTO turmas 
				(num_vagas, situacao_turma, id_disciplina, id_calendario, id_professor) 
				VALUES 
				(:num_vagas, :situacao, :id_disciplina, :id_calendario, :id_professor)";

	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":num_vagas", $numVagas);
	    $stmt->bindParam(":situacao", $situacao);
	    $stmt->bindParam(":id_disciplina", $idDisciplina);
	    $stmt->bindParam(":id_calendario", $idCalendario);
	    $stmt->bindParam(":id_professor", $idProfessor);

	    $stmt->execute();
	}

	public function update($turma) {

		$idTurma = $turma->getId();
		$numVagas = $turma->getNumVagas();
		$situacao = $turma->getSituacao();
		$idDisciplina = $turma->getDisciplina()->getId();
		$idCalendario = $turma->getCalendario()->getId();
		$idProfessor = $turma->getProfessor()->getId();

		$sql = "UPDATE turmas 
				SET num_vagas = :num_vagas, 
				situacao_turma = :situacao, 
				id_disciplina = :id_disciplina, 
				id_calendario = :id_calendario, 
				id_professor = :id_professor 
				WHERE id_turma = :id_turma";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":num_vagas", $numVagas);
	    $stmt->bindParam(":situacao", $situacao);
	    $stmt->bindParam(":id_disciplina", $idDisciplina);
	    $stmt->bindParam(":id_calendario", $idCalendario);
	    $stmt->bindParam(":id_professor", $idProfessor);
	    $stmt->bindParam(":id_turma", $idTurma);

		$stmt->execute();
	}

	public function updateStudentResults($idTurma, $idAluno, $faltas, $nota_final, $situacao_aprovacao) {

		$sql = "UPDATE alunos_turmas 
				SET frequencia_final = :frequencia_final, 
				nota_final = :nota_final, 
				situacao_aprovacao = :situacao_aprovacao
				WHERE id_turma = :id_turma
				AND id_aluno = :id_aluno";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":frequencia_final", $faltas);
	    $stmt->bindParam(":nota_final", $nota_final);
	    $stmt->bindParam(":situacao_aprovacao", $situacao_aprovacao);
	    $stmt->bindParam(":id_turma", $idTurma);
	    $stmt->bindParam(":id_aluno", $idAluno);

		$stmt->execute();
	}

	public function updateStatus($idTurma, $status) {

		$sql = "UPDATE turmas 
				SET situacao_turma = :status
				WHERE id_turma = :id_turma";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":status", $status);
	    $stmt->bindParam(":id_turma", $idTurma);

		$stmt->execute();
	}


	public function delete($id) {

		$sql = "DELETE FROM turmas 
				WHERE id_turma = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}


}
?>
