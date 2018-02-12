/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var tipo; // 0 = login ; 1 = registrazione

$(document).ready(function(){
    tipo = $("#azione").val();
});

function registrati() {
    var matricola = $("#matricola").val();
    var nome = $("#nome").val();
    var cognome = $("#cognome").val();
    var sesso = $(":radio:checked").val();
    var password = $("#password").val();
    var ok = controllo();
    var nomeImmagine = caricaImmagine();
    if(ok) {
        $.post("risposta.php",
        {
            matr: matricola,
            nome: nome,
            cognome: cognome,
            sesso: sesso,
            passwd: password,
            nomeImmagine: nomeImmagine,
            tipo: tipo
        }
        ,function(data) {
            $("#ajaxResponse").html(data);
            //window.location = "index.php";
        });
    }
}

function login() {
    var matricola = $("#matricola").val();
    var password = $("#password").val();
    
    var ok = controllo();
    
    if(ok) {
        $.post("risposta.php",
        {
            matr: matricola,
            passwd: password,
            tipo: tipo
        }
        ,function(data) {
            /*if(data !== "ERRORE") {
                $("body").html(data);
            } else {
                $("#ajaxResponse").html(data);
            }*/
            alert(data);
            
        });
    }
}

function controllo() {
    var ok = false;
    var campi = $("[class*='inputText']"); // Oggetti che sono degli input text
    var valori = [];
    $.each(campi, function(){ // Estraggo i valori da ciscun oggetto e li inserisco in un array
        valori.push($(this).val());
    });
    if($.inArray("", valori) === -1) {
        ok = true;
    } else {
        alert("Non lasciare campi vuoti");
    }
    return ok;
}

function caricaImmagine() {
    var formData = new FormData();
    var file = $("#selImmagine")[0].files[0]; // Ottengo il file
    var nomeImmagine = $("#selImmagine").val().replace("C:\\fakepath\\", ""); // Ottengo il nome del file
    var maxDim = 5000000;
    var extOk = ["image/jpg", "image/gif", "image/tiff", "image/tif", "image/png", "image/jpeg", "image/bmp"];
    if($.inArray(file.type, extOk) >= 0 && file.size <= maxDim) {
        formData.append('nomeImmagine', file);
        $.ajax({
            url: "uploadImage.php",
            data: formData,
            contentType: false,
            processData: false,
            type: "POST",
            success: function(data) {
                alert(data);
            }
        });
    } else {
        alert("Caricare solo immagini di dimensione massima 5 MB.");
    }
    return nomeImmagine;
}
