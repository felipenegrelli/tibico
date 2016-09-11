<?php
session_start();
$page_title = "Cadastrar Turma";
include_once 'header.php';
include_once 'classes/ProfessorController.php';

$professorController = new ProfessorController();
$listaProfessores = $professorController->listaProfessores();
?>

<div class="container-flow">    

      <div class="form-group col-md-6">
        <label for="calendario">Calendario</label>
          <select id="calendario" name="calendario" class="form-control">
            <option value=""></option>
            <option value="1">2016/2</option>
            <option value="2">2016/1</option>
          </select>
      </div>    

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

  	  <div class="form-group col-md-6">
  	  	<label for="vagas">Quantidade de Vagas</label>
  	  	<input type="number" class="form-control" id="vagas">
  	  </div>

      <div class="form-group col-md-6">
        <label for="status">Status</label>
          <select id="status" name="status" class="form-control">
            <option value=""></option>
            <option value="1">Ativo</option>
            <option value="2">Inativo</option>
          </select>
      </div>

    <div class="">
      <div class="form-group col-md-2">
        <label for="status">Dia da Semana</label>
        <select id="status" name="status" class="form-control">
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
        <label for="vagas">Início</label>
        <input type="time" class="form-control" id="vagas">
      </div>
      <div class="form-group col-md-2">
        <label for="vagas">Termino</label>
        <input type="time" class="form-control" id="vagas">
      </div>
      <div class="form-group col-md-1">
        <label for="vagas"> </label>
        <button type="submit" id="setHoras" class="btn btn-primary">Inserir</button>
      </div>



    </div>


    <hr />
	  <div class="col-md-12">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="template.html" class="btn btn-default">Cancelar</a>
	  </div>


  </form>
</div> <!-- /container -->

<?php
include_once 'footer.php';
?>


<script>

</script>
