<?php

class Project //
{
    public int $id;
    public string $name;
    public string $description;
    public string $client_name;
    public string $start_name;
    public string $checkpoint_date;
    public string $delivery_date;
    private $pdo;

    public function __construct()
    {
        $this->pdo = getpdo();
    }

    public function all()
    {
        $sql = "select id, name, description, client_name, start_date, checkpoint_date, delivery_date from project";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function select($id)
    {
        $sql = 'id, name, description, client_name, start_name, checkpoint_date, delivery_date from tag where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->school_year_id = $data['name'];
        $this->project_id = $data['description'];
        $this->firstname = $data['client_name'];
        $this->lastname = $data['start_name'];
        $this->lastname = $data['checkpoint_date'];
        $this->email = $data['delivery_date'];
    }

   /*  public function insert()
    {
        $sql = 'insert into student (school_year_id, project_id, firstname, lastname, email, created_at, updated_at)';
        $sql = $sql . ' values (:school_year_id, :project_id, :firstname, :lastname, :email, :created_at, :updated_at)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':school_year_id', $this->school_year_id);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId(); //autoincrément, récupère l'ID inseré
        $this->select($this->id); //securité, évite les bugs
    }

    public function update()
    {
        $sql = 'update student set school_year_id=:school_year_id, project_id=:project_id, firstname=:firstname, lastname=:lastname, email=:email, created_at=:created_at, updated_at=:updated_at';
        $sql = $sql . ' where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':school_year_id', $this->school_year_id);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->execute();
        $this->select($this->id); //securité, évite les bugs
    }*/

    public function delete(int $id)
    {
        $sql = 'delete from project where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}