<?php  
interface CRUDInterface{

    public function create(array $data);



    public function retrieve($id): array;

    public function update($id): bool;

    public function delete($id): bool;


    // public function create ($id){
    // $stmt = $this-> getPDO()->prepare ("create")
  
    // $stmt->bindParam $array["email"];


    // $stmt->execute();
    // $stmt ->setFetchMode(PDO::FETCH_ASSOC);


    // }

}