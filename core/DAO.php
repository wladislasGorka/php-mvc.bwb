<?php  
class DAO{
    protected $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }    
}