<?php

class Project //
{
  public ?int $id;
  public ?string $name;
  public ?string $description;
  public ?string $client_name;
  public ?string $start_date;
  public ?string $checkpoint_date;
  public ?string $delivery_date;
  private $pdo;

  public function __construct()
  {
    $this->pdo = getpdo();
    $this->id = null;
    $this->name = null;
    $this->description = null;
    $this->client_name = null;
    $this->start_name = null;
    $this->checkpoint_date = null;
    $this->delivery_date = null;

  }

  public function all()
  {
    $sql = 'select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project';
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  public function select($id)
  {
    $sql = 'select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $this->id = $data['id'];
    $this->name = $data['name'];
    $this->description = $data['description'];
    $this->client_name = $data['client_name'];
    $this->start_date = $data['start_date'];
    $this->checkpoint_date = $data['checkpoint_date'];
    $this->delivery_date = $data['delivery_date'];
  }

  public function insert()
  {
    $sql = 'insert into project (name, description, client_name, start_date, delivery_date)';
    $sql = $sql .  'values (:name, :description, :client_name, :start_date, :delivery_date)';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':client_name', $this->client_name);
    $stmt->bindParam(':start_date', $this->start_date);
    $stmt->bindParam(':delivery_date', $this->delivery_date);
    $stmt->execute();
    $this->id = $this->pdo->lastInsertId(); //autoincrément, récupère l'ID inseré
    $this->select($this->id); //securité, évite les bugs
  }

  public function update()
  {
    $sql = 'update project set name=:name, description=:description, client_name=:client_name, start_date=:start_date, checkpoint_date=:checkpoint_date, delivery_date=:delivery_date';
    $sql = $sql . ' where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':client_name', $this->client_name);
    $stmt->bindParam(':start_date', $this->start_date);
    $stmt->bindParam(':checkpoint_date', $this->checkpoint_date);
    $stmt->bindParam(':delivery_date', $this->delivery_date);
    $stmt->execute();
    $this->select($this->id); //securité, évite les bugs
  }

  public function delete(int $id)
  {
    $sql = 'delete from project where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}
