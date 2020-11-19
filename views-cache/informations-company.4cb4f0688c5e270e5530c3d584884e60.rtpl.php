<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  <li class="breadcrumb-item text-link-site-section" aria-current="page">Sobre a empresa</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("informationsLinks");?>

				</div>

				<div class="col-md">
					<p class="h5 text-uppercase font-weight-normal text-second-site-section">Sobre a empresa</p>
					<hr>

					<?php $counter1=-1;  if( isset($storeInfo) && ( is_array($storeInfo) || $storeInfo instanceof Traversable ) && sizeof($storeInfo) ) foreach( $storeInfo as $key1 => $value1 ){ $counter1++; ?>

						<p class="h6 my-2 text-second-site-section">
							<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?>
						</p>

					<?php } ?>
				</div>

			</div>
			
		</div>

	</section>

	<?php require $this->checkTemplate("informationsBar");?>