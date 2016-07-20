<?php
namespace Application\Form;

use Doctrine\ODM\MongoDB\DocumentManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class ItinerarioForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar',  DocumentManager $documentManager) {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\ItinerarioFilter())->getInputFilter());


        $id = new Element\Hidden('id');
        $id->setValue(null);
        $this->add($id);

        $linha = new ObjectSelect('linha');
        $linha->setOptions(array(
                'label' => 'Linha',
                'object_manager'     => $documentManager,
                'target_class'       => 'Application\Document\Linha',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'findAll',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $this->add($linha);


        $ponto = new ObjectSelect('ponto');
        $ponto->setOptions(array(
                'label' => 'Ponto',
                'object_manager'     => $documentManager,
                'target_class'       => 'Application\Document\Ponto',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'findAll',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $this->add($ponto);

        $sentido = new Element\Select('sentido');
        $sentido->setLabel('Sentido');
        $sentido->setValueOptions(array(
             null   => '',
            'ida'   => 'Ida',
            'volta' => 'Volta'
        ));
        $sentido->setAttribute('class', 'form-control select2');
        $this->add($sentido);

        $ordem = new Element\Number('ordem');
        $ordem->setLabel('Ordem');
        $ordem->setAttribute('class', 'form-control');
        $this->add($ordem);



        $submit = new Element\Submit('submit');
        $submit->setLabel($_name);
        $this->add($submit);

    }




}