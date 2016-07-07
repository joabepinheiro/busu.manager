<?php
namespace Base\Service;


use Doctrine\ODM\MongoDB\DocumentManager;
use Zend\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator;

abstract class AbstractService {

    protected $documentManager;
    protected $entity;

    public function __construct(DocumentManager $documentManager){
        $this->documentManager = $documentManager;
    }

    public function insert($data){

        unset($data['id']);
        
        $entity = null;

        if(is_array($data)){
            $entity = new $this->entity($data);
        }elseif(is_object($data)){
            $entity = $data;
        }

        $this->documentManager->persist($entity);
        $this->documentManager->flush();
        return $entity;
    }

    public function update($data){

        $entity = $this->documentManager->getRepository($this->entity)->find($data['id']);

        (new ClassMethods())->hydrate($data, $entity);

        $this->documentManager->persist($entity);
        $this->documentManager->flush();
        return $entity;
    }

    public function delete($id){


        $entity = $this->documentManager->getRepository($this->entity)->find($id);

        if($entity){
            $this->documentManager->remove($entity);
            $this->documentManager->flush();
            $this->documentManager->flush();
            return $id;
        }
        return null;
    }

}