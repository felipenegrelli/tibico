<?php
session_start();
$page_title = "Exibir Cursos";
include_once 'header.php';
include_once 'classes/CursoController.php';

$cursoController = new CursoController();
$listaCursos = $cursoController->listaCursos();
?>
 	<div id="top" class="row">
 		<div class="col-sm-6">
			<a href="PagCadastrarCurso.php" class="btn btn-primary pull-left h2">Novo Curso</a>
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
					<th class="col-sm-3">Nome</th>
					<th class="col-sm-1">Sigla</th>
					<th class="col-sm-1">Regime</th>
					<th class="col-sm-1">Duração</th>
					<th class="actions col-sm-2">Ações</th>
					<th class="actions col-sm-1">Outras Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($listaCursos as $row) {
				echo '<tr>';
					echo '<td class="text-center">'.$row['id_curso'].'</td>';
					echo '<td>'.$row['nome'].'</td>';
					echo '<td class="text-center">'.$row['sigla'].'</td>';
					echo '<td class="text-center">'.$row['regime'].'</td>';
					echo '<td class="text-center">'.$row['duracao'].'</td>';
					echo '<td class="actions text-center">
						<a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
						<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>';
					echo '</td>';
					echo '<td class="actions text-center">
						<a class="btn btn-info btn-xs" href="PagExibirDisciplinas.php?id_curso='.$row['id_curso'].'">Disciplinas</a>';
					echo '</td>';
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->
	
	<div id="bottom" class="row">
		<div class="col-md-12">
			<ul class="pagination">
				<li class="disabled"><a>&lt; Anterior</a></li>
				<li class="disabled"><a>1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li class="next"><a href="#" rel="next">Próximo &gt;</a></li>
			</ul><!-- /.pagination -->
		</div>
	</div> <!-- /#bottom -->

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
