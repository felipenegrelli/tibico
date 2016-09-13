<?php
session_start();
$page_title = "Exibir Calendários";

include_once 'classes/CalendarioController.php';
include_once 'classes/TurmaController.php';

$calendarioController = new CalendarioController();
$turmaController = new TurmaController();

if(!empty($_GET["id_calendario"]) & !empty($_GET["op"])){

	if($_GET["op"] == "FecharCalendario"){

		$listaTurmas = $turmaController->listaTurmasDisciplina($_GET["id_calendario"]);
		$achouTurmaAberta = false;

		foreach ($listaTurmas as $turma) {

			if($turma["situacao_turma"] == 1){
				$achouTurmaAberta = true;
			}

		}

		if(!$achouTurmaAberta){
			$calendarioController->fechaCalendario($_GET["id_calendario"]);
			header("location:PagExibirCalendarios.php");
		}
		else{
			header("location:PagExibirTurmasAbertas.php?id_calendario=".$_GET["id_calendario"]);
		}
	}
}

$listaCalendarios = $calendarioController->listaCalendarios();
include_once 'header.php';
?>
 	<div id="top" class="row">
 		<div class="col-sm-6">
			<a href="PagCadastrarCurso.php" class="btn btn-primary pull-left h2">Novo Calendário</a>
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
	
	<div class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th class="col-sm-1">ID</th>
					<th class="col-sm-2">Identificador</th>
					<th class="col-sm-1">Duração</th>
					<th class="col-sm-1">Data Inicio</th>
					<th class="col-sm-1">Data Fim</th>
					<th class="col-sm-1">Situação</th>
					<th class="actions col-sm-2">Ações</th>
					<th class="actions col-sm-1">Outras Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($listaCalendarios as $row) {
				$dataInicioNF = strtotime($row['data_inicio_ca']);
				$dataInicioFormatada = date( 'd/m/Y', $dataInicioNF );

				$dataFimNF = strtotime($row['data_fim_ca']);
				$dataFimFormatada = date( 'd/m/Y', $dataFimNF );


				echo '<tr>';
					echo '<td class="text-center">'.$row['id_calendario'].'</td>';
					echo '<td class="text-center">'.$row['identificador'].'</td>';
					echo '<td class="text-center">'.$row['duracao'].'</td>';
					
					echo '<td class="text-center">'.$dataInicioFormatada.'</td>';
					echo '<td class="text-center">'.$dataFimFormatada.'</td>';
					if($row['situacao_calendario'] == 0){
						echo '<td class="text-center">Fechado</td>';
					}
					else{
						echo '<td class="text-center">Aberto</td>';
					}
					
					echo '<td class="actions text-center">
						<a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
						<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>';
					echo '</td>';
					echo '<td class="actions text-center">';
					if($row['situacao_calendario'] == 1){
						echo '<a class="btn btn-danger btn-xs" href="PagExibirCalendarios.php?id_calendario='.$row['id_calendario'].'&op=FecharCalendario">Fechar Período</a>';
					}
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
