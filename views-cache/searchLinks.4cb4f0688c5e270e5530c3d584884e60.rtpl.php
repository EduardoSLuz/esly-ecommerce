<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( $search["subs"] ){ ?>
<p class="h6 text-second-site-section">Filtros selecionados</p>
<hr>

<p>
	<i class="fas fa-times text-danger cursorPointer closeSubs"></i> <span class="text-link-site-section"><?php echo htmlspecialchars( $search["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
</p>
<?php } ?>

<p class="h6 text-second-site-section">Buscar nos resultados</p>
<hr>

<p>
	<form class="input-group mb-2 subSearch" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/">

		<input type="text" class="form-control" name="searchSub" >
		
		<div class="input-group-append">
			<button type="submit" class="btn btn-main-site-section text-btn-site-section"><i class="fas fa-search"></i></button>
		</div>

	</form>

</p>

<?php if( $search["marks"] != 0 ){ ?>
<p class="mt-4 h6 text-second-site-section">Marca</p>
<hr>

<div class="overflow-auto max-height">

	<?php $counter1=-1;  if( isset($search["marks"]) && ( is_array($search["marks"]) || $search["marks"] instanceof Traversable ) && sizeof($search["marks"]) ) foreach( $search["marks"] as $key1 => $value1 ){ $counter1++; ?>
	<?php if( !empty($search["mark"]) ){ ?>
	<p class="my-2 h6">
		<a href='?s=<?php echo htmlspecialchars( $search["s"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $search["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $search["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($search["subs"]) ){ ?>&subs=<?php echo htmlspecialchars( $search["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $search["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $search["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["page"] > 1 ){ ?>&page=<?php echo htmlspecialchars( $search["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' class="font-weight-normal text-decoration-none text-link-site-section" > <i class="fas fa-times text-danger"></i> </a> <span class="text-main-site-section"><?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
	</p>
	<?php }else{ ?>
	<p class="my-2 h6">
		<a href='?s=<?php echo htmlspecialchars( $search["s"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $search["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $search["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($search["subs"]) ){ ?>&subs=<?php echo htmlspecialchars( $search["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&mark=<?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $search["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $search["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $search["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["page"] > 1 ){ ?>&page=<?php echo htmlspecialchars( $search["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>' class="font-weight-normal text-decoration-none text-link-site-section" ><?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
	</p>
	<?php } ?>
	<?php } ?>
	
</div>
<?php } ?>


<p class="mt-4 h6 text-second-site-section">Preço</p>
<hr>

<form class="filterPrice" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/">

	<div class="input-group input-group-sm">
		<input type="text" class="form-control text-center maskMoney2" name="minPrice" value="<?php echo htmlspecialchars( $search["filterPrice"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		<a class="h4 text-second-site-section">&nbsp;-&nbsp;</a>
		<input type="text" class="form-control text-center maskMoney2" name="maxPrice" value="<?php echo htmlspecialchars( $search["filterPrice"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
	</div>

	<div class="text-left mt-2">
		<button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm px-3">Filtrar</button>
	</div>

</form>