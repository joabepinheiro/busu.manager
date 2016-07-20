<?php
namespace Application\Form;

use Doctrine\ODM\MongoDB\DocumentManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class OnibusForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar', DocumentManager $documentManager) {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\OnibusFilter())->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $numero = new Element\Text('numero');
        $numero->setLabel('Número')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $numero->setAttributes(array(
            'placeholder' => 'Número'
        ));
        $this->add($numero);


        $etiqueta = new Element\Text('etiqueta');
        $etiqueta->setLabel('Etiqueta')
            ->setAttributes(array(
                'class' => 'form-control'
            ));
        $etiqueta->setAttributes(array(
            'placeholder' => 'Etiqueta'
        ));
        $this->add($etiqueta);



        $etiqueta = new ObjectSelect('etiqueta');
        $etiqueta->setOptions(array(
                'label' => 'Leitor',
                'object_manager'     => $documentManager,
                'target_class'       => 'Application\Document\Etiqueta',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'getEtiquetasNaoUsadas',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $this->add($etiqueta);

        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}