<?php  
interface RepositoryInterface{

    public function getAll(): array;

    public function getAllBy($array): array;

    
}