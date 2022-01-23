<?php

namespace Pessoa\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PessoaController extends AbstractActionController{

    private $table;

    public function __construct($table){

        $this->$table = $table;

    }


    public function indexAction(){
        return new ViewModel(['pessoas' => $this->table->getAll()]);
    }

    public function adicionarAction(){
        return new viewModel();
    }

    public function salvarAction(){
        return new viewModel();
    }

    public function editarAction(){
        return new viewModel();
    }
    
    public function confirmacaoAction(){
        return new viewModel();
    }

    public function removerAction(){
        return new viewModel();
    }
    /**
     * pessoa             -> index
     * pessoa/adicionar   -> adicionarAction
     * pessoa/salvar      -> salvarAction
     * pessoa/editar      -> editarAction
     * pessoa/confirmacao -> confirmacaoAction
     * pessoa/remover     -> removerAction
     */
}