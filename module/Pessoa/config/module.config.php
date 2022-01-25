<?php
//arquivo de configuração do modulo
//retorna um array e mescla na configuração global


namespace Pessoa;
use Zend\ServiceManager\Factory\InvokableFactory;

// o array que precisa ser retornado para a mesclagem
return [
    //router vai configurar quais são as rotas e gerir as requisições
    'router' => [
        'routes'=>[
            //definindo a rota pessoa
            'pessoa'=>[
                'type'    => \Zend\Router\Http\Segment::class,
                //definindo as opções de rotas
                'options' => [
                    'route'      => '/pessoa[/:action[/:id]]', 
                    'constrains' => [
                        //expressão regular para definir as regras de entradas das requisiçoes
                        //entradas para action sendo alfanumerica
                        //e id como um valor numerico
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+'
                    ], 
                    //definindo a requisição default quando a rota pessoa nao tiver 
                    //o parametro action e id
                    'defaults' => [
                        'controller' => Controller\PessoaController::class, 
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    //usar o invokable como construtor generico da classe PessoaController
    'controllers' => [
        'factories' => [
            //Controller\PessoaController::class => InvokableFactory::class,
        ],
    ],
    //especificando o caminho das views
    'view_manager' => [
        'template_path_stack' => [
            'pessoa' => __DIR__ . '/../view',
        ],
    ],
    'db' => [
        'driver'   => 'Pdo_Pgsql', 
        'database' => 'novo', 
        'username' => 'teste', 
        'password' => '12345', 
        'hostname' => 'localhost',
        'port'     => '5432'

    ],
];
// as possiveis entradas para a rota estabelecida acima 
//   /pessoa/listar/todos
//   /pessoa/editar/1