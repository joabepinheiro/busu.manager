<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;

/**
 * @ODM\Document
 * @ODM\Document(repositoryClass="Application\Document\EtiquetaRepository")
 */
class Etiqueta
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $modelo;

    /**
     * @ODM\String
     */
    protected $serie;

    /**
     * @ODM\Boolean
     */
    protected $usado;

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
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getUsado()
    {
        return $this->usado;
    }

    /**
     * @param mixed $usado
     */
    public function setUsado($usado)
    {
        $this->usado = $usado;
    }

    public function __toString()
    {
        if(!is_null($this->getModelo())){
            return $this->getSerie() . ' - '. $this->getModelo();
        }
        return $this->getId();

    }

}