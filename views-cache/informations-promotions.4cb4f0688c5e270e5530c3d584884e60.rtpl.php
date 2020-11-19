<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Promoções</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("informationsLinks");?>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal text-second-site-section">Promoções</p>
					<hr>
					
					<div class="accordion" id="AccordinOne">
						
						<?php $counter1=-1;  if( isset($storePromo) && ( is_array($storePromo) || $storePromo instanceof Traversable ) && sizeof($storePromo) ) foreach( $storePromo as $key1 => $value1 ){ $counter1++; ?>
						<div class="card btn btn-light border mt-2" data-toggle="collapse" data-target="#collapse<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" aria-expanded="true" aria-controls="collapse">
							
							<a class="py-2 h6 text-left text-second-site-section"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>						  
						
						</div>
						<div id="collapse<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinOne">
							
							<div class="card-body">
								<p class="text-second-site-section"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							</div>
						
						</div>
						<?php } ?>	
						
					</div>

				</div>

			</div>
			
		</div>

	</section>
	
	<?php require $this->checkTemplate("informationsBar");?>