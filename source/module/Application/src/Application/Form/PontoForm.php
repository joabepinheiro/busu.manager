<?php
namespace Application\Form;

use Application\Document\LeitorRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class PontoForm extends AbstractForm{

    protected  $documentManager;
    protected $id;

    public function __construct($_name = 'Salvar', DocumentManager $documentManager) {
        $this->documentManager = $documentManager;

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
        $numero->setLabel('Número do ponto')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' => 'numero'
            ))
            ->setAttributes(array(
            'placeholder' => 'Número'
        ));
        $this->add($numero);


        $endereco = new Element\Text('endereco');
        $endereco->setLabel('Endereço')
            ->setAttributes(array(
                'class' => 'form-control',
                'id' => 'endereco'
            ));
        $endereco->setAttributes(array(
            'placeholder' => 'Endereço'
        ));
        $this->add($endereco);


        $leitor = new ObjectSelect('leitor');
        $leitor->setOptions(array(
                'label' => 'Leitor',
                'object_manager'     => $documentManager,
                'target_class'       => 'Application\Document\Leitor',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'getLeitoresNaoUsados',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $this->add($leitor);
        
        
        
        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }
}