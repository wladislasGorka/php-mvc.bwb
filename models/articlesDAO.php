<?php
class ArticlesDAO extends DAO {

    public function __construct() {
        parent::__construct();
        $this->tableName = "articles";
    }

    public function getAllBy($array): array{}

    public function update($id): bool{}
}