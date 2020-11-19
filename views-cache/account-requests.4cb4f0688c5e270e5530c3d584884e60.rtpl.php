<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="text-link-site-section">Conta</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Pedidos</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">
					<p class="h4 font-weight-normal text-second-site-section">Pedidos</p>
					<hr>

					<?php if( $successMsg != '' ){ ?>	

						<div class="alert alert-success alert-dismissible fade show text-left" role="alert">
								
							<span><?php echo htmlspecialchars( $successMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

						</div>

					<?php } ?>

					<?php if( $orders != 0 ){ ?>
					<div class="my-2 table-responsive">
						
						<div class="table-ini">
							<table class="table table-hover font-weight-normal h6 text-truncate bg-white border">
								<thead>
								  <tr class="text-center">
									<th class="border-right text-second-site-section">Data</th>
									<th class="border-right text-second-site-section">N.</th>
									<th class="border-right text-second-site-section">Para</th>
									<th class="border-right text-second-site-section">Situação</th>
									<th class="border-right text-second-site-section">Agendamento</th>
									<th class="border-right text-second-site-section">Forma de Pagamento</th>
									<th class="border-right text-second-site-section">Total</th>
								  </tr>
								</thead>
								<tbody>
									<?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
									<tr class="cursorPointer text-center" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/<?php echo htmlspecialchars( $value1["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
										<th scope="row" class="py-2">
											<a class="font-weight-normal">
												<?php echo date('d/m/Y', strtotime($value1["dateInsert"])); ?> <br>
												<?php echo date('H:i', strtotime($value1["timeInsert"])); ?>
											</a>
										</th>
										<th scope="row" class="py-2">
											<a class="text-decoration-none text-second-site-section"><i><?php echo htmlspecialchars( $value1["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></a>
										</th>
										<td class="py-2">
											<a class="text-decoration-none text-second-site-section"><?php if( $value1["typeModality"] == 2 ){ ?>Entrega<?php }else{ ?>Retirada<?php } ?></a>
										</td>
										<td class="py-2">
											<a class='text-decoration-none <?php if( $value1["idOrderStatus"] < 6 ){ ?>text-primary<?php } ?> <?php if( $value1["idOrderStatus"] == 9 ){ ?>text-danger<?php } ?> <?php if( $value1["idOrderStatus"] >= 6 && $value1["idOrderStatus"] <= 7 ){ ?>text-success<?php } ?>'><b><?php echo htmlspecialchars( $value1["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></a>
										</td>
										<td class="py-2">
											<p class="text-decoration-none text-second-site-section">
												<span>
													<?php echo ucwords(strftime('%d ', strtotime($value1["dateHorary"]))); ?> de 
													<?php echo ucwords(strftime('%B', strtotime($value1["dateHorary"]))); ?> de 
													<?php echo ucwords(strftime('%Y', strtotime($value1["dateHorary"]))); ?>
												</span>
												<span><br><?php echo date('H:i', strtotime($value1["timeInitial"])); ?> às <?php echo date('H:i', strtotime($value1["timeFinal"])); ?></span>
											</p>
										</td>
										<td class="py-2">	
											<a class="text-decoration-none text-second-site-section">
												<span><?php echo htmlspecialchars( $value1["payment"]["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
												<span><br>(<b><?php if( $value1["paid"] == 1 ){ ?>Pago<?php }else{ ?>Não Recebido<?php } ?></b>)</span>
											</a>
										</td>
										<td class="py-2">
											<span>R$ <?php echo maskPrice($value1["total"]); ?></span>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

					</div>
					<?php }else{ ?>
					<p class="h4 py-3 text-uppercase font-weight-normal text-second-site-section">Não existem pedidos na sua conta.</p>
					
					<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-main-site-section btn-sm">Ir as compras</a>
					<?php } ?>
					
				</div>

			</div>
			
		</div>

	</section>

	<?php require $this->checkTemplate("accountBar");?>