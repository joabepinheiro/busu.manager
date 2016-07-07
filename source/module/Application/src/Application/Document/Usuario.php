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
class Usuario
{
    /**
     * @ODM\Id
     */
    protected $id;

    /**
     * @ODM\String
     */
    protected $nome;

    /**
     * @ODM\String
     */
    protected $sobrenome;


    /**
     * @ODM\String
     */
    protected $email;

    /**
     * @ODM\String
     */
    protected $senha;

    
    /** @ODM\Date */
    protected $cadastradoEm;

    /**
     * @ODM\String
     */
    protected $tipo;


    /** @ODM\Boolean*/
    protected $ativo;


    private $hash = 'jm8NY81CiHA=edhdvFRy14g54sGFG';


    public function __construct(array $options = array()){
        $this->ativo = 1;
        (new ClassMethods())->hydrate($options, $this);
    }

    public function toArray(){
        return (new ClassMethods())->extract($this);
    }



    public function __toString()
    {
        if(!is_null($this->getEmail() )){
            return $this->getEmail();
        }
        return $this->getId();

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

    /**
     * @return mixed
     */
    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    /**
     * @param mixed $sobrenome
     */
    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     * @return $this
     */
    public function setSenha($senha)
    {
        $this->senha =$this->encryptPassword($senha);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCadastradoEm()
    {
        return $this->cadastradoEm;
    }

    /**
     * @param mixed $cadastradoEm
     */
    public function setCadastradoEm($cadastradoEm)
    {
        $this->cadastradoEm = $cadastradoEm;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    
    /**
     * @return mixed
     */
    public function isAtivo()
    {
        return $this->ativo;
    }



    public function encryptPassword($password){
        return base64_encode(Pbkdf2::calc('sha256', $password, $this->hash, 10000, strlen($password*2)));
    }
}