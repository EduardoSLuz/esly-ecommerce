<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="text-link-site-section">Carrinho</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Pagamento</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-9">

					<?php require $this->checkTemplate("checkoutLinks");?>

					<p class="h4 font-weight-normal text-second-site-section">Pagamento</p>

					<p class="mt-3 h6 font-weight-normal text-link-site-section">
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

					<p class="h4 my-4 font-weight-normal text-second-site-section">Escolha a forma de pagamento:</p>

					<form id="formCheckoutPayment" class="formCheckoutPayment" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
						<div>
							<ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
								<li class="nav-item" role="presentation"> 
								  <a class="nav-link text-second-site-section active" id="OptionFisic-tab" data-toggle="tab" href="#OptionFisic" role="tab" aria-controls="OptionFisic" aria-selected="true"><i class="fas fa-cart-arrow-down"></i> Na <?php if( $order["type"] == 1 ){ ?>Retirada<?php }else{ ?>Entrega<?php } ?></a>
								</li>
							</ul>
							
							<div class="tab-content border border-top-0 bg-white" id="myTabContent">
	
								<div class="tab-pane fade show active" id="OptionFisic" role="tabpanel" aria-labelledby="OptionFisic-tab">
									
									<div class="px-4 py-3">
										
										<?php $counter1=-1;  if( isset($cartPay) && ( is_array($cartPay) || $cartPay instanceof Traversable ) && sizeof($cartPay) ) foreach( $cartPay as $key1 => $value1 ){ $counter1++; ?>
										<?php if( $key1 == $order["type"] ){ ?>
										
										<?php $counter2=-1;  if( isset($value1["pays"]) && ( is_array($value1["pays"]) || $value1["pays"] instanceof Traversable ) && sizeof($value1["pays"]) ) foreach( $value1["pays"] as $key2 => $value2 ){ $counter2++; ?>
										<button type="button" id="divPay<?php echo htmlspecialchars( $value2["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="selectPay btn btn-sm btn-light w-100 text-left border rounded p-2 my-2" data-div="<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	
											<span class="h6 font-weight-normal">
												<img src="/resources/imgs/cards-payment/<?php echo htmlspecialchars( $value2["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
											</span>
											<i id="iconCheck" class=""></i>
											<input type="checkbox" class="inputType d-none" name="inputType" value="<?php echo htmlspecialchars( $value2["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			
										</button>
										<?php } ?>

										<?php } ?>

										<?php } ?>
	
										<div id="divDinheiro" class="divPay d-none">
	
											<label for="inputMoney" class="font-weight-bold text-second-site-section">Informe o valor abaixo para o troco:</label>
											
											<div class="input-group">
												
												<div class="input-group-prepend">
												  <span class="input-group-text text-second-site-section">R$</span>
												</div>
	
												<input id="inputMoney" name="inputMoney" type="text" class="maskMoney form-control" disabled>
												
											</div>
		
										</div>
	
									</div>
	
								</div>
	
								<div class="tab-pane fade" id="OptionOnline" role="OptionOnline" aria-labelledby="OptionOnline-tab"></div>
	
							</div>
							
							<div id="alertCheckoutPayment" class='alert alert-dismissible fade d-none text-left mt-2' role="alert">
								<span class="msgAlert">Msg</span>
							</div>

						</div>

						<div class="row my-4">
							
							<div class="col-lg-6 col-3">
								<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/horary/" class="btn btn-sm btn-light border border-dark"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar a Horário de <?php if( $order["type"] == 1 ){ ?>Retirada<?php }else{ ?>Entrega<?php } ?></b></a>
							</div>
	
							<div class="col-lg-6 col-9 text-right">
								
								<div id="overlayCheckoutPayment" class="btn d-none">
									<div class="overlay d-flex justify-content-center align-items-center">
										<i class="fas fa-1x fa-sync fa-spin"></i>
									</div>
								</div>

								<button type="submit" class="btn btn-sm btn-main-site-section text-btn-site-section">Continuar <i class="fas fa-arrow-right"></i></button>
							
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

						<?php if( $order["type"] == 2 && isset($order["freight"]) && $order["freight"] >= 0 ){ ?>
						<div class="row my-2 tx-IconCart">
							<a class="col-6 text-second-site-section">Frete:</a>
							<a class="col-6 text-second-site-section text-right"><?php if( $order["freight"] == 0 ){ ?><span class="text-success">Grátis</span><?php }else{ ?>R$ <?php echo maskPrice($order["freight"]); ?><?php } ?></a>
						</div>
						<?php } ?>

						<?php if( isset($order["horary"]) && isset($order["horary"]["price"]) && $order["horary"]["price"] >= 0 ){ ?>
						<div class="row my-2 tx-IconCart">
							<a class="col-6 text-second-site-section">Agendamento (<?php if( $order["type"] == 1 ){ ?>Retirada<?php }else{ ?>Entrega<?php } ?>):</a>
							<a class="col-6 text-second-site-section text-right"><?php if( $order["horary"]["price"] == 0 ){ ?><span class="text-success">Grátis</span><?php }else{ ?>R$ <?php echo maskPrice($order["horary"]["price"]); ?><?php } ?></a>
						</div>
						<?php } ?>

						<hr>

						<div class="text-second-site-section text-right">
							<p>R$ <?php echo maskPrice(($cart["totalCart"] + $order["freight"] + $order["horary"]["price"])); ?></p>
						</div>
					</div>

				</div>
				
			</div>
		
		</div>

	</section>