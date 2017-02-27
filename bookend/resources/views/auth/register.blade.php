<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{ URL::asset('css/signin.css') }}"/>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="frame">
                <h1 class="form-signing-heading reg_title"> Ny bruker </h1><br>
                <form class="form-signing">
                    <div class="text-center">
                        <input type="text" class="register-name" placeholder="Fornavn" id="register-fornavn" required>
                        <input type="text" class="register-name" id="register-etternavn" placeholder="Etternavn" required>
                    </div>
                    <div class="text-center">
                        <input type="password" class="register-input" placeholder="Passord" required>
                    </div>
                    <div class="text-center">
                        <input type="password" class="register-input" placeholder="Bekreft passord" required>
                    </div>
                    <div class="text-center">
                        <input type="email" class="register-input" placeholder="E-post" required>
                    </div>
                    <div class="text-center">
                        <input type="tel" class="register-input" placeholder="Telefonnummer" required>
                    </div>
                    <div class="text-center">
                        <input type="text" class="register-input" placeholder="Din bedrift" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn_reg" onclick="change_page_bookingv1()"> Registrer deg </button>
                    </div>
                </form>
                <div class="text-center already_user_div">
                    <div class="already_user_text"> Allerede en bruker? <label class="label_alreadyauser" onclick="change_page_login()"> Logg inn her </label></div>
                </div>
            </div>
        </div>

<footer class="footer">
    <div class="container cont_div">
        <p class="text-muted">Copyright © 2017 The Dreamers Inc. All rights reserved.</p>
    </div>
</footer>

<script>
    function change_page_bookingv1(){
      window.location.href = "Bookingv1.html";
    }
    
    function change_page_login(){
      window.location.href = "/login";
    }
</script>

    </body>
</html>