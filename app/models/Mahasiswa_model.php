<?php

class Mahasiswa_model {
    private $dbh; // database handler
    private $stmt; // statement

    public function __construct() {
        // Data Source Name
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

        try {
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa() {
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}