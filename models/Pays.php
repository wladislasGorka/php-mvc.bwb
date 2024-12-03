<?php
class Pays extends EntityModel {
    private int $id;
    private string $nom;
    private string $code;

    public function __construct($id){
        $tableName="Pays";
        $dao = $tableName."DAO";
        $newdao = new $dao();
        parent::__construct($newdao);

        $datas = $this->load($id);
        var_dump($datas);
        if($datas!=[]){
            $this->id=$datas[0]["id"];
            $this->nom=$datas[0]["nom"];
            $this->code=$datas[0]["code"];
        }else{
            throw new InvalidArgumentException("Data cannot be empty");
        }     
    }

    public function getId():int {return $this->id;}
    public function getNom():string {return $this->nom;}
    public function getCode():string {return $this->code;}

    public function setId(int $id){$this->id=$id;}
    public function setNom(string $nom){$this->nom=$nom;}
    public function setCode(string $code){$this->code=$code;}

}