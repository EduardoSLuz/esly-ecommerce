<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Astemac | E-commerce</title>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">     
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!--  Custom Css  -->
	<link href="resources/css/index.css" rel="stylesheet"> 
  
  </head>
  <body class="bg-light">
	
	<div class="bg-white sticky-top">
		
		<div class="abs-center-x bcg-ini">

			<nav class="navbar navbar-expand-lg sticky-top bar-ini">

				<a href="/" class="navbar-brand text-primary abs-center-x">
					<img src="resources/imgs/logos/logo.png" alt="Logo Astemac" width="240px" height="66px" class="img-fluid">
				</a>
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="text-primary"><i class="fas fa-bars"></i></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
					<ul class="navbar-nav mr-auto"> </ul>

					<form class="form-inline my-2 my-lg-0">

						<ul class="navbar-nav mr-auto">
					
							<li class="nav-item">
								<a class="nav-link text-primary" href="#"><i class="fas fa-user"></i></a>
							 </li>
						
						</ul>	
				
					</form>
			
				</div>
		
			</nav>
	
		</div>
	
	</div>	
	
	  
	<section class="abs-center-x bcg-ini">
		<div id="img-logoInicial" class="img-fluid img-LogoIni">
			<div class="ct-carousel">
				<div>
					
					<br><br><br>
					<p class="text-primary h3 tx-2em">INFORME SUA<br>
					<label class="text-primary tx-2em">CIDADE <i class="fas fa-map-marker-alt"></i></label></p>
					<select class="custom-select custom-select-lg slt-customLg text-capitalize bg-light border">
						<option>Todas cidades</option>
						<option>Campo Grande - MS</option>
						<option>Dourados - MS</option>
						<option>Aquidauna - MS</option>
					</select><br>
					<input type="button" class="btn btn-primary btn-lg mt-2 ipt-customLg" value="Encontrar lojas"><br><br><br>
				
				</div>
			</div>
		</div>	
	</section>  
	  
	<section class="ct-center mt-5">
		
		<div class="ct-ini">
			<p id="Title-Pes-Lojas" class="tx-title">Acesse todas as lojas</p>

			<div class="card-deck mt-4">
				<div class="card">

					<div class="mt-4 mx-5 mb-3">
						<img class="card-img px-4" src="resources/imgs/logos/logo.png" alt="Loja1">
					</div>

					<div class="card-body">
							<p class="card-title h4 font-weight-normal">Loja 1</p>
							<p class="card-text text-secondary">
								<i class="fas fa-map-marker-alt"></i> Av. Mato Grosso, 2621 - Centro, Campo Grande - MS, 79020-150 <br>							
								<i class="fas fa-mobile-alt"></i> (67) 98765-4532 <br>
								<i class="far fa-envelope"></i> email@contato.com.br <br>
								<i class="fab fa-whatsapp"></i> (67) 98765-4532 
							</p>
						</div>
						<div class="card-footer text-center">
							<a href="/loja-01" class="btn btn-primary shadow-Btn">Acessar loja</a>
						</div>
				</div>

				<div class="card">

					<div class="mt-4 mx-5 mb-3">
						<img class="card-img px-4" src="resources/imgs/logos/logo.png" alt="Loja2">
					</div>

					<div class="card-body">
							<p class="card-title h4 font-weight-normal">Loja 2</p>
							<p class="card-text text-secondary">
								<i class="fas fa-map-marker-alt"></i> Av. Mato Grosso, 2621 - Centro, Campo Grande - MS, 79020-150 <br>							
								<i class="fas fa-mobile-alt"></i> (67) 98765-4321 <br>
								<i class="far fa-envelope"></i> email@contato.com.br <br>
								<i class="fab fa-whatsapp"></i> (67) 98765-4321 
							</p>
						</div>
						<div class="card-footer text-center">
							<a href="/loja-02/" class="btn btn-primary shadow-Btn">Acessar loja</a>
						</div>
				</div>

				<div class="card">

					<div class="mt-4 mx-5 mb-3">
						<img class="card-img px-4" src="resources/imgs/logos/logo.png" alt="Loja3">
					</div>

					<div class="card-body">
							<p class="card-title h4 font-weight-normal">Loja 3</p>
							<p class="card-text text-secondary">
								<i class="fas fa-map-marker-alt"></i> Av. Mato Grosso, 2621 - Centro, Campo Grande - MS, 79020-150 <br>							
								<i class="fas fa-mobile-alt"></i> (67) 98765-4532 <br>
								<i class="far fa-envelope"></i> email@contato.com.br <br>
								<i class="fab fa-whatsapp"></i> (67) 98765-4532 
							</p>
						</div>
						<div class="card-footer text-center">
							<a href="/loja-03/" class="btn btn-primary shadow-Btn">Acessar loja</a>
						</div>
				</div>

			</div>
		</div>	
	</section>
	  
	<footer id="Footer-RedesSociais" class="bg-primary mt-5">
		
		<div class="bcg-ini ct-center">
			
			<div class="text-right text-light py-2">
				<a class="font-weight-normal">Redes Sociais:</a>
				<a href="https://instagram.com/" target="__blank" class="text-light h5"><i class="fab fa-instagram"></i></a>&nbsp;   
				<a href="https://www.facebook.com/" target="__blank" class="text-light h5"><i class="fab fa-facebook-square"></i></a>&nbsp;  
				<a href="https://www.twitter.com/" target="__blank" class="text-light h5"><i class="fab fa-twitter-square"></i></a>&nbsp; 
				<a href="https://www.youtube.com/" target="__blank" class="text-light h5"><i class="fab fa-youtube"></i></a>  
			</div>
		
		</div>	

	</footer>
	  
	<section id="FooterInfo" class="mt-5 ct-center mb-5">
		
		<div class="ct-ini row">
			
			<div class="col-md-4 mt-mob">
				
				<p class="h6">Suporte</p>
				<hr>
				<p class="h6 font-weight-normal">
					<i class="fas fa-phone-alt"></i> (67) 9876-5432 <br>
					<i class="fab fa-whatsapp mt-4"></i> (67) 98765-4321 <br>
					<i class="far fa-envelope mt-4"></i> Suporte@astemacms.com.br
				</p>
			
			</div>
			
			
			<div class="col-md-4 mt-mob">
				
				<p class="h6">Site Seguro</p>
				<hr>
				
				<p>
				
					<div class="row ml-1">
						
						<img src="resources/imgs/cards-security/google_security.png" alt="Google_Security" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Google" width="150" height="50">
						
						<img src="resources/imgs/cards-security/Certising.png" alt="Certising" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Certising" width="100" height="50">
						
					</div>
					
				</p>
				
			</div>

			<div class="col-md-4 mt-mob">
				
				<p class="h6">Baixe Nosso App</p>
				<hr>
				
				<p>
				
					<div class="row ml-1">
						
						<a class="btn btn-light border" target="_blank" href="https://play.google.com">
							<i class="fab fa-google-play"></i>
							<span class="h6">Play Store</span>
						</a>
						
					</div>
					
				</p>
				
			</div>
		
		</div>
	  
	</section>

	<section class="bg-primary">
		
		<div class="ct-center">
			<div class="py-2">

				<div class="row text-light">

					<div class="col-7">
						<a class="tx-footer"><b>© Astemac / 00.000.000/0000-00</b></a>
					</div>

					<div class="col-5">
						<div class="text-right">

							<b class="tx-footer">Desenvolvido por: <a href="https://astemac.com.br" target="_blank" class="text-light h5">Astemac</a></b>

						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
    
	<!-- Bootstrap - Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	  
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
	  
	<!-- Bootstrap - jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<!-- Custom Javascripts -->
	<script src="resources/js/index.js"></script>
	  
  </body>
</html>