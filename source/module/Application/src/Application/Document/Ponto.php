<?php
namespace Application\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Zend\Hydrator\ClassMethods;
use Zend\Crypt\Key\Derivation\Pbkdf2;
use Zend\Math\Rand;
/**
 * @ODM\Document
 * @ODM\Document(repositoryClass="Application\Document\UsuarioRepository")
 */
class Ponto
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $lat;

    /**
     * @ODM\String
     */
    protected $lng;

    /**
     * @ODM\String
     */
    protected $numero;

    /**
     * @ODM\String
     */
    protected $endereco;

    /**
     * @ODM\ReferenceOne(targetDocument="Application\Document\Leitor", nullable=true)
     */
    protected $leitor;

    public function __construct(array $options = array()){
        (new ClassMethods())->hydrate($options, $this);
    }

    public function toArray(){
        return (new ClassMethods())->extract($this);
    }



    public function __toString()
    {
        return $this->getNumero() . ' - ' . $this->getEndereco();

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
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param mixed $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param mixed $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
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
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return \Application\Document\Leitor
     */
    public function getLeitor()
    {
        return $this->leitor;
    }

    /**
     * @param  \Application\Document\Leitor $leitor
     */
    public function setLeitor($leitor)
    {
        $this->leitor = $leitor;
    }


   


}