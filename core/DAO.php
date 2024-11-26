<?php  
abstract class DAO implements CRUDInterface, RepositoryInterface{
    protected $pdo;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'journal';
        $username = 'root';
        $password = '';

        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->exec("SET NAMES utf8");
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connecté à $dbname sur $host avec succès.";
            $this->pdo = $conn;
        }catch (PDOExeception $e){
            die("Impossible de se connecter à la base de données $dbname :" . e->getMessage());
        }
    } 
    
    public function getAll(): array{
        $query = "SELECT * FROM articles";
        $sql = $this->pdo->prepare($query);
        $sql->execute();   
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $rows[]= $row;
        };
        return $rows;
    }
}