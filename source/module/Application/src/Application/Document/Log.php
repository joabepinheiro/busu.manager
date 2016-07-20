<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;

/**
 * @ODM\Document
 */
class Log
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $leitor;

    /**
     * @ODM\String
     */
    protected $etiqueta;

    /**
     * @ODM\Date
     */
    protected $create_at;



    public function __construct(array $options = array()){
        $this->create_at  = new \DateTime('now');
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
    public function getLeitor()
    {
        return $this->leitor;
    }

    /**
     * @param mixed $leitor
     */
    public function setLeitor($leitor)
    {
        $this->leitor = $leitor;
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

    /**
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param mixed $create_at
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
    }

    

    public function __toString()
    {
        return $this->getId();

    }
}