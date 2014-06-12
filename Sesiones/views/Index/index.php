<!Doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Mi MVC Básico en PHP</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/stylesheet.css">
        <script src="<?php echo URL; ?>public/js/jquery-1.11.0.min.js"></script>
    </head>
    <body>
        <?php if(!Session::exist()){ ?>
        
        <div id="formWrapper">
            
            <div class="formWrapper">
                <div class="formTitle">Entrar</div>
                <form id="signInForm" action="<?php echo URL; ?>User/signIn" name="signIn" method="post">
                    <input name="username" type="text" placeholder="Username" required/>
                    <input name="password" type="password" placeholder="Password" required/>
                    <input id="signInBtn" name="signInBtn" type="submit" value="Entrar" required/>
                    <div class="smallText">
                        <span>¿No estas registrado? <div class="button" id="signUpButton">Registrate Aquí</div></span>
                        <span>¿Olvidaste tu password? <a href="">Recordar Password</a></span>
                    </div>
                </form>
            </div>
            
            <div class="formWrapper hidden">
                <div class="formTitle">Registro</div>
                <form id="signUpForm" action="<?php echo URL; ?>User/signUp" name="signUp" method="post">
                    <input name="name" type="text" placeholder="Nombre" required/>
                    <input name="username" type="text" placeholder="Username" required/>
                    <input name="password" type="password" placeholder="Password" required/>
                    <input name="email" type="email" placeholder="pepito@perez.com" required/>
                    <input id="signUpBtn" name="signUpBtn" type="submit" value="Registrarme" required/>
                    <div class="smallText">
                        <span>¿Si estas registrado? <div class="button" id="signInButton">Volver</div></span>
                    </div>
                </form>
            </div>
            
        </div>
        
        <script>
            $(function(){
                
                $('#signUpButton').click(function(){
                    $("form[name=signIn]").parent().hide();
                    $("form[name=signUp]").parent().fadeToggle();
                 });

                $('#signInButton').click(function(){
                    $("form[name=signUp]").parent().hide();
                    $("form[name=signIn]").parent().fadeToggle();
                });
                            
                $('#signUpBtn').click(function(e){
                     e.preventDefault();
                     signUp();
                 });
                            
                $('#signInBtn').click(function(e){
                    e.preventDefault();
                    signIn();
                });
           });
            
            function signUp(){
                
                var name = $('form[name=signUp] input[name=name]')[0].value;
                var username = $('form[name=signUp] input[name=username]')[0].value;
                var email = $('form[name=signUp] input[name=email]')[0].value;
                var password = $('form[name=signUp] input[name=password]')[0].value;
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL; ?>User/signUp",
                    data: {name: name, username: username, email: email, password: password}
                }).done(function(response){
                    //alert(response);
                    if(response == true){
                        alert("Registro Exitoso!");
                    }else{
                        alert(response);
                    }
                });
                
            }
            
            function signIn(){

                var username = $('form[name=signIn] input[name=username]')[0].value;
                var password = $('form[name=signIn] input[name=password]')[0].value;
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL; ?>User/signIn",
                    data: {username: username, password: password}
                }).done(function(response){
                    //alert(response);
                    if(response == 1){
                        location.reload();
                    }else{
                        alert("Usuario o Password Incorrectos");
                    }
                });
            }
            
        </script>
            
        <?php }else{ ?>
        
        <div class="formWrapper">
            <?php echo Session::getValue('U_NAME'); ?>
            <button id="closeSessionBtn">Cerrar Session</button>
        </div>
        
        <script>
            $(function(){
               $('#closeSessionBtn').click(function(){
                  document.location = "<?php echo URL; ?>User/destroySession"; 
               });
            });
        </script>
        
        <?php } ?>
    </body>
</html>