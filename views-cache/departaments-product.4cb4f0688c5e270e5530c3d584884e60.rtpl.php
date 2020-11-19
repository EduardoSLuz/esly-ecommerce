<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<?php if( !empty($dep["cat"]) ){ ?>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="text-link-site-section"><?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
					<li class="breadcrumb-item text-link-site-section" aria-current="page"><?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
					<?php }else{ ?>
					<li class="breadcrumb-item text-link-site-section" aria-current="page"><?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
					<?php } ?>

				</ol>
			  </nav>
		</div>

		<?php if( $dep["products"] != 0 ){ ?>
		<div class="row ct-ini">

			<div class="col-md-2 bar-display">
				
				<?php require $this->checkTemplate("departamentsLinks");?>
				
			</div>

			<div id="ColSearchMaster" class="col-md-10 ct-Search">
				
				<div class="row">
					
					<div class="col-md-8">
						<p class="font-weight-normal h4 text-second-site-section">
							<?php if( $dep["cat"] != '' ){ ?> <?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>
						</p>
					</div>

					<div class="col-md-4 text-right">
						
						<select id="filterProduct" class="btn btn-light border border-dark">
							<option value="0">Ordenar por:</option>
							<option value="2">Mais baratos</option>
							<option value="3">Mais caros</option>
							<option value="4">A-Z</option>
							<option value="5">Z-A</option>
						</select>

					</div>

				</div>
				
				<div class="col-md-12 px-0 my-3">

					<div class="row">

						<?php $counter1=-1;  if( isset($dep["products"]) && ( is_array($dep["products"]) || $dep["products"] instanceof Traversable ) && sizeof($dep["products"]) ) foreach( $dep["products"] as $key1 => $value1 ){ $counter1++; ?>
						<?php if( $value1["page"] == $dep["page"] ){ ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">

							<div class="card h-100">
							  
							  	<div class="d-flex flex-row-reverse">
									
									<?php if( $value1["pricePromo"] > 0 ){ ?>
									<div class="position-absolute p-3">
								  	<label class="h6 m-0 btn-main-site-section text-btn-site-section">
									  <b>&nbsp;<?php echo porcenDif($value1["price"], $value1["pricePromo"]); ?>%&nbsp;</b>
								  	</label>
									</div>
									<?php } ?>
									  
									<img src="<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid rounded mx-auto d-block cursorPointer" style="height:175px" alt="<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
								  
								</div>

							  	<div class="card-body text-center">
								  
								  	<p class="card-title font-weight-light text-uppercase text-second-site-section card-text m-0 cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
									  <b><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
								  	</p>

								  	<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

									  	<label class="bg-light border px-2 rounded-pill tx-IconCart">
										  <?php echo htmlspecialchars( $value1["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
									  	</label>
								 	 </p>	

								  	<p class="py-1">
										 
										<a class="text-dark font-weight-bold">	
										  	<?php if( $value1["pricePromo"] > 0 && $value1["pricePromo"] != $value1["price"] ){ ?>
										  
										  	<a class="h6">
											  <s class="card-ColorPromoPrice">R$<?php echo number_format($value1["price"], 2, ',', '.'); ?></s>
										  	</a>
										  	<span>R$</span><a class="h3"><?php echo strstr(number_format($value1["pricePromo"], 2, ',', '.'), ',', true); ?></a><a class="h6"><?php echo strstr(number_format($value1["pricePromo"], 2, ',', '.'), ','); ?></a>	
										  
										  	<?php }else{ ?>

										  	<span>R$</span><a class="h3"><?php echo strstr(number_format($value1["price"], 2, ',', '.'), ',', true); ?></a><a class="h6"><?php echo strstr(number_format($value1["price"], 2, ',', '.'), ','); ?></a>

										  	<?php } ?>
									  	</a>
								  	</p>
							  
							  	</div>

							  	<form id="formCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="formEnvia" data-id="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						  
								  	<div class="btn-group btn-group-justified w-100">
  
									  <button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="removeItem('inputCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">-</button>

									  <input id="inputCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCardDiversos" type="number" class="w-25 text-center" value="1">

									  <button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="addItem('inputCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')">+</button>
									  
									  	<?php if( isset($userValues["login"]) && $userValues["login"] == false ){ ?>
										<button type="submit" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalMsgAlert" data-text="Deseja finalizar o pedido?" data-link="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" data-btn-text="Finalizar" data-btn-text2="Continuar comprando">
											<i class="fas fa-shopping-cart"></i>
										</button>
										<?php }else{ ?>
										<button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section btn-success">
											<i class="fas fa-shopping-cart"></i>
										</button>
										<?php } ?>
  
								  	</div>
							  
							  	</form>

							</div>

						</div>
						<?php } ?>
						<?php } ?>

					</div>

					<hr>

					<div class="row">
						

						<div class="btn-group-toggle col-md">

							<?php $counter1=-1;  if( isset($dep["pages"]) && ( is_array($dep["pages"]) || $dep["pages"] instanceof Traversable ) && sizeof($dep["pages"]) ) foreach( $dep["pages"] as $key1 => $value1 ){ $counter1++; ?>
							<a class='btn btn-light btn-sm border <?php if( $dep["page"] == $value1["page"] ){ ?>border-dark active<?php } ?>' href='/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["subs"]) ){ ?>&subs=<?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&page=<?php echo htmlspecialchars( $value1["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'><?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
							<?php } ?>
							
						</div>
					
					</div>

				</div>

			</div>

		</div>
		<?php }else{ ?>
		<div class="ml-3">
				
			<p class="h4 font-weight-normal">
				<a class="d-inline-block">
					<i class="far fa-frown bar-display text-second-site-section" style="font-size: 5em;"></i>
				</a>
				<a class="ml-3 d-inline-block text-second-site-section">
					Ops!<br>
					Desculpe, não encontramos resultados <?php if( $dep["cat"] != '' ){ ?>nessa categoria: <br> "<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php }else{ ?>nesse departamento: <br> "<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>
					
					<?php if( !empty($dep["subs"]) ){ ?><br><small>Sub pesquisa: <b><?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b></small><?php } ?>
				</a>
			</p>
		
		</div>

		<div class="ml-3 mt-5">
			<p class="h5 font-weight-normal text-second-site-section">Algumas sugestões:</p>
			<hr>
			<p class="ml-3 mt-4">
				<i class="fas fa-arrow-right text-second-site-section"></i> Confira a escrita das palavras <br>
				<i class="fas fa-arrow-right text-second-site-section"></i> Tente usar menos palavras <br>
				<i class="fas fa-arrow-right text-second-site-section"></i> Tente palavras diferentes com mesmo significado <br>
				<i class="fas fa-arrow-right text-second-site-section"></i> Use palavras mais genéricas <br>
				<i class="fas fa-arrow-right text-second-site-section"></i> Todos os Departamentos
			</p>
		</div>
		<?php } ?>
		
	</section>
	
	<?php if( $dep["products"] != 0 ){ ?>
	<?php require $this->checkTemplate("departamentsBar");?>
	<?php } ?>