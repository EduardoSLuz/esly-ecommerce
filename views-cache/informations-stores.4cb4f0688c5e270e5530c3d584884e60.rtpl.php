<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item active" aria-current="page">Nossas Lojas</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<div class="list-group">
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="list-group-item list-group-item-action">Sobre a empresa</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="list-group-item list-group-item-action list-group-item-primary active">Nossas Lojas</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="list-group-item list-group-item-action">Parceiros</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="list-group-item list-group-item-action">Perguntas Frequentes</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="list-group-item list-group-item-action">Fale Conosco</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="list-group-item list-group-item-action">Trabalhe Conosco</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="list-group-item list-group-item-action">Promoções</a>
					</div>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal">Nossas Lojas</p>
					<hr>
					
					<div class="row">
						<div class="col-sm-6 mb-4">
							<div class="card">
								
								<img src="/resources/imgs/banners/lojas/loja01.jpg" class="card-img-top max-height2" alt="...">
								
								<div class="card-body">
								  	<p class="card-title h5 font-weight-normal">Loja 01 - Matriz</p>
									
									<p class="card-text font-weight-normal">
										<i class="fas fa-map-marker-alt"></i> <a>Av. Mato Grosso, 2621 - Centro, Campo Grande - MS, 79020-150</a><br>
										<i class="fas fa-phone-alt"></i> <a>(67) 98765-4532</a><br>
										<i class="fab fa-whatsapp"></i> <a>(67) 98765-4532</a><br>
										<i class="far fa-envelope"></i> <a>email@contato.com.br</a><br>
										
										<a class="font-weight-bold">Horario de Atendimento:</a><br>
										<a class="mt-2">Segunda a Sexta: 08:00 - 20:00</a><br>
										<a class="mt-2">Sábado: 08:00 - 17:00</a><br>
										<a class="mt-2">Domingo: 08:00 - 19:00</a>
					
									</p>
								</div>
							</div>
						</div>

						<div class="col-sm-6 mb-4">
							<div class="card">
								
								<img src="/resources/imgs/banners/lojas/loja02.jpg" class="card-img-top max-height2" alt="...">
								
								<div class="card-body">
								  	<p class="card-title h5 font-weight-normal">Loja 02</p>
									
									<p class="card-text font-weight-normal">
										<i class="fas fa-map-marker-alt"></i> <a>Av. Mato Grosso, 2621 - Centro, Campo Grande - MS, 79020-150</a><br>
										<i class="fas fa-phone-alt"></i> <a>(67) 98765-4532</a><br>
										<i class="fab fa-whatsapp"></i> <a>(67) 98765-4532</a><br>
										<i class="far fa-envelope"></i> <a>email@contato.com.br</a><br>
										
										<a class="font-weight-bold">Horario de Atendimento:</a><br>
										<a class="mt-2">Segunda a Sexta: 08:00 - 20:00</a><br>
										<a class="mt-2">Sábado: 08:00 - 17:00</a><br>
										<a class="mt-2">Domingo: 08:00 - 19:00</a>
					
									</p>
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="card">
								
								<img src="/resources/imgs/banners/lojas/loja03.jpg" class="card-img-top max-height2" alt="...">
								
								<div class="card-body">
								  	<p class="card-title h5 font-weight-normal">Loja 03</p>
									
									<p class="card-text font-weight-normal">
										<i class="fas fa-map-marker-alt"></i> <a>Av. Mato Grosso, 2621 - Centro, Campo Grande - MS, 79020-150</a><br>
										<i class="fas fa-phone-alt"></i> <a>(67) 98765-4532</a><br>
										<i class="fab fa-whatsapp"></i> <a>(67) 98765-4532</a><br>
										<i class="far fa-envelope"></i> <a>email@contato.com.br</a><br>
										
										<a class="font-weight-bold">Horario de Atendimento:</a><br>
										<a class="mt-2">Segunda a Sexta: 08:00 - 20:00</a><br>
										<a class="mt-2">Sábado: 08:00 - 17:00</a><br>
										<a class="mt-2">Domingo: 08:00 - 19:00</a>
					
									</p>
								</div>
							</div>
						</div>

					  </div>

				</div>

			</div>
			
		</div>

	</section>

	<div id="mySidenav" class="sidenav shadow cart-BtnFloat">
		<a href="javascript:void(0)" class="closebtn text-dark" onclick="closeNav()">
			<i class="fas fa-times h4"></i>
		</a>
		
		<div class="mx-3">

			<p class="h5 font-weight-normal">Outras Páginas</p>
				
			<div class="list-group mt-3">
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="list-group-item list-group-item-action">Sobre a empresa</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="list-group-item list-group-item-action list-group-item-primary active">Nossas Lojas</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="list-group-item list-group-item-action">Parceiros</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="list-group-item list-group-item-action">Perguntas Frequentes</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="list-group-item list-group-item-action">Fale Conosco</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="list-group-item list-group-item-action">Trabalhe Conosco</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="list-group-item list-group-item-action">Promoções</a>
			</div>
			
		</div>

	</div>
	
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