<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/">Login</a></li>
				  <li class="breadcrumb-item active" aria-current="page">ForgotPassword</li>
				</ol>
			</nav>

			<div id="BarLogin" class="text-center">

				<form class="offset-md-3 col-md-6 py-3" method="POST">

					<p class="h4 font-weight-normal">Redefinir Senha</p>

					<p class="h6 font-weight-normal text-secondary mt-3">
						Esqueceu a sua senha? Insira o seu endereço de e-mail abaixo, e lhe enviaremos um e-mail permitindo que a redefina.
					</p>

					<div class="input-group text-center mt-4 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <span class="input-group-text null-bd bg-white" id="basic-addon1"><i class="far fa-envelope"></i></span>
						</div>

						<input type="text" class="form-control null-bd border-left-0 rounded-right" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1">
					
					</div>

					<div class="mt-3" align="center">
						<div class="g-recaptcha" data-sitekey="6LevbfwUAAAAAJiitBmG-CqLM9NYIhfQaFJHdeaF"></div>
					</div>
					
					<button type="submit" class="btn btn-primary w-100 mt-5">Recuperar Senha</button>
					<p class="h6 font-weight-normal text-secondary mt-2">
						Por favor, contacte-nos se tiver qualquer problema para redefinir a sua senha.
					</p>

				</form>


			</div>
			
		</div>

	</section>

	<!-- MODALS PAGE INICIO -->

		<!-- MODAL ALTER STORES -->
		<div class="modal fade" id="ModalAlterStores" tabindex="-1" role="dialog" aria-labelledby="ModalAlterStores" aria-hidden="true">
			
			<div class="modal-dialog modal-dialog-centered modal-sm">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">
				  
						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body">
						
						<h4 class="text-center">
							Seja bem vindo!
						</h4>

						<p>
							Em qual das lojas você deseja acessar?
						</p>
						
						<select name="SelectStoresModal" id="SelectStoresModal" class="custom-select">
							<option value="1">Loja 01</option>
							<option value="2">Loja 02</option>
							<option value="3">Loja 03</option>
						</select>
						
						<button type="button" class="btn btn-primary text-white w-100 mt-3">Acessar</button>

						<p class="mt-2">
							Não encontrou a loja? No momento, o serviço de delivery está atendendo à algumas regiões.
						</p>

						<p>
							Conheça todas as lojas disponíveis para as compras.
						</p>
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL CONSULTATION REGIONS  -->
		<div class="modal fade" id="ModalConsultationRegions" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationRegions" aria-hidden="true">
			
			<div class="modal-dialog modal-dialog-centered modal-sm">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0 pb-2">
						
						<h5 class="text-left">
							<i class="fas fa-truck"></i> Regiões Atendidas
						</h5>

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body py-0">
						
						<h5 class="font-weight-normal">Loja 01</h5>
						<hr>

						<ul class="txList-StyleNone text-left">
							<li><i class="fas fa-map-marker-alt"></i> Centro</li>
							<li><i class="fas fa-map-marker-alt"></i> Jardim Noroeste</li>
							<li><i class="fas fa-map-marker-alt"></i> Jardim São Conrado</li>
							<li><i class="fas fa-map-marker-alt"></i> Nova Bahia</li>
							<li><i class="fas fa-map-marker-alt"></i> Tiradentes</li>
						</ul>
						
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL CONSULTATION HORARY  -->
		<div class="modal fade" id="ModalConsultationHorary" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationHorary" aria-hidden="true">
			
			<div class="modal-dialog modal-lg">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body">
						
						<div class="row">

							<div class="col-md">
								
								<p class="h5">
									Horários de retirada
								</p>

								<p class="mt-3">
									<b>Segunda-Feira:</b><br>
									09:00 - 12:00<br>
									14:00 - 18:00
								</p>

								<p>
									<b>Terça-Feira até Sexta-Feira:</b><br>
									08:00 - 12:00<br>
									13:00 - 20:00
								</p>

								<p>
									<b>Sábado e Domingo</b><br>
									09:00 - 15:00<br>
									
								</p>

							</div>

							<div class="col-md">
								
								<p class="h5">
									Horários de Entrega
								</p>

								<label for="SelectRegionModal">Escolha um região:</label><br>
								<div class="input-group">
									
									<select id="SelectRegionModal" class="custom-select">
										<option>Centro</option>
										<option>Jardim Noroeste</option>
										<option>Jardim São Conrado</option>
									</select>

									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
									</div>
								</div>


							</div>

						</div>
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>
			
    
	<!-- Bootstrap - Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	  
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
	  
	<!-- Bootstrap - jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<!-- JS DO GOOGLE RECAPTCHA -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script src="js/bootnavbar.js"></script>
	<script src="js/owl.carousel.min.js"></script>  
	<script src="js/index.js"></script>  
	  
    <script>
		
		$(function () {
            $('#main_navbar').bootnavbar({
                //option
                animation: false
            });
        })
		
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

		window.addEventListener('resize', function () {
			//var altura = window.innerHeight;
			var largura = window.innerWidth;

			if (largura < 992){
				$('#ColSearchMaster').removeClass("col-md-10").addClass("col-md-12");
				$('.ColunaCardsSearch').removeClass("col-md-3").addClass( "col" );			
			}
			else{
				$('#ColSearchMaster').removeClass("col-md-12").addClass("col-md-10");
				$('.ColunaCardsSearch').removeClass("col").addClass("col-md-3");	
			}
		});

		$(document).ready(function(){
			//var altura = window.innerHeight;
			var largura = window.innerWidth;

			if (largura < 992){
				$('#ColSearchMaster').removeClass("col-md-10").addClass("col-md-12");
				$('.ColunaCardsSearch').removeClass("col-md-3").addClass( "col" );
			}
			else{
				$('#ColSearchMaster').removeClass("col-md-12").addClass("col-md-10");
				$('.ColunaCardsSearch').removeClass("col").addClass("col-md-3");	
			}
 		});
		
    </script>
  </body>
</html>