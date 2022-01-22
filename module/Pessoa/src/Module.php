<?php

namespace Pessoa;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

// o modulo e carregado e retorna o arquivo file module.config.php
// que por sua vez busca as Actions em PesssoaController
class Module Implements ConfigProviderInterface{

    public function getConfig(){
        return include __DIR__ . "/../config/module.config.php";
    }
}