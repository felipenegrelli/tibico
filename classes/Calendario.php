<?php
class Calendario {

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

    public function getIdentificador()
    {
      return $this->identificador;
    }

    public function setIdentificador($identificador)
    {
      $this->identificador = $identificador;
    }

    public function getDuracao()
    {
      return $this->duracao;
    }

    public function setDuracao($duracao)
    {
      $this->duracao = $duracao;
    }

    public function getDataInicioCA()
    {
      return $this->dataInicioCA;
    }

    public function setDataInicioCA($dataInicioCA)
    {
      $this->dataInicioCA = $dataInicioCA;
    }

    public function getDataFimCA()
    {
      return $this->dataFimCA;
    }

    public function setDataFimCA($dataFimCA)
    {
      $this->dataFimCA = $dataFimCA;
    }

    public function getDataFimPM()
    {
      return $this->dataFimPM;
    }

    public function setDataFimPM($dataFimPM)
    {
      $this->dataFimPM = $dataFimPM;
    }

    public function getDataFimPL()
    {
      return $this->dataFimPL;
    }

    public function setDataFimPL($dataFimPL)
    {
      $this->dataFimPL = $dataFimPL;
    }

    public function getSituacao()
    {
      return $this->situacao;
    }

    public function setSituacao($situacao)
    {
      $this->situacao = $situacao;
    }


}
?>
