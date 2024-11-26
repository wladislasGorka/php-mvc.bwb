<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-mvc</title>
</head>
<body>
    <?php
        spl_autoload_register(function ($class) {
            if(file_exists('./core/' . $class . '.php')):
                include './core/' . $class . '.php';
            elseif(file_exists('./models/'. $class . '.php')):
                include './models/' . $class . '.php';
            elseif(file_exists('./controllers/'. $class . '.php')):
                include './controllers/' . $class . '.php';
            endif;
        });
    ?>
    <h1>Hello</h1>

    <?php
        $articlesDAO = new ArticlesDAO();
        $articles = $articlesDAO->getAll();

        foreach($articles as $article){
            echo "<pre>";
            foreach($article as $key => $value){
                echo ''. $key .' : '. $value .'<br>';
            }
            echo "</pre>";
        }

        // $idRetrieve = 11;
        // $articleById = $articlesDAO->retrieve($idRetrieve);
        // if($articleById){
        // echo "<pre>";
        // echo "Article : $idRetrieve \n";
        // foreach($articleById as $key => $value){
        //     echo ''. $key .' : '. $value ."\n";
        // }
        // echo "</pre>";
        // }else{
        //     echo "No item for id=$idRetrieve";
        // }

        // $idDelete = 17;
        // $articleById = $articlesDAO->delete($idDelete);
        // if($articleById){
        // echo "<pre>";
        // echo "Article of id: $idDelete deleted\n";
        // echo "</pre>";
        // }else{
        //     echo "<pre>";
        //     echo "No item for id=$idDelete";
        //     echo "</pre>";
        // }

        // $createDatas = [
        //     'titre'=>"Article 7",
        //     'auteur'=>"wgorka",
        //     'date'=>"2024-02-12",
        //     'contenu'=>"Article sur la creation article."
        // ];
        // $articleCreate = $articlesDAO->create($createDatas);
        // if($articleCreate){
        //     echo "Création d'un article";
        // }else{
        //     echo "Echec création d'article";
        // }
    ?>
</body>
</html>