<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-mvc</title>
</head>
<body>
    <?php
        include 'autoloader.php';
    ?>
    <h1>Hello</h1>

    <?php
        $idTest = 30;

        $default= new PaysDAO();
        $results = $default->retrieve($idTest);
        echo "<pre>"; var_dump($results); echo "</pre>";

        try {
            $pays = new Pays($idTest);
            echo "<pre>"; var_dump($pays); echo "</pre>";
        } catch (InvalidArgumentException $e) {
            echo "Failed to create object: " . $e->getMessage();
        }
        
    ?>
</body>
</html>