<?php
class defaultDAO extends DAO {

    public function getAll(): array{
        $pdo = $this->getPDO();
        $query = "SELECT * FROM pays";
        $sql = $pdo->prepare($query);
        $sql->execute();   
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $rows[]= $row;
        };
        return $rows;
    }

    public function getAllBy($array): array{
    }

    public function create(array $data){

    }

    public function retrieve($id): array{
        $pdo = $this->getPDO();
        $query = "SELECT * FROM pays WHERE id=$id";
        $sql = $pdo->prepare($query);
        $sql->execute();   
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $rows[]= $row;
        };
        return $rows;
    }

    public function update($id): bool{

    }

    public function delete($id): bool{

    }
}