<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta property="og:url" content="https://<?php echo htmlspecialchars( $Links["HTTP"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
  	<meta property="og:type" content="website" />
  	<meta property="og:title" content="Site Ecommerce" />
  	<meta property="og:description" content="Venha Conhecer" />
  	<meta property="og:image" content="https://<?php echo htmlspecialchars( $links["HTTP"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/resources/imgs/code.jpg" />
  	<meta property="og:image:width" content="150px" />
  	<meta property="og:image:width" content="150px" />
	<meta property="fb:app_id" content="113869198637480" />

    <title>Astemac | Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    
    <!-- Bootstrap -->   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d83003de32.js" crossorigin="anonymous"></script>
	
	<!-- Plugin BootStrap Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	
	<!-- JS DO GOOGLE RECAPTCHA -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
	<!--  Custom CSS  -->
	<link href="/resources/css/index.css" rel="stylesheet">  
 	<link rel="stylesheet" href="/resources/css/bootnavbar.css">
	<link rel="stylesheet" href="/resources/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/resources/css/owl.theme.default.min.css">  
    <link rel="stylesheet" href="/resources/css/sidenav.css">  
	  
  </head>
  <body>
	  
	<section class="bg-primary bar-display">
		
		<div class="bcg-ini ct-center">
		
			<div class="ct-ini">
				
				<div class="row text-light">

					<div class="col-7">
						<span><small>
							Você esta navegando na <a class="text-light mr-1 cursorPointer" data-toggle="modal" data-target="#ModalAlterStores"><b><u>loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></u></b> <i class="fas fa-angle-down"></i></a>
							<a href="https://www.instagram.com/" target="__blank" class="text-light mr-1"><i class="fab fa-instagram"></i></a>   
							<a href="https://www.facebook.com/" target="__blank" class="text-light mr-1"><i class="fab fa-facebook-f"></i></a> 
							<a href="https://www.twitter.com/" target="__blank" class="text-light mr-1"><i class="fab fa-twitter"></i></a>
							<a href="https://www.youtube.com/" target="__blank" class="text-light mr-1"><i class="fab fa-youtube"></i></a> 
						</small></span>
					</div>

					<div class="col-5">
						<div class="text-right">

							<span><small>
								<a class="text-white cursorPointer" data-toggle="modal" data-target="#ModalConsultationRegions"><i class="fas fa-truck"></i> Regiões Atendidas</a> &nbsp; 
								<a class="text-white cursorPointer" data-toggle="modal" data-target="#ModalConsultationHorary"><i class="far fa-clock"></i> Horários</a> &nbsp;
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="text-white"><i class="fas fa-map-marker-alt"></i> Todas as lojas</a> &nbsp;
								<a class="text-white cursorPointer"><i class="fas fa-mobile-alt"></i> (67) 98765-4321</a>
							</small></span>

						</div>
					
					</div>
				
				</div>
			
			</div>	
		
		</div>
	
	  </section>
	  
	<section id="Navbar-Desktop" class="bg-primary sticky-top navbar-ini">
		
		<div class="bcg-ini ct-center navbar-prime">
			<nav class="navbar navbar-expand-lg navbar-light ct-ini">
				
				<a class="navbar-brand" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
					<img src="/resources/imgs/logos/logo.png" width="220px" class="d-inline-block align-top imgLogo" alt="" loading="lazy">
				</a>

				<div class="nav-item border-0 navbar-display my-0">
					<button type="button" class="btn btn-sm btn-primary text-white border-0" onclick="ShowHideBarMobile()" data-toggle="collapse" data-target="#BarMobile" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
						<i id="MenuMobile" class="fas fa-bars"></i><br>
						<small>Menu</small>
					</button>
					<button type="button" class="btn btn-sm btn-primary text-white border-0" onclick="AlterNavbar('Navbar-Desktop', 'NavbarMobile-Pesquisa')">
						<i class="fas fa-search"></i><br>
						<small>Buscar</small>
					</button>
					<button type="button" class="btn btn-sm btn-primary text-white border-0" data-toggle="modal" data-target="#ModalAlterStores">
						<i class="fas fa-store"></i><br>
						<small>Lojas</small>
					</button>
					
				</div>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						 <li class="nav-item ml-3 mr-3">
							<form class="input-group mt-2 bg-white border border-white-50 bd-Rd10 ipt-barSearch" method="GET" action="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/">&nbsp;
							
								<input type="text" class="form-control null-bd" placeholder="Encontre um produto" name="s">

								<div class="input-group-prepend">
									<button type="button" class="bg-white null-bd" id="Btn-Audio">
										<a href="#"><i class="fas fa-microphone text-primary"></i></a>
									</button>

									<button type="submit" class="ml-1 bg-white null-bd" id="Btn-Search">
										<i class="fas fa-search text-primary"></i>
									</button>&nbsp;&nbsp;
									
								</div>
							</form>
						</li>

						<a class="cursorPointer">
							<button class="nav-item ml-3 text-center text-light btn btn-primary" data-toggle="modal" data-target="#ModalAlterStores">
								<i class="fas fa-store"></i><br>
								<small>Lojas</small>					
							</button>
						</a>
						<a href='/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php if( $login ){ ?>account/requests<?php }else{ ?>login<?php } ?>/'>
							<button class="nav-item text-center text-light btn btn-primary">
								<i class="far fa-user"></i><br>
								<small>Conta</small>						
							</button>
						</a>
						

						<a id="PopCart" <?php if( $login === false ){ ?> href='/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/' <?php } ?> data-toggle="popover" data-placement="bottom" data-trigger='<?php if( $login ){ ?>focus <?php }else{ ?>hover<?php } ?>' data-html="true" data-content='
							<?php if( $login === false ){ ?>
							
								<i class="far fa-user"></i> Faça login para acessar o carrinho

							<?php }else{ ?>

								<div>
									<div class="table-responsive">
										<div class="table-ini">
											
											<div class="border-bottom py-2">
												<span>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</span>
												<small><br>1 X R$ 9,90</small>
											</div>

											<div class="border-bottom py-2">
												<span>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</span>
												<small><br>1 X R$ 9,90</small>
											</div>

											<div class="border-bottom py-2">
												<span>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</span>
												<small><br>1 X R$ 9,90</small>
											</div>

											<div class="border-bottom py-2">
												<span>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</span>
												<small><br>1 X R$ 9,90</small>
											</div>

											<div class="border-bottom py-2">
												<span>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</span>
												<small><br>1 X R$ 9,90</small>
											</div>

											<div class="border-bottom py-2">
												<span>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</span>
												<small><br>1 X R$ 9,90</small>
											</div>
			
										</div>
									</div>
									
									<div class="py-3">
										<span>Subtotal: <b>R$ 9,90</b></span>
									</div>
									
									<div class="text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/cart/" class="btn btn-sm btn-primary w-100">Ver Carrinho</a>
									</div>
								</div>

							<?php } ?>
						'>
							<button class="nav-item text-center text-light btn btn-primary">
								<i class="fas fa-shopping-cart"></i>	
								<br><small><b><?php if( $login ){ ?>6<?php }else{ ?>0<?php } ?></b></small>						
							</button>
						</a>
						
					 </ul>
				
				</div>
			
			</nav>

		</div>
	
	 </section>

	 <section id="NavbarMobile-Pesquisa" class="bg-primary display-None">
			
		<nav class="navbar navbar-expand-lg navbar-light">
					
				<div class="btn-group width-T100">

					<form class="input-group bg-white border border-white-50 bd-Rd10" method="GET" action="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/">&nbsp;
								
						<input type="text" class="form-control null-bd" placeholder="Encontre um produto" name="s">

						<div class="input-group-prepend">
							<button type="button" class="bg-white null-bd" id="Btn-AudioMob">
								<a href="#"><i class="fas fa-microphone text-primary"></i></a>
							</button>

							<button type="submit" class="ml-1 bg-white null-bd" id="Btn-SearchMob">
								<i class="fas fa-search text-primary"></i>
							</button>&nbsp;&nbsp;
							
						</div>

					</form>

					<button type="button" class="btn btn-primary bd-RdNull" onclick="AlterNavbar('NavbarMobile-Pesquisa', 'Navbar-Desktop')">Voltar</button>

				</div>
			
			</nav>

	 </section>

	 <section id="BarMobile" class="bg-white collapse display-None">
		
		<div class="bcg-ini btn-group navbar-displayNone width-T100">
			
			<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="btn btn-outline-primary border-0 bd-RdNull py-2">
				<i class="fas fa-map-marker-alt"></i><br>
				<small>Nossas Lojas</small>
			</a>

			<button type="button" class="btn btn-outline-primary border-0 bd-RdNull py-2" data-toggle="modal" data-target="#ModalConsultationRegions">
				<i class="fas fa-truck"></i><br>
				<small>Regiões</small>
			</button>

			<button type="button" class="btn btn-outline-primary border-0 bd-RdNull py-2" data-toggle="modal" data-target="#ModalConsultationHorary">
				<i class="far fa-clock"></i><br>
				<small>Horários</small>
			</button>

			<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/" class="btn btn-outline-primary border-0 bd-RdNull py-2">
				<i class="far fa-user"></i><br>
				<small>Entrar</small>
			</a>
			
		</div>

		<div id="DepartamentosMobile" class="navbar-displayNone">

			<a class="btn border border-left-0 border-right-0 w-100 bd-RdNull py-SubMobile text-left" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
				<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Inicio</b>
			</a>

			<div class="btn-group w-100">
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" id="BarLimpeza" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Limpeza</b>
				</a>
				<button type="button" class="btn border border-top-0 bd-RdNull" data-toggle="collapse" data-target="#SubBarLimpeza" aria-expanded="false" aria-controls="SubBarLimpeza" onclick="ShowHideSubBarMobile('SubBarLimpeza', 'SubMenuLimpeza')">
					<i id="SubMenuLimpeza" class="fas fa-chevron-down text-dark"></i>
				</button>
			</div>

			<div id="SubBarLimpeza" class="collapse bg-light">
				
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Produto #1</b>
				</a>

				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Produto #2</b>
				</a>
				
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Produto #3</b>
				</a>
				
			</div>

			<div class="btn-group w-100">
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" id="BarOtsDep" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Outros Departamentos</b>
				</a>
				<button type="button" class="btn border border-top-0 bd-RdNull" data-toggle="collapse" data-target="#SubBarOtsDep" aria-expanded="false" aria-controls="SubBarOtsDep" onclick="ShowHideSubBarMobile('SubBarOtsDep', 'SubMenuOtsDep')">
					<i id="SubMenuOtsDep" class="fas fa-chevron-down text-dark"></i>
				</button>
			</div>

			<div id="SubBarOtsDep" class="collapse bg-light">
				
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Produto #1</b>
				</a>

				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Produto #2</b>
				</a>
				
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-dark">Produto #3</b>
				</a>
				
			</div>
			
			
		</div>
	
	 </section>
	 
	  <div class="bg-primary bar-display">
		  
		  <div class="ct-center">
			  <nav class="navbar navbar-expand-sm navbar-light bcg-ini ct-ini" id="main_navbar">

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

				  <ul class="navbar-nav">

						<li class="nav-item dropdown btn btn-light btn-sm rounded-pill p-0 my-auto">

						  <a class="nav-link text-primary align-top" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								 <i class="fas fa-bars"></i> Departamentos
						  </a>

						  <ul class="dropdown-menu rounded ml-3" aria-labelledby="navbarDropdown">

								<li class="nav-item dropdown">
									<a class="dropdown-item text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Limpeza
									</a>

									<!-- WARNING: STYLE CANNOT BE REMOVED, STYLE OF UTMOST IMPORTANCE -->
									<ul class="dropdown-menu row DropDownIni-Menu" aria-labelledby="navbarDropdown1" style="top: -30%;"> 

										<a class="ml-3 h5" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search"><b>Limpeza</b></a>

										<div class="ml-2 d-flex flex-row">

											<div class="p-2">
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #1</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #2</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #3</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #4</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #5</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #6</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #7</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #8</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #9</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #10</a>
											</div>

										</div>

									</ul>

								</li>

								<li class="nav-item dropdown">
									<a class="dropdown-item text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Bebidas
									</a>

									<!-- WARNING: STYLE CANNOT BE REMOVED, STYLE OF UTMOST IMPORTANCE -->
									<ul class="dropdown-menu row DropDownIni-Menu" style="top: -130%" aria-labelledby="navbarDropdown1"> 

										<a class="ml-3 h5" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search"><b>Bebidas</b></a>

										<div class="ml-2 d-flex flex-row">

											<div class="p-2">
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #1</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #2</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #3</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #4</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #5</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #6</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #7</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #8</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #9</a><br>
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/search" class="Line-2em">Item #10</a>
											</div>

										</div>

									</ul>

								</li>

							</ul>

						</li>

						<li class="nav-item text-break">

							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Bebidas</a>
							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Promoções</a>
							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Cupons</a>
							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Churrasco</a>
							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Dúvidas</a>
							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Cervejas</a>
							<a class="btn btn-primary rounded-pill px-btn text-light" href="#">Frutas</a>

						</li>


					</ul>

				</div>
			</nav>
	  	</div>  
	</div>