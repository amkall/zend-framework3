<?php

namespace Pessoa\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pessoa\Form\PessoaForm;

class PessoaController extends AbstractActionController{

    private $table;

    // injeção de dependencia 
    public function __construct($table){

        $this->table = $table; //new PessoaTable();

    }

    //Ao final do metodo é utilizado o sufixo Action para mostrar que
    //se refere a uma ação que sera tomada

    public function indexAction(){
        //Ao retornar uma view model o zend entende que o que sera renderizado
        //sera o prefixo que acompanha o Action no nome do metodo nesse caso "index"
        return new ViewModel(['pessoas' => $this->table->getAll()]);
    }

    public function adicionarAction(){
        $form = new PessoaForm();
        $form->get('submit')->setValue('Adicionar');
        $request = $this->getRequest();

        if (!$request->isPost()){
            return new ViewModel(['form'=>$form]);
        }

        $pessoa = new \Pessoa\Model\Pessoa();
        $form->setData($request->getPost());

        if (!$form->isValid()){
            return new ViewModel(['form'=>$form]);
        }

        $pessoa->exchangeArray($form->getData());
        $this->table->salvarPessoa($pessoa);

        return $this->redirect()->toRoute('pessoa');
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