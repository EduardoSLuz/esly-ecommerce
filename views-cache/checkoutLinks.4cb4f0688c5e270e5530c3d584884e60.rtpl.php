<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="bar-display">

	<div class="btn-group width-T100 mb-3 bg-white">

		<?php if( $order != 0 && $order["type"] >= 0 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/delivery-pickup/" class='btn border text-dark py-3 <?php if( $orderLink == 1 ){ ?>border-dark <?php } ?>'>
			<i class="fas fa-check-square text-success"></i> Entrega/Retirada 
		</a>
		<?php }else{ ?>
		<a class='btn border py-3 <?php if( $orderLink == 1 ){ ?>border-dark <?php } ?>'>
			Entrega/Retirada
		</a>
		<?php } ?>

		<?php if( $order != 0 && $order["address"] != 0 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/address/" class='btn border text-dark py-3 <?php if( $orderLink == 2 ){ ?>border-dark<?php }else{ ?>border-left-0<?php } ?>'>
			<i class="fas fa-check-square text-success"></i> Endereço 
		</a>
		<?php } ?>

		<?php if( $order == 0 || $order["type"] != 1 && $order["address"] == 0 ){ ?>
		<a class='btn border py-3 <?php if( $orderLink == 2 ){ ?>border-dark <?php }else{ ?>border-left-0<?php } ?>'>
			Endereço
		</a>
		<?php } ?>

		<?php if( $order != 0 && $order["horary"] != 0 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/horary/" class='btn border text-dark py-3 <?php if( $orderLink == 3 ){ ?>border-dark<?php }else{ ?> border-left-0<?php } ?>'>
			<i class="fas fa-check-square text-success"></i> Horário
		</a>
		<?php }else{ ?>
		<a class='btn border py-3 <?php if( $orderLink == 3 ){ ?>border-dark <?php }else{ ?>border-left-0<?php } ?>'>
			Horário
		</a>
		<?php } ?>

		<?php if( $order != 0 && $order["payment"] != 0 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/payment/" class='btn border text-dark py-3 <?php if( $orderLink == 4 ){ ?>border-dark<?php }else{ ?> border-left-0<?php } ?>'>
			<i class="fas fa-check-square text-success"></i> Pagamento
		</a>
		<?php }else{ ?>
		<a class='btn border py-3 <?php if( $orderLink == 4 ){ ?>border-dark <?php }else{ ?>border-left-0<?php } ?>'>
			Pagamento
		</a>
		<?php } ?>

		<a class='btn border py-3 <?php if( $orderLink == 5 ){ ?>border-dark <?php }else{ ?>border-left-0<?php } ?>'>
			Resumo
		</a>
		
	</div>

</div>