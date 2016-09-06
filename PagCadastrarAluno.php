<?php
session_start();
$page_title = "Cadastrar Usuario";
include_once 'header.php';
?>

<div class="container-flow">    

    <form action="index.html">
  	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Um</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o nome">
  	  </div>
	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Dois</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Três</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Quatro</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Cinco</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Seis</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Sete</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Oito</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Nove</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	  <div class="form-group col-md-6">
  	  	<label for="exampleInputEmail1">Campo Dez</label>
  	  	<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Digite o valor">
  	  </div>
	</div>
	
	<hr />
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="template.html" class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>
