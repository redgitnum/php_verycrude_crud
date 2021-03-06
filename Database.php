<?php 

class DB {
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost:3306;dbname=practice', 'root','');;
    }

    public function getAll()
    {
        $statement = $this->pdo->prepare('SELECT * FROM `table1`');
        $statement->execute();
        return $statement->fetchAll();
    }

    public function getForUpdate($data)
    {
        $statement = $this->pdo->prepare('SELECT * FROM `table1` WHERE id = :id');
        $statement->bindParam(':id', $data['update_id']);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addData($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `table1` (name, surname, age) VALUES (:name, :surname, :age)");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->execute();
    }

    public function update($data)
    {
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // exit;
        $stmt = $this->pdo->prepare("UPDATE 
                                        `table1` 
                                    SET 
                                        name = :name,
                                        surname = :surname,
                                        age = :age
                                    WHERE 
                                        id = :id
                                    ");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':surname', $data['surname']);
        $stmt->bindParam(':age', $data['age']);
        $stmt->bindParam(':id', $data['id']);
        $stmt->execute();
    }

    public function delete($data)
    {
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // exit;
        $stmt = $this->pdo->prepare("DELETE FROM `table1` WHERE id = :id");
        $stmt->bindParam(':id', $data['delete_id']);
        $stmt->execute();
    }
}

?>