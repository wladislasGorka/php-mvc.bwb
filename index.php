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
        $articleDAO = new ArticlesDAO();
        $articles = $articleDAO->getAll();

        foreach($articles as $article){
            echo "<pre>";
            echo '<br>'. $article->getId() .' : '. $article->getTitre();
            echo '<br>'. $article->getDate() .' : '. $article->getAuteur();
            echo '<br>'. $article->getContenu();
            echo "</pre>";
        }
    ?>
</body>
</html>