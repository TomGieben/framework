<?php
class Database { 
    public string $connection;
    public string $host;
    public string $database;
    public string $username;
    public string $password;
    public string $charset = 'utf8mb4';
    public array $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function connect()  {
        $dsn = 'mysql:host='. $this->host .';dbname='. $this->database .';charset='.$this->charset .';port='. $this->port .'';

        try {
            $_SESSION['pdo'] = new \PDO($dsn, $this->username, $this->password, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    static function query() {
        return $_SESSION['pdo'];
    }
}