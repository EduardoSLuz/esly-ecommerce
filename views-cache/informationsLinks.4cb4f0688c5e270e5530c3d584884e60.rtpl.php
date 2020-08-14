<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">

	<?php if( $storeInstitution["0"]["infoStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="infoStore list-group-item list-group-item-action">Sobre a empresa</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["allStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="allStore list-group-item list-group-item-action">Nossas Lojas</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["partnerStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="partnerStore list-group-item list-group-item-action">Parceiros</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["helpStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="helpStore list-group-item list-group-item-action">Perguntas Frequentes</a>
	<?php } ?>
	
	<?php if( $storeInstitution["0"]["contactStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="contactStore list-group-item list-group-item-action">Fale Conosco</a>
	<?php } ?>
	
	<?php if( $storeInstitution["0"]["workStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="workStore list-group-item list-group-item-action">Trabalhe Conosco</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["promotionStore"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="promotionStore list-group-item list-group-item-action">Promoções</a>
	<?php } ?>

</div>

<script>
	var x = document.getElementsByClassName("<?php echo htmlspecialchars( $info, ENT_COMPAT, 'UTF-8', FALSE ); ?>");

	for (var i = 0; i < x.length; i++) {
		x[i].classList.add("list-group-item-<?php echo htmlspecialchars( $layout["colorLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"); 
		x[i].classList.add("active"); 
	}
	
</script>