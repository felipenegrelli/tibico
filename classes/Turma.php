<?php
class Turma {
    private $numVagas = null;
    private Calendario $calendario = null;
    private Disciplina $disciplina = null;
    private  
    private $situacao = null;
    private Professor $professor = null;
    private $listaAlunos = null;

    public function __construct()
    {

    }

    public function getMatricula()
    {
      return $this->matricula;
    }

    public function setMatricula($matricula)
    {
      $this->matricula = $matricula;
    }

    public function getNomePai()
    {
      return $this->nomePai;
    }

    public function setNomePai($nomePai)
    {
      $this->nomePai = $nomePai;
    }

    public function getNomeMae()
    {
      return $this->nomeMae;
    }

    public function setNomeMae($nomePai)
    {
      $this->nomePai = $nomeMae;
    }

    public function getStatus()
    {
      return $this->status;
    }

    public function setStatus($status)
    {
      $this->status = $status;
    }

}
?>
