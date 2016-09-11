<?php
session_start();
$page_title = "Cadastrar Turma";
include_once 'header.php';
include_once 'classes/TurmaController.php';
include_once 'classes/CalendarioController.php';
include_once 'classes/ProfessorController.php';

$idDisciplina = $_GET["id_disciplina"];





if(empty($_GET["id_turma"])&&!empty($_POST)){

  //Salva nova turma no banco
  $turmaController = new TurmaController();
  $turmaController->inseriTurma($_POST["vagas"], $_POST["calendario"],$idDisciplina, $_POST["situacao"], $_POST["professor"]);
  header("location:PagExibirTurmas.php?id_disciplina=".$idDisciplina);
}
else if(!empty($_GET["id_turma"])&&!empty($_POST)){

  //Salva avaliação editada no banco
  /*
  $avaliacaoController = new AvaliacaoController();
  $avaliacaoController->atualizaAvaliacao($_GET["id_avaliacao"], $_POST["tipo"], $_POST["peso"], $_POST["data"], $_POST["descricao"], $idTurma);
  header("location:PagExibirAvaliacoes.php?id_turma=".$idTurma);
  */
}
else if(isset($_GET["id_turma"])){

  //Carrega avaliação para edição
  
  $idTurma = $_GET["id_turma"];
  $turmaController = new TurmaController();
  $avaliacao = $avaliacaoController->pegaAvaliacaoPorId($idAvaliacao);
  $descricao = $avaliacao["descricao"];
  $dataNF = strtotime($avaliacao['data']);
  $dataFormatada = date( 'Y-m-d', $dataNF );
  $peso = $avaliacao["peso"];
  $tipo = $avaliacao["tipo_avaliacao"];
  */
}


$calendarioController = new CalendarioController();
$listaCalendarios = $calendarioController->listaCalendarios();

$professorController = new ProfessorController();
$listaProfessores = $professorController->listaProfessores();







?>

<div class="container-flow">

  <form action="PagCadastrarTurma.php?id_disciplina=<?php echo $idDisciplina?>" method="post">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="calendario">Calendario</label>
          <select id="calendario" name="calendario" class="form-control">
            <option value=""></option>
            <?php

            foreach ($listaCalendarios as $row) {
              echo '<option value="'.$row['id_calendario'].'">'.$row['identificador'].'</option>';
            }

            ?>
          </select>
      </div>
     </div> 

    <div class="row">
      <div class="form-group col-md-6">
        <label for="professor">Professor</label>
          <select id="professor" name="professor" class="form-control">
            <option value=""></option>
            <?php

            foreach ($listaProfessores as $row) {
              echo '<option value="'.$row['id_professor'].'">'.$row['nome'].'</option>';
            }

            ?>
          </select>
      </div>
    </div>

    <div class="row">
  	  <div class="form-group col-md-3">
  	  	<label for="vagas">Quantidade de Vagas</label>
  	  	<input type="number" class="form-control" id="vagas" name="vagas">
  	  </div>

      <div class="form-group col-md-3">
        <label for="status">Status</label>
          <select id="status" name="situacao" class="form-control">
            <option value=""></option>
            <option value="1">Ativo</option>
            <option value="0">Inativo</option>
          </select>
      </div>
    </div>  

    <div class="row">
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary" onclick="inseriCamposHorario()">Inserir mais um horário</button>
      </div>
    </div>  


      <div id="horarios">
        <div class="row">
          <div class="form-group col-md-2">
            <label for="dia">Dia da Semana</label>
            <select id="dia" name="dia[]" class="form-control">
              <option value=""></option>
              <option value="1">Segunda</option>
              <option value="2">Terça</option>
              <option value="3">Quarta</option>
              <option value="4">Quinta </option>
              <option value="5">Sexta</option>
              <option value="6">Sabado</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inicio">Início</label>
            <input type="time" name="inicio[]" class="form-control" id="inicio">
          </div>
          <div class="form-group col-md-2">
            <label for="termino">Termino</label>
            <input type="time" name="termino[]" class="form-control" id="termino">
          </div> 
        </div>
      </div>


    <br />
    <div class="row">
  	  <div class="col-md-12">
  	  	<button type="submit" class="btn btn-primary">Salvar</button>
  		<a href="index.php" class="btn btn-default">Cancelar</a>
  	  </div>
    </div>


  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>
