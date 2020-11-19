<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="text-link-site-section">Carrinho</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Endereço de Entrega</li>
				</ol>
			</nav>

		

			<div class="row">

				<div class="col-md-9">

					<?php require $this->checkTemplate("checkoutLinks");?>

					<p class="h4 font-weight-normal text-second-site-section">Endereço de Entrega</p>

					<p class="mt-4 h6 font-weight-normal text-link-site-section">
						<i class="fas fa-store"></i> 
						Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?> 
						<?php if( isset($order) && isset($order["type"]) && $order["type"] == 2 ){ ?>
						- <i class="fas fa-truck"></i> Frete: <b>
							<i>
								<?php if( $order["typeFreight"] == 0 ){ ?>Normal<?php }else{ ?>Express<?php } ?>
							</i>
					 	</b> 
						<?php } ?>
					</p>

					<hr>

					<div class="row">
						<p class="tx-TitleMob font-weight-normal text-second-site-section col-md-8">Selecione o endereço de entrega</p>

						<div class="col-md-4 text-right">
							<a class="btn btn-sm btn-light border border-dark" data-toggle="modal" data-target="#ModalConsultationRegions"><i class="fas fa-truck"></i> Regiões Atendidas</a>
						</div>
					</div>

					<div id="alertCheckoutAddress">
						
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<?php } ?>

					</div>

					<form id="formCheckoutAddress" class="formCheckoutAddress" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

						<div class="">
							<?php if( $address != 0 ){ ?>
							<?php $counter1=-1;  if( isset($address) && ( is_array($address) || $address instanceof Traversable ) && sizeof($address) ) foreach( $address as $key1 => $value1 ){ $counter1++; ?>
	
							<?php if( $value1["freight"] != 0 ){ ?>
							<div class="optionCheckouAddressPm border mx-auto my-2 row rounded bg-white">

								<div class='col-md-11 p-md-3 pt-2 cursorPointer optionCheckouAddress <?php if( isset($order) && $order != 0 && $order["address"] == $value1["idAddress"] || isset($order["address"]) && $order["address"] == 0 && $key1 == 0 ){ ?>clickMe<?php } ?>'>
									<span class="h6 font-weight-normal text-second-site-section"> 
										<?php echo htmlspecialchars( $value1["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($value1["cep"]); ?> 
										<small><br>Frete + agendamento a partir de R$ <?php echo maskPrice($value1["freight"] + $priceHorary["0"]); ?></small>
									</span> 
									<i class='iconCheck d-none fas fa-check'></i>
									<input type="checkbox" class="checkboxAddress d-none" name="inputAddress" value="<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-price="<?php echo htmlspecialchars( $value1["freight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								</div>

								<div class="col-md-1 p-md-3 pb-2 text-md-right">
									
									<a href="#" class="text-dark" data-toggle="modal" data-target="#ModalAddress" data-modal-title="Alterar Endereço de Entrega" data-type="2" data-code="<?php echo htmlspecialchars( $value1["code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-city="<?php echo htmlspecialchars( $value1["codeCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cep='<?php echo maskCep($value1["cep"]); ?>' data-district="<?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-street="<?php echo htmlspecialchars( $value1["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-number="<?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-complement="<?php echo htmlspecialchars( $value1["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-reference="<?php echo htmlspecialchars( $value1["reference"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-main="<?php echo htmlspecialchars( $value1["mainAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-edit"></i></a> 

								</div>

							</div>
							<?php } ?>
	
							<?php } ?>
							<?php }else{ ?>
							<p class="h5 text-second-site-section">
								<b>
									Nenhum endereço cadastrado ou válido! 
									<small class="font-weight-light"><br>*Se ja possuir um endereço tente mudar o tipo de frete*</small>
								</b>
							</p>
							<?php } ?>
						</div>
	
						<div class="mt-3">
		
							<button type="button" class="btn btn-sm btn-outline-second-site-section" data-toggle="modal" data-target="#ModalAddress" data-modal-title="Cadastrar Endereço de Entrega" data-type="1" data-code="0" data-city="0" data-cep="" data-district="" data-street="" data-number="" data-complement="" data-reference="" data-main="0"><i class="fas fa-plus-circle"></i> Cadastrar endereço</button>
	
						</div>
	
						<div class="row my-4">
							
							<div class="col-6">
								<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/delivery-pickup/" class="btn btn-sm btn-light border border-dark"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar a Entrega/Retirada</b></a>
							</div>
	
							<div class="col-6 text-right">
								<button type="submit" class="btn btn-sm btn-main-site-section text-btn-site-section">Continuar <i class="fas fa-arrow-right"></i></a>
							</div>
	
						</div>

					</form>
					
				</div>
				
				<div class="col-md-3 mt-mobNavbar">
					
					<div id="PurchaseDetails">
						<p class="h6 font-weight-normal text-second-site-section">Detalhes da compra</p>
						<hr>

						<div class="row my-2 tx-IconCart">
							<a class="col-6 text-second-site-section">Subtotal Carrinho:</a>
							<a class="col-6 text-second-site-section text-right">R$ <?php echo maskPrice($cart["totalCart"]); ?></a>
						</div>

						<div class="row my-2 tx-IconCart">
							<a class="col-6 text-second-site-section">Frete:</a>
							<a class="col-6 text-second-site-section text-right">A Definir</a>
						</div>
					</div>

				</div>
				
			</div>
		
		</div>

	</section>