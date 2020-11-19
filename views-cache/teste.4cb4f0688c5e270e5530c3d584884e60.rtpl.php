<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        
        #menu-site .menu-info{
            display: block;
            position: fixed;
            top: 0;
            left: -80vw;
            width: 80vw;
            height: 100vh;
            background-color: #fff ;
            z-index: 2;
            margin: 0;
            transition: left .2s linear;
        }

        #menu-site.open .menu-info {
            display: block;
            left: 0;
        }

        .backdrop{
            display: none;
        }

        #menu-site.open .backdrop{
            display: block;
            opacity: .5;
        }

        #menu-site .backdrop {
            opacity: 0;
            background-color: #000;
            transition: opacity .15s linear;
            position: fixed;
            width: 100%;
            height: 100vh;
            z-index: 1;
            left: 0;
            top: 0;
        }

    </style>
</head>
<body>

    <button class="btn open-menu btn-light"><i class="fas fa-bars"></i></button>

    <nav id="menu-site">
        <div class="backdrop"></div>
        <div class="menu-info border">
            ola
            <button class="btn close-menu btn-danger"><i class="fas fa-times"></i></button>
        </div>
    </nav>

    <script src="https://kit.fontawesome.com/d83003de32.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script>

        $(".open-menu").on("click", function(e){
            $("#menu-site").addClass("open");
        });

        $(".close-menu").on("click", function(e){
            $("#menu-site").removeClass("open");
        });

        $(".backdrop").on("click", function(e){
            $("#menu-site").removeClass("open");
        });

    </script>

</body>
</html>