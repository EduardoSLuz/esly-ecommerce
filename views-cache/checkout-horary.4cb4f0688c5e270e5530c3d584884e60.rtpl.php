<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="text-link-site-section">Carrinho</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Agendar Horário</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-9">

					<?php require $this->checkTemplate("checkoutLinks");?>

					<p class="h4 font-weight-normal text-second-site-section">Horário de <?php if( $order["type"] == 0 ){ ?>Retirada<?php }else{ ?>Entrega<?php } ?></p>

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

					<div id="alertCheckoutHorary">
						
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<?php } ?>

					</div>

					<p class="h5 my-4 font-weight-normal text-second-site-section">Agendo o Horário de <?php if( $order["type"] == 1 ){ ?>Retirada<?php }else{ ?>Entrega<?php } ?>:</p>

					<form id="formCheckoutHorary" class="formCheckoutHorary" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						<?php if( isset($cartHorary) && $cartHorary != 0 ){ ?>
						<div class="table-responsive mt-2 scroll-null">
							<div class="table-ini">
								<table class="table table-bordered table-sm">
									<thead>
										<tr class="tx-IconCart text-center text-truncate bg-white">
											<?php $counter1=-1;  if( isset($cartHorary["0"]["details"]) && ( is_array($cartHorary["0"]["details"]) || $cartHorary["0"]["details"] instanceof Traversable ) && sizeof($cartHorary["0"]["details"]) ) foreach( $cartHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
											<th class='font-weight-normal py-3 <?php if( $value1["horary"]["0"]["status"] == 0 && $value1["horary"]["1"]["status"] == 0 ){ ?>text-muted<?php } ?>'><?php if( $key1 == 1 ){ ?>Hoje<?php }else{ ?><?php echo utf8_encode(ucwords(strftime('%A', strtotime($value1["date"])))); ?><?php } ?></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<tr class="text-truncate bg-white">
											
											<?php $counter1=-1;  if( isset($cartHorary["0"]["details"]) && ( is_array($cartHorary["0"]["details"]) || $cartHorary["0"]["details"] instanceof Traversable ) && sizeof($cartHorary["0"]["details"]) ) foreach( $cartHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
											<?php if( $value1["horary"]["0"]["status"] == 1 || $value1["horary"]["1"]["status"] == 1 ){ ?>
											<td class="text-center tx-IconCart py-2 align-middle">
												
												<?php $dateHorary = $value1["date"]; ?>
												<?php $idDay = $value1["id"]; ?>
												
												<?php $counter2=-1;  if( isset($value1["horary"]) && ( is_array($value1["horary"]) || $value1["horary"] instanceof Traversable ) && sizeof($value1["horary"]) ) foreach( $value1["horary"] as $key2 => $value2 ){ $counter2++; ?>
												
												<?php if( $value2["status"] == 1 ){ ?>
												<button type="button" id='divHorary<?php echo htmlspecialchars( $idDay, ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>' class='selectHorary btn btn-light btn-sm border px-4 py-1 my-2 IptsTable tx-1em <?php if( isset($order) && $order != 0 && $order["horary"]["id"] == $idDay && $order["horary"]["type"] == $key2 ){ ?>clickMe<?php } ?>'>
													
													<input name="inputCheckoutHorary" type="checkbox" class="inputCheckoutHorary inputType d-none" value="<?php echo htmlspecialchars( $dateHorary, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-init="<?php echo htmlspecialchars( $value2["init"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-final="<?php echo htmlspecialchars( $value2["final"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-price="<?php echo htmlspecialchars( $value2["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="<?php echo htmlspecialchars( $idDay, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

													<a><?php echo date('H:i', strtotime($value2["init"])); ?> até <?php echo date('H:i', strtotime($value2["final"])); ?></a>
													<a><br><?php if( $value2["value"] > 0 ){ ?><i>R$ <?php echo maskPrice($value2["value"]); ?></i><?php }else{ ?><span class="text-success">Grátis</span><?php } ?></a>
													
												</button><br>
												<?php } ?>

												<?php } ?>

											</td>
											<?php }else{ ?>
											<td class="text-center tx-IconCart bg-light py-3">
												
												<p class="px-5 h5 font-weight-normal text-secondary"> - </p>

											</td>
											<?php } ?>
											<?php } ?>
											
										</tr>
										
									</tbody>
								</table>
							</div>
						
						</div>
						<?php }else{ ?>
						<p class="h5 text-second-site-section">
							<b>
								Nenhum Horário cadastrado ! 
							</b>
						</p>
						<?php } ?>

						<div class="row my-4">
							
							<div class="col-6">
								<a href='<?php if( $order["type"] == 1 ){ ?>/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/delivery-pickup/<?php }else{ ?>/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/address/<?php } ?>' class="btn btn-sm btn-light border border-dark"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal"><?php if( $order["type"] == 1 ){ ?>Voltar a Entregar ou Retirar<?php }else{ ?>Voltar a Endereço de Entrega<?php } ?></b></a>
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
							<a class="col-6 text-right text-second-site-section">R$ <?php echo maskPrice($cart["totalCart"]); ?></a>
						</div>

						<?php if( $order["type"] == 2 && isset($order["freight"]) && $order["freight"] >= 0 ){ ?>
						<div class="row my-2 tx-IconCart">
							<a class="col-6 text-second-site-section">Frete:</a>
							<a class="col-6 text-second-site-section text-right"><?php if( $order["freight"] == 0 ){ ?><span class="text-success">Grátis</span><?php }else{ ?>R$ <?php echo maskPrice($order["freight"]); ?><?php } ?></a>
						</div>
						<?php } ?>

						<hr>

						<div class="text-second-site-section text-right">
							<p>R$ <?php echo maskPrice(($cart["totalCart"] + $order["freight"])); ?></p>
						</div>
					</div>

				</div>
				
			</div>
		
		</div>

	</section>