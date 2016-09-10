<?php
session_start();
include_once 'classes/AvaliacaoController.php';

$idTurma = $_GET["id_turma"];
$avaliacao = null;

if(empty($_GET["id_avaliacao"])&&!empty($_POST)){

	//Salva nova avaliacao no banco
	$avaliacaoController = new AvaliacaoController();
	$avaliacaoController->inseriAvaliacao($_POST["tipo"], $_POST["peso"], $_POST["data"], $_POST["descricao"], $idTurma);
	header("location:PagExibirAvaliacoes.php?id_turma=".$idTurma);
}
else if(!empty($_GET["id_avaliacao"])&&!empty($_POST)){

	//Salva avaliação editada no banco
	$avaliacaoController = new AvaliacaoController();
	$avaliacaoController->atualizaAvaliacao($_GET["id_avaliacao"], $_POST["tipo"], $_POST["peso"], $_POST["data"], $_POST["descricao"], $idTurma);
	header("location:PagExibirAvaliacoes.php?id_turma=".$idTurma);
}
else if(isset($_GET["id_avaliacao"])){

	//Carrega avaliação para edição
	$idAvaliacao = $_GET["id_avaliacao"];
	$avaliacaoController = new AvaliacaoController();
	$avaliacao = $avaliacaoController->pegaAvaliacaoPorId($idAvaliacao);
	$descricao = $avaliacao["descricao"];
	$dataNF = strtotime($avaliacao['data']);
	$dataFormatada = date( 'Y-m-d', $dataNF );
	$peso = $avaliacao["peso"];
	$tipo = $avaliacao["tipo_avaliacao"];
}

$page_title = "Cadastrar Avaliação";

include_once 'header.php'; 
?>

<div class="container-flow">
	<?php
	if(!empty($_GET["id_avaliacao"])) {
		echo '<form action="PagCadastrarAvaliacao.php?id_turma='.$idTurma.'&id_avaliacao='.$_GET["id_avaliacao"].'" method="post">';
	}
	else {
		echo '<form action="PagCadastrarAvaliacao.php?id_turma='.$idTurma.'" method="post">';
	}
    

    ?>
  	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="descricao">Descrição</label>
  	  	<input type="Text" class="form-control" name="descricao" placeholder="Digite o nome" value="<?php if(!empty($descricao)) echo $descricao; ?>">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="data">Data</label>
  	  	<input type="date" class="form-control" name="data" placeholder="Digite o valor" value="<?php if(!empty($dataFormatada)) echo $dataFormatada; ?>">
  	  </div>
	</div>
	
	<div class="row">
  	  <div class="form-group col-md-6">
  	  	<label for="tipo">Tipo de Avaliação</label>
  	  	<input type="text" class="form-control" name="tipo" placeholder="Digite o valor" value="<?php if(!empty($tipo)) echo $tipo; ?>">
  	  </div>
	  <div class="form-group col-md-3">
  	  	<label for="peso">Peso</label>
  	  	<input type="number" class="form-control" name="peso" placeholder="Digite o valor" value="<?php if(!empty($peso)) echo $peso; ?>">
  	  </div>
	</div>

	<hr />
	
	<div class="row">
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="PagExibirAvaliacoes.php?id_turma=<?php echo $idTurma?>" class="btn btn-default">Cancelar</a>
	  </div>
	</div>

  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>
