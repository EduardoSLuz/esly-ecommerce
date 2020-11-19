<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/d83003de32.js" crossorigin="anonymous"></script>
    
    <!-- Bootstrap -->   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
	<link rel="icon" type="image" href='<?php if( $error["imgs"] != 0 ){ ?><?php echo htmlspecialchars( $error["imgs"]["6"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>/resources/imgs/global/logo-mobile.png<?php } ?>'>

    <style>
        
        body{
            min-width: 100%;
        }
        section{
            width: 100%;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        <?php if( $error["color"] != 0 ){ ?>
        .text-main-site-section{
            color: <?php echo htmlspecialchars( $error["color"]["0"]["options"]["sc"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        }
        <?php } ?>
    </style>
    
</head>
<body>
    
    <section class="text-center border py-5 bg-light">

        <div class="row align-items-center h-100">
            
            <div class="px-2 col-12">
                
                <img src='<?php if( $error["imgs"] != 0 ){ ?><?php echo htmlspecialchars( $error["imgs"]["0"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>/resources/imgs/global/logo.png<?php } ?>' alt="Logo Astemac" style="width: 190px;">
                
                <div class='m-3 py-4 text-main-site-section <?php if( $error["color"] == 0 ){ ?>text-primary<?php } ?>'>
                
                    <p class="my-0 h1"> <i class="<?php echo htmlspecialchars( $error["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i> </p>
        
                    <h2 class="font-weight-normal">
                        <?php echo htmlspecialchars( $error["msg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </h2>
        
                    <p class="h4 text-dark">
                        <small class="font-weight-light">Aguarde alguns minutos e depois atualize a página.</small>
                    </p>
                
                </div>
        
                <div class=" my-3 col-12">
        
                    <p class="py-3">
                        <a href="/">Ir Para Página Inicial</a> |
                        <a href="javascript:HistoryBack()">Página Anterior</a>
                    </p>
        
                </div>

            </div>

        </div>

    </section>

    <!-- JS JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Bootstrap - Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  

    <!-- Bootstrap - jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
</body>
</html>