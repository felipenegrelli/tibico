<?php
include_once 'DB.php';
include_once 'IDAO.php';

class FrequenciaDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM alunos WHERE id_aluno = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM alunos";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function listaFaltasAlunoPorTurma($idAluno, $idTurma) {
		$sql = "SELECT sum(num_faltas) as faltas FROM frequencias

				left join aulas on frequencias.id_aula = aulas.id_aula

				where id_aluno = :idAluno and aulas.id_turma = :idTurma
				group by id_aluno";

		$stmt = DB::prepare($sql);
		$stmt->bindParam(":idAluno", $idAluno);
		$stmt->bindParam(":idTurma", $idTurma);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function findByUserId($id) {
		$sql = "SELECT * FROM alunos WHERE id_usuario = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insert($frequencia) {
		
		$sql = "INSERT INTO frequencias (id_aula, id_aluno, num_faltas) VALUES (:id_aula, :id_aluno, :num_faltas)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":id_aula", $frequencia->idAula);
	    $stmt->bindParam(":id_aluno", $frequencia->idAluno);
	    $stmt->bindParam(":num_faltas", $frequencia->numFaltas);
	    $stmt->execute();
	}



	public function update($aluno) {
		/*
		$sql = "UPDATE avaliacoes SET tipo_avaliacao = :tipo_avaliacao, peso = :peso, data = :data, id_turma = :id_turma WHERE id_avaliacao = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":tipo_avaliacao", $avaliacao->getTipoAvaliacao());
	    $stmt->bindParam(":peso", $avaliacao->getPeso());
	    $stmt->bindParam(":data", $avaliacao->getData());
	    $stmt->bindParam(":id_turma", $avaliacao->getTurma()->getId());
	    $stmt->bindParam(":id", $avaliacao->getId());

		$stmt->execute();
		*/
	}


	public function delete($id) {
		$sql = "DELETE FROM alunos WHERE id_aluno = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id_aluno",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
}
?>