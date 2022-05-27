<?php

class Tag //Permet de gérer nos tags
{ //création d'une classe et déclaration de la base de données en attribut object.
  //cela permet d'accèder à notre base de données avec une syntaxe PHP obligatoire
  //La class tag fait l'intermédiaire entre le php et la base de données
  public ?int $id;
  public ?string $name;
  public ?string $description;
  private $pdo;

  //Quand on initialise un objet tag, il récupère la base de données
  public function __construct()
  {
    $this->pdo = getpdo(); //permet de savoir comment se connecter à la base de données
    $this->id = null; //Mise en valeur par défaut de l'id, à chaque new tag
    $this->name = null; //Mise en valeur par défaut du name, à chaque new tag
    $this->description = null; //Mise en valeur par défaut du description, à chaque new tag
  }

  public function all()
  {
    $sql = "select id, name, description from tag"; // requete sql connue
    //synthaxe PDO pour préparer et choisir la requête SQL
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute(); //execute la requete
    //Recupération de données, de toutes les données avec fetchAll
    $data = $stmt->fetchAll();
    return $data; // C'est le tableau associatif, y a le id, le nom et la description
  }

  public function select($id)
  {
    $this->id = 0; //si le select ne trouve rien, on ne manipule pas l'ID d'un autre tag
    $sql = 'select id, name, description from tag where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $this->id = $data['id'];
    $this->name = $data['name'];
    $this->description = $data['description'];
  }

  public function insert()
  {
    $sql = 'insert into tag (name, description)';
    $sql = $sql . 'values (:name, :description)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->execute();
    $this->id = $this->pdo->lastInsertId(); //autoincrément, récupère l'ID inseré
    $this->select($this->id); //securité, évite les bugs
  }

  public function update()
  {
    $sql = 'update tag set name=:name, description=:description';
    $sql = $sql . ' where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
    $this->select($this->id); //securité, évite les bugs
  }

  public function delete(int $id) //permet de delete un tag précis avec son ID
  {
    $sql = 'delete from tag where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id); //gére les caractères spéciaux
    $stmt->execute();
  }
}
