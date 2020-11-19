<?php if(!class_exists('Rain\Tpl')){exit;}?><p class="h6 text-second-site-section">Relacionados</p>
<hr>

<div class="overflow-auto max-height mb-2">

	<?php $counter1=-1;  if( isset($dep["category"]) && ( is_array($dep["category"]) || $dep["category"] instanceof Traversable ) && sizeof($dep["category"]) ) foreach( $dep["category"] as $key1 => $value1 ){ $counter1++; ?>
	<p class="h6">
		<a href='/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["subs"] != 0 ){ ?>&subs=<?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["page"] > 1 ){ ?>&page=<?php echo htmlspecialchars( $dep["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' class="font-weight-normal text-decoration-none text-link-site-section" ><i class="fas fa-arrow-right"></i> <?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
	</p>
	<?php } ?>
	
</div>

<?php if( $dep["subs"] ){ ?>
<p class="h6 text-second-site-section">Filtros selecionados</p>
<hr>

<p>
	<i class="fas fa-times text-danger cursorPointer closeSubs"></i> <span class="text-link-site-section"><?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
</p>
<?php } ?>

<p class="h6 text-second-site-section">Buscar nos resultados</p>
<hr>

<p>
	<form class="input-group mb-2 subSearch" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">

		<input type="text" class="form-control" name="searchSub" >
		
		<div class="input-group-append">
			<button type="submit" class="btn btn-main-site-section text-btn-site-section"><i class="fas fa-search"></i></button>
		</div>

	</form>

</p>

<?php if( $dep["marks"] != 0 ){ ?>
<p class="mt-4 h6 text-second-site-section">Marca</p>
<hr>

<div class="overflow-auto max-height">

	<?php $counter1=-1;  if( isset($dep["marks"]) && ( is_array($dep["marks"]) || $dep["marks"] instanceof Traversable ) && sizeof($dep["marks"]) ) foreach( $dep["marks"] as $key1 => $value1 ){ $counter1++; ?>
	<?php if( !empty($dep["mark"]) ){ ?>
	<p class="my-2 h6">
		<a href='?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["subs"]) ){ ?>&subs=<?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["page"] > 1 ){ ?>&page=<?php echo htmlspecialchars( $dep["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' class="font-weight-normal text-decoration-none text-link-site-section" > <i class="fas fa-times text-danger"></i> </a> <span class="<?php echo htmlspecialchars( $layout["txLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
	</p>
	<?php }else{ ?>
	<p class="my-2 h6">
		<a href='?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["subs"]) ){ ?>&subs=<?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&mark=<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["page"] > 1 ){ ?>&page=<?php echo htmlspecialchars( $dep["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' class="font-weight-normal text-decoration-none text-link-site-section" ><?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
	</p>
	<?php } ?>
	<?php } ?>
	
</div>
<?php } ?>


<p class="mt-4 h6 text-second-site-section">Preço</p>
<hr>

<form class="filterPrice" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">

	<div class="input-group input-group-sm">
		<input type="text" class="form-control text-center maskMoney2" name="minPrice" value="<?php echo htmlspecialchars( $dep["filterPrice"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		<a class="h4 text-second-site-section">&nbsp;-&nbsp;</a>
		<input type="text" class="form-control text-center maskMoney2" name="maxPrice" value="<?php echo htmlspecialchars( $dep["filterPrice"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	</div>

	<div class="text-left mt-2">
		<button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm px-3">Filtrar</button>
	</div>

</form>