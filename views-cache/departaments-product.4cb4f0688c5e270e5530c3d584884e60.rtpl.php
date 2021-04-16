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

		<nav class="d-md-none my-2">
			<a href="javascript:window.history.back()" class="btn btn-sm btn-main-site-section text-btn-site-section"><i class="fas fa-chevron-left"></i> <i>Voltar</i></a>
		</nav>

		<?php if( $dep["products"] != 0 ){ ?>
		<div class="row ct-ini">

			<div class="col-md-2 bar-display">
				
				<?php require $this->checkTemplate("departamentsLinks");?>
				
			</div>

			<div id="ColSearchMaster" class="col-md-10 ct-Search">
				
				<div class="row">
					
					<div class="col-md-8">
						<p class="font-weight-normal h4 text-second-site-section">
							<?php if( !empty(trim($dep["cat"])) && $dep["cat"] !== 0 ){ ?> <?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php } ?>
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
						<?php if( $value1["page"] == $dep["page"] && $value1["stock"] > 0 ){ ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">

							<div id="card<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="card h-100">
							<?php $nameCard = $value1["codProduct"]."$key1"; ?>
							<?php $keyPrime = array_key_first($value1["unitsMeasures"]); ?>
							<?php $unitsMeasuresPrime = $value1["unitsMeasures"]["$keyPrime"]; ?>
							<?php $unitsMeasures = $value1["unitsMeasures"]; ?>
							<?php $priceFinal = $unitsMeasuresPrime["price"]; ?>
							<?php $priceOrigin = $value1["priceFinal"] * $unitsMeasuresPrime["valueStock"]; ?>
							<?php $priceOrigin = maskPrice($priceOrigin, 0, 1); ?>
							  
							  	<div class="d-flex flex-row-reverse">
									
									<?php if( $priceFinal > 0 && $priceFinal < $priceOrigin ){ ?>
									<div class="position-absolute p-3">
								  	<label class="h6 m-0 btn-main-site-section text-btn-site-section">
									  <b>&nbsp;<?php echo porcenDif($priceOrigin, $priceFinal); ?>%&nbsp;</b>
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

										<?php if( isset($value1["unitsMeasures"]) && is_array($value1["unitsMeasures"]) && count($value1["unitsMeasures"]) > 0 ){ ?>
										
										<?php $codePro = $value1["codProduct"]; ?>
										<?php $stockPro = $value1["stock"]; ?>

										<?php $counter2=-1;  if( isset($value1["unitsMeasures"]) && ( is_array($value1["unitsMeasures"]) || $value1["unitsMeasures"] instanceof Traversable ) && sizeof($value1["unitsMeasures"]) ) foreach( $value1["unitsMeasures"] as $key2 => $value2 ){ $counter2++; ?>
										
										<?php if( $value2["valueStock"] <= $stockPro && $value2["status"] == 1 ){ ?>
										<label class='btn btn-light border btn-sm py-0 mr-1 rounded-pill altUnitMeasure' data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="<?php echo htmlspecialchars( $codePro, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cod="<?php echo htmlspecialchars( $value2["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-dad="<?php echo htmlspecialchars( $nameCard, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-key="<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-prime="<?php echo htmlspecialchars( $keyPrime, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value2["id"] > 0 ){ ?>data-toggle="tooltip" data-placement="top" title='É igual a <?php echo maskPrice($value2["valueStock"]); ?> <?php echo htmlspecialchars( $value2["uni"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' data-boundary="window"<?php } ?>>
											<input type="radio" <?php if( $key2 == $keyPrime ){ ?>checked<?php } ?>> <?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
										</label>
										<?php } ?>
										
										<?php } ?>
										
										<?php } ?>	

									</p>	

								  	<p class="font-weigth-bold py-1">
												
										<?php if( $priceFinal > 0 && $priceFinal < $priceOrigin ){ ?>
										
										<a class="h6 text-decoration-none">
											<s class="card-ColorPromoPrice">R$<?php echo maskPrice($priceOrigin); ?></s>
										</a>
										
										<?php } ?>
										
										<a class="text-dark text-decoration-none">
											<b>R$</b>
											<span class="h3 priceItemProduct"><?php echo maskPrice($priceFinal); ?></span>
										</a>	
											
									</p>
						
							  	</div>

								<form id="formCard<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="formEnvia" data-id="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="<?php echo htmlspecialchars( $unitsMeasuresPrime["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-subtype="0" data-detect='<?php if( isset($userValues["login"]) && $userValues["login"] == false ){ ?>0<?php }else{ ?>1<?php } ?>'>
						  
								  	<div class="btn-group btn-group-justified w-100">
										
										<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="removeItem('inputCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-minus"></i></button>

										<input id="inputCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCardDiversos" type='<?php if( isset($unitsMeasuresPrime["freeFill"]) && $unitsMeasuresPrime["freeFill"] == 1 ){ ?>text<?php }else{ ?>number<?php } ?>' class="inputQtdCart text-center maskMoney2" value="1" max="<?php echo htmlspecialchars( $value1["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="font-size: 11px;font-weight: bold;width: 35%;" <?php if( isset($unitsMeasuresPrime["freeFill"]) && $unitsMeasuresPrime["freeFill"] == 0 ){ ?>readonly="true"<?php } ?>>

										<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="addItem('inputCardDiversos<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-plus"></i></button>

										<?php if( isset($value1["subTypes"]["types"]) && isset($value1["subTypes"]["status"]) && $value1["subTypes"]["status"] == 1 && is_array($value1["subTypes"]["types"]) && count($value1["subTypes"]["types"]) > 0 ){ ?>
										<button type="button" class="btn btn-sm btn-cart-site-section text-btn-site-section" data-toggle="modal" data-target="#modalSubTypesOptions" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-title="<?php echo htmlspecialchars( $value1["subTypes"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-dad="formCard<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											<i class="fas fa-shopping-cart msgAlertIcon" data-toggle="" data-target="#modalMsgAlert" data-text="Deseja finalizar o pedido?" data-link="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" data-btn-text="Finalizar" data-btn-text2="Continuar comprando"></i>
										</button>
										<?php }else{ ?>
										<button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section">
											<i class="fas fa-shopping-cart msgAlertIcon" data-toggle="" data-target="#modalMsgAlert" data-text="Deseja finalizar o pedido?" data-link="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" data-btn-text="Finalizar" data-btn-text2="Continuar comprando"></i>
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
					Desculpe, não encontramos resultados <?php if( !empty(trim($dep["cat"])) ){ ?>nessa categoria: <br> "<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php }else{ ?>nesse departamento: <br> "<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"<?php } ?>
					
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