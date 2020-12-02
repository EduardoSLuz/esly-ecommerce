<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
  <head>

	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo strstr($store["0"]["nameStore"], " ", true); ?> | <?php echo htmlspecialchars( $headerTitle, ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
    
    <!-- Bootstrap -->   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d83003de32.js" crossorigin="anonymous"></script>
	
	<!-- Plugin BootStrap Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	
	<!-- JS DO GOOGLE RECAPTCHA -->
	<script src="https://www.google.com/recaptcha/api.js"></script>

	<!-- Select2 -->
	<link rel="stylesheet" href="/resources/admin/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="/resources/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!--  Custom CSS  -->
	<link href="/resources/css/esly-area.css" rel="stylesheet">  
	<link href="/resources/css/esly-carousel.css" rel="stylesheet">  
	<link href="/resources/css/esly-containers.css" rel="stylesheet">  
	<link href="/resources/css/esly-effect.css" rel="stylesheet">  
	<link href="/resources/css/esly-form.css" rel="stylesheet">  
	<link href="/resources/css/esly-text.css" rel="stylesheet">  
 	<link rel="stylesheet" href="/resources/css/bootnavbar.css">
 	<link rel="stylesheet" href="/resources/css/barnav.css">
	<link rel="stylesheet" href="/resources/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/resources/css/owl.theme.default.min.css">  
	<link rel="icon" type="image" href='<?php if( $ID != 0 ){ ?><?php echo htmlspecialchars( $imgs["5"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?><?php echo htmlspecialchars( $imgs["6"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>

	<?php if( isset($layoutColor["0"]) && is_array($layoutColor["0"]) ){ ?><?php require $this->checkTemplate("../resources/js/html/layout");?><?php } ?>
	  
  </head>
  <body class="bg-site-section">
	
	<?php if( $type === 1 ){ ?>
	
	<section class="bg-site-header bar-display shadow-header">
	
		<div class="bcg-ini ct-center py-1">
		
			<div class="ct-ini">
				
				<div class="row text-site-header">

					<div class="col-6">
						<span><small>
							Você esta navegando na 
							<a class="cursorPointer text-site-header" data-toggle="modal" data-target="#ModalAlterStores">
								<b><u>loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></u></b> 
								<i class="fas fa-angle-down"></i>
							</a>
							<?php if( isset($storeSocial) && $storeSocial != 0 ){ ?>
							<?php $counter1=-1;  if( isset($storeSocial["0"]) && ( is_array($storeSocial["0"]) || $storeSocial["0"] instanceof Traversable ) && sizeof($storeSocial["0"]) ) foreach( $storeSocial["0"] as $key1 => $value1 ){ $counter1++; ?>
								<?php if( $value1["idSocialType"] != 5 && $value1["idSocialType"] != 6 ){ ?>
								<a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="text-site-header mx-1"><i class="<?php echo htmlspecialchars( $value1["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
								<?php } ?>   
							<?php } ?>
							<?php } ?>
						</small></span>
					</div>

					<div class="col-6">
						<div class="text-right">

							<small>
								
								<a class="text-site-header cursorPointer" data-toggle="modal" data-target="#ModalConsultationRegions">
									<i class="fas fa-truck"></i> 
									Regiões Atendidas
								</a> &nbsp; 
								
								<a class="text-site-header cursorPointer" data-toggle="modal" data-target="#ModalConsultationHorary">
									<i class="far fa-clock"></i> 
									Horários
								</a> &nbsp;
								
								<a class="text-site-header" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/">
									<i class="fas fa-map-marker-alt"></i> 
									Todas as lojas
								</a> &nbsp;
								
								<a id="telStore" class="text-site-header cursorPointer">
									<i class="fas fa-mobile-alt"></i> 
									<?php echo maskTel($store["0"]["telephoneStore"]); ?>
								</a>

								<?php if( $userValues["login"] ){ ?><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/logout/" class="text-site-header"><i class="fas fa-sign-out-alt"></i> Sair</a><?php } ?>
							
							</small>

						</div>
					
					</div>
				
				</div>
			
			</div>	
		
		</div>
	
	</section>
		
	<section id="Navbar-Desktop" class="bg-site-header sticky-top">
		
		<div class="navbar-prime">
			
			<div class="ct-center">

				<nav class="navbar navbar-expand-lg row">
				
					<a class="col-lg-2 col-md-4 col-3" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
						<picture>
							<source srcset="<?php echo htmlspecialchars( $imgs["5"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" media="(max-width: 600px)">
							<img src="<?php echo htmlspecialchars( $imgs["2"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="d-inline-block align-top img-fluid logo-responsive" alt="Logo Loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</picture>
					</a>
	
					<div class="col navbar-display my-0 px-0">
						
						<div class="btn-group w-100">
							<button type="button" class="btn btn-sm btn-main-site-header text-site-header border-0" onclick="ShowHideBarMobile()" data-toggle="collapse" data-target="#BarMobile" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
								<i id="MenuMobile" class="fas fa-bars"></i><br>
								<small>Menu</small>
							</button>
							<button type="button" class="btn btn-sm btn-main-site-header text-site-header border-0" onclick="AlterNavbar('Navbar-Desktop', 'NavbarMobile-Pesquisa')">
								<i class="fas fa-search"></i><br>
								<small>Buscar</small>
							</button>
							<button type="button" class="btn btn-sm btn-main-site-header text-site-header border-0" data-toggle="modal" data-target="#ModalAlterStores">
								<i class="fas fa-store"></i><br>
								<small>Lojas</small>
							</button>
						</div>
						
					</div>
	
					<div class="collapse navbar-collapse col" id="navbarNav">
						
						<ul class="navbar-nav w-100 d-flex">
							<li class="nav-item flex-fill">
								
								<form method="GET" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/" class="mb-0">
									
									<div class="input-group w-100 bg-white rounded-0 mt-3">

										<input type="search" class="form-control null-bd" placeholder="Encontre um produto" data-action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/menu/" id="listSearch" name="s" value='<?php if( isset($s) ){ ?><?php echo htmlspecialchars( $s, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' autocomplete="off">

										<div class="input-group-prepend">
											
											<?php if( 0 == 1 ){ ?>
											<button type="button" class="bg-white null-bd" id="Btn-Audio">
												<a href="#"><i class="fas fa-microphone <?php echo htmlspecialchars( $layout["txH3Layout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
											</button>
											<?php } ?>

											<button type="submit" class="ml-1 bg-white null-bd px-3" id="Btn-Search">
												<i class="fas fa-search text-main-site-header"></i>
											</button>
											
										</div>

										<div id="menuSearch" class="dropdown-menu dropdown-menu-left w-100 py-0 rounded-0" >
									
											<div id="menuProducts" class="list-group my-0">

												<p class="my-2 px-2">Buscar algum produto</p>

											</div>
											
										</div>

									</div>
								</form>

							</li>
	
							<a class="cursorPointer">
								<button class="nav-item ml-3 text-center text-light btn btn-main-site-header text-site-header" data-toggle="modal" data-target="#ModalAlterStores">
									<i class="fas fa-store"></i><br>
									<small>Lojas</small>					
								</button>
							</a>
							<a id="loginUser" href='/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php if( $userValues["login"] ){ ?>account/requests<?php }else{ ?>login<?php } ?>/'>
								<button class="nav-item text-center text-light btn btn-main-site-header text-site-header">
									<i class="far fa-user"></i><br>
									<small><?php if( $userValues["login"] ){ ?><?php echo substr($userValues["nameUser"], 0, 12); ?><?php }else{ ?>Conta<?php } ?></small>						
								</button>
							</a>
							
							<div id="dropdownBootstrap" class="btn-group dropdownBootstrap">

								<button class="text-center btn btn-main-site-header text-site-header" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/')">
									<i class="fas fa-shopping-cart"></i>	
									<br><small id="cartUser"><b><?php if( $cart === false ){ ?>0<?php }else{ ?> <?php if( $cart["items"] == 0 ){ ?>0<?php }else{ ?><?php echo htmlspecialchars( $cart["totalItems"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?> <?php } ?></b></small>						
								</button>

								<div id="dropdownMenuBootstrap" class="mt-1 dropdown-menu menu-right dropdown-menu-right bg-site-section " style="max-height: 628.275px;width: 350px" aria-labelledby="dropdownMenuReference">
									
									<?php if( $cart["items"] != 0 ){ ?>
									<div class="px-3">
										<div class="table-responsive">
											<div class="table-ini">
												
												<?php $counter1=-1;  if( isset($cart["items"]) && ( is_array($cart["items"]) || $cart["items"] instanceof Traversable ) && sizeof($cart["items"]) ) foreach( $cart["items"] as $key1 => $value1 ){ $counter1++; ?>
												<div class="border-bottom text-second-site-section py-2">
													<span><?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
													<small><br><?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> X R$ <?php echo maskPrice($value1["priceItem"]); ?></small>
												</div>
												<?php } ?>
	
											</div>
										</div>
										
										<div class="py-2">
											<span class="text-link-site-section font-weight-bold">
												Subtotal: 
												<span class="text-second-site-section">R$ <?php echo maskPrice($cart["totalCart"]); ?></span>
											</span>
										</div>
										
										<div class="text-center mb-2">
											<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="btn btn-sm btn-main-site-section text-btn-site-section w-100">Ver Carrinho</a>
										</div>
									</div>
									<?php }else{ ?>
									<div class="text-center">
										<span class="px-2 text-second-site-section"><i>SEM ITENS NO CARRINHO!</i></span>
									</div>
									<?php } ?>
								</div>

							</div>
							
						</ul>
					
					</div>
				
				</nav>
		
			</div>

		</div>

		<div id="alertBoxCartNot" class="position-fixed my-lg-0 my-2 offset-lg-9 col-lg-3 offset-md-8 col-md-4 d-none">

			<div id="alertCartNot" class="alert alert-success fade text-center my-0" role="alert">
							
				<span class="msgAlert">Produto Adicionado ao Carrinho</span>
				
			</div>
	
		</div>
	
	</section>

	<section id="NavbarMobile-Pesquisa" class="bg-site-header display-None">
			
		<nav class="navbar navbar-expand-lg">
					
			<div class="btn-group width-T100">

				<form class="input-group bg-white border border-white-50 bd-Rd10" method="GET" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/">&nbsp;
							
					<input type="search" class="form-control null-bd" placeholder="Encontre um produto" name="s" value='<?php if( isset($s) && !empty($s) ){ ?><?php echo htmlspecialchars( $s, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' autocomplete="off">

					<div class="input-group-prepend">
						
						<?php if( 0 == 1 ){ ?>
						<button type="button" class="bg-white null-bd" id="Btn-AudioMob">
							<a href="#"><i class="fas fa-microphone <?php echo htmlspecialchars( $layout["txH3Layout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></a>
						</button>
						<?php } ?>

						<button type="submit" class="ml-1 bg-white null-bd" id="Btn-SearchMob">
							<i class="fas fa-search text-main-site-header"></i>
						</button>&nbsp;&nbsp;
						
					</div>

				</form>

				<button type="button" class="btn btn-main-site-header text-site-header" bd-RdNull" onclick="AlterNavbar('NavbarMobile-Pesquisa', 'Navbar-Desktop')">Voltar</button>

			</div>
		
		</nav>

	</section>

	<section id="BarMobile" class="bg-site-section collapse display-None">
		
		<div class="bcg-ini btn-group navbar-displayNone width-T100"> 
			
			<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="btn btn-outline-main-site-header text-btn-site-header border-0 bd-RdNull">
				<i class="fas fa-map-marker-alt"></i><br>
				<small>Lojas</small>
			</a>

			<button type="button" class="btn btn-outline-main-site-header text-btn-site-header border-0 bd-RdNull" data-toggle="modal" data-target="#ModalConsultationRegions">
				<i class="fas fa-truck"></i><br>
				<small>Regiões</small>
			</button>

			<button type="button" class="btn btn-outline-main-site-header text-btn-site-header border-0 bd-RdNull" data-toggle="modal" data-target="#ModalConsultationHorary">
				<i class="far fa-clock"></i><br>
				<small>Horários</small>
			</button>

			<a href='/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/<?php if( $userValues["login"] ){ ?>account/requests/<?php }else{ ?>login/<?php } ?>' class="btn btn-outline-main-site-header text-btn-site-header border-0 bd-RdNull">
				<i class="far fa-user"></i><br>
				<small><?php if( $userValues["login"] ){ ?><?php echo substr($userValues["nameUser"], 0, 12); ?><?php }else{ ?>Entrar<?php } ?></small>
			</a>

			<?php if( $userValues["login"] ){ ?>
				<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/logout/" class="btn btn-outline-main-site-header text-btn-site-header border-0 bd-RdNull">
					<i class="fas fa-sign-out-alt"></i><br>
					<small>Sair</small>
				</a>
			<?php } ?>
			
		</div>

		<div id="DepartamentosMobile" class="navbar-displayNone">

			<a class="btn border border-left-0 border-right-0 w-100 bd-RdNull py-SubMobile text-left" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
				<b class="font-weight-normal mx-2 tx-SubMobile text-second-site-section">Inicio</b>
			</a>

			<?php if( isset($departaments) && $departaments != 0 ){ ?>
			
			<?php $counter1=-1;  if( isset($departaments) && ( is_array($departaments) || $departaments instanceof Traversable ) && sizeof($departaments) ) foreach( $departaments as $key1 => $value1 ){ $counter1++; ?>
			<?php if( $key1 <= 12 ){ ?>
			<?php $departamentos = $value1["name"]; ?>
			<div class="btn-group w-100">
				<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" id="Bar<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-second-site-section"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
				</a>
				<button type="button" class="btn border border-top-0 bd-RdNull" data-toggle="collapse" data-target="#SubBar<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-expanded="false" aria-controls="SubBar<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="ShowHideSubBarMobile('SubBar<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>', 'SubMenu<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')">
					<i id="SubMenu<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="fas fa-chevron-down text-second-site-section"></i>
				</button>
			</div>

			<div id="SubBar<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="collapse bg-light">
				
				<?php if( isset($value1["category"]) && is_array($value1["category"]) && count($value1["category"]) > 0 ){ ?>
				<?php $counter2=-1;  if( isset($value1["category"]) && ( is_array($value1["category"]) || $value1["category"] instanceof Traversable ) && sizeof($value1["category"]) ) foreach( $value1["category"] as $key2 => $value2 ){ $counter2++; ?>
				<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $departamentos, ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn border border-top-0 border-left-0 border-right-0 bd-RdNull w-100 text-left py-SubMobile">
					<b class="font-weight-normal mx-2 tx-SubMobile text-second-site-section"><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
				</a>
				<?php } ?>
				<?php } ?>
				
			</div>
			<?php } ?>
			<?php } ?>

			<a class="btn border border-left-0 border-right-0 w-100 bd-RdNull py-SubMobile text-left" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/">
				<b class="font-weight-normal mx-2 tx-SubMobile text-second-site-section">VER TODOS</b>
			</a>

			<?php }else{ ?>
			<a class="btn border border-left-0 border-right-0 w-100 bd-RdNull py-SubMobile text-left">
				<b class="font-weight-normal mx-2 tx-SubMobile text-second-site-section">SEM DEPARTAMENTOS</b>
			</a>
			<?php } ?>
			
		</div>
	
	</section>
		
	<section class="bg-site-header bar-display">
			
			<div class="ct-center">
				<nav class="navbar navbar-expand-sm main_navbar bcg-ini ct-ini" id="main_navbar">

				<div class="collapse navbar-collapse" id="navbarSupportedContent">

					<ul class="navbar-nav w-100 row">

						<li class="nav-item dropdown btn btndep-site-header btn-sm p-auto my-auto col-md-1">

							<a class="text-main-site-header nav-item align-top h4" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-bars"></i>
							</a>

								<ul class="dropdown-menu bg-site-section rounded ml-2 menu-left" aria-labelledby="navbarDropdown">
								
								<?php if( isset($departaments) && $departaments != 0 ){ ?>
								
								<?php $counter1=-1;  if( isset($departaments) && ( is_array($departaments) || $departaments instanceof Traversable ) && sizeof($departaments) ) foreach( $departaments as $key1 => $value1 ){ $counter1++; ?>
								<?php if( $key1 < 12 ){ ?>
								<li class="nav-item text-dep-site-header dropdown">
									<a class="dropdown-item text-decoration-none border d-flex" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/')">
										<span class="flex-grow-1 pr-2"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> <span class="pl-2"><i class="fas fa-angle-right"></i></span>
									</a>

									<!-- WARNING: STYLE CANNOT BE REMOVED, STYLE OF UTMOST IMPORTANCE -->
									<ul class="dropdown-menu bg-site-section row DropDownIni-Menu" aria-labelledby="navbarDropdown1" style="top: <?php echo htmlspecialchars( $value1["top"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%;"> 

										<a class="ml-3 h5 text-dep-site-header" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/"><b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></a>
										<?php $departamentos = $value1["name"]; ?>
										<div class="ml-2 d-flex flex-row">

											<div class="px-2">
												<?php $counter2=-1;  if( isset($value1["category"]) && ( is_array($value1["category"]) || $value1["category"] instanceof Traversable ) && sizeof($value1["category"]) ) foreach( $value1["category"] as $key2 => $value2 ){ $counter2++; ?>
												<?php if( $key2 < 10 ){ ?>
												<p class="Line-2em my-1"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $departamentos, ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-decoration-none text-dep-site-header"><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
												<?php } ?>
												<?php } ?>
											</div>

											<div class="px-2">
												<?php $counter2=-1;  if( isset($value1["category"]) && ( is_array($value1["category"]) || $value1["category"] instanceof Traversable ) && sizeof($value1["category"]) ) foreach( $value1["category"] as $key2 => $value2 ){ $counter2++; ?>
												<?php if( $key2 >= 10 && $key2 < 20 ){ ?>
												<p class="Line-2em my-1"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $departamentos, ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-decoration-none text-dep-site-header"><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
												<?php } ?>
												<?php } ?>
											</div>

											<div class="px-2">
												<?php $counter2=-1;  if( isset($value1["category"]) && ( is_array($value1["category"]) || $value1["category"] instanceof Traversable ) && sizeof($value1["category"]) ) foreach( $value1["category"] as $key2 => $value2 ){ $counter2++; ?>
												<?php if( $key2 >= 20 && $key2 < 29 ){ ?>
												<p class="Line-2em my-1"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $departamentos, ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-decoration-none text-dep-site-header"><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
												<?php } ?>
												<?php } ?>
												
												<?php if( count($value1["category"]) >= 30 ){ ?>
												<p class="Line-2em"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/" class="text-decoration-none text-dep-site-header">VER TODOS</a></p>
												<?php } ?>
											</div>

										</div>

									</ul>

								</li>
								<?php } ?>
								<?php } ?>

								<?php }else{ ?>
								<li class="nav-item text-dep-site-header dropdown">
									<a class="dropdown-item text-decoration-none border d-flex" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span class="flex-grow-1 pr-2">SEM DEPARTAMENTOS</span></span>
									</a>

								</li>
								<?php } ?>

								<?php if( isset($departaments) && $departaments != 0 && count($departaments) >= 11 ){ ?>
								<li class="nav-item text-dep-site-header dropdown">
									<a class="dropdown-item text-decoration-none border d-flex" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/')">
										<span class="flex-grow-1 pr-2">MAIS DEPARTAMENTOS</span> <span class="pl-2"><i class="fas fa-angle-right"></i></span>
									</a>

									<!-- WARNING: STYLE CANNOT BE REMOVED, STYLE OF UTMOST IMPORTANCE -->
									<ul class="dropdown-menu row DropDownIni-Menu" style="top: <?php echo htmlspecialchars( $departaments["0"]["topMax"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%" aria-labelledby="navbarDropdown1"> 

										<a class="ml-3 h5 text-dep-site-header" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/"><b>Mais Departamentos</b></a>

										<div class="ml-2 d-flex flex-row">

											<div class="px-2">
												<?php $counter1=-1;  if( isset($departaments) && ( is_array($departaments) || $departaments instanceof Traversable ) && sizeof($departaments) ) foreach( $departaments as $key1 => $value1 ){ $counter1++; ?>
												<?php if( $key1 >= 12 && $key1 < 22 ){ ?>
												<p class="Line-2em my-1"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="text-decoration-none text-dep-site-header"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
												<?php } ?>
												<?php } ?>
											</div>

											<div class="px-2">
												<?php $counter1=-1;  if( isset($departaments) && ( is_array($departaments) || $departaments instanceof Traversable ) && sizeof($departaments) ) foreach( $departaments as $key1 => $value1 ){ $counter1++; ?>
												<?php if( $key1 >= 22 && $key1 < 32 ){ ?>
												<p class="Line-2em my-1"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="text-decoration-none text-dep-site-header"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
												<?php } ?>
												<?php } ?>
											</div>

											<div class="px-2">
												<?php $counter1=-1;  if( isset($departaments) && ( is_array($departaments) || $departaments instanceof Traversable ) && sizeof($departaments) ) foreach( $departaments as $key1 => $value1 ){ $counter1++; ?>
												<?php if( $key1 >= 32 && $key1 < 42 ){ ?>
												<p class="Line-2em my-1"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="text-decoration-none text-dep-site-header"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
												<?php } ?>
												<?php } ?>
												
												<?php if( count($departaments) >= 42 ){ ?>
												<p class="Line-2em"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/" class="text-decoration-none text-dep-site-header">VER TODOS</a></p>
												<?php } ?>
											</div>

										</div>

									</ul>

								</li>
								<?php } ?>

							</ul>

						</li>


						<li class="nav-item text-break d-flex col-md-11">
							
							<?php $counter1=-1;  if( isset($layoutHeader) && ( is_array($layoutHeader) || $layoutHeader instanceof Traversable ) && sizeof($layoutHeader) ) foreach( $layoutHeader as $key1 => $value1 ){ $counter1++; ?>
							<a class='btn btn-main-site-header text-site-header flex-fill text-light <?php if( $value1["status"] == 0 ){ ?>invisible<?php } ?>' href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
							<?php } ?>

						</li>


					</ul>

				</div>
			</nav>
			</div>  
	</section>
		
	<?php }else{ ?>

		<section class="bg-site-header sticky-top">
		
			<div class="abs-center-x bcg-ini">
	
				<nav class="navbar navbar-expand-lg sticky-top bar-ini bg-site-header">
	
					<a href="/" class="navbar-brand abs-center-x">
						<img src="<?php echo htmlspecialchars( $imgs["0"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Logo Astemac" width="240px" height="66px" class="img-fluid">
					</a>
			
				</nav>
		
			</div>
		
		</section>	

	<?php } ?>