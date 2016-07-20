<?php

namespace Application\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;


class EtiquetaRepository extends DocumentRepository
{

    function getEtiquetasNaoUsadas(){
        return $this->findBy(array('usado' => false));
    }

}
