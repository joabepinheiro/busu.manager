<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;

/**
 * @ODM\Document
 */
class Leitor
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $modeo;

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
    public function getModeo()
    {
        return $this->modeo;
    }

    /**
     * @param mixed $modeo
     */
    public function setModeo($modeo)
    {
        $this->modeo = $modeo;
    }


    public function __toString()
    {
        if(!is_null($this->getModeo())){
            return $this->getModeo();
        }
        return $this->getId();

    }
}