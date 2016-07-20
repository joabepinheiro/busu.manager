<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;

/**
 * @ODM\Document
 */
class Onibus
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $numero;

    /**
     * @ODM\ReferenceOne(targetDocument="Application\Document\Etiqueta", nullable=true)
     */
    protected $etiqueta;

    public function __construct(array $options = array()){
        (new ClassMethods())->hydrate($options, $this);
    }

    public function toArray(){
        return (new ClassMethods())->extract($this);
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    

    /**
     * @return mixed
     */
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    /**
     * @param mixed $etiqueta
     */
    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }



    public function __toString()
    {
        if(!is_null($this->getPlaca())){
            return $this->getPlaca();
        }
        return $this->getId();

    }

}