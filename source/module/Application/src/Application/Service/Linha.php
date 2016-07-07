<?php

namespace Application\Service;

use Base\Service\Mongo;

class Linha extends AbstractService{

    public function __construct($collection = 'linha') {
        parent::__construct($collection);
    }
}
