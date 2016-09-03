<?php
class Professor extends Pessoa {
    private $formacaoAcademica;
    private $areaAtuacao;

    public function __construct()
    {

    }

    public function getFormacaoAcademica()
    {
      return $this->formacaoAcademica;
    }

    public function setFormacaoAcademica($formacaoAcademica)
    {
      $this->formacaoAcademica = $formacaoAcademica;
    }

    public function getAreaAtuacao()
    {
      return $this->areaAtuacao;
    }

    public function setAreaAtuacao($areaAtuacao)
    {
      $this->areaAtuacao = $areaAtuacao;
    }
}
?>
