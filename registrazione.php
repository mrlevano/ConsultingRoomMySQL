<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrati ORA</title>
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" type="text/css" href="loginStyle.css" />
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="myHome.php">MyConsultingRoom</a>
                </div>
                <div id="myNavbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="myHome.php">Home</a></li>
                        <li><a href="#">Cerca Verifica</a></li>
                        <li><a href="uploadVerifica.php">Carica Verifica</a></li>
                        <li><a href="#">Info</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="registrazione.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Registrati</h1>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="matricola">Matricola</label>
                    </div>
                    <div id="divUser" class="col-md-3">
                        <div class="right-inner-addon">
                            <input type="text" id="matricola" class="form-control inputText" name="matricola" placeholder="es. 01234" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="nome">Nome</label>
                    </div>
                    <div id="divUser" class="col-md-3">
                        <div class="right-inner-addon">
                            <input type="text" id="nome" class="form-control inputText" name="nome" placeholder="es. Armann" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="cognome">Cognome</label>
                    </div>
                    <div id="divUser" class="col-md-3">
                        <div class="right-inner-addon">
                            <input type="text" id="cognome" class="form-control inputText" name="cognome" placeholder="es. Palemm" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                        <label for="password">Password</label>
                    </div>
                    <div id="divPass" class="col-md-3">
                        <div class="right-inner-addon">
                            <input type="password" id="password" class="form-control inputText" name="password" placeholder="es. FozzaPalemme" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="radio" id="uomo" name="sesso" value="uomo" checked="true" /><label for="uomo">Uomo</label>
                        <input type="radio" id="donna" name="sesso" value="donna" /><label for="donna">Donna</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input id="selImmagine" type="file" name="nomeFile" />
                    </div>
                </div>
                <input type="button" id="bottone" value="Completa registrazione" style="margin-top: 7px;" onclick="registrati()" />
                <input type="hidden" id="azione" name="azione" value="1" />
                <div class="row">
                    <div id="ajaxResponse" class="col-md-6">
                </div>
            </div>
        </div>
    </body>
</html>
