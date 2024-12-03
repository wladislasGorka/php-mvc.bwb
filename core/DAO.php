<?php  
abstract class DAO implements CRUDInterface, RepositoryInterface{
    //use PDO;
    
    static private PDO $pdo;
    //protected $tableName;

    public function __construct() {
        // $DS = DIRECTORY_SEPARATOR;
        // $directory= explode($DS, __FILE__); // $directory = ["C:","xampp","htdocs","php-mvc.bwb","core","DAO.php"]
        try{
        $content = file_get_contents($_SERVER['DOCUMENT_ROOT']."/config/database.json");
        $objectcontent = json_decode($content);

        $dsn="{$objectcontent->driver}:dbname={$objectcontent->dbname};host={$objectcontent->host};";
        self::$pdo = new PDO($dsn,$objectcontent->username,$objectcontent->password);
        echo "Connecté à {$objectcontent->dbname} sur {$objectcontent->host} avec succès.";    
        }catch (PDOExeception $e){
            die("Impossible de se connecter à la base de données {$objectcontent->dbname} :" . e->getMessage());
        }
    } 

    public static function getPDO(){
        return DAO::$pdo;
    }

    public function getAll(): array{}
    public function getAllBy($array): array{}
    public function create(array $data){}    
    public function retrieve($id): array{}
    public function update($id): bool{}
    public function delete($id): bool{}    
}