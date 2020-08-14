<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">
	
	<a class="list-group-item list-group-item-action py-4 font-weight-light">
		<span class="h5 font-weight-normal"><?php echo htmlspecialchars( $userValues["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userValues["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
		<span translate="yes"><br> <?php echo ucwords(strftime('%A, %d', strtotime('today'))); ?> de <?php echo ucfirst(strftime('%B', strtotime('today'))); ?> de <?php echo ucfirst(strftime('%Y', strtotime('today'))); ?> às <?php echo date('H:i'); ?></span>
	</a>

	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="list-group-item list-group-item-action"><i class="fas fa-shopping-bag"></i> Pedidos</a>

	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/shopping-list/" class="list-group-item list-group-item-action"><i class="far fa-heart"></i> Lista de compra</a>

	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/" class="list-group-item list-group-item-action"><i class="far fa-user"></i> Meus dados</a>

	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/" class="list-group-item list-group-item-action"><i class="fas fa-map-marker-alt"></i> Endereços</a>
	
	<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/logout/" class="list-group-item list-group-item-action"><i class="fas fa-sign-out-alt"></i> Sair</a>

</div>