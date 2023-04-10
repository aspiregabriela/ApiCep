<?php 

use APPAPI\Controller\EnderecoController;

$url= parse_url($_SERVER['REQUEST_URL'], PHP_URL_PATH);

switch($url)
{ 
    /*
    http://localhost:8000/endereco/by-cep=17210580
    */
    case
        EnderecoController::getLogradouroByCep();
    break;

    /*
    http://localhost:8000/logradouro/by-bairro?id_cidade=4874&bairro=Jardim América
    */
    case '/logradouro/by-bairro':
        EnderecoController::getLogradouroByBairroAndCidade();
    break;
    /* 
    http://localhost:8000/cep/by-logradouro=Rua Raphael de Almeida

    */

    case '/cidade/by-uf':
        EnderecoController::getCidadesByUF();
    break;
  
     /* 
        http://localhost:8000/cidade/by-uf?uf=SP
     */
    case'/bairro/by-cidade':
        EnderecoController::getBairrosByIdCidade();
    break;

    default:
        http_response_code(403);
    break;

}