<?php

namespace Application\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;


class LeitorRepository extends DocumentRepository
{

    function getLeitoresNaoUsados(){
        return $this->findBy(array('usado' => false));
    }

    function getLeitoresUsados(){
        return $this->findBy(array('usado' => true));
    }

    function getLeitoresNaoUsadosEDoRegistroEditado($id){

        $array =  $this->findBy(array('usado' => false));


        return array_push($array,  $this->findOneBy(array(
            'id' => $id
        )));
    }
}
