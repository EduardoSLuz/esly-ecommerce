<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" class="text-link-site-section">Carrinho</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Resumo</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-9">

					<?php require $this->checkTemplate("checkoutLinks");?>

					<p class="tx-TitleMob font-weight-normal text-second-site-section">Resumo da Compra - Confira os dados e finalize a compra</p>

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

					<div id="alertCheckoutResume">
						
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<?php } ?>

					</div>

					<div>

						<button type="button" class="btn btn-sm btn-outline-second-site-section" data-toggle="modal" data-target="#ModalCommentProduct">
							Adicionar Observação
						</button>

					</div>

					<form id="formCheckoutResume" class="formCheckoutResume" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

						<div class="row">

							<div class="col-md-6">
	
								<div class="table-responsive mt-3 scroll-null">
									<div class="table-ini">
										<table class="table table-sm table-hover border bg-white">
											<thead>
											<tr class="tx-IconCart">
												<th class="font-weight-normal text-second-site-section border-right">Item</th>
												<th class="font-weight-normal text-second-site-section border-right text-center">Quantidade</th>
												<th class="font-weight-normal text-second-site-section border-right text-center">Subtotal</th>
											</tr>
											</thead>
											<tbody>
												<?php $counter1=-1;  if( isset($cart["items"]) && ( is_array($cart["items"]) || $cart["items"] instanceof Traversable ) && sizeof($cart["items"]) ) foreach( $cart["items"] as $key1 => $value1 ){ $counter1++; ?>
												<tr class="tx-IconCart">
													<td class="py-2">
														<p class="text-decoration-none text-dark mb-0">
															<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
														</p>
														<small> R$ <?php echo maskPrice($value1["priceItem"]); ?> </small>
													</td>
													<td class="text-center py-2"">
														<span><?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
													</td>
													<td class="text-center py-2"">
														<span> R$ <?php echo maskPrice($value1["totalItem"]); ?> </span>
													</td>
												</tr>
												<?php } ?>		
											</tbody>
										</table>
									</div>
								
								</div>
	
							</div>
	
							<div class="col-md-6">
	
								<div class="table-responsive mt-3">
									<div class="table-ini">
										<table class="table table-sm table-striped border bg-white">
											<tbody>
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Agendamento de <?php if( $order["type"] == 1 ){ ?>retirada<?php }else{ ?>entrega<?php } ?></b></span>
													</td>
													<td class="py-2 text-right">
														<span class="font-weight-bold text-second-site-section">
															<?php if( $order["horary"]["date"] == date('Y-m-d') ){ ?>Hoje<?php }else{ ?><?php echo ucwords(strftime('%A', strtotime($order["horary"]["date"]))); ?><?php } ?> - 
															<?php if( isset($order["horary"]) ){ ?>
															<?php echo date('H:i', strtotime($order["horary"]["init"])); ?> até <?php echo date('H:i', strtotime($order["horary"]["final"])); ?>
															<?php } ?>
														</span>
													</td>
												</tr>
	
												<?php if( $orderAddress != 0 ){ ?>
												<tr class="tx-IconCart">
													<td class="py-2" colspan="2">
														<span class="text-second-site-section"><b>
															<i>Endereço:</i>
															<br><?php echo htmlspecialchars( $orderAddress["0"]["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orderAddress["0"]["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orderAddress["0"]["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orderAddress["0"]["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orderAddress["0"]["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($orderAddress["0"]["cep"]); ?>
														</b></span>
													</td>
												</tr>
												<?php } ?>
	
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Nome de quem <?php if( $order["type"] == 1 ){ ?>ira retirar<?php }else{ ?>receberá<?php } ?> as compras</b></span>
													</td>
													<td class="py-2 text-right">
														<span class="text-second-site-section"><?php echo htmlspecialchars( $order["resp"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
													</td>
												</tr>
	
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Pagamento na <?php if( $order["type"] == 1 ){ ?>retirada<?php }else{ ?>entrega<?php } ?> com</b></span>
													</td>
													<td class="py-2 text-right">
														<span class="text-second-site-section">
															<?php echo htmlspecialchars( $order["payment"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
															<?php if( $order["payment"]["name"] == 'Dinheiro' ){ ?>
															- R$ <?php echo maskPrice($order["payment"]["changePay"]); ?>
															<?php } ?>
														</span>
													</td>
												</tr>
	
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Valor dos itens</b></span>
													</td>
													<td class="py-2 text-right">
														<span class="text-second-site-section">R$ <?php echo maskPrice($cart["totalCart"]); ?></span>
													</td>
												</tr>
	
												<?php if( 1 == 0 ){ ?>
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Desconto no valor dos itens</b></span>
													</td>
													<td class="py-2 text-right">
														<span class="text-second-site-section"><?php echo htmlspecialchars( $cart["promoInfo"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</span>
													</td>
												</tr>
												<?php } ?>
	
												<?php if( $order["horary"]["price"] > 0 ){ ?>
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Agendamento</b></span>
													</td>
													<td class="py-2 text-right">
														<span class="text-second-site-section">R$ <?php echo maskPrice($order["horary"]["price"]); ?></span>
													</td>
												</tr>
												<?php } ?>
	
												<?php if( $order["type"] == 2 && $order["freight"] > 0 ){ ?>
												<tr class="tx-IconCart">
													<td class="py-2">
														<span class="text-second-site-section"><b>Frete - <?php if( $order["typeFreight"] == 0 ){ ?>Normal<?php }else{ ?>Express<?php } ?></b></span>
													</td>
													<td class="py-2 text-right">
														<span class="text-second-site-section">R$ <?php echo maskPrice($order["freight"]); ?></span>
													</td>
												</tr>
												<?php } ?>
	
												<tr class="tx-IconCart">
													<td class="pt-2">
														<span class="text-second-site-section"><b>TOTAL</b></span>
													</td>
													<td class="pt-2 pb-4 text-right">
														<span class="h5 text-second-site-section font-weight-normal">
															R$ <?php echo maskPrice(($cart["totalCart"] + $order["freight"] + $order["horary"]["price"])); ?>
														</span>
													</td>
												</tr>
	
											</tbody>
										</table>
									</div>
								
								</div>
	
							</div>
	
						</div>
	
						<div class="row my-4">
							
							<div class="col-6">
								<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/payment/" class="btn btn-sm btn-light border border-DARK"><i class="fas fa-arrow-left"></i> <b class="d-mobile font-weight-normal">Voltar a Pagamento</b></a>
							</div>
	
							<div class="col-6 text-right">
								<button type="submit" class="btn btn-sm btn-main-site-section text-btn-site-section">Finalizar Compra <i class="fas fa-arrow-right"></i></button>
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

						<?php if( 1 == 0 ){ ?>
						<div class="row my-2 tx-IconCart">
							<a class="col-6 text-second-site-section">Desconto no Subtotal:</a>
							<a class="col-6 text-second-site-section text-right"><?php echo htmlspecialchars( $cart["promoInfo"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>%</a>
						</div>
						<?php } ?>

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

						<div class="text-right">
							<p class="text-second-site-section">R$ <?php echo maskPrice(($cart["totalCart"] + $order["freight"] + $order["horary"]["price"])); ?></p>
						</div>

					</div>

				</div>
				
			</div>
		
		</div>

	</section>