<?php

namespace Application\Service;
/**
 * Description of Posicao
 *
 * @author joabepinheiro
 */
class Mongo {

    private $collection;
    
    public function __construct($collection) {
        $mongo                  = new \Mongo('mongodb://localhost:27017');
        $this->collection       = $mongo->selectDB('busu')->selectCollection($collection);
    }

    public function  insert($document, array $options = 'array()') {
        return $this->getCollection()->insert($document, $options);
    }
    
    public function update(array $criteria, array $new_object, array $options = 'array()') {
         return $this->getCollection()->update($criteria, $new_object, $options );
    }

    public function find(array $query = 'array()', array $fields = 'array()'){
        $this->getCollection()->find($query, $fields);
    }

    private function getCollection() {
        return $this->collection;
    }

}
