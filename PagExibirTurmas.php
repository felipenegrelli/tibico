<?php
session_start();
$page_title = "Exibir Turmas";
include_once 'header.php';
include_once 'classes/TurmaController.php';

$turmaController = new TurmaController();

$user = $professor = $aluno = false;

if(!$_SESSION['id_professor'] && !$_SESSION['id_aluno']){
	$listaTurmas = $turmaController->listaTurmas();
	$user = true;
	$cols = "<th class="."col-sm-1".">ID</th>
			<th class="."col-sm-3".">Disciplina</th>
			<th class="."col-sm-1".">Periodo</th>
			<th class="."col-sm-2".">Professor</th>
			<th class="."col-sm-1".">Vagas</th>
			<th class="."col-sm-1".">Situação</th>
			<th class="."actions col-sm-2".">Ações</th>";
}else if($_SESSION['id_professor']){
	$listaTurmas = $turmaController->listaTurmasProfessor($_SESSION['id_professor']);
	$professor = true;
	$cols = "<th class="."col-sm-1".">ID</th>
			<th class="."col-sm-5".">Disciplina</th>
			<th class="."col-sm-1".">Periodo</th>
			<th class="."actions col-sm-1".">Ações</th>";
}else{
	$listaTurmas = $turmaController->listaTurmasAluno($_SESSION['id_aluno']);
	$aluno = true;
	$cols = "<th class="."col-sm-1".">ID</th>
			<th class="."col-sm-3".">Disciplina</th>
			<th class="."col-sm-1".">Periodo</th>
			<th class="."col-sm-2".">Professor</th>";
}

?>

 	<div id="top" class="row">
 		<?php if($user){ ?>
	 		<div class="col-sm-6">
				<a href="pagCadastrarTurma.php" class="btn btn-primary pull-left h2">Nova Turma</a>
			</div>
		<?php } ?>
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
					<?php echo $cols ?>
				</tr>
			</thead>
			<tbody>
			<?php
			if($user){
				foreach ($listaTurmas as $row) {
					echo '<tr>';
						echo '<td class="text-center">'.$row['id_turma'].'</td>';
						echo '<td>'.$row['nome_disciplina'].'</td>';
						echo '<td class="text-center">'.$row['identificador'].'</td>';
						echo '<td class="text-center">'.$row['nome'].'</td>';
						echo '<td class="text-center">'.$row['num_vagas'].'</td>';
						echo '<td class="text-center">'.($row['situacao']=="1" ? "Ativo" : "Inativo").'</td>';
						echo '<td class="actions text-center">';
							echo '<a class="btn btn-success btn-xs" href="view.html">Visualizar</a>';
							echo '<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>';
							echo '<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>';
						echo '</td>';
					echo '</tr>';
				}
			}else if($professor){
				foreach ($listaTurmas as $row) {
					echo '<tr>';
						echo '<td class="text-center">'.$row['id_turma'].'</td>';
						echo '<td class="text-center">'.utf8_decode($row['nome_disciplina']).'</td>';
						echo '<td class="text-center">'.$row['identificador'].'</td>';
						echo '<td class="actions text-center">';
							echo '<a class="btn btn-info btn-xs" href="view.html">Avaliação</a>';
							echo '<a class="btn btn-info btn-xs" href="edit.html">Chamada</a>';
						echo '</td>';
					echo '</tr>';
				}
			}else{
				foreach ($listaTurmas as $row) {
					echo '<tr>';
						echo '<td class="text-center">'.$row['id_turma'].'</td>';
						echo '<td class="text-center">'.$row['nome_disciplina'].'</td>';
						echo '<td class="text-center">'.$row['identificador'].'</td>';
						echo '<td class="text-center">'.$row['nome'].'</td>';
					echo '</tr>';
				}
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