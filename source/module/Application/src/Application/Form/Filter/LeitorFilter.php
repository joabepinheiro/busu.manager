<?php
/**
 * Created by PhpStorm.
 * User: joabe-pinheiro
 * Date: 05/06/15
 * Time: 21:26
 */

namespace Application\Form\Filter;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class LeitorFilter implements InputFilterAwareInterface
{
    protected $inputFilter;

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
                'name' => 'modelo',
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
                                'isEmpty' => 'Informe o modelo do leitor'
                            ),
                        ),
                    ),
                ),
            ]));

            


            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}