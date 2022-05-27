<?php

class SchoolYear //Permet de gérer nos tags
{ //création d'une classe et déclaration de la base de données en attribut object.
  //cela permet d'accèder à notre base de données avec une syntaxe PHP obligatoire
  //La class tag fait l'intermédiaire entre le php et la base de données
  public ?int $id;
  private $pdo;

  //Quand on initialise un objet tag, il récupère la base de données
  public function __construct()
  {
    $this->pdo = getpdo(); //permet de savoir comment se connecter à la base de données
    $this->id = null; //Mise en valeur par défaut de l'id, à chaque new tag
  }

  public function all()
  {
    $sql = "select id from school_year"; // requete sql connue
    //synthaxe PDO pour préparer et choisir la requête SQL
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(); //execute la requete
    //Recupération de données, de toutes les données avec fetchAll
    $data = $stmt->fetchAll();
    return $data; // C'est le tableau associatif, y a le id, le nom et la description
  }
}