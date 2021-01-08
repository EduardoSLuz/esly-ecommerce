<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="text-link-site-section">Conta</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="text-link-site-section">Pedidos</a></li>
				  <li class="breadcrumb-item text-link-site-section" aria-current="page">Pedido #<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">
					<p class="h4 font-weight-normal text-second-site-section">
						Pedido #<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo date("H:i", strtotime($orders["0"]["timeInsert"])); ?> <?php echo date("d/m/Y", strtotime($orders["0"]["dateInsert"])); ?>
					</p>

					<div class="mt-3">
						<table class="table table-hover tx-IconCart mb-0 bg-white">
							<tbody>
								<tr>
									<td class="py-4 px-3 text-second-site-section">
										<p>
											<span>Loja:</span>
											<span><br>Loja <?php echo htmlspecialchars( $orders["0"]["infoStore"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
										</p>
			
										<p>
											<span>Endereço:</span>
											<span><br>
												<?php echo htmlspecialchars( $orders["0"]["address"]["0"]["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($orders["0"]["address"]["0"]["cep"]); ?>
											</span>
										</p>
			
										<p>
											<span>Fone:</span>
											<span><br>
												<?php if( $orders["0"]["infoStore"]["telephoneStore"] != 0 ){ ?> <?php echo maskTel($orders["0"]["infoStore"]["telephoneStore"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?>
											</span>
										</p>
			
										<p>
											<span>Whatsapp:</span>
											<span><br>
												<?php if( $orders["0"]["infoStore"]["whatsappStore"] != 0 ){ ?> <?php echo maskTel($orders["0"]["infoStore"]["whatsappStore"]); ?> <?php }else{ ?> <b>Sem Whatsapp</b> <?php } ?>
											</span>
										</p>
			
										<p>
											<span>Email:</span>
											<span><br>
												<?php if( $orders["0"]["infoStore"]["emailStore"] != '' ){ ?> <?php echo htmlspecialchars( $orders["0"]["infoStore"]["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?>
											</span>
										</p>
									</td>
									<td class="p-4 text-second-site-section">
										<p class="font-weight-bold">
											<span>Status do pedido:</span>
											<span class='<?php if( $orders["0"]["idOrderStatus"] < 6 ){ ?>text-primary<?php } ?> <?php if( $orders["0"]["idOrderStatus"] == 9 ){ ?>text-danger<?php } ?> <?php if( $orders["0"]["idOrderStatus"] >= 6 && $orders["0"]["idOrderStatus"] <= 7 ){ ?>text-success<?php } ?>'><br>
												<?php echo htmlspecialchars( $orders["0"]["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
											</span>
										</p>
			
										<p>
											<span>Modalidade:</span>
											<span class="h6"><br>
												<?php if( $orders["0"]["typeModality"] == 1 ){ ?>
												Retirada
												<?php }else{ ?>
												Entrega - <i><u><?php if( $orders["0"]["typeFreight"] == 0 ){ ?>Normal<?php }else{ ?>Express<?php } ?></u></i>
												<?php } ?>
											</span>
										</p>
			
										<p>
											<span>Forma de pagamento:</span>
											<span><br>
												<b><?php echo htmlspecialchars( $orders["0"]["payment"]["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php if( $orders["0"]["payment"]["pay"] == 'Dinheiro' ){ ?>- Troco para R$ <?php echo maskPrice($orders["0"]["changePay"]); ?><?php } ?></b>
											</span>
										</p>
			
										<p>
											<span>Agendamento para:</span>
											<span><br>
												<?php echo ucwords(strftime('%d ', strtotime($orders["0"]["dateHorary"]))); ?> de 
												<?php echo ucwords(strftime('%B', strtotime($orders["0"]["dateHorary"]))); ?> de 
												<?php echo ucwords(strftime('%Y', strtotime($orders["0"]["dateHorary"]))); ?> 
												- <?php echo date('H:i', strtotime($orders["0"]["timeInitial"])); ?> às <?php echo date('H:i', strtotime($orders["0"]["timeFinal"])); ?></span>
										</p>
			
										<?php if( $orders["0"]["typeModality"] == 2 ){ ?>
										<p>
											<span>Endereço de entrega:</span>
											<span><br>
												<?php echo htmlspecialchars( $orders["0"]["address"]["1"]["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($orders["0"]["address"]["1"]["cep"]); ?>
											</span>
										</p>
										<?php } ?>
			
										<p>
											<span>Nome de quem <?php if( $orders["0"]["typeModality"] == 2 ){ ?>receberá<?php }else{ ?>retirará<?php } ?> as compras:</span>
											<span><br><?php echo htmlspecialchars( $orders["0"]["nameRes"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
										</p>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					<?php if( isset($orders["0"]["status"]) && is_array($orders["0"]["status"]) ){ ?>
					<div class="table-responsive-lg my-0">

						<table class="table">
							<thead>
								<tr>
									<td class="d-flex justify-content-center text-center">
										
										<?php $counter1=-1;  if( isset($orders["0"]["status"]) && ( is_array($orders["0"]["status"]) || $orders["0"]["status"] instanceof Traversable ) && sizeof($orders["0"]["status"]) ) foreach( $orders["0"]["status"] as $key1 => $value1 ){ $counter1++; ?>
										<div class="px-4">
											<p class="my-0 h1 text-success"><i class="far fa-check-circle"></i></p>
											<span class="text-second-site-section"><i><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></span>
											<p class="my-0 text-second-site-section"><small>
												<?php echo date('d/m/Y', strtotime($value1["date"])); ?>
												<?php echo date('H:i', strtotime($value1["time"])); ?> 
											</small></p>
										</div>
										<?php } ?>

									</td>
								</tr>
							</thead>	
						</table>

					</div>
					<?php } ?>

					<div class="table-responsive scroll-null table-ini-sm">
						<table class="table table-hover text-truncate bg-white border">
							<thead>
							  <tr class="text-center">
								<th class="font-weight-normal border-right text-second-site-section">Item</th>
								<th class="font-weight-normal border-right text-second-site-section">Similar</th>
								<th class="font-weight-normal border-right text-second-site-section">Preço unidade</th>
								<th class="font-weight-normal border-right text-second-site-section">Quantidade</th>
								<th class="font-weight-normal border-right text-second-site-section">Subtotal</th>
								<th class="font-weight-normal border-right text-second-site-section">Desconto</th>
								<th class="font-weight-normal border-right text-second-site-section">Total</th>
							  </tr>
							</thead>
							<tbody>
								<?php $counter1=-1;  if( isset($orders["0"]["cart"]["items"]) && ( is_array($orders["0"]["cart"]["items"]) || $orders["0"]["cart"]["items"] instanceof Traversable ) && sizeof($orders["0"]["cart"]["items"]) ) foreach( $orders["0"]["cart"]["items"] as $key1 => $value1 ){ $counter1++; ?>
								<tr class="cursorPointer text-center" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
									<th scope="row" class="py-2">
										<a class="font-weight-normal text-second-site-section">
											<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
										</a>
									</th>
									<td class="py-2">
										<a class="text-decoration-none text-second-site-section"> <i class='<?php if( $value1["similar"] == 1 ){ ?>fas fa-check<?php }else{ ?>fas fa-times<?php } ?>'></i> </a>
									</td>
									<td class="py-2">
										<a class="text-decoration-none text-second-site-section">
											R$ <?php echo maskPrice($value1["priceItem"]); ?>
										</a>
									</td>
									<td class="py-2">
										<a class="text-decoration-none text-second-site-section"><?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
									</td>
									<td class="py-2">	
										<a class="text-decoration-none text-second-site-section">
											R$ <?php echo maskPrice($value1["priceItem"] * $value1["quantity"]); ?>
										</a>
									</td>
									<td class="py-2">	
										<a class="text-decoration-none text-second-site-section">
											R$ <?php echo maskPrice($value1["discount"]); ?>
										</a>
									</td>
									<td class="py-2">	
										<a class="text-decoration-none text-second-site-section">
											R$ <?php echo maskPrice($value1["totalItem"]); ?>
										</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

					<div class="row my-2">
						
						<div class="col-6">

							<?php if( $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] < 5 ){ ?>
							<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalOrderCancel" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-times"></i> Cancelar Pedido</button>
							<?php } ?>

						</div>
						
						<div class="col-6 text-right">
							<p class="tx-IconCart text-second-site-section">
								<span>Valor dos itens: R$ <?php echo maskPrice($orders["0"]["cart"]["totalCart"]); ?></span>
								<span><br>Frete + agendamento: R$ <?php echo maskPrice($orders["0"]["priceFreight"] + $orders["0"]["priceHorary"]); ?></span>
								<?php if( ($orders["0"]["discount"] - $orders["0"]["cart"]["discountCart"]) > 0 ){ ?>
								<span><br>Desconto: R$ <?php echo maskPrice($orders["0"]["discount"] - $orders["0"]["cart"]["discountCart"]); ?></span>
								<?php } ?>
								<span class="font-weight-bold"><br>TOTAL: R$ <?php echo maskPrice($orders["0"]["total"]); ?></span>
							</p>
						</div>	
					</div>

				</div>

			</div>
			
		</div>

	</section>
	
	<?php require $this->checkTemplate("accountBar");?>