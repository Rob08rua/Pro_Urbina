<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Vista/Estilos/inicio_Se.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            <a class="nav-link active" href="../Vista/index.php">
                 <img src="../Vista/imagenes/Logo.jpg" alt="Logo" width="30px" height="24" class="d-inline-block align-text-top">
                 Zona Gamer
             </a>
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-2">
                <?php

                ?>
            </div>
         </div>   
         <br>
         <br>
         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                    <div class="form-group">
                    <center>
                     <h2 class="title">Inicio de Sesion</h2>
                     <?php
                    
                     ?>
                    </center>
                        <div class="mb-3">
                        <form id="login-form" method="post" class="">
                        <div class="col-auto ">
                             <label for="email">Correo Electrónico:</label>
                             <input class="form-control" type="email" id="email" name="email" > <br> 
                        </div>    
                        <div class="col-auto">
                             <label for="password">Contraseña:</label>
                             <input class="form-control" type="password" id="password" name="password" > 
                        </div>        
                             <br>
                             <br> 
                             <div class="col-auto">
                            <center>
                            <button type="submit" id="Btnlogin" name="Btnlogin"class="btn btn-success mb-3">Aceptar</button>
                            </center>
                        </div>
                         </form>
                        </div>
                        <br>
                       
                    </div>
            </div>
            <div class="col-md-4"></div>
         </div>  
         <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <center>
                    <br>
                <a href="https://accounts.google.com/v3/signin/" class="nav-link" ><i class='bx bxl-google'></i></a>
                </center>
            </div>
            <div class="col-md-4"></div>
         </div> 
    </div>
   
</body>
</html>