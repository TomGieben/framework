<?php
namespace App;

use Database;
use PDO;

abstract class Model {
    public string $select = "SELECT * FROM ";
    public string $where = '';
    public string $limit = '';

    public function all() {
        $tablename = $this->table()['tablename'];
        $query = Database::query()->prepare("select * from ". $tablename .";");
        $query->execute();
        
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function one() {
        $tablename = $this->table()['tablename'];
        $query = Database::query()->prepare("select * from ". $tablename ." limit 1;");
        $query->execute();
        
        return $query->fetch(PDO::FETCH_ASSOC);
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
    }

    public function where(string $column, string $operator, string $value) {
        $this->where = "WHERE " . $column . ' '. $operator. ' ' . $value;
    }

    public function limit(int $limit) {
        $this->limit = "LIMIT " . $limit;
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