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
        <meta charset="UTF-8">
        <title>Login pagina</title>
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Login</h1>
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
                        <label for="password">Password</label>
                    </div>
                    <div id="divPass" class="col-md-3">
                        <div class="right-inner-addon">
                            <input type="password" id="password" class="form-control inputText" name="password" placeholder="es. FozzaPalemme" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>Non hai un account? <a href="registrazione.php">Registrati ora!</a></p>
                    </div>
                </div>
                <input type="button" id="bottone" value="Esegui Login" onclick="login()" />
                <input type="hidden" id="azione" name="azione" value="0" />
                <div class="row">
                    <div id="ajaxResponse" class="col-md-6">
                </div>
            </div>
        </div>
    </body>
</html>
