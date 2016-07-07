<?php

namespace DoctrineMongoODMModule\Hydrator;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class ApplicationDocumentUsuarioHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = $value instanceof \MongoId ? (string) $value : $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['nome'])) {
            $value = $data['nome'];
            $return = (string) $value;
            $this->class->reflFields['nome']->setValue($document, $return);
            $hydratedData['nome'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['sobrenome'])) {
            $value = $data['sobrenome'];
            $return = (string) $value;
            $this->class->reflFields['sobrenome']->setValue($document, $return);
            $hydratedData['sobrenome'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['email'])) {
            $value = $data['email'];
            $return = (string) $value;
            $this->class->reflFields['email']->setValue($document, $return);
            $hydratedData['email'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['senha'])) {
            $value = $data['senha'];
            $return = (string) $value;
            $this->class->reflFields['senha']->setValue($document, $return);
            $hydratedData['senha'] = $return;
        }

        /** @Field(type="date") */
        if (isset($data['cadastradoEm'])) {
            $value = $data['cadastradoEm'];
            if ($value === null) { $return = null; } else { $return = \Doctrine\ODM\MongoDB\Types\DateType::getDateTime($value); }
            $this->class->reflFields['cadastradoEm']->setValue($document, clone $return);
            $hydratedData['cadastradoEm'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['tipo'])) {
            $value = $data['tipo'];
            $return = (string) $value;
            $this->class->reflFields['tipo']->setValue($document, $return);
            $hydratedData['tipo'] = $return;
        }

        /** @Field(type="boolean") */
        if (isset($data['ativo'])) {
            $value = $data['ativo'];
            $return = (bool) $value;
            $this->class->reflFields['ativo']->setValue($document, $return);
            $hydratedData['ativo'] = $return;
        }
        return $hydratedData;
    }
}