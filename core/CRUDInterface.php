<?php  
interface CRUDInterface{
    public function create(array $data);    
    public function retrieve($id): array;
    public function update($id): bool;
    public function delete($id): bool;
}