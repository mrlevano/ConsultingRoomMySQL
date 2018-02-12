<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author jesus
 */
class Database {
    
    private $servername;
    
    private $username;
    
    private $password;
    
    private $dbName;
    
    public function __construct($servername, $username, $passwd, $dbName) {
        /*$this->servername = $servername;
        $this->username = $username;
        $this->password = $passwd;
        $this->dbName = $dbName;*/
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "consultingroom";
        
        $sql = "CREATE DATABASE $dbName";

        try {
            $conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // usa ->exec() per eseguire un comando e non ritorna niente
            $conn->exec($sql);
            echo("GOOD NICE");
        } catch (PDOException $ex) {
            echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
        }
        $conn = null;
    }
    
    public function addTable() {
        try {
            $connessione = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
            $connessione->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connessione->exec("CREATE TABLE IF NOT EXISTS Studente(
                matr int(10) NOT NULL,
                nome varchar(30) NOT NULL,
                cognome varchar(40) NOT NULL,
                cognome varchar(20) NOT NULL,
                pwd varchar(30) NOT NULL,
                fotoProfilo varchar(50) NOT NULL,
                PRIMARY KEY (matr)
            )");
            $connessione = null;
        } catch (PDOException $ex) {
            echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
        }
    }
    
    public function findAll() {
        $array = [];
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM studente";
            $output = $conn->query($sql);
            $array = $output->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
        }
        return $array;
    }
}
