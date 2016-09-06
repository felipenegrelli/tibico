<?php
include_once 'Curso.php';

class Disciplina {

    private $id;
    private $nome;
    private $numCreditos;
    private $periodoCorrespondente;
    private $areaDisciplina;
    private $curso = null;

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

    public function getNome()
    {
      return $this->nome;
    }

    public function setNome($nome)
    {
      $this->nome = $nome;
    }
}
?>
