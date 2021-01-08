<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  <li class="breadcrumb-item text-link-site-section" aria-current="page">Nossas Lojas</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("informationsLinks");?>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal text-second-site-section">Nossas Lojas</p>
					<hr>
					
					<div class="row">

						<?php if( isset($listAll) && $listAll != 0 ){ ?>
						<?php $counter1=-1;  if( isset($listAll) && ( is_array($listAll) || $listAll instanceof Traversable ) && sizeof($listAll) ) foreach( $listAll as $key1 => $value1 ){ $counter1++; ?>

							<?php if( $value1["statusStore"] == 1 ){ ?>
							<div class="col-sm-6 mb-4">
								<div class="card">

									<img src="/resources/clients/<?php echo htmlspecialchars( $nameBase, ENT_COMPAT, 'UTF-8', FALSE ); ?>/stores/loja-<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/imgs/loja<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.png" class="card-img-top max-height2" alt="Banner Loja<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									
									<div class="card-body">
										<p class="card-title h5 font-weight-normal">
											<a href="/loja-<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-second-site-section"><?php echo htmlspecialchars( $value1["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
										</p>
										
										<p class="card-text font-weight-normal">
											
											<a href="https://www.google.com/maps/place/<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["cepStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-decoration-none text-second-site-section" target="_blank"><i class="fas fa-map-marker-alt"></i>
											<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($value1["cepStore"]); ?></a>
											<br>

											<i class="fas fa-phone-alt text-second-site-section"></i> <a><?php echo maskTel($value1["telephoneStore"]); ?></a>
											<br>

											<i class="fab fa-whatsapp text-second-site-section"></i> <a><?php echo maskTel($value1["whatsappStore"]); ?></a>
											<br>
											
											<i class="far fa-envelope text-second-site-section"></i> <a><?php echo htmlspecialchars( $value1["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>

											<?php if( $value1["horary"] != 0 && count($value1["horary"]) > 0 ){ ?>
												<p class="font-weight-bold my-0 text-second-site-section"><i class="far fa-clock"></i> Horário de Atendimento:</p>
													
												<ul class="txList-StyleNone">
                                
													<?php $counter2=-1;  if( isset($value1["horary"]) && ( is_array($value1["horary"]) || $value1["horary"] instanceof Traversable ) && sizeof($value1["horary"]) ) foreach( $value1["horary"] as $key2 => $value2 ){ $counter2++; ?>
													<li class="my-1 text-second-site-section">
														
														<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $key2 == count($horary) - 1 ){ ?> - <?php echo htmlspecialchars( $value2["dayNameFinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>:
				
														<?php echo date('H:i', strtotime($value2["horary"]["0"]["init"])); ?> às <?php echo date('H:i', strtotime($value2["horary"]["0"]["final"])); ?>
					
														<?php if( $value2["horary"]["1"]["init"] > $value2["horary"]["0"]["init"] ){ ?>
															- <?php echo date('H:i', strtotime($value2["horary"]["1"]["init"])); ?> às <?php echo date('H:i', strtotime($value2["horary"]["1"]["final"])); ?>
														<?php } ?>
				
													</li>
													<?php } ?>
						
												</ul>

											<?php } ?>
						
										</p>
									</div>
								</div>
							</div>
							<?php } ?>

						<?php } ?>
						<?php } ?>

					  </div>

				</div>

			</div>
			
		</div>

	</section>

	<?php require $this->checkTemplate("informationsBar");?>