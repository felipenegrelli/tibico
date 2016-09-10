<?php
session_start();
include_once 'classes/AvaliacaoController.php';
include_once 'classes/TurmaController.php';
$idTurma = $_GET["id_turma"];



if(!empty($_GET["id_avaliacao"]) & !empty($_GET["op"])){
	if($_GET["op"] == "deletar"){
		$avaliacaoController = new AvaliacaoController();
		$avaliacaoController->deletaAvaliacao($_GET["id_avaliacao"]);
	}
}
$turmaController = new TurmaController();
$turma = $turmaController->listaTurmasPorId($idTurma);

$page_title = "Avaliações - ".$turma["nome_disciplina"]." - ".$turma["identificador"];
include_once 'header.php';

$avaliacaoController = new AvaliacaoController();
$listaAvaliacoes = $avaliacaoController->listaAvaliacoesTurma($idTurma);



?>
	</br>

 	<div id="top" class="row">
 		<div class="col-sm-6">
			<a href="PagCadastrarAvaliacao.php?id_turma=<?php echo $idTurma; ?>" class="btn btn-primary pull-left h2">Nova Avaliação</a>
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
					<th class="col-sm-3">Descricao</th>
					<th class="col-sm-1">Data</th>
					<th class="col-sm-1">Tipo</th>
					<th class="col-sm-1">Peso</th>
					<th class="actions col-sm-1">Ações</th>
					<th class="actions col-sm-1">Outros</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($listaAvaliacoes as $row) {
				$dataNF = strtotime($row['data']);
				$dataFormatada = date( 'd/m/Y', $dataNF );

				echo '<tr>';
					echo '<td class="text-center">'.$row['id_avaliacao'].'</td>';
					echo '<td>'.$row['descricao'].'</td>';
					echo '<td class="text-center">'.$dataFormatada.'</td>';
					echo '<td class="text-center">'.$row['tipo_avaliacao'].'</td>';
					echo '<td class="text-center">'.$row['peso'].'</td>';
					echo '<td class="actions text-center">';
						echo '<a class="btn btn-warning btn-xs" href="PagCadastrarAvaliacao.php?id_turma='.$idTurma.'&id_avaliacao='.$row['id_avaliacao'].'">Editar</a>';
						//echo '<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>';
						echo '<a class="btn btn-danger btn-xs"  href="PagExibirAvaliacoes.php?id_turma='.$idTurma.'&id_avaliacao='.$row['id_avaliacao'].'&op=deletar">Excluir</a>';
					echo '</td>';
					echo '<td class="actions text-center">';
						echo '<a class="btn btn-info btn-xs" href="PagLancarNotas.php?id_avaliacao='.$row['id_avaliacao'].'">Lançar Notas</a>';
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
        <button type="button" class="btn btn-primary ">Sim</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

<?php
include_once 'footer.php';
?>