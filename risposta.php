<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Studente.php';

$serverName = "localhost";
$username = "root";
$passwordServer = "";
$dbName = "consultingroom";

$tipoAzione = $_POST["tipo"];
$matr = $_POST["matr"];
$passwd = $_POST["passwd"];

if($tipoAzione == "0") {
    $studente = new Studente($matr, $passwd);
    $studente->login($serverName, $dbName, $username, $passwordServer);
} else {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $sesso = $_POST["sesso"];
    $nomeImmagine = $_POST["nomeImmagine"];
    
    $studente = new Studente($matr, $nome, $cognome, $sesso, $passwd, $nomeImmagine);
    $studente->registrazione($serverName, $dbName, $username, $passwordServer);
}