<?php
namespace App;

use Database;
use PDO;

abstract class Model {
    public string $select = 'SELECT * FROM ';
    public string $where = '';
    public string $limit = '';

    public function all() {
        $tablename = $this->table()['tablename'];
        $query = Database::query()->prepare("select * from ". $tablename .";");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $items) {
        $fields = '';
        $values = '';
        $tablename = $this->table()['tablename'];

        foreach($items as $field => $value) {
            $fields .= $field;
            $values .= "'" . $value . "'";

            if(array_key_last($items) !== $field) {
                $fields .= ', ';
                $values .= ', ';
            }
        }

        $query = "INSERT INTO " . $tablename . " (" . $fields . ") VALUES (" . $values . ");";
        $prepare = Database::query()->prepare($query);
        $prepare->execute();

        return $this;
    }

    public function select(array $fields) {
        $this->select = "SELECT ";

        foreach($fields as $field) {
            $this->select .= $field;
            if(end($fields) !== $field) {
                $this->select .= ', ';
            }
        }

        $this->select .= " FROM";

        return $this;
    }

    public function where(string $column, string $operator, string $value) {
        $this->where = "WHERE " . $column . ' '. $operator. ' ' . $value;

        return $this;
    }

    public function limit(int $limit) {
        $this->limit = "LIMIT " . $limit;

        return $this;
    }

    public function get() {
        $tablename = $this->table()['tablename'];
        $query = $this->select ." ". $tablename ." ". $this->where ." ". $this->limit .";";
        $prepare = Database::query()->prepare($query);
        $prepare->execute();
        
        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

    public function first() {
        $tablename = $this->table()['tablename'];
        $query = $this->select ." ". $tablename ." ". $this->where ." ". $this->limit .";";
        $prepare = Database::query()->prepare($query);
        $prepare->execute();
        
        return $prepare->fetch(PDO::FETCH_ASSOC);
    }

    public function toSql() {
        $tablename = $this->table()['tablename'];
        $query = $this->select ." ". $tablename ." ". $this->where ." ". $this->limit .";";

        return $query;
    }

    private function prepare() {
        $tablename = $this->table()['tablename'];
        $query = $this->select ." ". $tablename ." ". $this->where ." ". $this->limit .";";
        $prepare = Database::query()->prepare($query);
        return $prepare->execute();
    }

    abstract function table();
}