<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$tipoAzione = $_POST["tipo"];

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "consultingroom";

if($tipoAzione == "0") {
    $array = [];
    $matr = $_POST["matr"];
    $passwd = $_POST["passwd"];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM `studente` WHERE matr = '$matr' AND pwd = '$passwd'";
        $output = $conn->query($sql);
        $array = $output->fetchAll(PDO::FETCH_ASSOC);
        if(count($array) > 0){
            foreach($array as $valoreE) {
                foreach($valoreE as $chiave=>$valore) {
                    if($chiave != "fotoProfilo") {
                        echo ("<p>$chiave = $valore</p> <br/>");
                    } else {
                        echo("<img id='myImage' src='files/$valore' style='height: 100px;width: 100px;' />");
                    }
                    
                }
            }
        } else {
            echo("Credenziali errate");
        }
        
        
    } catch (PDOException $ex) {
        echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
    }
    $conn = null;
    
} else {
    $matr = $_POST["matr"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $sesso = $_POST["sesso"];
    $passwd = $_POST["passwd"];
    $nomeImmagine = $_POST["nomeImmagine"];
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Studente (matr, nome, cognome, sesso, pwd, fotoProfilo)";
        $sql .= "VALUES ($matr, '$nome', '$cognome', '$sesso', '$passwd', '$nomeImmagine')";
        $conn->exec($sql);
        echo ("VERY GOOD e nome immagine : $nomeImmagine");
    } catch (PDOException $ex) {
        echo ("NOT GOOD. <br />Errore : " . $ex->getMessage());
    }
    $conn = null;
}