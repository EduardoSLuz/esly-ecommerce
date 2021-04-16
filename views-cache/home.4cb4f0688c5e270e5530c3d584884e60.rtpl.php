<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section>
		
		<div id="homeCarouselImgs2" class="ct-null bg-white" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">	  
			
			<?php if( isset($imgs) && $imgs != 0 && isset($productsDep) && is_array($productsDep) && count($productsDep) > 0 ){ ?>
			<div class="owl-carousel owl-theme owl-loaded">
						
				<div class="CarouselImgs owl-stage-outer" data-code="0">
					
					<div class="owl-stage d-flex">
						
						<?php $counter1=-1;  if( isset($imgs["promotions"]) && ( is_array($imgs["promotions"]) || $imgs["promotions"] instanceof Traversable ) && sizeof($imgs["promotions"]) ) foreach( $imgs["promotions"] as $key1 => $value1 ){ $counter1++; ?>
						<?php if( file_exists($value1["origin"]) ){ ?>
						<div class="owl-item text-center">
							<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/"><img src="/resources/imgs/logos/loading.gif" data-src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="lazyload w-100 img-CarouselPrime" alt="<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
						</div>
						<?php } ?>
						<?php } ?>
						
					</div>
				</div>
			</div>
			<?php } ?>

		</div>

	</section>
	  
	<section class="mt-5">
	  
		<p class="h4 text-uppercase font-weight-light text-center text-second-site-section">
		   Produtos que podem te interessar
	   	</p>
		   
	   	<div id="homeCarouselRecomend2" class="container mt-3" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
			<?php if( isset($productsDep) && is_array($productsDep) && count($productsDep) > 0 ){ ?>
		   	<div class="row cards-CartOne">
				 
			   	<div class="owl-carousel owl-theme owl-loaded">
				   
				   	<div class="CarouselOne owl-stage-outer">
						 
					   	<div class="owl-stage d-flex">
							<?php $ct = 0; ?>
						   	<?php $counter1=-1;  if( isset($productsDep) && ( is_array($productsDep) || $productsDep instanceof Traversable ) && sizeof($productsDep) ) foreach( $productsDep as $key1 => $value1 ){ $counter1++; ?>
							<?php $ct += 1; ?>
						   	<?php if( $ct <= 14 ){ ?>
						   
						   	<?php if( isset($value1["products"]["0"]["stock"]) && $value1["products"]["0"]["stock"] > 0 || isset($value1["products"]) && is_array($value1["products"]) && count($value1["products"]) > 1 ){ ?>
						   	<div class="owl-item text-center">
								<img class="lazyload rounded mx-auto d-block rounded-circle bg-white border carousel-ImgCircle cursorPointer" src="/resources/imgs/logos/loading.gif" data-src="<?php echo htmlspecialchars( $value1["products"]["0"]["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Produtos" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/')">
								<p class="text-center text-wrap text-second-site-section">
									<?php echo substr($value1["name"], 0, 25); ?>
								</p>
							</div>
						   	<?php } ?>

						   	<?php } ?>

						   	<?php } ?>
						   
						</div>
				   	</div>
			   	</div>
		   	</div>
			<?php } ?>
	   	</div>
		   
	</section>
	
	<section>

		<div id="homeCarouselProducts2" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

			<?php if( isset($productsDep) && is_array($productsDep) && count($productsDep) > 0 ){ ?>
	   
			<?php $counter1=-1;  if( isset($productsDep) && ( is_array($productsDep) || $productsDep instanceof Traversable ) && sizeof($productsDep) ) foreach( $productsDep as $key1 => $value1 ){ $counter1++; ?>
			
			<?php if( isset($value1["status"]) && $value1["status"] == 1 ){ ?>
			<div class="ct-center mt-mobile" style="margin-bottom:30px">
					
				<div class="ct-ini">
					<p class="h4 font-weight-light text-second-site-section mb-4">
						<b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
						<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="btn btn-second-site-section text-btn-site-section btn-sm ml-2 rounded-pill">
							Ver mais <i class="fas fa-angle-double-right"></i> 
						</a>
					</p>
				</div>	
					
				<div class="ct-carousel">
					<div class="row cards-CartTwo">
						<div class="owl-carousel owl-theme owl-loaded">
							<div class="CarouselTwo owl-stage-outer">
								
								<div class="owl-stage text-center card-group">
									
									<?php $counter2=-1;  if( isset($value1["products"]) && ( is_array($value1["products"]) || $value1["products"] instanceof Traversable ) && sizeof($value1["products"]) ) foreach( $value1["products"] as $key2 => $value2 ){ $counter2++; ?>
									<?php if( $value2["price"] > 0 && $key2 < 16 && $value2["stock"] > 0 ){ ?>

									<div id="card<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="owl-item text-center card rounded">
									<?php $nameCard = $value2["codProduct"]."$key2"; ?>
									<?php $keyPrime = array_key_first($value2["unitsMeasures"]); ?>
									<?php $unitsMeasuresPrime = $value2["unitsMeasures"]["$keyPrime"]; ?>
									<?php $unitsMeasures = $value2["unitsMeasures"]; ?>
									<?php $priceFinal = $unitsMeasuresPrime["price"]; ?>
									<?php $priceOrigin = $value2["priceFinal"] * $unitsMeasuresPrime["valueStock"]; ?>
									<?php $priceOrigin = maskPrice($priceOrigin, 0, 1); ?>

										<div class="d-flex flex-row-reverse p-2">
											
											<?php if( $priceFinal > 0 && $priceFinal < $priceOrigin ){ ?>
											<div class="position-absolute p-3">
												<label class="h6 m-0 btn-main-site-section text-btn-site-section">
												<b>&nbsp;<?php echo maskPrice(porcenDif($priceOrigin, $priceFinal)); ?>%&nbsp;</b>
												</label>
											</div>
											<?php } ?>
												
											<img src="/resources/imgs/logos/loading.gif" data-src="<?php echo htmlspecialchars( $value2["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="lazyload img-top rounded mx-auto d-block cursorPointer " style="height:150px;max-width: 135px;" alt="<?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
											
										</div>

										<div class="card-body text-center px-0">
											
											<p class="card-text font-weight-normal text-uppercase text-second-site-section m-0 cursorPointer tx-Mobile" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
												<?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
											</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<?php if( isset($value2["unitsMeasures"]) && is_array($value2["unitsMeasures"]) && count($value2["unitsMeasures"]) > 0 ){ ?>
												
												<?php $codePro = $value2["codProduct"]; ?>
												<?php $stockPro = $value2["stock"]; ?>
												
												<?php $counter3=-1;  if( isset($value2["unitsMeasures"]) && ( is_array($value2["unitsMeasures"]) || $value2["unitsMeasures"] instanceof Traversable ) && sizeof($value2["unitsMeasures"]) ) foreach( $value2["unitsMeasures"] as $key3 => $value3 ){ $counter3++; ?>

												<?php if( $value3["valueStock"] <= $stockPro && $value3["status"] == 1 ){ ?>
												<label class='btn btn-light border btn-sm py-0 mr-1 rounded-pill altUnitMeasure' data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="<?php echo htmlspecialchars( $codePro, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cod="<?php echo htmlspecialchars( $value3["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-dad="<?php echo htmlspecialchars( $nameCard, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-key="<?php echo htmlspecialchars( $key3, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-prime="<?php echo htmlspecialchars( $keyPrime, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value3["id"] > 0 ){ ?>data-toggle="tooltip" data-placement="top" title='É igual a <?php echo maskPrice($value3["valueStock"]); ?> <?php echo htmlspecialchars( $value3["uni"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' data-boundary="window"<?php } ?>>
													<input type="radio" <?php if( $key3 == $keyPrime ){ ?>checked<?php } ?>> <?php echo htmlspecialchars( $value3["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
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

										<form id="formCard<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="formEnvia" data-id="<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="<?php echo htmlspecialchars( $unitsMeasuresPrime["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-subtype="0" data-detect='<?php if( isset($userValues["login"]) && $userValues["login"] == false ){ ?>0<?php }else{ ?>1<?php } ?>'>
											
											<div class="btn-group btn-group-justified w-100">
			
												<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="removeItem('inputCardDiversos<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-minus tx-IconCart"></i></button>

												<input id="inputCardDiversos<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCardDiversos" type='<?php if( isset($unitsMeasuresPrime["freeFill"]) && $unitsMeasuresPrime["freeFill"] == 1 ){ ?>text<?php }else{ ?>number<?php } ?>' class="inputQtdCart text-center maskMoney2" value="1" max="<?php echo htmlspecialchars( $value2["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="font-size: 11px;font-weight: bold;width: 35%;" <?php if( isset($unitsMeasuresPrime["freeFill"]) && $unitsMeasuresPrime["freeFill"] == 0 ){ ?>readonly="true"<?php } ?>>

												<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="addItem('inputCardDiversos<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-plus tx-IconCart"></i></button>
												
												<?php if( isset($value2["subTypes"]["types"]) && isset($value2["subTypes"]["status"]) && $value2["subTypes"]["status"] == 1 && is_array($value2["subTypes"]["types"]) && count($value2["subTypes"]["types"]) > 0 ){ ?>
												<button type="button" class="btn btn-sm btn-cart-site-section text-btn-site-section" data-toggle="modal" data-target="#modalSubTypesOptions" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-title="<?php echo htmlspecialchars( $value2["subTypes"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-dad="formCard<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
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

									<?php } ?>
									<?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php } ?>
			<?php } ?>

			<?php }else{ ?>
			<div class="ct-center mt-mobile my-5">
				<div class="ml-3">
						
					<p class="h4 font-weight-normal">
						<a class="d-inline-block">
							<i class="far fa-frown bar-display text-second-site-section" style="font-size: 5em;"></i>
						</a>
						<a class="ml-3 d-inline-block text-second-site-section">
							Ops!<br>
							Desculpe, não foi encontrado produtos no site.<br>
						</a>
					</p>
				
				</div>

				<div class="ml-3 mt-5">
					<p class="h5 font-weight-normal text-second-site-section">Algumas sugestões:</p>
					<hr>
					<p class="ml-3 mt-4">
						<i class="fas fa-arrow-right text-second-site-section"></i> Aguarde alguns minutos e depois recarregue a página <br>
						<i class="fas fa-arrow-right text-second-site-section"></i> Tente entrar em contato com o suporte <br>
						<i class="fas fa-arrow-right text-second-site-section"></i> Verifique se seu navegador não está bloqueando nada no site <br>
						<i class="fas fa-arrow-right text-second-site-section"></i> Verifique sua conexão com a internet <br>
					</p>
				</div>
			</div>	
			<?php } ?>

		</div>

	</section>