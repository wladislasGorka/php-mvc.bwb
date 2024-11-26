<?php
class ArticlesDAO extends DAO {

    public function getAll(): array{
        $query = "SELECT * FROM articles";
        $sql = $this->pdo->prepare($query);
        $sql->execute();   
        while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setId($row["id"]);
            $article->setTitre($row["titre"]);
            $article->setContenu($row["contenu"]);
            $article->setAuteur($row["auteur"]);
            $article->setDate($row["date"]);

            $articles[]= $article;
        };
        return $articles;
    }

    public function getAllBy($array): array{}

    public function create($array): User{}

    public function retrieve($id): User{}

    public function update($id): bool{}

    public function delete($id): bool{}
}