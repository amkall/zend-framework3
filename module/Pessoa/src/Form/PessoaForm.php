<?php
namespace Pessoa\Form;

use Zend\Form\Form;


class PessoaForm extends Form{

    public function __construct(){

        parent::__contruct('pessoa', []);

        $this->add(new \Zend\Form\Element\Hiden('id'));
        $this->add(new \Zend\Form\Element\Text("nome", ['label' => "Nome"]));
        $this->add(new \Zend\Form\Element\Text("sobrenome", ['label' => "Sobrenome"]));
        $this->add(new \Zend\Form\Element\Email("Email", ['label' => "Email"]));
        $this->add(new \Zend\Form\Element\Text("situacao", ['label' => "situacao"]));

        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setAttributes(['value'=>'Salvar','id'=>'submitbutton']);
        $this->add($submit);

    }

}