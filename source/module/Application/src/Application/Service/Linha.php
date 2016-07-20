<?php

namespace Application\Service;

use Doctrine\ODM\MongoDB\DocumentManager;

class Linha extends AbstractService{

    public function __construct(DocumentManager $dm){
        parent::__construct($dm);
        $this->entity = 'Application\Document\Linha';
    }
}
