<?php
session_start();
include_once 'classes/AvaliacaoController.php';
include_once 'classes/TurmaController.php';

$idAvaliacao = $_GET["id_avaliacao"];

$avaliacaoController = new AvaliacaoController();

//
$avaliacao = $avaliacaoController->pegaAvaliacaoPorId($idAvaliacao);
$idTurma = $avaliacao["id_turma"];

//testa se id não esta vazio e teste se esse é um retorno de submit
if(!empty($idAvaliacao)&&!empty($_POST)){

	foreach ($_POST as $idAluno=>$nota) {

		//busca no banco se ja existe a linha referente a essa avaliacao e esse aluno
		$resultado = $avaliacaoController->pegaNotaAvaliacao($idAvaliacao, $idAluno);

		//teste pra ver se nao foi encontrado
		if(empty($resultado["nota"])){

			//não achou e inseri no banco
			$avaliacaoController->inseriNotaAvaliacao($idAvaliacao, $idAluno, $nota);
		}
		else{

			//achou e atualiza
			$avaliacaoController->atualizaNotaAvaliacao($idAvaliacao, $idAluno, $nota);
		}		
	}

	//salvou/atualizou, agora redireciona para a pagina de avaliacoes
	header("location:PagExibirAvaliacoes.php?id_turma=".$idTurma);
}

$turmaController = new TurmaController();
$listaAlunos = $turmaController->listaAlunosTurma($idTurma);

$page_title = "Lançar Notas - ";
include_once 'header.php';
?>
<form action="PagLancarNotas.php?id_avaliacao=<?php echo $idAvaliacao?>" method="post">
	<table class="table table-striped table-hover col-md-8">
		<tr>
			<th class="col-sm-1">Id</th>
			<th class="col-sm-2">Matricula</th>
			<th class="col-sm-3">Nome</th>
			<th class="col-sm-2">Nota</th>
		</tr>

	<?php 
	
	foreach ($listaAlunos as $aluno) {
		$resultado = $avaliacaoController->pegaNotaAvaliacao($idAvaliacao, $aluno["id_aluno"]);

		echo '<tr>';
			echo '<td class="text-center">'.$aluno["id_aluno"].'</td>';
			echo '<td class="text-center">'.$aluno["matricula"].'</td>';
			echo '<td>'.$aluno["nome"].'</td>';
			if(!empty($resultado["nota"])){
				echo '<td><input type="Number" class="form-control" name="'.$aluno["id_aluno"].'" placeholder="Digite o nota" value="'.$resultado["nota"].'"></td>';
			}
			else{
				echo '<td><input type="Number" class="form-control" name="'.$aluno["id_aluno"].'" placeholder="Digite o nota"></td>';
			}
			
		echo '</th>';
		/*
		echo '<div class="row">';
			echo '<div class="form-group col-md-2">';
				echo '<span for="descricao">'.$aluno["nome"].'</span>';
			echo '</div>';
			echo '<div class="form-group col-md-3">';
				echo '<input type="Text" class="form-control" name="descricao" placeholder="Digite o nome">';
			echo '</div>';
		echo '</div>';
		*/
	}
	
	?>
	</table>


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
