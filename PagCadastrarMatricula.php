<?php
session_start();
$page_title = "Sala de Matrícula<br><br><h4>Nesta lista serão exibidas todas as disciplinas que você pode fazer neste período.<br>
 			Selecione as que você deseja cursar e clique em fazer pedido</h4>";
include_once 'header.php';
include_once 'classes/TurmaController.php';

$id_aluno = $_SESSION['id_aluno'];
$turmaController = new TurmaController();
$listaTurmas = $turmaController->turmasAptasPorAluno($id_aluno);
?>


<div class="container-flow">

  	<form action="" id="tabela_matricula"> 
 
	 	<div id="list" class="row">
		
		<div class="table-responsive col-md-12">
			<table class="table table-striped" cellspacing="0" cellpadding="0">
				<thead>
					<tr>
						<th class="col-sm-1">ID</th>
						<th class="col-sm-3">Disciplina</th>
						<th class="col-sm-3">Professor</th>
						<th class="col-sm-1">Vagas</th>
						<th class="actions col-sm-1">Creditos</th>
						<th class="actions col-sm-1">Selecionar</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$cont = 0;
				foreach ($listaTurmas as $row) {
					echo '<tr>';
						echo '<td data-id="'.$row['id_turma'].'" class="text-center">'.$row['id_turma'].'</td>';
						echo '<td class="text-center">'.$row['nome_disciplina'].'</td>';
						echo '<td class="text-center">'.$row['nome_professor'].'</td>';
						echo '<td class="text-center">'.$row['num_vagas'].'</td>';
						echo '<td class="text-center">'.$row['num_creditos'].'</td>';
						echo '<td class="text-center"><input id="check'.$cont.'" type="checkbox" value=""></td>';
					echo '</tr>';
					$cont++;
				}
				?>
				</tbody>
			</table>
		</div>
		</div> <!-- /#list -->
	</form>

    <div class="row">
  	  	<div class="col-md-12">
  	  		<button type="submit" class="btn btn-primary" id="salvarDados" value=<?php $idAula ?> >Fazer Pedido</button>
  	  	</div>
    </div>

</div>

<?php
include_once 'footer.php';
?>

<script>

  $('#salvarDados').click(function(){
  	var cont = 0;
  	var rodada = 0;
    $("#tabela_matricula tr").each(function(){
    	if(rodada > 0){
	    	if($('#check'+cont).prop( "checked" ) == true){
	    		var idTurma = $(this).find('td[data-id]').data('id');
		        $.post("classes/TurmaController.php",{ acao:'inserir', turma: idTurma, aluno: <?php echo $id_aluno ?>}, function(result){
		        	alert(result);
		        });
	    	}
			cont++;
		}
		rodada++;
    });
  });

    
/*    var rodada = 0;
    $('#tabela_matricula tr').each(function(){
      if(rodada > 0){
        var nome = $(this).find('td[data-nome]').data('nome');
        var id = $(this).find('td[data-id]').data('id');
        var f = $('#faltas'+cont).val();
        $.post("classes/FrequenciaController.php",{ acao:'inserir', idAula:<?php echo $idAula ?>, faltas:f, idAluno:id}, function(result){
        });
        cont++;
      }
      rodada++;
    });        
  });
*/

</script>
