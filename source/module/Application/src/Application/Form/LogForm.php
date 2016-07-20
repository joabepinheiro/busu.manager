<?php
namespace Application\Form;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Form\Element;

class LogForm extends AbstractForm{
    
    public function __construct($_name = 'Salvar',  DocumentManager $documentManager) {
        parent::__construct($_name);

        $this->setInputFilter((new Filter\LogFilter())->getInputFilter());


        $leitor = new ObjectSelect('leitor');
        $leitor->setOptions(array(
                'label' => 'Leitor',
                'object_manager'     => $documentManager,
                'target_class'       => 'Application\Document\Leitor',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'getLeitoresUsados',
                )
            )
        )
            ->setAttribute('class', 'form-control select2');
        $this->add($leitor);

        $etiqueta = new ObjectSelect('etiqueta');
        $etiqueta->setOptions(array(
                'label' => 'Etiqueta',
                'object_manager'     => $documentManager,
                'target_class'       => 'Application\Document\Etiqueta',
                'is_method' => true,
                'display_empty_item' => true,
                'find_method'        => array(
                    'name'   => 'findAll',
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