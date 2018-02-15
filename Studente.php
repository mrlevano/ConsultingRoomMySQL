<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Studente
 *
 * @author jesus
 */
class Studente {
    
    private $matrice;
    
    private $nome;
    
    private $cognome;
    
    private $sesso;
    
    private $password;
    
    private $nomeImmagine;
    
    public function __construct() {
        if(func_num_args() > 2) { // Se i parametri in input sono più di 2 allora si sta facendo una registrazione, altrimenti un login
            $this->matrice = func_get_arg(0);
            $this->nome = func_get_arg(1);
            $this->cognome = func_get_arg(2);
            $this->sesso = func_get_arg(3);
            $this->password = func_get_arg(4);
            $this->nomeImmagine = func_get_arg(5);
        } else {
            $this->matrice = func_get_arg(0);
            $this->password = func_get_arg(1);
        }
    }
    
    public function login($serverName, $dbName, $username, $passwordServer) {
        $risultatiQuery = [];
        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $passwordServer);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM studente WHERE matr = '$this->matrice' AND pwd = '$this->password'";
            $output = $conn->query($sql);
            $risultatiQuery = $output->fetchAll(PDO::FETCH_ASSOC);

            if(count($risultatiQuery) > 0){ // Se il risultato è maggiore di 0 allora c'è una corrispondenza, quindi si procede ad inizializzare gli attributi mancanti
                $this->nome = $risultatiQuery[0]["nome"];
                $this->cognome = $risultatiQuery[0]["cognome"];
                $this->sesso = $risultatiQuery[0]["sesso"];
                $this->nomeImmagine = $risultatiQuery[0]["fotoProfilo"];
                $jsonQuery = json_encode($risultatiQuery);
                echo($jsonQuery);
            } else {
                echo("ERRORE");
            }
        } catch (PDOException $ex) {
            echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
        }
        $conn = null;
    }
    
    public function registrazione($serverName, $dbName, $username, $passwordServer) {
        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $passwordServer);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM studente WHERE matr = '$this->matrice'";
            $output = $conn->query($sql);

            if($output->rowCount() == 0){ // Conto il numero di righe ottenute, se è uguale a 0 allora la matricola non esiste
                $sql = "INSERT INTO Studente (matr, nome, cognome, sesso, pwd, fotoProfilo)";
                $sql .= "VALUES ($this->matrice, '$this->nome', '$this->cognome', '$this->sesso', '$this->password', '$this->nomeImmagine')";
                $conn->exec($sql);
                echo("OK");
            } else {
                echo("Utente già registrato.");
            }
        } catch (PDOException $ex) {
            echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
        }
        $conn = null;
    }
}
