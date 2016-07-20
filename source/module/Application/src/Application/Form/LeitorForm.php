<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class LeitorForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\LeitorFilter())->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $usado = new Element\Hidden('usado');
        $usado->setValue(0);
        $this->add($usado);

        $marca = new Element\Text('marca');
        $marca->setLabel('Marca')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $marca->setAttributes(array(
            'placeholder' => 'Marca'
        ));
        $this->add($marca);

        $modelo = new Element\Text('modelo');
        $modelo->setLabel('Modelo')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $modelo->setAttributes(array(
            'placeholder' => 'Modelo'
        ));
        $this->add($modelo);

        $serie = new Element\Text('serie');
        $serie->setLabel('Número de série')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $serie->setAttributes(array(
            'placeholder' => 'Número de série'
        ));
        $this->add($serie);

        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}