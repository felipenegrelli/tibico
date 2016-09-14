<?php
session_start();
$page_title = "Fechar Turma";

include_once 'classes/TurmaController.php';
include_once 'classes/CalendarioController.php';
include_once 'classes/ProfessorController.php';
include_once 'classes/AlunoController.php';
include_once 'classes/AvaliacaoController.php';
$turmaController = new TurmaController();

$idTurma = $_GET["id_turma"];

if(!empty($_GET["id_turma"])&&!empty($_POST)){

  $id_usuarios = $_POST["usuarios"];
  $faltas = $_POST["faltas"];
  $situacoes = $_POST["situacoes"];
  $notas_finais = $_POST["notas_finais"];

  for ($i=0; $i < count($id_usuarios); $i++) { 
    $turmaController->atualizaResultadoAluno($idTurma, $id_usuarios[$i], $faltas[$i], $notas_finais[$i], $situacoes[$i]);
  }

  $turmaController->atualizaStatusTurma($idTurma, 0);
  header("location:index.php");
}

$avaliacaoController = new AvaliacaoController();
$listaAvaliacoes = $avaliacaoController->listaAvaliacoesTurma($idTurma);

$listaAlunos = $turmaController->listaAlunosTurma($idTurma);
$totalAulasTurma = $turmaController->pegaQuantAulasTurma($idTurma);

include_once 'header.php';
?>

<div class="container-flow">
  <form action="PagFecharTurma.php?id_turma=<?php echo $idTurma?>" method="post">
    <table class="table table-striped table-hover">
      <tr>
        <th class="col-sm-1">Matricula</th>
        <th class="col-sm-3">Nome</th>
        <th class="col-sm-1">Faltas</th>
        <?php

        foreach ($listaAvaliacoes as $avaliacao) {
          echo '<th  class="col-sm-1">'.$avaliacao["descricao"].' <br /><small>(Peso '.$avaliacao["peso"].')</small></th>';
        }
        echo '<th class="col-sm-1">Media Final</th>';
        echo '<th class="col-sm-2">Resultado Final</th>';

		echo '</tr>';

		foreach ($listaAlunos as $aluno) {
			$faltas = $turmaController->pegaFaltasAluno($idTurma, $aluno["id_aluno"]);

      $somaPesos = null;
      $somaNotas = null;

			echo '<tr>';
	  		echo '<td class="text-center">'.$aluno["matricula"].'<input type="hidden" name="usuarios[]" value="'.$aluno["id_aluno"].'"></td>';
	  		echo '<td>'.$aluno["nome"].'</td>';
	  		echo '<td class="text-center">'.$faltas[0]["faltas"].'<input type="hidden" name="faltas[]" value="'.$faltas[0]["faltas"].'"></td>';

	  		foreach ($listaAvaliacoes as $avaliacao) {          
	  			$nota = $avaliacaoController->pegaNotaAvaliacao($avaliacao["id_avaliacao"], $aluno["id_aluno"]);
          $somaPesos += $avaliacao["peso"];
          $somaNotas += $nota["nota"] * $avaliacao["peso"];
	        echo '<td class="text-center">'.$nota["nota"].'</td>';
	      }

        $mediaFinal = round($somaNotas/$somaPesos);
        echo '<td class="text-center">'.$mediaFinal.'<input type="hidden" name="notas_finais[]" value="'.$mediaFinal.'"></td>';

        //calcula resultado do aluno
        $percfalta = $faltas[0]["faltas"]/$totalAulasTurma["aulas"];


        if($percfalta > 0.25){
          echo '<td class="text-center"><b>Reprovado Por Falta</b><input type="hidden" name="situacoes[]" value="REPROVADO_FALTA"></td>';
        }
        else if($percfalta < 0.25 && $mediaFinal < 60){
          echo '<td class="text-center"><b>Reprovado Por Nota</b><input type="hidden" name="situacoes[]" value="REPROVADO_NOTA"></td>';
        }
        else if($percfalta < 0.25 && $mediaFinal >= 60){
          echo '<td class="text-center"><b>Aprovado</b><input type="hidden" name="situacoes[]" value="APROVADO"></td>';
        }
			echo '</tr>';
		}
      
      ?>
    </table>


    <br />
    <div class="row">
  	  <div class="col-md-12">
  	  	<button type="submit" class="btn btn-primary">Fechar Turma</button>
  		<a href="index.php" class="btn btn-default">Cancelar</a>
  	  </div>
    </div>

  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>
