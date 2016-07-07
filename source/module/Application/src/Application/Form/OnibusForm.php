<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class OnibusForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\OnibusFilter())->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $placa = new Element\Text('placa');
        $placa->setLabel('Placa')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $placa->setAttributes(array(
            'placeholder' => 'Placa'
        ));
        $this->add($placa);


        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}