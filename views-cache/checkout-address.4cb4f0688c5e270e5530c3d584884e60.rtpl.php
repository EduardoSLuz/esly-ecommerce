<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/">Cart</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">Checkout</li>
				</ol>
			</nav>

		

			<div class="row">

				<div class="col-md-9">

					<div class="bar-display">

						<div class="btn-group width-T100 mb-3">
				
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/delivery-pickup/" class="btn btn-outline-light text-dark border py-3">
								Entrega/Retirada <i class="fas fa-check-square text-success"></i>
							</a>

							<a class="btn border border-dark py-3">
								Endereço
							</a>

							<a class="btn border border-left-0 py-3">
								Horário
							</a>

							<a class="btn border py-3">
								Pagamento
							</a>
							
							<a class="btn border py-3">
								Resumo
							</a>
							
						</div>

					</div>

					<p class="h4 font-weight-normal">Endereço de Entrega</p>

					<p class="mt-3 h6 font-weight-normal text-secondary">
						<i class="fas fa-truck"></i> Express ou Normal - Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
					</p>

					<hr>

					<div class="row">
						<p class="tx-TitleMob font-weight-normal col-md-8">Selecione o endereço de entrega</p>

						<div class="col-md-4 text-right">
							<a class="btn btn-sm btn-light border border-dark" data-toggle="modal" data-target="#ModalConsultationRegions"><i class="fas fa-truck"></i> Regiões Atendidas</a>
						</div>
					</div>

						
					<div class="btn-group-toggle" data-toggle="buttons">

						<div class="mt-mobNavbar btn-group width-T100">
							
							<label id="BtnRadiosOne" class="btn btn-outline-dark BtnRadios" onclick="SelectBtnRadios('AddressOne', 'ContentAddress', 'BtnRadios', 'border-dark')">
								<input id="IptAddressOne" type="radio" checked>
							</label>

							<label id="AddressOne" class="border border-left-0 border-dark shadow-none btn text-left width-T100 py-3 ContentAddress" onclick="ExecuteClick('IptAddressOne')">
								<input type="checkbox">
								
								<p class="my-0">
									<span>Shis Qi 89, Bairro Conjunto 4, 88000001 - Brasília - Complemento Ao lado do shopping </span>
									<small><br>Frete + agendamento a partir de R$ 5,00</small>
								</p>
								
								<a class="text-dark h5" data-toggle="modal" data-target="#ModalAddress"><i class="far fa-edit"></i></a>
								<a class="text-dark h5" data-toggle="popover" data-placement="top" data-html="true" data-content="<p class='h6 font-weight-normal text-center'>Deseja realmente remover?<br> <a href='#' class='mt-2 btn btn-danger btn-sm'>Sim</a></p>"><i class="far fa-trash-alt"></i></a>

							</label>
							
						</div>

						<div class="mt-3 btn-group width-T100">
							
							<label id="BtnRadiosTwo" class="btn btn-outline-dark BtnRadios" onclick="SelectBtnRadios('AddressTwo', 'ContentAddress', 'BtnRadios', 'border-dark')">
								<input id="IptAddressTwo" type="radio">
							</label>

							<label id="AddressTwo" class="border border-left-0 shadow-none btn text-left width-T100 py-3 ContentAddress" onclick="ExecuteClick('IptAddressTwo')">
								<input type="checkbox">
								
								<p class="my-0">
									<span>Shis Qi 89, Bairro Conjunto 4, 88000001 - Brasília - Complemento Ao lado do shopping </span>
									<small><br>Frete + agendamento a partir de R$ 5,00</small>
								</p>
								
								<a class="text-dark h5" data-toggle="modal" data-target="#ModalAddress"><i class="far fa-edit"></i></a>
								<a class="text-dark h5" data-toggle="popover" data-placement="top" data-html="true" data-content="<p class='h6 font-weight-normal text-center'>Deseja realmente remover?<br> <a href='#' class='mt-2 btn btn-danger btn-sm'>Sim</a></p>"><i class="far fa-trash-alt"></i></a>
								
							</label>
							
						</div>
						
					</div>

					<div class="mt-3">
	
						<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAddress"><i class="fas fa-plus-circle"></i> Cadatrar endereço</button>

					</div>

					<div class="row my-4">
						
						<div class="col-6">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/delivery-pickup/" class="btn btn-sm btn-light border border-black"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar a Entrega/Retirada</b></a>
						</div>

						<div class="col-6 text-right">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/horary/" class="btn btn-sm btn-primary">Continuar <i class="fas fa-arrow-right"></i></a>
						</div>

					</div>
				</div>
				
				<div class="col-md-3 mt-mobNavbar">
					
					<div id="PurchaseDetails">
						<p class="h6 font-weight-normal">Detalhes da compra</p>
						<hr>

						<div class="row tx-IconCart">
							<a class="col-6">Subtotal Carrinho:</a>
							<a class="col-6 text-right">R$9,90</a>
						</div>

						<div class="row mt-2 tx-IconCart">
							<a class="col-6">Frete:</a>
							<a class="col-6 text-right">A Definir</a>
						</div>
					</div>

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
						
						<a class="btn btn-primary text-white w-100 mt-3" href="#">Acessar</a>

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

		<!-- MODAL Address  -->
		<div class="modal fade" id="ModalAddress" tabindex="-1" role="dialog" aria-labelledby="ModalAddress" aria-hidden="true">
			
			<div class="modal-dialog">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body px-4">
						
						<p class="h4 font-weight-normal"><i class="fas fa-map-marker-alt"></i> Cadastrar Endereço de Entrega</p>

						<div class="row">

							<div class="col-md-6">
								<label for="CityAddress">Cidade:</label>
								<select class="custom-select">
									<option>Selecione uma cidade</option>
									<option>Campo Grande - MS</option>
									<option>Corumba - MS</option>
								</select>
							</div>

							<div class="col-md-6">
								<label for="CepAddress">Cep:</label>
								<input type="text" class="form-control" id="CepAddress" name="CepAddress" placeholder="_____-___">
								<a class="tx-IconCart">Somente Números</a>
							</div>

							<div class="col-md-12">
								<label for="DistrictAddress">Bairro:</label>
								<input type="text" class="form-control" id="DistrictAddress" name="DistrictAddress">	
							</div>

							<div class="col-md-12">
								<label for="StreetAddress">Rua:</label>
								<input type="text" class="form-control" id="StreetAddress" name="StreetAddress">	
							</div>

							<div class="col-md-6">
								<label for="NumberAddress">Número:</label>
								<input type="text" class="form-control" id="NumberAddress" name="NumberAddress">	
							</div>

							<div class="col-md-6">
								<label for="ComplementAddress">Complemento:</label>
								<input type="text" class="form-control" id="ComplementAddress" name="ComplementAddress">	
							</div>

							<div class="col-md-12">
								<label for="ReferenceAddress">Ponto de Referência:</label>
								<input type="text" class="form-control" id="ReferenceAddress" name="ReferenceAddress">
								<a><input type="checkbox"> É o endereço principal</a>
							</div>

						</div>
						
					</div>

					<div class="modal-footer text-right px-4 pb-3">
						<button type="button" class="btn btn-light btn-sm border border-secondary" data-dismiss="modal">Sair</button>
						<button type="button" class="btn btn-primary btn-sm">Salvar</button>
					</div>
			  
				</div>
			
			</div>
		  
		</div>