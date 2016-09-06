<?php
include_once 'DB.php';
include_once 'IDAO.php';

class ProfessorDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM professores WHERE id_profeessor = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function findByUserId($id) {
	 	$sql = "SELECT * FROM professores WHERE id_usuario = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM professores p, usuarios u where u.id_usuario = p.id_usuario ORDER BY u.nome";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	 
	public function insert($professor) {
		$sql = "INSERT INTO professores (nome, regime, duracao, sigla, descricao, area_conhecimento, grau_instrucao) VALUES (:nome, :regime, :duracao, :sigla, :descricao, :area_conhecimento, :grau_instrucao)";
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":nome", $curso->getNome());
	    $stmt->bindParam(":regime", $curso->getRegime());
	    $stmt->bindParam(":duracao", $curso->Duracao());
	    $stmt->bindParam(":sigla", $curso->getSigla());
	    $stmt->bindParam(":descricao", $curso->getDescricao());
	    $stmt->bindParam(":area_conhecimento", $curso->getAreaConhecimento());
	    $stmt->bindParam(":grau_instrucao", $curso->getGrauInstrucao());

	    $stmt->execute();
	}

	public function update($curso) {
		$sql = "UPDATE alunos SET matricula = :matricula, nome_pai = :nome_pai, nome_mae = :nome_mae, situacao = :situacao WHERE id_aluno = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":matricula", $curso->getMatricula());
	    $stmt->bindParam(":nome_pai", $curso->getNomePai());
	    $stmt->bindParam(":nome_mae", $curso->getNomeMae());
	    $stmt->bindParam(":situacao", $curso->getSituacao());

		$stmt->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM cursos WHERE id_curso = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
}
?>