<?php
class CalendarioAcademico {

    private $id;
    private $identificador;
    private $duracao;
    private $dataInicioCA;
    private $dataFimCA;
    private $dataInicioPM;
    private $dataFimPM;
    private $dataInicioPL;
    private $dataFimPL;
    private $situacao;

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
}
?>
