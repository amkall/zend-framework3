<?php

namespace Pessoa\Model;

public class Pessoa{
    $id;
    $nome;
    $sobrenome;
    $email;
    $situacao;

    public function exchangeArray(array $data){

        //operador ternario 

        $this->id        = !empty($data['id'])        ? $data['id']          : null;
        $this->nome      = !empty($data['nome'])      ? $data['nome']        : null;
        
        $this->sobrenome = !empty($data['sobrenome']) ? $data['sobrenome']   : null;
        $this->email     = !empty($data['email'])     ? $data['email']       : null;
        
        $this->situacao  = !empty($data['situacao'])  ? $data['situacao']    : null;
   
    }

    public function getId(){
        $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
}