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
				
							<a class="btn border border-dark py-3">
								Entrega/Retirada
							</a>

							<a class="btn border border-left-0 py-3">
								Endereço
							</a>

							<a class="btn border py-3">
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

					<p class="h4 font-weight-normal">Escolha Entregar ou Retirar no estabelecimento</p>

					<p class="mt-4 h6 font-weight-normal text-secondary">
						<i class="fas fa-store"></i> Unidade de atendimento: Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
					</p>

					<hr>

					<div class="btn-group-toggle" data-toggle="buttons">

						<div class="mt-3 btn-group rounded width-T100">
							
							<label id="BtnRadioOne" class="btn btn-outline-dark BtnRadios" onclick="SelectBtnRadios('FreightOne', 'ContentFreight', 'BtnRadios', 'border-dark'),AlterDisplay('PanelWithdrawal', 'PanelDelivery')">
								<input id="IptFreightOne" type="radio" name="" id="" checked> 
							</label>

							<label id="FreightOne"  class="btn text-left border border-left-0 border-dark ContentFreight width-T100 py-3" onclick="ExecuteClick('IptFreightOne')">
								<span>Retirar no estabelecimento</span>
							</label>
							
						</div>

						<div class="mt-3 btn-group width-T100 rounded">
							
							<label id="BtnRadioTwo"  class="btn btn-outline-dark BtnRadios" onclick="SelectBtnRadios('FreightTwo', 'ContentFreight', 'BtnRadios','border-dark'),AlterDisplay('PanelDelivery', 'PanelWithdrawal')">
								<input id="IptFreightTwo" type="radio" name="" id="">
							</label>

							<label id="FreightTwo" class="btn text-left border border-left-0 ContentFreight width-T100 py-3" onclick="ExecuteClick('IptFreightTwo')">
								<span>Entregar em algum endereço</span>
							</label>
							
						</div>
						
					</div>

					<div id="PanelWithdrawal" class="mt-3">
						
						<label for="InputNameWithdrawal" class="h6">Nome de quem retirará as compras:</label>

						<div class="input-group text-center px-0">

							<input type="text" id="InputNameWithdrawal" class="form-control" placeholder="Nome Completo">

						</div>

					</div>

					<div id="PanelDelivery" class="mt-3 d-none">

						<div class="offset-1">

							<p class="h4 font-weight-normal">Escolha o tipo de frete</p>

							<div class="btn-group-toggle" data-toggle="buttons">

								<div class="mt-3 btn-group rounded width-T100">
									
									<label id="BtnSubRadioOne" class="btn btn-outline-dark BtnSubRadios" onclick="SelectBtnRadios('SubFreightOne', 'ContentSubFreight', 'BtnSubRadios', 'border-dark')">
										<input id="IptSubFreightOne" type="radio" name="" id=""> 
									</label>
		
									<label id="SubFreightOne"  class="btn text-left border border-left-0 ContentSubFreight width-T100 py-3" onclick="ExecuteClick('IptSubFreightOne')">
										<span><b>Normal</b></span>
										<small><br><i>Frete grátis</i></small>
									</label>
									
								</div>
		
								<div class="mt-3 btn-group width-T100 rounded">
									
									<label id="BtnSubRadioTwo"  class="btn btn-outline-dark BtnSubRadios" onclick="SelectBtnRadios('SubFreightTwo', 'ContentSubFreight', 'BtnSubRadios','border-dark')">
										<input id="IptSubFreightTwo" type="radio" name="" id="">
									</label>
		
									<label id="SubFreightTwo" class="btn text-left border border-left-0 ContentSubFreight width-T100 py-3" onclick="ExecuteClick('IptSubFreightTwo')">
										<span><b>Express</b></span> <small>(Entrega em até 2 horas)</small>
										<small><br><i>Frete + Agendamento a partir de R$5,00</i></small>
									</label>
									
								</div>
							</div>

						</div>

						<label for="InputNameDelivery" class="h6 mt-3">Nome de quem receberá as compras:</label>

						<div class="input-group text-center px-0">

							<input type="text" id="InputNameDelivery" class="form-control" placeholder="Nome Completo">

						</div>

					</div>

					<div class="row my-4">
						
						<div class="col-6">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="btn btn-sm btn-light border border-black"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar ao carrinho</b></a>
						</div>

						<div class="col-6 text-right">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/address/" class="btn btn-sm btn-primary">Continuar <i class="fas fa-arrow-right"></i></a>
						</div>

					</div>

				</div>
				
				<div class="col-md-3 mt-mobile">
					
					<div id="PurchaseDetails">
						<p class="h6 font-weight-normal">Detalhes da compra</p>
						
						<hr>

						<div class="row tx-IconCart">
							<a class="col-6">Subtotal Carrinho:</a>
							<a class="col-6 text-right">R$9,90</a>
						</div>

						<hr>

						<div class="text-right">
							<p>R$9,90</p>
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