<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item active" aria-current="page">Parceiros</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<div class="list-group">
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="list-group-item list-group-item-action">Sobre a empresa</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="list-group-item list-group-item-action">Nossas Lojas</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="list-group-item list-group-item-action list-group-item-primary active">Parceiros</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="list-group-item list-group-item-action">Perguntas Frequentes</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="list-group-item list-group-item-action">Fale Conosco</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="list-group-item list-group-item-action">Trabalhe Conosco</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="list-group-item list-group-item-action">Promoções</a>
					</div>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal">Parceiros</p>
					<hr>
					
					<div class="row">
						
						<div class="col-sm-3 mb-4">
							<div class="card">
								
								<a class="px-3" href="https://www.cocacola.com.br/" target="_blank">
									<img src="/resources/imgs/banners/partners/coca-cola2.png" class="card-img-top img-sizeCard" alt="...">
								</a>
								
								<div class="card-body py-5 text-center">
									  
									<a class="card-title h4 font-weight-normal text-decoration-none text-dark" href="https://www.cocacola.com.br/" target="_blank">Coca-Cola</a>
									
								</div>

								<div class="card-footer text-center py-4">
								
									<a class="text-decoration-none text-secondary" href="https://www.cocacola.com.br/" target="_blank">Ir para página</a>
								
								</div>

							</div>
						</div>

						<div class="col-sm-3 mb-4">
							<div class="card">
								
								<a class="px-3" href="https://www.ambev.com.br/" target="_blank">
									<img src="/resources/imgs/banners/partners/ambev.png" class="card-img-top img-sizeCard" alt="...">
								</a>
								
								<div class="card-body py-5 text-center">
									  
									<a class="card-title h4 font-weight-normal text-decoration-none text-dark" href="https://www.ambev.com.br/" target="_blank">Ambev</a>
									
								</div>

								<div class="card-footer text-center py-4">
								
									<a class="text-decoration-none text-secondary" href="https://www.ambev.com.br/" target="_blank">Ir para página</a>
								
								</div>

							</div>
						</div>

						<div class="col-sm-3 mb-4">
							<div class="card">
								
								<a class="px-3" href="https://www.unilever.com.br/" target="_blank">
									<img src="/resources/imgs/banners/partners/unilever.png" class="card-img-top img-sizeCard" alt="...">
								</a>
								
								<div class="card-body py-5 text-center">
									  
									<a class="card-title h4 font-weight-normal text-decoration-none text-dark" href="https://www.unilever.com.br/" target="_blank">Unilever</a>
									
								</div>

								<div class="card-footer text-center py-4">
								
									<a class="text-decoration-none text-secondary" href="https://www.unilever.com.br/" target="_blank">Ir para página</a>
								
								</div>

							</div>
						</div>

						<div class="col-sm-3 mb-4">
							<div class="card">
								
								<a class="px-3" href="https://www.nestle.com.br/" target="_blank">
									<img src="/resources/imgs/banners/partners/nestle.jpg" class="card-img-top img-sizeCard" alt="...">
								</a>
								
								<div class="card-body py-5 text-center">
									  
									<a class="card-title h4 font-weight-normal text-decoration-none text-dark" href="https://www.nestle.com.br/" target="_blank">Nestle</a>
									
								</div>

								<div class="card-footer text-center py-4">
								
									<a class="text-decoration-none text-secondary" href="https://www.nestle.com.br/" target="_blank">Ir para página</a>
								
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
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="list-group-item list-group-item-action">Nossas Lojas</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="list-group-item list-group-item-action list-group-item-primary active">Parceiros</a>
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