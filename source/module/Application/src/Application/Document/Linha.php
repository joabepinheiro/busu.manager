<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;

/**
 * @ODM\Document
 * @ODM\Document(repositoryClass="Application\Document\EtiquetaRepository")
 */
class Linha
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $nome;


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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }



    public function __toString()
    {

        return $this->getNome();

    }

}