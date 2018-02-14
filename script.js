/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var isLoggato = false; // Booleana che indica se l'utente è loggato o no
var datiUtente = [];

$(document).ready(function(){
    isLoggato = sessionStorage.getItem("isLoggato");
    if(isLoggato === "true") {
        $("#bottoniUtente").html("<li onclick='logout()'><a href='login.php'><span class='glyphicon glyphicon-log-out'></span> Log Out</a></li>");
        datiUtente = $.parseJSON(sessionStorage.getItem("datiUtente"));
        $("#myName").html(datiUtente[0].nome);
    } else {
        $("#bottoniUtente").html("<li><a href='registrazione.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li> <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>");
    }
    
    $(".inputText").keydown(function(e) { // Permetto l'utilizzo del tasto invio in alternanza al bottone
        var key = e.which;
        if(key === 13) {
            login();
        }
    });
});

function registrati() {
    var tipo = $("#azione").val(); ; // 0 = login ; 1 = registrazione
    var matricola = $("#matricola").val();
    var nome = $("#nome").val();
    var cognome = $("#cognome").val();
    var sesso = $(":radio:checked").val();
    var password = $("#password").val();
    var ok = controlloCampi();
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
            if(data !== "ERRORE") {
                window.location = "index.php";
            } else {
                $("#ajaxResponse").html("Login fallito");
            }
            
        });
    }
}

function login() {
    var tipo = $("#azione").val(); ; // 0 = login ; 1 = registrazione
    var matricola = $("#matricola").val();
    var password = $("#password").val();
    
    var ok = controlloCampi();
    
    if(ok) {
        $.post("risposta.php",
        {
            matr: matricola,
            passwd: password,
            tipo: tipo
        }
        ,function(data) {
            if(data !== "ERRORE") {
                //$("body").html(data);
                //alert(data);
                isLoggato = true;
                sessionStorage.setItem("datiUtente", data);
                sessionStorage.setItem("isLoggato", isLoggato);
                window.location = "myHome.php";
            } else {
                $("#ajaxResponse").html("Login fallito");
            }
            
            
        });
    }
}

function controlloCampi() {
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

function logout() {
    sessionStorage.removeItem("datiUtente");
    isLoggato = false;
    sessionStorage.setItem("isLoggato", isLoggato);
}
