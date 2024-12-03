<?php
abstract class EntityModel implements Persistable{
    private CRUDInterface $dao;

    public function __construct( CRUDInterface $dao){
        $this->dao = $dao;
    }

    public function getDAO(){
        return $this->dao;
    }

    public function load($id){
        return $this->dao->retrieve($id);
    }
    public function update($id){}
    public function remove($id){}
}