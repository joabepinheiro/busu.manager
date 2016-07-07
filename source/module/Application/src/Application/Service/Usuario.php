<?php

namespace Application\Service;

use Doctrine\ODM\MongoDB\DocumentManager;

class Usuario extends AbstractService{

    public function __construct(DocumentManager $dm){
        parent::__construct($dm);
        $this->entity = 'Application\Document\Usuario';
    }
}
