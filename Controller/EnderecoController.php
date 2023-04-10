<?php

namespace APPAPI\Controller;

use APPAPI\Controller\Controller;
use APPAPI\Model\EnderecoModel;
use APPAPI\Model\CidadeModel;
use Exception;

class EnderecoController extends Controller
{


    public static function getCepByLogradouro(): void
    {
        try {
            $logradouro = $_GET['logradouro'];

            $model = new EnderecoModel();
            $model->getCepByLogradouro($logradouro);

            parent::getResponseAsJSON($model->rows);

        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }
    public static function getLogradouroByBairroAndCidade(): void
    {
        try {
            $bairro =
                parent::getStringFromurl(
                    isset($_GET['bairro']) ? $_GET['bairro'] : null,
                    'cep'
                );

            $id_cidade = parent::getIntFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null,
                'cep'
            );

            $model = new EnderecoModel();
            $model->getLograoduroByBairroAndCidade($bairro, $id_cidade,);

            parent::getResponseAsJSON($model->rows);
        } catch (Exception $e) {
            
            parent::getExceptionAsJSON($e);
        }
    }
    public static function getLogradouroByCep(): void
    {
        try {
            $cep = parent::getIntFromUrl(
                isset($_GET['cep']) ? $_GET['cep'] : null
            );

            $model = new EnderecoModel();

            parent::getResponseAsJSON($model->getLogradouroByCep($cep));
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }

    public static function getBairrosByIdCidade(): void
    {
        try {
            $id_cidade = parent::getIntFromUrl(
                isset($_GET['id_cidade']) ? $_GET['id_cidade'] : null
            );

            $model = new EnderecoModel();
            $model->getBairrosByIdCidade($id_cidade);

            parent::getResponseAsJSON($model);
        } catch (Exception $e) {
            parent::getExceptionAsJSON($e);
        }
    }
    public static function getCidadesByUF()
    {
        try {
            $uf = $_GET['UF'];

            $model = new CidadeModel();
            $model->getCidadesByUF($uf);

            parent::getResponseAsJSON($model->rows);
        } catch (Exception $e) {

            parent::getExceptionAsJSON($e);
        }
    }
}
