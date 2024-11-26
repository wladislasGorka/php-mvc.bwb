<?php  
interface CRUDInterface{

    public function create($array): User;

    public function retrieve($id): User;

    public function update($id): bool;

    public function delete($id): bool;

    
}