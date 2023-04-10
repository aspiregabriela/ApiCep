<?php 

namespace APPAPI\Model;

use APPAPI\DAO\EnderecoDAO;

class CidadeModel extends Model
{ 
    public $id_cidade, $descricao, $uf, $codigo_ibge, $ddd;

    public function getCidadesbyUF($uf)
    {
        $dao = new EnderecoDAO();

        $this ->rows =$dao -> selectCidadesbyUF($uf);
    }

}