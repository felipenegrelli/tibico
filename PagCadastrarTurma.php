<?php
session_start();
$page_title = "Cadastrar Turma";

include_once 'classes/TurmaController.php';
include_once 'classes/CalendarioController.php';
include_once 'classes/ProfessorController.php';

$idDisciplina = $_GET["id_disciplina"];

if(empty($_GET["id_turma"])&&!empty($_POST)){

  //Salva nova turma no banco
  $turmaController = new TurmaController();
  $turmaController->inseriTurma($_POST["vagas"], $_POST["calendario"],$idDisciplina, $_POST["situacao_turma"], $_POST["professor"]);
  header("location:PagExibirTurmas.php?id_disciplina=".$idDisciplina);
}
else if(!empty($_GET["id_turma"])&&!empty($_POST)){

  //Salva avaliação editada no banco  
  $turmaController = new TurmaController();
  $turmaController->atualizaTurma($_GET["id_turma"], $_POST["vagas"], $_POST["calendario"],$idDisciplina, $_POST["situacao_turma"], $_POST["professor"]);
  header("location:PagExibirTurmas.php?id_disciplina=".$idDisciplina);
  
}
else if(isset($_GET["id_turma"])){

  //Carrega avaliação para edição
  $idTurma = $_GET["id_turma"];
  $turmaController = new TurmaController();

  $turma = $turmaController->pegaTurmaPorId($idTurma);

  $idCalendario = $turma["id_calendario"];
  $idProfessor = $turma["id_professor"];
  $vagas = $turma["num_vagas"];
  $situacao = $turma["situacao_turma"];

  $page_title = "Editar Turma";
}


$calendarioController = new CalendarioController();
$listaCalendarios = $calendarioController->listaCalendarios();

$professorController = new ProfessorController();
$listaProfessores = $professorController->listaProfessores();

include_once 'header.php';

?>

<div class="container-flow">

	<?php
	if(!empty($_GET["id_turma"])) {
		echo '<form action="PagCadastrarTurma.php?id_disciplina='.$idDisciplina.'&id_turma='.$_GET["id_turma"].'" method="post">';
	}
	else {
		echo '<form action="PagCadastrarTurma.php?id_disciplina='.$idDisciplina.'" method="post">';
	}
	?>

  <form action="PagCadastrarTurma.php?id_disciplina=<?php echo $idDisciplina?>" method="post">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="calendario">Calendario</label>
          <select id="calendario" name="calendario" class="form-control">
            
            <?php
            if(empty($idCalendario)){
            	echo '<option selected disabled value="">Escolha um Calendário</option>';
            }


            foreach ($listaCalendarios as $row) {
            	if(!empty($idCalendario) && $idCalendario== $row['id_calendario']){
            		echo '<option selected value="'.$row['id_calendario'].'">'.$row['identificador'].'</option>';
            	}
            	else{
            		echo '<option value="'.$row['id_calendario'].'">'.$row['identificador'].'</option>';
            	}              
            }

            ?>
          </select>
      </div>
     </div> 

    <div class="row">
      <div class="form-group col-md-6">
        <label for="professor">Professor</label>
          <select id="professor" name="professor" class="form-control" value="<?php if(!empty($idProfessor)) echo $idProfessor; ?>">
            <?php

            if(empty($idProfessor)){
            	echo '<option selected disabled value="">Escolha um professor</option>';
            }

            foreach ($listaProfessores as $row) {

            	if(!empty($idProfessor) && $idProfessor== $row['id_professor']){
            		echo '<option selected value="'.$row['id_professor'].'">'.$row['nome'].'</option>';
            	}
            	else{
            		echo '<option value="'.$row['id_professor'].'">'.$row['nome'].'</option>';
            	}
              
            }

            ?>
          </select>
      </div>
    </div>

    <div class="row">
  	  <div class="form-group col-md-3">
  	  	<label for="vagas">Quantidade de Vagas</label>
  	  	<input type="number" class="form-control" id="vagas" name="vagas" value="<?php if(!empty($vagas)) echo $vagas; ?>">
  	  </div>

      <div class="form-group col-md-3">
        <label for="status">Status</label>
          <select id="status" name="situacao_turma" class="form-control" value="<?php if(!empty($situacao)) echo $situacao; ?>">
          <?php

          	if(!isset($situacao)){
          		echo '<option selected disabled value="">Escolha uma situação</option>';
          	}

          	if(isset($situacao) && $situacao == 0){
          		echo '<option selected value="0">Inativo</option>';
          	}
          	else{
          		echo '<option value="0">Inativo</option>';
          	}

          	if(isset($situacao) && $situacao == 1){
          		echo '<option selected value="1">Ativo</option>';
          	}
          	else{
          		echo '<option value="1">Ativo</option>';
          	}

          ?>            
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
              <option selected disabled value="">Esolha um dia</option>
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
  		<a href="PagExibirTurmas.php?id_disciplina=<?php echo $idDisciplina ?>" class="btn btn-default">Cancelar</a>
  	  </div>
    </div>


  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>
