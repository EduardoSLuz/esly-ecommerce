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
								<i class="fas fa-check-square text-success"></i> Entrega/Retirada 
							</a>

							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/address/" class="btn btn-outline-light text-dark border py-3">
								<i class="fas fa-check-square text-success"></i> Endereço
							</a>

							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/horary/" class="btn btn-outline-light text-dark border py-3">
								<i class="fas fa-check-square text-success"></i> Horário
							</a>

							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/payment/" class="btn border btn-outline-light text-dark py-3">
								<i class="fas fa-check-square text-success"></i> Pagamento
							</a>
							
							<a class="btn border border-dark py-3">
								Resumo
							</a>
							
						</div>

					</div>

					<p class="tx-TitleMob font-weight-normal">Resumo da Compra - Confira os dados e finalize a compra</p>

					<p class="my-3 h6 font-weight-normal text-secondary">
						<i class="fas fa-shopping-cart"></i> Normal ou Express - Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
					</p>

					<hr>

					<div class="row">

						<div class="col-md-6">

							<div class="table-responsive mt-3">
								<div class="table-ini">
									<table class="table table-sm table-hover" >
										<thead>
										<tr class="tx-IconCart">
											<th class="font-weight-normal">Item</th>
											<th class="font-weight-normal text-center">Observação</th>
											<th class="font-weight-normal text-center">Quantidade</th>
											<th class="font-weight-normal text-center">Subtotal</th>
										</tr>
										</thead>
										<tbody>
											<tr class="tx-IconCart">
												<td>
													<p class="text-decoration-none text-dark mb-0">
														PANETTONE ARCOR PREMIUM CHOCOLATE 530G
													</p>
													<span> R$ 9,90 </span>
												</td>
												<td class="text-center">
													<span class="text-danger"> - </span>
												</td>
												<td class="text-center">
													<span> 1 </span>
												</td>
												<td class="text-center">
													<span> R$ 9,90 </span>
												</td>
											</tr>
		
											
											
										</tbody>
									</table>
								</div>
							
							</div>

						</div>

						<div class="col-md-6">

							<div class="table-responsive mt-3">
								<div class="table-ini">
									<table class="table table-sm table-striped" >
										<tbody>
											<tr class="tx-IconCart">
												<td class="py-2">
													<span>Agendamento de entrega/retirada</span>
												</td>
												<td class="py-2 text-right">
													<span class="font-weight-bold">Quarta-feira - 13:30 as 20:00</span>
												</td>
											</tr>

											<tr class="tx-IconCart">
												<td class="py-2">
													<span>Quem receberá as compras</span>
												</td>
												<td class="py-2 text-right">
													<span>User</span>
												</td>
											</tr>

											<tr class="tx-IconCart">
												<td class="py-2">
													<span>Pagamento na entrega/retirada com</span>
												</td>
												<td class="py-2 text-right">
													<span>Tipo pagamento</span>
												</td>
											</tr>

											<tr class="tx-IconCart">
												<td class="py-2">
													<span>Valor dos itens</span>
												</td>
												<td class="py-2 text-right">
													<span>R$ 9,90</span>
												</td>
											</tr>

											<tr class="tx-IconCart">
												<td class="py-2">
													<span>Agendamento</span>
												</td>
												<td class="py-2 text-right">
													<span>R$ 5,00</span>
												</td>
											</tr>

											<tr class="tx-IconCart">
												<td class="py-2">
													<span>Frete</span>
												</td>
												<td class="py-2 text-right">
													<span>R$ 10,00</span>
												</td>
											</tr>

											<tr class="tx-IconCart">
												<td class="pt-2">
													<span>TOTAL</span>
												</td>
												<td class="pt-2 pb-4 text-right">
													<span class="h5 font-weight-normal">R$ 24,90</span>
												</td>
											</tr>

										</tbody>
									</table>
								</div>
							
							</div>

							<div class="tx-09em">
								<span class="font-weight-bold">Endereço de entrega: </span>
								<p>Shis Qi 27, Bairro Conjunto 6, 88000000 - Brasília - Ponto de Referência perto do shopping</p>
							</div>

							<div class="tx-09em">
								<p class="h5">
									Aviso sobre o Pagamento <small>(Só se for depósito bancário)</small>
								</p>

								<p>
									
									<span>Depositar somente após receber a confirmação de separação dos itens pela nossa equipe:<br></span>

									<span class="font-weight-bold"><br>Conta para depósito:</span>
	
									<a>
										<br>
										<a>Agência: 0000<br></a>
										<a>Conta corrente: 00000-0<br></a>
										<a>Titular: Nome da loja<br></a>
										<a>CNPJ: 00.000.000/0000-00<br></a>
										<a>Banco: 000</a>
									</a>
								</p>
							</div>

						</div>

					</div>

					<div class="row my-4">
						
						<div class="col-6">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/payment/" class="btn btn-sm btn-light border border-black"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar a Pagamento</b></a>
						</div>

						<div class="col-6 text-right">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="btn btn-sm btn-primary">Finalizar Compra <i class="fas fa-arrow-right"></i></a>
						</div>

					</div>
				</div>
				
				<div class="col-md-3 mt-mobNavbar">

					<div id="PurchaseDetails">
						<p class="h6 font-weight-normal">Detalhes da compra</p>
						<hr>

						<div class="row my-2 tx-IconCart">
							<a class="col-6">Subtotal Carrinho:</a>
							<a class="col-6 text-right">R$ 9,90</a>
						</div>

						<div class="row my-2 tx-IconCart">
							<a class="col-6">Agendamento (Entrega):</a>
							<a class="col-6 text-right">R$ 5,00</a>
						</div>

						<div class="row my-2 tx-IconCart">
							<a class="col-6">Frete:</a>
							<a class="col-6 text-right">R$ 10,00</a>
						</div>

						<hr>

						<div class="text-right">
							<p>R$ 24,90</p>
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