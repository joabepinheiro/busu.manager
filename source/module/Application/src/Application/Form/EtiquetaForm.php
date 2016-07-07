<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class EtiquetaForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar') {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\EtiquetaFilter())->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $modelo = new Element\Text('modelo');
        $modelo->setLabel('Modelo')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $modelo->setAttributes(array(
            'placeholder' => 'Modelo'
        ));
        $this->add($modelo);


        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}