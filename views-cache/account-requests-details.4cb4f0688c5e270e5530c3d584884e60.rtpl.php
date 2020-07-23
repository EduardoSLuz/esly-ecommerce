<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/">Account</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/">Requests</a></li>
				  <li class="breadcrumb-item active" aria-current="page">Request #1</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<div class="list-group">
						<a class="list-group-item list-group-item-action py-4 font-weight-light">
							<span class="h5 font-weight-normal">User</span>
							<span><br>9 de Julho de 2020 às 14:40</span>
						</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="list-group-item list-group-item-action"><i class="fas fa-shopping-bag"></i> Pedidos</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/shopping-list/" class="list-group-item list-group-item-action"><i class="far fa-heart"></i> Lista de compra</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/" class="list-group-item list-group-item-action"><i class="far fa-user"></i> Meus dados</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/" class="list-group-item list-group-item-action"><i class="fas fa-map-marker-alt"></i> Endereços</a>
						<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/logout/" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Sair</a>
					</div>

				</div>

				<div class="col-md">
					<p class="h4 font-weight-normal">Pedidos #1</p>

					<div class="mt-3">
						<table class="table table-hover tx-IconCart mb-0">
							<tbody>
								<tr>
									<td class="p-4">
										<p>
											<span>Loja:</span>
											<span><br>Loja 01</span>
										</p>
			
										<p>
											<span>Endereço:</span>
											<span><br>Rua Itaberaba 740, Bairro Centro, 88000-000 - Florianópolis/SC</span>
										</p>
			
										<p>
											<span>Fone:</span>
											<span><br>(00) 00000-0000</span>
										</p>
			
										<p>
											<span>Whatsapp:</span>
											<span><br>(00) 00000-0000</span>
										</p>
			
										<p>
											<span>Email:</span>
											<span><br>Suporte@email.com</span>
										</p>
									</td>
									<td class="p-4">
										<p class="font-weight-bold">
											<span>Status do pedido:</span>
											<span class="text-danger"><br>Pendente</span>
										</p>
			
										<p>
											<span>Modalidade:</span>
											<span class="h6"><br>Entregar</span>
										</p>
			
										<p>
											<span>Forma de pagamento:</span>
											<span><br>Elo</span>
										</p>
			
										<p>
											<span>Reagendamento para:</span>
											<span><br>20 de Julho de 2020: 08:00 as 12:00</span>
										</p>
			
										<p>
											<span>Endereço de entrega:</span>
											<span><br>Shis Qi 27, Bairro Conjunto 6, 88000000 - Brasília - Ponto de Referência perto do shopping</span>
										</p>
			
										<p>
											<span>Nome de quem receberá as compras:</span>
											<span><br>Eduardo luz</span>
										</p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="table-responsive-lg">
						<table class="table table-sm table-hover tx-IconCart text-truncate">
							<thead>
							  <tr class="text-center">
								<th class="font-weight-normal text-left">Item</th>
								<th class="font-weight-normal">Observação</th>
								<th class="font-weight-normal">Quantidade</th>
								<th class="font-weight-normal">Preço unidade</th>
								<th class="font-weight-normal">Subtotal</th>
							  </tr>
							</thead>
							<tbody>
								<tr class="cursorPointer text-center" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<th scope="row" class="py-2 text-left">
										<a class="font-weight-normal">
											PANETTONE ARCOR PREMIUM CHOCOLATE 530G
										</a>
									</th>
									<td class="py-2">
										<a class="text-decoration-none text-danger h5"> - </a>
									</td>
									<td class="py-2">
										<a class="text-decoration-none text-dark">1</a>
									</td>
									<td class="py-2">
										<a class="text-decoration-none text-dark">
											R$ 9,90
										</a>
									</td>
									<td class="py-2">	
										<a class="text-decoration-none text-dark">
											R$ 9,90
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="row">
						<div class="col-6">
							<button type="button" class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart"></i> Recomprar Itens</button>
						</div>
						
						<div class="col-6 text-right">
							<p class="tx-IconCart">
								<span>Valor dos itens: R$ 9,90</span>
								<span><br>Frete + agendamento: R$ 10,00</span>
								<span class="font-weight-bold"><br>TOTAL: R$ 14,90</span>
							</p>
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
				
			<div class="list-group">
				<a class="list-group-item list-group-item-action py-4 font-weight-light">
					<span class="h5 font-weight-normal">User</span>
					<span><br>9 de Julho de 2020 às 14:40</span>
				</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="list-group-item list-group-item-action"><i class="fas fa-shopping-bag"></i> Pedidos</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/shopping-list/" class="list-group-item list-group-item-action"><i class="far fa-heart"></i> Lista de compra</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/" class="list-group-item list-group-item-action"><i class="far fa-user"></i> Meus dados</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/" class="list-group-item list-group-item-action"><i class="fas fa-map-marker-alt"></i> Endereços</a>
				<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/logout/" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Sair</a>
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
						
						<button class="btn btn-primary text-white w-100 mt-3">Acessar</button>

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