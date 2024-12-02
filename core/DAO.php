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
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connecté à ".$config['dbname']." sur ".$config['host']." avec succès.";
            $this->pdo = $conn;
        }catch (PDOExeception $e){
            die("Impossible de se connecter à la base de données ".$config['dbname']." :" . e->getMessage());
        }
    } 
    
    public function getAll(): array{
        $query = "SELECT * FROM $this->tableName";
        $sql = $this->pdo->prepare($query);
        $sql->execute();   
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $rows[]= $row;
        };
        return $rows;
    }

    // public function getAllBy($datas): array{
    //     foreach ($datas as $field => $v)
    //         $where[] = $field."".$v;

    //     $query = "SELECT * FROM $this->tableName WHERE ($ins)";
    //     $sql = $this->pdo->prepare($query);
    //     $sql->execute();   
    //     while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    //         $rows[]= $row;
    //     };
    //     return $rows;
    // }

    public function create($datas){
        foreach ($datas as $field => $v)
            $ins[] = ':' . $field;

        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($datas));
        $query = "INSERT INTO $this->tableName ($fields) VALUES ($ins)";

        $sql = $this->pdo->prepare($query);
        foreach ($datas as $f => $v)
        {
            $sql->bindValue(':' . $f, $v);
        }
        if ($sql->execute()) {
            return true;
        }
        return false;
    }

    public function retrieve($id){
        $query = "SELECT * FROM $this->tableName WHERE id=:id";
        $sql = $this->pdo->prepare($query);        
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();  
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public function delete($id): bool{
        $query = "DELETE FROM $this->tableName WHERE id=:id";
        $sql = $this->pdo->prepare($query);
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        }          
        return false;
    }
}