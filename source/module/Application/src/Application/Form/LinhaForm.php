<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class LinhaForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\LinhaFilter())->getInputFilter());


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



        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}