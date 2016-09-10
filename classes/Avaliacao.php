<?php
class Avaliacao {

  private $id;
  private $descricao;
  private $tipoAvaliacao;
  private $data;
  private $peso;
  private $turma;

  public function __construct()
  {

  }

  public function getId()
  {
    return $this->id;
  }

  public function setID($id)
  {
    $this->id = $id;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function getTipoAvaliacao()
  {
    return $this->tipoAvaliacao;
  }

  public function setTipoAvaliacao($tipoAvaliacao)
  {
    $this->tipoAvaliacao = $tipoAvaliacao;
  }

  public function getData()
  {
    return $this->data;
  }

  public function setData($data)
  {
    $this->data = $data;
  }

   public function getPeso()
  {
    return $this->peso;
  }

  public function setPeso($peso)
  {
    $this->peso = $peso;
  }

  public function getTurma()
  {
    return $this->turma;
  }

  public function setTurma($turma)
  {
    $this->turma = $turma;
  }

}
?>