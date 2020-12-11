<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="text-link-site-section">Carrinho</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Entregar ou Retirar</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-9">

					<?php require $this->checkTemplate("checkoutLinks");?>

					<p class="h4 font-weight-normal text-second-site-section">Escolha Entregar ou Retirar no estabelecimento</p>

					<p class="mt-4 h6 font-weight-normal text-link-site-section">
						<i class="fas fa-store"></i> 
						Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?> 
						<?php if( isset($order) && isset($order["type"]) && $order["type"] == 2 ){ ?>
						- <i class="fas fa-truck"></i> Frete: 
						<b>
							<i>
								<?php if( $order["typeFreight"] == 0 ){ ?>Normal<?php }else{ ?>Express<?php } ?>
							</i>
					 	</b> 
						<?php } ?>
					</p>

					<hr>

					<form id="formCheckoutPrime" class="formCheckoutPrime" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
						<div>

							<button type="button" id="divStore" class='selectType cursorPointer border rounded btn w-100 text-left py-3 px-2 my-2 <?php if( isset($order) && $order != 0 && $order["type"] == 1 || isset($order) && $order == 0 ){ ?>clickMe<?php } ?> bg-white' data-text="irá retirar" data-div="">

								<span class="titleSelect h6 font-weight-normal text-second-site-section">Retirar no estabelecimento </span><i id="iconCheck" class=""></i>
								<input type="checkbox" class="inputType d-none" name="inputType" value="1">

							</button>

							<button type="button" id="divDelivery" class='selectType cursorPointer border rounded btn w-100 text-left py-3 px-2 my-2 <?php if( isset($order) && $order != 0 && $order["type"] == 2 ){ ?>clickMe<?php } ?> bg-white' data-text="receberá" data-div="PanelDelivery">

								<span class="titleSelect h6 font-weight-normal text-second-site-section">Entregar em algum endereço </span><i id="iconCheck" class=""></i>
								<input type="checkbox" class="inputType d-none" name="inputType" value="2">

							</button>

						</div>
	
						<div id="PanelDelivery" class="divSelect mt-3 d-none">
	
							<div class="offset-1">
	
								<p class="h4 font-weight-normal text-second-site-section">Escolha o tipo de frete <small class="h6 font-weight-light">*Valores podem mudar de acordo com o endereço de entrega*</small></p>
	
								<div>
	
									<?php if( $freight != 0 ){ ?>
									<?php $counter1=-1;  if( isset($freight) && ( is_array($freight) || $freight instanceof Traversable ) && sizeof($freight) ) foreach( $freight as $key1 => $value1 ){ $counter1++; ?>
									
									<?php if( $value1 != 0 ){ ?>
									<button type="button" id="divFreigth<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class='selectFreigth cursorPointer border rounded btn w-100 text-left py-3 px-2 my-2 <?php if( isset($order) && $order != 0 && $order["typeFreight"] == $key1 && $order["type"] == 2 || isset($order["type"]) && $order["type"] == 1 && $key1 == 0 || !isset($order["type"]) && $key1 == 0 ){ ?>clickMe<?php } ?> bg-white' data-text="retirará" data-div="">

										<span class="titleSelect h6 font-weight-normal text-second-site-section">
											<b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
											<i><br><?php if( $value1["value"] == 0 ){ ?>Frete Grátis<?php }else{ ?>A partir de R$ <?php echo maskPrice($value1["value"]); ?><?php } ?></i> 
										</span> 
										<i id="iconCheck" class=''></i>
										<input type="checkbox" class="inputFreigth d-none" name="inputFreight" value="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		
									</button>
									<?php } ?>

									<?php } ?>
									<?php }else{ ?>
									<p class="text-second-site-section"><b>Sem dados</b></p>
									<?php } ?>
	
								</div>
	
							</div>
	
						</div>

						<div class="mt-3">

							<div id="alertCheckoutPrime" class='alert alert-dismissible fade d-none text-left' role="alert">
								<span class="msgAlert">Msg</span>
							</div>
							
							<label for="inputName" class="h6 text-second-site-section">Nome de quem <a id="textType">irá retirar</a> as compras:</label>
	
							<div class="input-group text-center px-0">
	
								<input type="text" id="inputName" name="inputName" class="form-control" placeholder="Nome Completo" required value='<?php if( $order != 0 ){ ?><?php echo htmlspecialchars( $order["resp"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?><?php echo htmlspecialchars( $userValues["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userValues["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
	
							</div>
	
						</div>
	
						<div class="row my-4">
							
							<div class="col-lg-6 col-3">
								<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="btn btn-sm btn-light border border-dark"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar ao carrinho</b></a>
							</div>
	
							<div class="col-lg-6 col-9 text-right">
								
								<div id="overlayCheckoutPrime" class="btn d-none">
									<div class="overlay d-flex justify-content-center align-items-center">
										<i class="fas fa-1x fa-sync fa-spin"></i>
									</div>
								</div>

								<button type="submit" class="btn btn-sm btn-main-site-section text-btn-site-section">Continuar <i class="fas fa-arrow-right"></i></button>
							</div>
	
						</div>
					</form>

				</div>
				
				<div class="col-md-3 mt-mobile">
					
					<div id="PurchaseDetails">
						<p class="h6 text-second-site-section">Detalhes da compra</p>
						
						<hr>

						<div class="row tx-IconCart py-1">
							<a class="col-6 text-second-site-section">Subtotal Carrinho:</a>
							<a class="col-6 text-right text-second-site-section">R$ <?php echo maskPrice($cart["totalCart"]); ?></a>
						</div>

						<div class="row tx-IconCart py-1">
							<a class="col-6 text-second-site-section">Frete:</a>
							<a class="col-6 text-right text-second-site-section">A Definir</a>
						</div>

						<hr>

						<div class="text-right">
							<p class="text-second-site-section">R$ <?php echo maskPrice($cart["totalCart"]); ?></p>
						</div>
					</div>
					
				</div>
				
			</div>
		
		</div>

	</section>
