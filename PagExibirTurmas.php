<?php
session_start();
$page_title = "Exibir Turmas";
include_once 'header.php';
include_once 'classes/TurmaController.php';

$idDisciplina = $_GET["id_disciplina"];

$turmaController = new TurmaController();
$listaTurmas = $turmaController->listaTurmasDisciplina($idDisciplina);
?>

 	<div id="top" class="row">
 		<div class="col-sm-6">
			<a href="pagCadastrarTurma.php?id_disciplina=<?php echo $idDisciplina; ?>" class="btn btn-primary pull-left h2">Nova Turma</a>
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
					<th class="actions col-sm-2">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($listaTurmas as $row) {
				echo '<tr>';
					echo '<td class="text-center">'.$row['id_turma'].'</td>';
					echo '<td>'.$row['nome_disciplina'].'</td>';
					echo '<td class="text-center">'.$row['identificador'].'</td>';
					echo '<td class="text-center">'.$row['nome'].'</td>';
					echo '<td class="text-center">'.$row['num_vagas'].'</td>';

					if($row['situacao'] == 1){
						echo '<td class="text-center">Ativo</td>';
					}
					else{
						echo '<td class="text-center">Inativo</td>';
					}
					
					echo '<td class="actions text-center">';
						echo '<a class="btn btn-warning btn-xs" href="PagCadastrarTurma.php?id_disciplina='.$idDisciplina.'&id_turma='.$row['id_turma'].'">Editar</a>';
						echo '<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>';
					echo '</td>';
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->
	

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
	<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

<?php
include_once 'footer.php';
?>