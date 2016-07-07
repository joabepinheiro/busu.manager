<?php

namespace Application\Service;

use Doctrine\ODM\MongoDB\DocumentManager;

class Etiqueta extends AbstractService{

    public function __construct(DocumentManager $dm){
        parent::__construct($dm);
        $this->entity = 'Application\Document\Etiqueta';
    }
}
