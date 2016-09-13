<?php
session_start();
$page_title = "Listagem de Aulas";
include_once 'header.php';
include_once 'classes/AulaController.php';


$idTurma = $_GET["id_turma"];

$aulaController = new AulaController();
$listaTurmas = $aulaController->listaAulasPorTurma($idTurma);
?>

 	<div id="top" class="row">
 		<div class="col-sm-6">
			<a href="pagCadastrarTurma.php?id_disciplina=<?php echo $idDisciplina; ?>" class="btn btn-primary pull-left h2">Inserir Aula</a>
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
					<th class="col-sm-3">Data</th>
					<th class="col-sm-1">Quantidade de Aulas</th>
					<th class="col-sm-2">Conteudo</th>
					<th class="actions col-sm-2">Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($listaTurmas as $row) {
				echo '<tr>';
					echo '<td class="text-center">'.$row['id_aula'].'</td>';
					echo '<td>'.$row['data'].'</td>';
					echo '<td class="text-center">'.$row['quantidade_aulas'].'</td>';
					echo '<td class="text-center">'.$row['conteudo'].'</td>';
					echo '<td class="actions text-center">';		
						echo '<a class="btn btn-primary btn-xs" href="PagCadastrarFrequencia.php?id_turma='.$idTurma.'&data='.substr($row['data'], 0, 10).'&id_aula='.$row['id_aula'].'">Chamada</a>'; //PagCadastrarFrequencia.php?id_disciplina='.$idDisciplina.'&id_turma='.$row['id_turma'].'
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