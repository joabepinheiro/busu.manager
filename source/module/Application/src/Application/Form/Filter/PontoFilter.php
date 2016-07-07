<?php
/**
 * Created by PhpStorm.
 * User: joabe-pinheiro
 * Date: 05/06/15
 * Time: 21:26
 */

namespace Application\Form\Filter;

use Doctrine\ODM\MongoDB\DocumentManager;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class PontoFilter implements InputFilterAwareInterface
{
    protected $inputFilter;
    protected $documentManager;

    /**
     * PontoFilter constructor.
     * @param $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }


    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Não usado");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();



            $inputFilter->add($factory->createInput([
                'name' => 'textLat',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' =>'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Informe a latitude'
                            ),
                        ),
                    ),
                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'textLng',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' =>'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Informe a longitude'
                            ),
                        ),
                    ),
                ),
            ]));

            $inputFilter->add($factory->createInput([
                'name' => 'textLng',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(

                )
            ]));


            $inputFilter->add($factory->createInput([
                'name' => 'numero',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' =>'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                'isEmpty' => 'Informe o número do ponto'
                            ),
                        ),
                    ),
                    array(
                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'object_repository' => $this->documentManager->getRepository(
                                'Application\Document\Ponto'
                            ),
                            'fields' => 'numero'
                        )
                    )
                ),
            ]));



            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}