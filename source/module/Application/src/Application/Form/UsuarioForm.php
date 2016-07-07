<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class UsuarioForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\UsuarioFilter())->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $nome = new Element\Text('nome');
        $nome->setLabel('Nome')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $nome->setAttributes(array(
            'placeholder' => 'Nome'
        ));
        $this->add($nome);


        $sobrenome = new Element\Text('sobrenome');
        $sobrenome->setLabel('Sobrenome')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $sobrenome->setAttributes(array(
            'placeholder' => 'Sobrenome'
        ));
        $this->add($sobrenome);

        $email = new Element\Text('email');
        $email->setLabel('Email')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $email->setAttributes(array(
            'placeholder' => 'Email'
        ));
        $this->add($email);

        $senha= new Element\Password('senha');
        $senha->setLabel('Senha')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $senha->setAttributes(array(
            'placeholder' => 'Senha'
        ));
        $this->add($senha);


        $tipo = new Element\Select('tipo');
        $tipo->setValueOptions(array(
            'administrador' => 'Administrador'
        ));
        $tipo->setAttributes(array(
            'class' => 'form-control'
        ));
        $this->add($tipo);

        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}