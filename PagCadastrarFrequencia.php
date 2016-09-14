<?php
session_start();



include_once 'classes/TurmaController.php';
include_once 'classes/AlunoController.php';


$idTurma = $_GET["id_turma"];
$data = $_GET["data"];

$idAula = $_GET["id_aula"];

$turmaController = new TurmaController();
$turma = $turmaController->pegaTurmaPorId($idTurma);

$alunoController = new AlunoController();
$listaAlunos = $alunoController->listaAlunosPorTurma($idTurma);


$page_title = "Registrar Frequência <br><br> Data: ".$data." <br> Turma:  ".$turma["nome_disciplina"].' '.wordwrap($turma["identificador"],4,'/');


include_once 'header.php';

?>

<div class="container-flow">

  <form action="" method="post" id="tabela_chamada"> 

    <div id="list" class="row">
    
    <div class="table col-md-12">
      <table class="table table-striped table-hover" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="col-sm-1">ID</th>
            <th class="col-sm-1">Aluno</th>
            <th class="col-sm-3">Faltas</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $cont = 0;
        foreach ($listaAlunos as $row) {
          echo '<tr>';
            echo '<td data-id="'.$row['id_aluno'].'" class="text-center">'.$row['id_aluno'].'</td>';
            echo '<td data-nome="'.$row['nome'].'" class="text-center">'.$row['nome'].'</td>';
            echo '<td class="text-center"> <input id="faltas'.$cont.'" type="text"> </input> </td>';
          echo '</tr>';
          $cont++;
        }
        ?>
        </tbody>
      </table>
    </div>
    
    </div> <!-- /#list -->


    <div class="row">
  	  <div class="col-md-12">
  	  	<button type="submit" class="btn btn-primary" id="salvarDados" value=<?php $idAula ?> >Salvar</button>
  	  </div>
    </div>

  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>

<script>

  $('#salvarDados').click(function(){
    var cont = 0;
    var rodada = 0;
    $('#tabela_chamada tr').each(function(){
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


</script>