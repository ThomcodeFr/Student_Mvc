<?php

class Student //
{
  public ?int $id;
  public ?int $school_year_id;
  public ?int $project_id;
  public ?string $firstname;
  public ?string $lastname;
  public ?string $email;
  public ?string $created_at;
  public ?string $updated_at;
  public ?array $tags;
  private $pdo; //recupère la requête SQL

  public function __construct()
  {
    $this->pdo = getpdo(); //permet un objet de se connecter à la base de données
    $this->id = null;
    $this->school_year_id = null;
    $this->firstname = null;
    $this->lastname = null;
    $this->email = null;
    $this->created_at = null;
    $this->updated_at = null;
  }

  public function all()
  {
    $sql = "select id, school_year_id, project_id, firstname, lastname, email, created_at, updated_at from student";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
  }

  public function select($id)
  {
    $sql = 'select id, school_year_id, project_id, firstname, lastname, email, created_at, updated_at from student where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch();
    $this->id = $data['id'];
    $this->school_year_id = $data['school_year_id'];
    $this->project_id = $data['project_id'];
    $this->firstname = $data['firstname'];
    $this->lastname = $data['lastname'];
    $this->email = $data['email'];
    $this->created_at = $data['created_at'];
    $this->updated_at = $data['updated_at'];
  }

  public function insert()
  {
    $this->created_at=date('Y-m-d H:i:s');
    $this->updated_at=$this->created_at;

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
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
    $this->select($this->id); //securité, évite les bugs
  }

  public function delete(int $id)
  {
    $sql = 'delete from student where id = :id';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function tags()
  {
    $sql="SELECT tag. * FROM student_tag JOIN student ON student_tag.student_id = student.id JOIN tag ON student_tag.tag_id = tag.id WHERE student_tag.student_id=:id ORDER BY tag.id DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $this->id);
    $stmt->execute();
    $this->tags=$stmt->fetchAll();
  }
  public function allStudentAllTags(string $search='')
  {
    $sql = "SELECT student.*, tag.name FROM student_tag JOIN student ON student_tag.student_id = student.id JOIN tag ON student_tag.tag_id = tag.id WHERE tag.name LIKE '%$search%' OR student.firstname LIKE '%$search%' OR student.lastname LIKE '%$search%' ORDER BY tag.id DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt;

  }
}
