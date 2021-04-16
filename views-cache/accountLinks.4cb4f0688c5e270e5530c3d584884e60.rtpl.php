<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">
	
	<a class="list-group-item list-group-item-action py-4 font-weight-light">
		<span class="h5 font-weight-normal text-second-site-section"><?php echo htmlspecialchars( $userValues["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userValues["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
		<span class="text-second-site-section"><br> <?php echo utf8_encode(ucwords(strftime('%A, %d', strtotime('today')))); ?> de <?php echo utf8_encode(ucfirst(strftime('%B', strtotime('today')))); ?> de <?php echo utf8_encode(ucfirst(strftime('%Y', strtotime('today')))); ?> às <?php echo date('H:i'); ?></span>
	</a>

	<?php if( $userValues["admin"] > 0 ){ ?>
	<a href="/admin/" class="list-group-item list-group-item-action text-second-site-section"> <i class="fas fa-user-shield"></i> Admin Console</a>
	<?php } ?>

	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="list-group-item list-group-item-action text-second-site-section"><i class="fas fa-shopping-bag"></i> Pedidos</a>

	<?php if( 0==1 ){ ?>
	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/shopping-list/" class="list-group-item list-group-item-action text-second-site-section"><i class="far fa-heart"></i> Lista de compra</a>
	<?php } ?>

	<?php if( !isset($userValues["data"]) ){ ?>
	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/" class="list-group-item list-group-item-action text-second-site-section"><i class="far fa-user"></i> Meus dados</a>

	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/" class="list-group-item list-group-item-action text-second-site-section"><i class="fas fa-map-marker-alt"></i> Endereços</a>
	<?php } ?>
	
	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/logout/" class="list-group-item list-group-item-action text-second-site-section"><i class="fas fa-sign-out-alt"></i> Sair</a>

</div>