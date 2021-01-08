<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="list-group">

	<?php if( $storeInstitution["0"]["lyInfo1"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/" class="lyInfo1 list-group-item list-group-item-action">Sobre a empresa</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["lyInfo2"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/our-stores/" class="lyInfo2 list-group-item list-group-item-action">Nossas Lojas</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["lyInfo3"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/partners/" class="lyInfo3 list-group-item list-group-item-action">Parceiros</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["lyInfo4"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/help/" class="lyInfo4 list-group-item list-group-item-action">Perguntas Frequentes</a>
	<?php } ?>
	
	<?php if( $storeInstitution["0"]["lyInfo6"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact/" class="lyInfo6 list-group-item list-group-item-action">Fale Conosco</a>
	<?php } ?>
	
	<?php if( $storeInstitution["0"]["lyInfo7"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" class="lyInfo7 list-group-item list-group-item-action">Trabalhe Conosco</a>
	<?php } ?>

	<?php if( $storeInstitution["0"]["lyInfo5"] == 1 ){ ?>
		<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/" class="lyInfo5 list-group-item list-group-item-action">Promoções</a>
	<?php } ?>

</div>

<script>
	var x = document.getElementsByClassName("<?php echo htmlspecialchars( $info, ENT_COMPAT, 'UTF-8', FALSE ); ?>");

	for (var i = 0; i < x.length; i++) {
		x[i].classList.add("btn-main-site-section"); 
		x[i].classList.add("text-btn-site-section"); 
	}
	
</script>