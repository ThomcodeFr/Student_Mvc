<?php

include('env.php');

// voici les paramètres de connexion
$bdd_username = $bdd_username ?? 'sc_mariardb';
$bdd_password = $bdd_password ?? 'src_mariadb';
$bdd_host = $bdd_host ?? 'localhost';
$bdd_port = $bdd_port ?? 3306;
$bdd_dbname = $bdd_dbname ?? 'student';

//DSN : Data Source Name
$dsn = "mysql:host=$bdd_host;port=$bdd_port;dbname=$bdd_dbname;charset=utf8";

//Les erreurs doivent être gérées par des exeptions
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

//PDO = Php Data Objects (ce qui permet la connexion entre PHP et la base de données)
//synthaxe pour gérer les exeptions => Au lieu qu'il plante avec une "fatal error", on lui dit ce qu'il doit afficher
//$e est l'objet exception
try {
    $pdo = new PDO($dsn, $bdd_username, $bdd_password, $options);
} catch (PDOException $e) {
    echo "Erreur connexion à la base de données<br>";
    echo $e->getCode() . ' ';
    $e->getMessage() . '<br>';
    http_response_code(500);
}

//On cloisonne la base de données dans une fonction getPDO(), on recupère la fonction PDO
function getPdO()
{
    global $pdo; //global recupère une variable définie en dehors de la fonction
    return $pdo;
}

function resetDb()// Fonction permettant de réinitialiser completement la base de données. (Pour faire les tests)
{
    global $pdo;
    $sql = file_get_contents('model/Sql/student.sql');
    $pdo->exec($sql);
}
