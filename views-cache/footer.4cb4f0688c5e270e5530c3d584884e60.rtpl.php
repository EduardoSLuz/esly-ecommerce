<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( isset($layout["lyFooter1"]) && $layout["lyFooter1"] == 1 && isset($storeSocial) && $storeSocial != 0 ){ ?>
<footer id="Footer-RedesSociais" class="bg-site-footer-social mt-5 NoPrintabled">
        
    <div class="bcg-ini ct-center">
        
        <div class="ct-ini text-right py-2">
            <span class="font-weight-normal text-site-footer-social">Redes Sociais:</span>
            <?php $counter1=-1;  if( isset($storeSocial["0"]) && ( is_array($storeSocial["0"]) || $storeSocial["0"] instanceof Traversable ) && sizeof($storeSocial["0"]) ) foreach( $storeSocial["0"] as $key1 => $value1 ){ $counter1++; ?>
                <?php if( $value1["idSocialType"] != 5 && $value1["idSocialType"] != 6 ){ ?>
                <a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="text-site-footer-social h6 mr-1"><i class="<?php echo htmlspecialchars( $value1["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
                <?php } ?>   
            <?php } ?>
        </div>

    </div>	

</footer>
<?php } ?>      
  
<footer id="FooterInformation" class="bg-site-footer-main NoPrintabled py-5">
    
    <div class="ct-center">
        <div class="ct-ini row">
        
            <?php if( isset($layout["lyFooter2"]) && $layout["lyFooter2"] == 1 ){ ?>
                <div class="col-md-4 mt-mob">
                    
                    <p class="h6 text-site-footer-main">Suporte</p>
                    <hr>
                    <p class="h6 text-site-footer-main font-weight-normal">
    
                        <i class="fas fa-mobile-alt"></i> <?php if( $store["0"]["telephoneStore"] != 0 ){ ?> <?php echo maskTel($store["0"]["telephoneStore"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?> <br>
                        <i class="far fa-envelope mt-4"></i> <?php if( $store["0"]["emailStore"] != '' ){ ?> <?php echo htmlspecialchars( $store["0"]["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?> <br>
                        <i class="fab fa-whatsapp mt-4"></i> <?php if( $store["0"]["whatsappStore"] != 0 ){ ?> <?php echo maskTel($store["0"]["whatsappStore"]); ?> <?php }else{ ?> <b>Sem whatsapp</b> <?php } ?> <br>
                        
                        <?php if( isset($horary) && $horary != 0 ){ ?>
                            <i class="far fa-clock mt-4 mb-1"></i> Horario de Atendimento:
                            <ul class="txList-StyleNone tx-IconCart">
                                
                                <?php $counter1=-1;  if( isset($horary) && ( is_array($horary) || $horary instanceof Traversable ) && sizeof($horary) ) foreach( $horary as $key1 => $value1 ){ $counter1++; ?>
                                    <li class="my-2 text-site-footer-main">
                                        
                                        <?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $key1 == count($horary) - 1 ){ ?> - <?php echo htmlspecialchars( $value1["dayNameFinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>:

                                        <?php echo date('H:i', strtotime($value1["horary"]["0"]["init"])); ?> às <?php echo date('H:i', strtotime($value1["horary"]["0"]["final"])); ?>
    
                                        <?php if( $value1["horary"]["1"]["init"] > $value1["horary"]["0"]["init"] ){ ?>
                                            - <?php echo date('H:i', strtotime($value1["horary"]["1"]["init"])); ?> às <?php echo date('H:i', strtotime($value1["horary"]["1"]["final"])); ?>
                                        <?php } ?>

                                    </li>
                                <?php } ?>
    
                            </ul>
                        <?php } ?>
                    </p>
                
                </div>
            <?php } ?>
            
            <?php if( isset($layout["lyFooter3"]) && $layout["lyFooter3"] == 1 ){ ?>
                <div class="col-md-4 mt-mob">
                    
                    <p class="h6 text-site-footer-main">Institucional</p>
                    <hr>
    
                    <div class="h6 font-weight-normal">
                        
                        <?php if( $storeInstitution["0"]["lyInfo1"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="text-decoration-none text-site-footer-main my-3"><i class="fas fa-chevron-right text-site-footer-main"></i> Sobre a empresa</a>
                            </p>
                        <?php } ?>
    
                        <?php if( $storeInstitution["0"]["lyInfo2"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Todas as lojas</a>
                            </p>
                        <?php } ?>
    
                        <?php if( $storeInstitution["0"]["lyInfo3"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Parceiros</a>
                            </p>
                        <?php } ?>
    
                        <?php if( $storeInstitution["0"]["lyInfo4"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Peguntas Frequentes</a>
                            </p>
                        <?php } ?>
    
                        <?php if( $storeInstitution["0"]["lyInfo5"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Promoções</a>
                            </p>
                        <?php } ?>
    
                        <?php if( $storeInstitution["0"]["lyInfo6"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Fale Conosco</a>
                            </p>
                        <?php } ?> 
                        
                        <?php if( $storeInstitution["0"]["lyInfo7"] == 1 ){ ?>
                            <p class="my-3">
                                <a href="/loja-<?php echo htmlspecialchars( $storeInstitution["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Trabalhe Conosco</a>
                            </p>
                        <?php } ?> 
                        
                        <p class="my-3">
                            <a href="https://www.astemac.com.br" target="_blank" class="text-decoration-none text-site-footer-main"><i class="fas fa-chevron-right text-site-footer-main"></i> Astemac</a>
                        </p> 
    
                    </div>
                
                </div>
            <?php } ?>
            
            <?php if( isset($layout["lyFooter4"]) && $layout["lyFooter4"] == 1 ){ ?>
                <div class="col-md-4 mt-mob">
                
                    <p class="h6 text-site-footer-main">Formas de Pagamento</p>
                    <hr>
    
                    <?php if( isset($storePayment) && $storePayment != 0 ){ ?>
    
                        <?php $counter1=-1;  if( isset($storePayment["0"]) && ( is_array($storePayment["0"]) || $storePayment["0"] instanceof Traversable ) && sizeof($storePayment["0"]) ) foreach( $storePayment["0"] as $key1 => $value1 ){ $counter1++; ?>

                        <small class="text-site-footer-main"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>:</small>
    
                        <div class="my-2">
                            
                            <?php $counter2=-1;  if( isset($value1["types"]) && ( is_array($value1["types"]) || $value1["types"] instanceof Traversable ) && sizeof($value1["types"]) ) foreach( $value1["types"] as $key2 => $value2 ){ $counter2++; ?>
                                <img src="<?php echo htmlspecialchars( $value2["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="<?php echo htmlspecialchars( $value2["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="d-block-inline mr-2" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<?php echo htmlspecialchars( $value2["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <?php } ?>

                        </div>

                        <?php } ?>

                    <?php } ?>
    
                </div>
            <?php } ?>
    
            <?php if( isset($storeSocial) && $storeSocial != 0 && isset($layout["lyFooter5"]) && $layout["lyFooter5"] == 1 ){ ?>
                <div class="col-md-4 mt-mob">
                    
                    <p class="h6 text-site-footer-main">Baixe Nosso App</p>
                    <hr>
                    
                    <p>
                        
                        <div class="row ml-1">

                            <?php $counter1=-1;  if( isset($storeSocial["0"]) && ( is_array($storeSocial["0"]) || $storeSocial["0"] instanceof Traversable ) && sizeof($storeSocial["0"]) ) foreach( $storeSocial["0"] as $key1 => $value1 ){ $counter1++; ?>
                                <?php if( $value1["idSocialType"] >= 5 && $value1["idSocialType"] <= 6 ){ ?>
                                <a class="btn btn-second-site-footer-main border m-1" target="_blank" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <i class="<?php echo htmlspecialchars( $value1["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i>
                                    <span class="h6"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                                </a>
                                <?php } ?>   
                            <?php } ?>
    
                        </div>
    
                    </p>
                    
                </div>
            <?php } ?>
    
            <?php if( isset($layout["lyFooter6"]) && $layout["lyFooter6"] == 1 ){ ?>
                <div class="col-md-4 mt-mob">
                    
                    <p class="h6 text-site-footer-main">Site Seguro</p>
                    <hr>
                    
                    <p>
                    
                        <div class="row">
                            
                            <img src="/resources/imgs/cards-security/google_security.png" alt="Google_Security" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Google" width="150" height="50">
                            
                            <img src="/resources/imgs/cards-security/Certising.png" alt="Certising" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Certising" width="100" height="50">
                            
                        </div>
                        
                    </p>
                    
                </div>
            <?php } ?>
    
            <?php if( isset($layout["lyFooter7"]) && $layout["lyFooter7"] == 1 ){ ?>
                <div class="col-md-4 mt-mob">
    
                    <p class="h6 text-site-footer-main">Receba Ofertas Exclusivas</p>
                    <hr>
    
                    <p>

                        <div id="alertEmailPromo" class="alert alert-success alert-dismissible fade show d-none text-left" role="alert">
								
							<span class="msgAlert">Msg</span>

                        </div>
                        
                        <form id="formEmailPromo" class="formEmailPromo input-group mb-2" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white"><i class="far fa-envelope"></i></span>
                            </div>
                            
                            <input type="email" class="form-control" id="emailPromo" name="emailPromo" placeholder="Digite seu e-mail" required>
            
                            <button type="submit" class="btn btn-main-site-footer-main text-btn-site-footer-main input-group-append">Enviar</button>
    
                        </form>
    
                        <span class="text-site-footer-main font-weight-light">Inscreva-se para receber ofertas e descontos exclusivos no seu e-mail.</span>
    
                    </p>
    
                </div>
            <?php } ?>
            
            <?php if( isset($layout["lyFooter8"]) && $layout["lyFooter8"] == 1 && 0 == 1 ){ ?>
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
    </div>
  
</footer>

<section class="bg-site-footer-copy NoPrintabled">
    
    <div class="ct-center">
        <div class="py-2">

            <div class="ct-ini row text-site-footer-copy">

                <div class="col-7">
                    <a class="tx-footer"><b>© <?php echo htmlspecialchars( $store["0"]["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> / <?php echo maskCnpj($store["0"]["cnpjStore"]); ?></b></a>
                </div>

                <div class="col-5">
                    <div class="text-right">

                        <b class="tx-footer">Desenvolvido por: <a href="https://astemac.com.br" target="_blank" class="text-site-footer-copy h5 text-decoration-none">Astemac</a></b>

                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>

<?php if( $wp === true ){ ?>        
<div id="BtnWhatsapp" class="BtnsFloat ml-3 mb-5 text-left fixed-bottom null-height">
    <a class="bg-success h2 rounded px-1 shadow" href="https://api.whatsapp.com/send?phone=55<?php echo htmlspecialchars( $store["0"]["telephoneStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank">
        <i class="fab fa-whatsapp text-white"></i>
    </a>
</div>
<?php } ?>

<?php if( $ct === true ){ ?>
<div id="BtnCart" class="BtnsFloat mr-3 mb-5 text-right fixed-bottom null-height cart-BtnFloat">
    <a class="bg-site-section h2 rounded px-1 shadow-sm" href='/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/'>
        <i class="fas fa-shopping-cart text-second-site-section text-center py-1" style="font-size:24px"></i>
        <span class="h6 text-main-site-section cart-IconCt"><?php if( isset($cart) && $cart != false && $cart["items"] != 0 ){ ?><?php echo htmlspecialchars( $cart["totalItems"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?></span>
    </a>
    
</div>
<?php } ?>

<?php if( $ft === true ){ ?>
<div id="BtnFilter" class="BtnsFloat text-left fixed-bottom null-height cart-BtnFloat top-25">
    <button type="button" class="open-menu bg-site-section  border h5 rounded-right px-2 py-2 shadow">
        <i class="fas fa-chevron-right text-second-site-section "></i>
    </button>
</div>
<?php } ?>

<!-- MODELS -->
<?php require $this->checkTemplate("models");?>

<!-- JS JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!-- Bootstrap - Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  

<!-- Bootstrap - jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Select2 -->
<script src="/resources/admin/plugins/select2/js/select2.full.min.js"></script>

<!-- Jquery Mask -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js'></script>

<!-- Custom Javascripts -->
<script src="/resources/js/bootnavbar.js"></script>
<script src="/resources/js/barnav.js"></script>
<script src="/resources/js/owl.carousel.min.js"></script>  
<script src="/resources/js/site_global.js"></script>
<script src="/resources/js/site_stores.js"></script>
<script src="/resources/js/site_login.js"></script>
<script src="/resources/js/mask.js"></script>
<?php if( isset($userValues) && $userValues["login"] == true ){ ?><script src="/resources/js/site_account.js"></script><?php } ?>
<?php if( isset($cart) && $cart != false ){ ?><script src="/resources/js/site_checkout.js"></script><?php } ?>
<?php if( isset($search) && is_array($search) ){ ?><?php require $this->checkTemplate("../resources/js/html/search");?><?php } ?>
<?php if( isset($dep) && is_array($dep) ){ ?><?php require $this->checkTemplate("../resources/js/html/departaments");?><?php } ?>
<script src="/resources/js/index.js"></script>  

<?php require $this->checkTemplate("../resources/js/html/mask");?>
<?php require $this->checkTemplate("../resources/js/html/carousel");?>

<script>

    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

</script>

<script>

    $(function () {
        $('.main_navbar').bootnavbar({
            //option
            animation: false
        });
    })

    $(function(){
        $('#dropdownBootstrap').hover(function() {
            $(this).addClass('open');
            $('#dropdownBootstrap .dropdown-menu').addClass('show');
        },
        function() {
            $(this).removeClass('open');
            $('#dropdownBootstrap .dropdown-menu').removeClass('show');
        });
    });

    $('#listSearch').click(function(e){
        $("#menuSearch").addClass("show");
    });

    $('body').click(function (event) {
        if(event.target.id!='listSearch'){
            $("#menuSearch").removeClass("show");
        }
    });
    
    $('#listSearch').on("input", function(e){

        var url = $(this).attr("data-action");
        var product = $(this).val();

        var dados = new FormData();

        dados.append("product", product); 

        $.ajax({
            url: url,
            method: "POST",
            data: dados,
            processData: false,
            contentType: false
        }).done(function(response){
            $('#menuProducts').html(response);
        })

    });
    
    $(function () {
        $('[data-toggle="popover"]').popover();
        $('[data-toggle="tooltip"]').tooltip();
    })

</script>

</body>
</html>