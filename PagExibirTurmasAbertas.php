<?php
session_start();
$page_title = "Lista de Turmas Abertas";
include_once 'header.php';
include_once 'classes/TurmaController.php';

$idCalendario = $_GET["id_calendario"];

$turmaController = new TurmaController();
$listaTurmasAbertas = $turmaController->listaTurmasAbertas($idCalendario);
?>

 	<div id="top" class="row">
 		<div class="col-sm-6">

		</div>
		<div class="col-sm-6">
			<div class="input-group h2">
				<input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</div>		
	</div> <!-- /#top -->
 
 
 	<div id="list" class="row">
	
	<div class="table col-md-12">
		<table class="table table-striped table-hover" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="col-sm-1">ID</th>
					<th class="col-sm-3">Disciplina</th>
					<th class="col-sm-1">Periodo</th>
					<th class="col-sm-2">Professor</th>
					<th class="col-sm-1">Vagas</th>
					<th class="col-sm-1">Status</th>
					<th class="actions col-sm-1">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($listaTurmasAbertas as $row) {
				if($row["situacao_turma"] == 1){
					echo '<tr>';
						echo '<td class="text-center">'.$row['id_turma'].'</td>';
						echo '<td>'.$row['nome_disciplina'].'</td>';
						echo '<td class="text-center">'.$row['identificador'].'</td>';
						echo '<td class="text-center">'.$row['nome'].'</td>';
						echo '<td class="text-center">'.$row['num_vagas'].'</td>';
						echo '<td class="text-center">Ativo</td>';
						echo '<td class="actions text-center">';
							echo '<a class="btn btn-danger btn-xs" href="PagFecharTurma.php?id_turma='.$row['id_turma'].'">Fechar Turma</a>';
						echo '</td>';
					echo '</tr>';
				}
			}
			?>
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->

<?php
include_once 'footer.php';
?>