<?php

namespace Pessoa;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Pessoa\Controller\PessoaController;

// o modulo e carregado e retorna o arquivo file module.config.php
// que por sua vez busca as Actions em PesssoaController
class Module Implements ConfigProviderInterface{

    //aponta onde a configuração do modulo esta e retorna para a mesclagem com a configuração global
    //metodo da interface ConfigProviderInterface
    public function getConfig(){
        return include __DIR__ . "/../config/module.config.php";
    }

    public function getServiceConfig(){
        //utilização de factory para a instanciação da classe PessoaTable
        return [
            'factories' => [
                //quando PessoaTable for chamada ela iniciara a seguinte função
                // que servira como construtor
                Model\PessoaTable::class => function ($container){
                    // inicializa a variavel tableGateway da classe pessoaTable
                    $tableGateway = $container->get(Model\PessoaTableGateway::class);
                    
                    return new Model\PessoaTable($tableGateway);
                        var_dump($tableGateway);
                        die;
                },
                Model\PessoaTableGateway::class => function($container){
                    //?????????????
                    $dbAdapter = $container->get(AdapterInterface::class);
                    //criar os registros da tabela pessoa
                    $resultSetPrototype = new ResultSet();

                    $resultSetPrototype->setArrayObjectPrototype(new Model\Pessoa());

                    //seta qual tabela do banco de dados deve ser carregada com base 
                    //em determinada classe criada anteriormente 
                    //instanciada pela variavel $resultSetPrototype
                    return new TableGateway('pessoa', $dbAdapter, null, $resultSetPrototype);
                },
            ]
        ];
    }
    public function getControllerConfig(){
        return [
            'factories' => [
                PessoaController::class => function($container){
                    $tableGateway = $container->get(Model\PessoaTable::class);
                    return new PessoaController($tableGateway);
                },
            ]
        ];
    }
}