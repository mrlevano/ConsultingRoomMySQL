<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ok = move_uploaded_file($_FILES['nomeImmagine']['tmp_name'],"./files/".$_FILES['nomeImmagine']['name']);
if(!$ok) {
    echo("file non caricato");
} else {
    echo("Il file ".$_FILES['nomeImmagine']['name']." è stato caricato con successo");
}