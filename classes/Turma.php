<?php
class Turma {

    private $id = null;
    private $numVagas = null;
    private $calendario = null;
    private $disciplina = null;
    private $situacao = null;
    private $professor = null;
    private $listaAlunos = null;

    public function __construct()
    {

    }

    public function getId()
    {
      return $this->id;
    }

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getNumVagas()
    {
      return $this->numVagas;
    }

    public function setNumVagas($numVagas)
    {
      $this->numVagas = $numVagas;
    }

    public function getCalendario()
    {
      return $this->calendario;
    }

    public function setCalendario($calendario)
    {
      $this->calendario = $calendario;
    }

    public function getDisciplina()
    {
      return $this->disciplina;
    }

    public function setDisciplina($disciplina)
    {
      $this->disciplina = $disciplina;
    }

    public function getSituacao()
    {
      return $this->situacao;
    }

    public function setSituacao($situacao)
    {
      $this->situacao = $situacao;
    }

    public function getProfessor()
    {
      return $this->professor;
    }

    public function setProfessor($professor)
    {
      $this->professor = $professor;
    }

    public function getListaAlunos()
    {
      return $this->listaAlunos;
    }

    public function setListaAlunos($listaAlunos)
    {
      $this->listaAlunos = $listaAlunos;
    }
}
?>
