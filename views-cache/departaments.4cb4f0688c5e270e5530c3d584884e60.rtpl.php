<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Departamentos</li>
				</ol>
			</nav>

			<div>

				<p class="h4 font-weight-normal text-second-site-section">Departamentos</p>

				<hr>

				<div class="row">

					<?php if( count($products) > 0 ){ ?>
					<?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
					<div class="col-md-4 my-2">

						<p class="h4 font-weight-normal text-second-site-section"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="text-decoration-none text-dark"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></p>
						
						<p>	
							<?php if( count($value1["category"]) > 0 ){ ?>
							<?php $dept = $value1["name"]; ?>
							<?php $counter2=-1;  if( isset($value1["category"]) && ( is_array($value1["category"]) || $value1["category"] instanceof Traversable ) && sizeof($value1["category"]) ) foreach( $value1["category"] as $key2 => $value2 ){ $counter2++; ?>
							<li><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dept, ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-decoration-none text-second-site-section"><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> (<?php echo count($value2["products"]); ?>)</a></li>
							<?php } ?>
							<?php } ?>
						</p>

					</div>
					<?php } ?>
					<?php } ?>

				</div>

			</div>	
			
		</div>

	</section>