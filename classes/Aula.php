<?php
class Turma {

    private $id = null;
    private $data = null;
    private $quantidadeAulas = null;
    private $conteudo = null;
    private $idTurma = null;

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

    public function getdata()
    {
      return $this->data;
    }

    public function setdata($data)
    {
      $this->data = $data;
    }

    public function getquantidadeAulas()
    {
      return $this->quantidadeAulas;
    }

    public function setquantidadeAulas($quantidadeAulas)
    {
      $this->quantidadeAulas = $quantidadeAulas;
    }

}
?>
