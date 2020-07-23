<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item active" aria-current="page">Login</li>
				</ol>
			</nav>

			<div id="BarLogin" class="text-center row">

				<form class="offset-md-2 col-md-4 py-4" method="POST">

					<p class="h2 font-weight-normal px-3">Seja Bem-vindo ao Ecommerce!</p>
	
					<p class="tx-IconCart mt-3">Para adicionar itens ao carrinho é preciso entrar em sua conta.</p>

					<p class="h3 font-weight-normal">Ja tenho cadastro</p>

					<div class="input-group text-center mt-4 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <span class="input-group-text null-bd bg-white" id="basic-addon1"><i class="far fa-envelope"></i></span>
						</div>

						<input type="email" class="form-control null-bd border-left-0 rounded-right" placeholder="Seu e-mail" aria-describedby="basic-addon1">
					
					</div>

					<div class="input-group text-center mt-3 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <button type="button" id="BtnLock" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('InputPassword', 'BtnLock', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock"></i></button>
						</div>

						<input type="password" id="InputPassword" class="form-control null-bd border-left-0 rounded-right" placeholder="Digite sua senha" aria-describedby="BtnLock" onpaste="return false" oncopy="return false"  oncut="return false">
	
					</div>

					<div class="row mt-3">
						<a class="col-md text-left text-dark text-decoration-none"><input type="checkbox"> Lembrar de mim</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/forgot-password/" class="col-md text-right text-dark text-decoration-none">Esqueci minha senha</a>
					</div>

					<div class="text-left mt-2">
						
					</div>

					<div class="mt-2">
						<button type="submit" class="btn btn-primary w-100"><i class="far fa-user"></i> Entrar</button>

						<hr>

						<button type="submit" class="btn btn-outline-danger w-100"><i class="fab fa-google"></i> Entrar com Gmail</button>
					</div>
				</form>

				<div class="col-md-4 border border-primary bd-RdLeft bg-primary bd-RdRight py-4 mx-2">
					
					<p class="h3 font-weight-normal text-white">Ainda não tem cadastro?</p>
					
					<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/register/" class="btn btn-outline-light border border-white mt-3 px-4"><i class="far fa-user"></i> Cadastre-se aqui</a>

					<img src="/resources/imgs/logos/logo-login.png" class="py-5 img-fluid bar-display">
				
				</div>

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