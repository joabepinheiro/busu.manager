<?php
namespace Application\Form;

use Doctrine\ODM\MongoDB\DocumentManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class PontoForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar', DocumentManager $documentManager) {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\PontoFilter($documentManager))->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $lat = new Element\Hidden('lat');
        $lat->setValue(null);
        $lat->setAttribute('id', 'lat');
        $this->add($lat);

        $lng = new Element\Hidden('lng');
        $lng->setValue(null);
        $lng->setAttribute('id', 'lng');
        $this->add($lng);
        
        $textLat = new Element\Text('textLat');
        $textLat->setLabel('Latitude')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' =>'textLat',
                'placeholder' => 'Latitude'
            ));
        $this->add( $textLat);


        $textLng = new Element\Text('textLng');
        $textLng->setLabel('Longitude')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' => 'textLng',
                'placeholder' => 'Logitude'
            ));
        $this->add($textLng);

        $numero = new Element\Text('numero');
        $numero->setLabel('Número')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' => 'numero'
            ));
        $numero->setAttributes(array(
            'placeholder' => 'Número'
        ));
        $this->add($numero);

        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}