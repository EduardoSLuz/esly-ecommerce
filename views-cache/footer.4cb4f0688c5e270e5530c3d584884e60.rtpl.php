<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $layout["socialLayout"] == 1 ){ ?>
    <footer id="Footer-RedesSociais" class="<?php echo htmlspecialchars( $layout["bgFooterLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mt-5 NoPrintabled">
        
    <div class="bcg-ini ct-center">
        
        <div class="ct-ini text-right <?php echo htmlspecialchars( $layout["txFooterLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> py-2">
            <a class="font-weight-normal">Redes Sociais:</a>
            <?php $counter1=-1;  if( isset($storeSocial) && ( is_array($storeSocial) || $storeSocial instanceof Traversable ) && sizeof($storeSocial) ) foreach( $storeSocial as $key1 => $value1 ){ $counter1++; ?>
                <a href="<?php echo htmlspecialchars( $value1["linkSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="<?php echo htmlspecialchars( $layout["txFooterLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h6 mr-1"><i class="<?php echo htmlspecialchars( $value1["iconSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>   
            <?php } ?>
        </div>

    </div>	

    </footer>
<?php } ?>      
  
<section id="FooterInfo" class="mt-5 bg-light ct-center mb-5 NoPrintabled">
    
    <div class="ct-ini row">
        
        <?php if( $layout["suportLayout"] == 1 ){ ?>
            <div class="col-md-4 mt-mob">
                
                <p class="h6">Suporte</p>
                <hr>
                <p class="h6 font-weight-normal">

                    <i class="fas fa-mobile-alt"></i> <?php if( $store["0"]["telephoneStore"] != 0 ){ ?> <?php echo maskTel($store["0"]["telephoneStore"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?> <br>
                    <i class="far fa-envelope mt-4"></i> <?php if( $store["0"]["emailStore"] != '' ){ ?> <?php echo htmlspecialchars( $store["0"]["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?> <br>
                    <i class="fab fa-whatsapp mt-4"></i> <?php if( $store["0"]["whatsappStore"] != 0 ){ ?> <?php echo maskTel($store["0"]["whatsappStore"]); ?> <?php }else{ ?> <b>Sem whatsapp</b> <?php } ?> <br>
                    
                    <?php if( $horary != 0 ){ ?>
                        <i class="far fa-clock mt-4 mb-1"></i> Horario de Atendimento:
                        <ul class="txList-StyleNone tx-IconCart">
                            
                            <?php $counter1=-1;  if( isset($horary) && ( is_array($horary) || $horary instanceof Traversable ) && sizeof($horary) ) foreach( $horary as $key1 => $value1 ){ $counter1++; ?>
                                <li class="my-2">
                                    <?php echo htmlspecialchars( $value1["dayName"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( isset($value1["dayNameFinal"]) ){ ?>-<?php echo htmlspecialchars( $value1["dayNameFinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>: <?php echo date('H:i', strtotime($value1["timeInitial"])); ?> às <?php echo date('H:i', strtotime($value1["timeFinal"])); ?>

                                    <?php if( $value1["timeInitial2"] > $value1["timeInitial"] ){ ?>
                                        - <?php echo date('H:i', strtotime($value1["timeInitial2"])); ?> às <?php echo date('H:i', strtotime($value1["timeFinal2"])); ?>
                                    <?php } ?>
                                </li>
                            <?php } ?>

                        </ul>
                    <?php } ?>
                </p>
            
            </div>
        <?php } ?>
        
        <?php if( $layout["institutionalLayout"] == 1 ){ ?>
            <div class="col-md-4 mt-mob">
                
                <p class="h6">Institucional</p>
                <hr>

                <div class="h6 font-weight-normal text-dark">
                    
                    <?php if( $storeInstitution["0"]["infoStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="text-decoration-none text-dark my-3"><i class="fas fa-chevron-right text-secondary"></i> Sobre a empresa</a>
                        </p>
                    <?php } ?>

                    <?php if( $storeInstitution["0"]["allStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Todas as lojas</a>
                        </p>
                    <?php } ?>

                    <?php if( $storeInstitution["0"]["partnerStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Parceiros</a>
                        </p>
                    <?php } ?>

                    <?php if( $storeInstitution["0"]["helpStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Peguntas Frequentes</a>
                        </p>
                    <?php } ?>

                    <?php if( $storeInstitution["0"]["promotionStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Promoções</a>
                        </p>
                    <?php } ?>

                    <?php if( $storeInstitution["0"]["contactStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Fale Conosco</a>
                        </p>
                    <?php } ?> 
                    
                    <?php if( $storeInstitution["0"]["workStore"] == 1 ){ ?>
                        <p class="my-3">
                            <a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Trabalhe Conosco</a>
                        </p>
                    <?php } ?> 
                    
                    <p class="my-3">
                        <a href="https://www.astemac.com.br" target="_blank" class="text-decoration-none text-dark"><i class="fas fa-chevron-right text-secondary"></i> Astemac</a>
                    </p> 

                </div>
            
            </div>
        <?php } ?>
        
        <?php if( $layout["paymentLayout"] == 1 ){ ?>
            <div class="col-md-4 mt-mob">
            
                <p class="h6">Formas de Pagamento</p>
                <hr>

                <?php if( count($storePayment["0"]) > 0 ){ ?>

                    <small>Por Entrega:</small>

                    <div class="my-2">
                        <?php $counter1=-1;  if( isset($storePayment["0"]) && ( is_array($storePayment["0"]) || $storePayment["0"] instanceof Traversable ) && sizeof($storePayment["0"]) ) foreach( $storePayment["0"] as $key1 => $value1 ){ $counter1++; ?>
        
                            <img src="/resources/imgs/cards-payment/<?php echo htmlspecialchars( $value1["linkPayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="<?php echo htmlspecialchars( $value1["namePayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="d-block-inline mr-2" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<?php echo htmlspecialchars( $value1["namePayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        <?php } ?>
                    </div>

                <?php } ?>

                <?php if( count($storePayment["1"]) > 0 ){ ?>

                    <small>Por Retirada:</small>

                    <div class="my-2">
                        <?php $counter1=-1;  if( isset($storePayment["1"]) && ( is_array($storePayment["1"]) || $storePayment["1"] instanceof Traversable ) && sizeof($storePayment["1"]) ) foreach( $storePayment["1"] as $key1 => $value1 ){ $counter1++; ?>
        
                            <img src="/resources/imgs/cards-payment/<?php echo htmlspecialchars( $value1["linkPayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="<?php echo htmlspecialchars( $value1["namePayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="d-block-inline mr-2" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<?php echo htmlspecialchars( $value1["namePayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        <?php } ?>
                    </div>

                <?php } ?>

                <?php if( count($storePayment["2"]) > 0 ){ ?>

                    <small>No Site:</small>

                    <div class="my-2">
                        <?php $counter1=-1;  if( isset($storePayment["2"]) && ( is_array($storePayment["2"]) || $storePayment["2"] instanceof Traversable ) && sizeof($storePayment["2"]) ) foreach( $storePayment["2"] as $key1 => $value1 ){ $counter1++; ?>
        
                            <img src="/resources/imgs/cards-payment/<?php echo htmlspecialchars( $value1["linkPayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="<?php echo htmlspecialchars( $value1["namePayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="d-block-inline mr-2" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<?php echo htmlspecialchars( $value1["namePayStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                        <?php } ?>
                    </div>

                <?php } ?>

            </div>
        <?php } ?>

        <?php if( $layout["appLayout"] == 1 ){ ?>
            <div class="col-md-4 mt-mob">
                
                <p class="h6">Baixe Nosso App</p>
                <hr>
                
                <p>
                    
                    <div class="row ml-1">

                        <?php $counter1=-1;  if( isset($storeApp) && ( is_array($storeApp) || $storeApp instanceof Traversable ) && sizeof($storeApp) ) foreach( $storeApp as $key1 => $value1 ){ $counter1++; ?>
                            
                            <a class="btn btn-light border m-1" target="_blank" href="<?php echo htmlspecialchars( $value1["linkSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <i class="<?php echo htmlspecialchars( $value1["iconSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i>
                                <span class="h6"><?php echo htmlspecialchars( $value1["nameSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                            </a>
                            
                        <?php } ?>

                    </div>

                </p>
                
            </div>
        <?php } ?>

        <?php if( $layout["securityLayout"] == 1 ){ ?>
            <div class="col-md-4 mt-mob">
                
                <p class="h6">Site Seguro</p>
                <hr>
                
                <p>
                
                    <div class="row">
                        
                        <img src="/resources/imgs/cards-security/google_security.png" alt="Google_Security" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Google" width="150" height="50">
                        
                        <img src="/resources/imgs/cards-security/Certising.png" alt="Certising" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Certising" width="100" height="50">
                        
                    </div>
                    
                </p>
                
            </div>
        <?php } ?>

        <?php if( $layout["promotionLayout"] == 1 ){ ?>
            <div class="col-md-4 mt-mob">

                <p class="h6">Receba Ofertas Exclusivas</p>
                <hr>

                <p>
                    <form class="input-group mb-2" method="POST">
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="far fa-envelope"></i></span>
                        </div>
                        
                        <input type="email" class="form-control" placeholder="Digite seu e-mail">
        
                        <button type="button" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> input-group-append">Enviar</button>

                    </form>

                    <a class="font-weight-light">Inscreva-se para receber ofertas e descontos exclusivos no seu e-mail.</a>

                </p>

            </div>
        <?php } ?>
        
        <?php if( $layout["detailLayout"] == 1 ){ ?>
        <div class="col-md-12">

            <p class="tx-IconCart font-weight-light mt-5">
                * Informamos que os preços, ofertas e condições de pagamento são exclusivos para internet válidos para o dia de hoje, podendo sofrer alterações sem aviso prévio.<br>
                * As ações/promoções do site são destinadas à pessoas físicas, podendo ser utilizadas em uma compra por CPF, não sendo cumulativas.<br>
                * O pedido será concluído de acordo com a disponibilidade em nosso estoque. Caso ocorra a falta de algum item, este não será entregue e o valor correspondente não será cobrado. O valor total de sua compra poderá ter uma variação de 20% (para mais ou menos) em virtude dos produtos de peso variável. <br>
                * Para melhor atender nossos clientes, não vendemos por atacado e reservamo-nos o direito de limitar, por cliente, a quantidade dos produtos com preços promocionais. <br><br>
                A venda e o consumo de bebidas alcoólicas são proibidos para menores de 18 anos.<br>
                Bebida alcoólica pode causar dependência química e, em excesso, provoca graves males à saúde. Beba com moderação<br>
            </p>

        </div>
        <?php } ?>
    
    </div>
  
</section>

<section class="<?php echo htmlspecialchars( $layout["bgFooterLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> NoPrintabled">
    
    <div class="ct-center">
        <div class="py-2">

            <div class="ct-ini row <?php echo htmlspecialchars( $layout["txFooterLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                <div class="col-7">
                    <a class="tx-footer"><b>© <?php echo htmlspecialchars( $store["0"]["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo maskCnpj($store["0"]["cnpjStore"]); ?></b></a>
                </div>

                <div class="col-5">
                    <div class="text-right">

                        <b class="tx-footer">Desenvolvido por: <a href="https://astemac.com.br" target="_blank" class="<?php echo htmlspecialchars( $layout["txFooterLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h5 text-decoration-none">Astemac</a></b>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>

<?php if( $wp === true ){ ?>        
<div id="BtnWhatsapp" class="BtnsFloat ml-3 mb-5 text-left fixed-bottom null-height">
    <a class="bg-success h2 rounded px-1 shadow" href="https://api.whatsapp.com/send?phone=556796218853" target="_blank">
        <i class="fab fa-whatsapp text-white"></i>
    </a>
</div>
<?php } ?>

<?php if( $ct === true ){ ?>
<div id="BtnCart" class="BtnsFloat mr-3 mb-5 text-right fixed-bottom null-height cart-BtnFloat">
    <a class="bg-light h2 rounded px-1 shadow-sm" href='/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php if( $userValues["login"] ){ ?>checkout/cart<?php }else{ ?>login<?php } ?>/'>
        <i class="fas fa-shopping-cart text-dark text-center tx-IconCart"></i>
        <span class="h6 <?php echo htmlspecialchars( $layout["txH3Layout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> text-white cart-IconCt">0</span>
    </a>
    
</div>
<?php } ?>

<?php if( $ft === true ){ ?>
<div id="BtnFilter" class="BtnsFloat text-left fixed-bottom null-height cart-BtnFloat top-25">
    <a class="bg-light border h5 bd-Rd5Right px-2 py-2 shadow " onclick="openNav()">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<?php } ?>

<!-- MODELS -->
<?php require $this->checkTemplate("models");?>

<!-- Bootstrap - Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  

<!-- Bootstrap - jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Jquery Mask -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js'></script>

<!-- Custom Javascripts -->
<script src="/resources/js/bootnavbar.js"></script>
<script src="/resources/js/owl.carousel.min.js"></script>  
<script src="/resources/js/index.js"></script>  

<script>
    
    $(".maskCpf").mask("000.000.000-00");
    $(".maskTel").mask("(00) 00000-0000");

    $(function () {
        $('#main_navbar').bootnavbar({
            //option
            animation: false
        });
    })

    
    $(".btnEditAddress").click(function() {
        $.get("/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/teste/", "campo=1", function(data) {
            console.log(data);
        });
    });
    
    $(function () {
          $('[data-toggle="popover"]').popover()
    })
    
    $('.owl-carousel .CarouselOne').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:false,
                loop:false
            },
            600:{
                items:4,
                nav:false,
                loop:false
            },
            1000:{
                items:7,
                nav:true,
                loop:false
            }
        }
    })
    
    $('.owl-carousel .CarouselTwo').owlCarousel({
        loop:true,
        onDragged: callback,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:false,
                loop:false
            },
            600:{
                items:3,
                nav:false,
                loop:false
            },
            890 : {
                items:5,
                nav:true,
                loop:false
            },
            1200:{
                items:6,
                nav:true,
                loop:false
            }
        }
    })
    
    var owl = $('.owl-carousel .CarouselTwo');
    owl.owlCarousel();

    // Go to the next item
    $('.CarouselTwoNext').click(function() {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('.CarouselTwoPrev').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [300]);
    })

    function callback(event) {
        
    }

    var owl = $('.owl-carousel .CarouselImgs');
    owl.owlCarousel({
        items:1,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true
    });
    
</script>
</body>
</html>