<?php
class Curso {

    private $nome;
    private $regime;
    private $duracao;
    private $sigla;
    private $descricao;
    private $areaConhecimento;
    private $grauInstrucao;

    public function __construct()
    {

    }

    public function getNome()
    {
      return $this->nome;
    }

    public function setNome($nome)
    {
      $this->nome = $nome;
    }

    public function getRegime()
    {
      return $this->regime;
    }

    public function setRegime($regime)
    {
      $this->regime = $regime;
    }

    public function getDuracao()
    {
      return $this->duracao;
    }

    public function setDuracao($duracao)
    {
      $this->duracao = $duracao;
    }

    public function getSigla()
    {
      return $this->sigla;
    }

    public function setSigla($sigla)
    {
      $this->sigla = $sigla;
    }

    public function getDescricao()
    {
      return $this->descricao;
    }

    public function setDescicao($descricao)
    {
      $this->descricao = $descricao;
    }

    public function getAreaConhecimento()
    {
      return $this->areaConhecimento;
    }

    public function setAreaConhecimento($areaConhecimento)
    {
      $this->areaConhecimento = $areaConhecimento;
    }

    public function getGrauInstrucao()
    {
      return $this->grauIinstrucao;
    }

    public function setGrauInstrucao($grauIinstrucao)
    {
      $this->grauIinstrucao = $grauIinstrucao;
    }
}
?>
