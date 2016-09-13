<?php
include_once 'DB.php';
include_once 'IDAO.php';

class CalendarioDAO extends DB implements IDAO {

	public function findById($id) {
	 	$sql = "SELECT * FROM calendarios_academicos WHERE id_calendario = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	 
	public function listAll() {
		$sql = "SELECT * FROM calendarios_academicos";
		$stmt = DB::prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	 
	public function insert($calendario) {
		$identificador = $calendario->getIdentificador();
	    $duracao = $calendario->getDuracao();
	    $dataInicioCA = $calendario->getDataInicioCA();
	    $dataFimCA = $calendario->getDataFimCA();
	    $dataInicioPM = $calendario->getDataInicioPM();
	    $dataFimPM = $calendario->getdataFimPM();
	    $dataInicioPL = $calendario->getDataInicioPL();
	    $dataFimPL = $calendario->getDataFimPl();
	    $situacao = $calendario->getSituacao();

		$sql = "INSERT INTO calendarios_academicos (identificador, duracao, data_inicio_ca, data_fim_ca, data_inicio_pm, data_fim_pm, data_inicio_pl, data_fim_pl, situacao) VALUES (:identificador, :duracao, :data_inicio_ca, :data_fim_ca, :data_inicio_pm, :data_fim_pm, :data_inicio_pl, :data_fim_pl, :situacao)";
	    
	    $stmt = DB::prepare($sql);
	    $stmt->bindParam(":identificador", $identificador);
	    $stmt->bindParam(":duracao", $duracao);
	    $stmt->bindParam(":data_inicio_ca", $dataInicioCA);
	    $stmt->bindParam(":data_fim_ca", $dataFimCA);
	    $stmt->bindParam(":data_inicio_pm", $dataInicioPM);
	    $stmt->bindParam(":data_fim_pm", $dataFimPM);
	    $stmt->bindParam(":data_inicio_pl", $dataInicioPL);
	    $stmt->bindParam(":data_fim_pl", $dataFimPL);
	    $stmt->bindParam(":situacao", $situacao);

	    $stmt->execute();
	}

	public function update($avaliacao) {
		$identificador = $calendario->getIdentificador();
	    $duracao = $calendario->getDuracao();
	    $dataInicioCA = $calendario->getDataInicioCA();
	    $dataFimCA = $calendario->getDataFimCA();
	    $dataInicioPM = $calendario->getDataInicioPM();
	    $dataFimPM = $calendario->getdataFimPM();
	    $dataInicioPL = $calendario->getDataInicioPL();
	    $dataFimPL = $calendario->getDataFimPl();
	    $situacao = $calendario->getSituacao();

		$sql = "UPDATE calendarios_academicos SET identificador= :identificador, duracao = :duracao, data_inicio_ca = :data_inicio_ca, data_fim_ca = :data_fim_ca, data_inicio_pm = :data_inicio_pm, data_fim_pm = :data_fim_pm, data_inicio_pl = :data_inicio_pl, data_fim_pl = :data_fim_pl, situacao = :situacao WHERE id_calendario = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":identificador", $identificador);
	    $stmt->bindParam(":duracao", $duracao);
	    $stmt->bindParam(":data_inicio_ca", $dataInicioCA);
	    $stmt->bindParam(":data_fim_ca", $dataFimCA);
	    $stmt->bindParam(":data_inicio_pm", $dataInicioPM);
	    $stmt->bindParam(":data_fim_pm", $dataFimPM);
	    $stmt->bindParam(":data_inicio_pl", $dataInicioPL);
	    $stmt->bindParam(":data_fim_pl", $dataFimPL);
	    $stmt->bindParam(":situacao", $situacao);
	    $stmt->bindParam(":id", $id);

		$stmt->execute();
	}

	public function delete($id) {
		$sql = "DELETE FROM calendarios_academicos WHERE id_calendario = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$id, PDO::PARAM_INT);

		$stmt->execute();
	}

	public function closeCalendar($idCalendario) {
		$sql = "UPDATE calendarios_academicos
				SET situacao_calendario = 0
				WHERE id_calendario = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(":id",$idCalendario, PDO::PARAM_INT);

		$stmt->execute();
	}
}
?>