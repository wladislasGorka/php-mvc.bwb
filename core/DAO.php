<?php  
abstract class DAO implements CRUDInterface, RepositoryInterface{
    protected $pdo;
    protected $tableName;

    public function __construct() {
        // $host = 'localhost';
        // $dbname = 'journal';
        // $username = 'root';
        // $password = '';
        try{
            // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $config = json_decode(file_get_contents('./config/database.json'), true);
            $conn = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['username'], $config['password']);
            $conn->exec("SET NAMES utf8");
            echo "Connecté à ".$config['dbname']." sur ".$config['host']." avec succès.";
            $this->pdo = $conn;
        }catch (PDOExeception $e){
            die("Impossible de se connecter à la base de données ".$config['dbname']." :" . e->getMessage());
        }
    } 
    
    public function getAll(): array{
        $query = "SELECT * FROM ".$this->tableName;
        $sql = $this->pdo->prepare($query);
        $sql->execute();   
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $rows[]= $row;
        };
        return $rows;
    }
}