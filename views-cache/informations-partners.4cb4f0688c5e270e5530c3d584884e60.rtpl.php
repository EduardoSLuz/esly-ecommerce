<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  <li class="breadcrumb-item text-link-site-section" aria-current="page">Parceiros</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("informationsLinks");?>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal text-second-site-section">Parceiros</p>
					<hr>
					
					<div class="row">
						
						<?php if( isset($storePartner) && $storePartner != 0 ){ ?>
						<?php $counter1=-1;  if( isset($storePartner) && ( is_array($storePartner) || $storePartner instanceof Traversable ) && sizeof($storePartner) ) foreach( $storePartner as $key1 => $value1 ){ $counter1++; ?>
						<div class="col-sm-6 col-md-4 mb-4">
							<div class="card">
								
								<a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="text-center" target="_blank">
									<img src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid img-sizeCard p-2" style="max-height: 175px;" alt="Photo">
								</a>
								
								<div class="card-body py-5 text-center">
									
									<a class="card-title h4 font-weight-normal text-decoration-none text-second-site-section text-capitalize" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
									
								</div>

								<div class="card-footer text-center py-4">
								
									<a class="text-decoration-none text-second-site-section font-weight-light" href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank">Ir para página</a>
								
								</div>

							</div>
						</div>
						<?php } ?>
						<?php }else{ ?>
						<div class="col-md-12">
							<p class="h5 font-weight-normal">Nenhum Parceiro Encontrado <i class="far fa-grimace"></i> </p>
						</div>
						<?php } ?>

					</div>

				</div>

			</div>
			
		</div>

	</section>
	
	<?php require $this->checkTemplate("informationsBar");?>