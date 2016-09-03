<?php
include_once 'DB.php';
include_once 'IDAO.php';

class AlunoDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM alunos WHERE id_aluno = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM alunos";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	 
	public function insert($aluno) {
		$sql = "INSERT INTO alunos (matricula, nome_pai, nome_mae, situacao) VALUES (:matricula, :nome_pai, :nome_mae, :situacao)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":matricula", $aluno->getMatricula());
	    $stmt->bindParam(":nome_pai", $aluno->getNomePai());
	    $stmt->bindParam(":nome_mae", $aluno->getNomeMae());
	    $stmt->bindParam(":situacao", $aluno->getSituacao());

	    $stmt->execute();
	}

	public function update($aluno) {
		$sql = "UPDATE alunos SET matricula = :matricula, nome_pai = :nome_pai, nome_mae = :nome_mae, situacao = :situacao WHERE id_aluno = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":matricula", $aluno->getMatricula());
	    $stmt->bindParam(":nome_pai", $aluno->getNomePai());
	    $stmt->bindParam(":nome_mae", $aluno->getNomeMae());
	    $stmt->bindParam(":situacao", $aluno->getSituacao());

		$stmt->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM alunos WHERE id_aluno = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
}
?>