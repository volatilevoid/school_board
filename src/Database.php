<?php

namespace App;

use PDO;

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO('sqlite:students.sqlite3');
    }

    public function createTable()
    {
        $this->connection->setAttribute(
            PDO::ATTR_ERRMODE, 
            PDO::ERRMODE_EXCEPTION
        );

        $c = $this->connection->prepare("CREATE TABLE IF NOT EXISTS students (id integer primary key, name text, grades text, board text)");

        if ($c->execute()) {
            echo 'Table Created';
        } else {
            echo 'not created';
        }
        // Fill table
        $this->connection->exec("INSERT INTO `students` (`id`, `name`, `grades`, `board`) VALUES (1, 'Slavko', '7,5,7,9', 'csm'), (2, 'Mirko', '7,6,6,10', 'csm'), (3, 'Milutin', '7,6,7,6', 'csmb')");
    }

    public function getStudent(int $id)
    {
        $query = $this->connection->prepare("SELECT * FROM students WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}