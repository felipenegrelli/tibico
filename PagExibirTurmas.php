<?php
$page_title = "Exibir Turmas";
include_once 'header.php';
?>

 	<div id="top" class="row">
 		<div class="col-sm-6">
			<a href="pagCadastrarTurma.php" class="btn btn-primary pull-left h2">Nova Turma</a>
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
				<tr>
					<td class="text-center">1</td>
					<td>Sistemas Operacionais</td>
					<td class="text-center">2016/2</td>
					<td class="text-center">Flávio Giraldeli</td>
					<td class="text-center">50</td>
					<td class="text-center">Ativo</td>
					<td class="actions text-center">
						<a class="btn btn-success btn-xs" href="view.html">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="edit.html">Editar</a>
						<a class="btn btn-danger btn-xs"  href="#" data-toggle="modal" data-target="#delete-modal">Excluir</a>
					</td>
				</tr>
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