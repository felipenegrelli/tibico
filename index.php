<?php
session_start();
$page_title = "Tibico - Home";
include_once 'classes/TurmaController.php';
include_once 'classes/FrequenciaDAO.php';


if(isset($_SESSION["id_usuario"])){
	if($_SESSION['sexo'] == "M")
		$page_title = "Bem vindo, ".$_SESSION['nome_usuario'].".";
	else
		$page_title = "Bem vinda, ".$_SESSION['nome_usuario'].".";

	
	include_once 'header.php';

	if(isset($_SESSION["id_professor"])){

		$turmaController = new TurmaController();
		$lista = $turmaController->listaTurmasProfessor($_SESSION["id_professor"]);
		
		echo '<div id="list" class="row">';
			echo '<div class="table col-md-12">';
				echo '<table class="table table-striped table-hover" cellspacing="0" cellpadding="0">';
					echo '<thead>';
						echo '<tr>';
							echo '<th class="col-sm-1">ID</th>';
							echo '<th class="col-sm-5">Disciplina</th>';
							echo '<th class="col-sm-1">Periodo</th>';
							echo '<th class="col-sm-1">Vagas</th>';
							echo '<th class="actions col-sm-4">Outros</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';

					

					foreach ($lista as $row) {
						
						echo '<tr>';
							echo '<td class="text-center">'.$row['id_turma'].'</td>';
							echo '<td>'.$row['nome_disciplina'].'</td>';
							echo '<td class="text-center">'.$row['identificador'].'</td>';
							echo '<td class="text-center">'.$row['num_vagas'].'</td>';
							echo '<td class="actions text-center">';
								echo '<a class="btn btn-info btn-xs" href="PagExibirAvaliacoes.php?id_turma='.$row['id_turma'].'">Avaliações</a>';
								echo '<a class="btn btn-info btn-xs" href="PagExibirAulas.php?id_turma='.$row['id_turma'].'">Aulas</a>';
								echo '<a class="btn btn-danger btn-xs" href="PagFecharTurma.php?id_turma='.$row['id_turma'].'">Fechar Turma</a>';
							echo '</td>';
						echo '</tr>';
					}

					echo '</tbody>';
				echo '</table>';
			echo '</div>';
		echo '</div>';

	}
	else if(isset($_SESSION["id_aluno"])){

		$turmaController = new TurmaController();
		$lista = $turmaController->listaTurmasAluno($_SESSION["id_aluno"]);
		
		echo '<div> <h4>Suas Turmas</h> </div>';
		echo '<div id="list" class="row">';
			echo '<div class="table col-md-12">';
				echo '<table class="table table-striped table-hover" cellspacing="0" cellpadding="0">';
					echo '<thead>';
						echo '<tr>';
							echo '<th class="col-sm-1">ID</th>';
							echo '<th class="col-sm-5">Disciplina</th>';
							echo '<th class="col-sm-1">Periodo</th>';
							echo '<th class="col-sm-1">Professor</th>';
							echo '<th class="col-sm-1">Faltas</th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';

					$frequenciaDAO = new FrequenciaDAO();
					$idAluno = $_SESSION['id_aluno'];
					foreach ($lista as $row) {
						$result = $frequenciaDAO->listaFaltasAlunoPorTurma($idAluno, $row['id_turma']);
						//var_dump($result);
						echo '<tr>';
							echo '<td class="text-center">'.$row['id_turma'].'</td>';
							echo '<td class="text-center">'.$row['nome_disciplina'].'</td>';
							echo '<td class="text-center">'.$row['periodo'].'</td>';
							echo '<td class="text-center">'.$row['nome_professor'].'</td>';
							echo '<td class="text-center">'.$result['faltas'].'</td>';
						echo '</tr>';
					}

					echo '</tbody>';
				echo '</table>';
			echo '</div>';
		echo '</div>';


	}

	include_once 'footer.php';
}
else{
  header("location:login.php");
}

?>
