<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;
use Zend\Mvc\Application;

/**
 * @ODM\Document
 * @ODM\Document(repositoryClass="Application\Document\ItinerarioRepository")
 */
class Itinerario
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\ReferenceOne(targetDocument="Application\Document\Ponto", nullable=true)
     */
    protected $ponto;

    /**
     * @ODM\ReferenceOne(targetDocument="Application\Document\Linha", nullable=true)
     */
    protected $linha;


    /**
     * @ODM\String
     */
    protected $sentido;

    /**
     * @ODM\Int
     */
    protected $ordem;


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
     * @return \Application\Document\Ponto
     */
    public function getPonto()
    {
        return $this->ponto;
    }

    /**
     * @param mixed $ponto
     */
    public function setPonto($ponto)
    {
        $this->ponto = $ponto;
    }

    /**
     * @return \Application\Document\Linha
     */
    public function getLinha()
    {
        return $this->linha;
    }

    /**
     * @param mixed $linha
     */
    public function setLinha($linha)
    {
        $this->linha = $linha;
    }

    /**
     * @return mixed
     */
    public function getSentido()
    {
        return $this->sentido;
    }

    /**
     * @param mixed $sentido
     */
    public function setSentido($sentido)
    {
        $this->sentido = $sentido;
    }

    /**
     * @return mixed
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param mixed $ordem
     */
    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }



    public function __toString()
    {

        return $this->getId();

    }

}