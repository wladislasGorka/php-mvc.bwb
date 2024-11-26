<?php
class ArticlesDAO extends DAO {

    public function __construct() {
        parent::__construct();
        $this->tableName = "animaux";
    }

    public function getAllBy($array): array{}

    public function create($array): User{}

    public function retrieve($id): User{}

    public function update($id): bool{}

    public function delete($id): bool{}
}