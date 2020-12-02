<?php if(!class_exists('Rain\Tpl')){exit;}?>
	<?php if( isset($imgs) && $imgs != 0 && isset($products) && is_array($products) && count($products) > 0 ){ ?>
	<div class="ct-null bg-white">	  
		
		<div class="owl-carousel owl-theme owl-loaded">
					
			<div class="CarouselImgs owl-stage-outer">
				  
				<div class="owl-stage">
					
					<?php $counter1=-1;  if( isset($imgs["promotions"]) && ( is_array($imgs["promotions"]) || $imgs["promotions"] instanceof Traversable ) && sizeof($imgs["promotions"]) ) foreach( $imgs["promotions"] as $key1 => $value1 ){ $counter1++; ?>
					<?php if( file_exists($value1["origin"]) ){ ?>
					<div class="owl-item text-center">
						<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/promotions/"><img src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="w-100 img-CarouselPrime" alt="<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"></a>
					</div>
					<?php } ?>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	  
	<?php if( isset($products) && is_array($products) && count($products) > 0 ){ ?>

	<section class="mt-5">
	  
		<p class="h4 text-uppercase font-weight-light text-center text-second-site-section">
		   Produtos que podem te interessar
	   </p>
	   
	   <div class="container mt-3">
		   
		   <div class="row cards-CartOne">
				 
			   <div class="owl-carousel owl-theme owl-loaded">
				   
				   <div class="CarouselOne owl-stage-outer">
						 
					   <div class="owl-stage">
						   
						   <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
						   
						   <?php if( $key1 < 7 ){ ?>
						   
						   <?php if( $value1["category"]["0"]["products"]["0"]["stock"] > 0 ){ ?>
						   <div class="owl-item text-center">
							<img class="rounded mx-auto d-block rounded-circle bg-white border carousel-ImgCircle cursorPointer" src="<?php echo htmlspecialchars( $value1["category"]["0"]["products"]["0"]["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Produtos" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $value1["category"]["0"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
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
	   </div>
   </section>

	<?php } ?>
	
	<?php if( isset($productsDep) && is_array($productsDep) && count($productsDep) > 0 ){ ?>
	   
	<?php $ctProDep = 0; ?>
	<?php $counter1=-1;  if( isset($productsDep) && ( is_array($productsDep) || $productsDep instanceof Traversable ) && sizeof($productsDep) ) foreach( $productsDep as $key1 => $value1 ){ $counter1++; ?>
	<?php if( isset($value1["status"]) && $value1["status"] == 1 ){ ?><?php $ctProDep += 1; ?><?php } ?>
	
	<?php if( $ctProDep < 15 && isset($value1["status"]) && $value1["status"] == 1 ){ ?>
	<section class="ct-center mt-mobile" style="margin-bottom:80px">
			
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
          				
						<div class="owl-stage text-center">
							
							<?php $counter2=-1;  if( isset($value1["products"]) && ( is_array($value1["products"]) || $value1["products"] instanceof Traversable ) && sizeof($value1["products"]) ) foreach( $value1["products"] as $key2 => $value2 ){ $counter2++; ?>
							<?php if( $value2["price"] > 0 && $key2 < 12 && $value2["stock"] > 0 ){ ?>
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
									
									<div id="card<?php echo htmlspecialchars( $value2["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="card card-Carousel border">
								  
										<img src="<?php echo htmlspecialchars( $value2["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="<?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

										<?php if( $value2["pricePromo"] > 0 ){ ?>
										<div class="card-img-overlay text-right">
											<label class="h6 btn-main-site-section text-btn-site-section">
												<b>&nbsp;<?php echo porcenDif($value2["price"], $value2["pricePromo"]); ?>%&nbsp;</b>
											</label>
										</div>
										<?php } ?>

										<div id="subCard<?php echo htmlspecialchars( $value2["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-second-site-section card-text m-0">
													<b><?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill">
													<input id="btnCardPromoWeigth" type="radio"> <?php echo htmlspecialchars( $value2["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
												</label>
											</p>	

												<p>
													<a class="font-weight-bold">	
														<?php if( $value2["pricePromo"] > 0 && $value2["pricePromo"] != $value2["price"] ){ ?>
														
														<a class="h6">
															<s class="card-ColorPromoPrice">R$<?php echo number_format($value2["price"], 2, ',', '.'); ?></s>
														</a>
														<span>R$</span><a class="h3"><?php echo strstr(number_format($value2["pricePromo"], 2, ',', '.'), ',', true); ?></a><a class="h6"><?php echo strstr(number_format($value2["pricePromo"], 2, ',', '.'), ','); ?></a>	
														
														<?php }else{ ?>

														<span>R$</span><a class="h3"><?php echo strstr(number_format($value2["price"], 2, ',', '.'), ',', true); ?></a><a class="h6"><?php echo strstr(number_format($value2["price"], 2, ',', '.'), ','); ?></a>

														<?php } ?>
													</a>
												</p>
											</div>
		
										</div>
										

										<form id="formCard<?php echo htmlspecialchars( $value2["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="formEnvia mt-auto" data-id="<?php echo htmlspecialchars( $value2["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
											<div class="btn-group btn-group-justified w-100">
			
												<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section bd-RdLeft" onClick="removeItem('inputCard<?php echo htmlspecialchars( $value2["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>')">-</button>
		
												<input id="inputCard<?php echo htmlspecialchars( $value2["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCardDiversos" type="number" class="w-25 text-center" value="1" readonly="true" max="<?php echo htmlspecialchars( $value2["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		
												<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="addItem('inputCard<?php echo htmlspecialchars( $value2["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>')">+</button>
												
												<?php if( isset($userValues["login"]) && $userValues["login"] == false ){ ?>
												<button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section bd-RdRight" data-toggle="modal" data-target="#modalMsgAlert" data-text="Deseja finalizar o pedido?" data-link="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" data-btn-text="Finalizar" data-btn-text2="Continuar comprando">
													<i class="fas fa-shopping-cart"></i>
												</button>
												<?php }else{ ?>
												<button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section bd-RdRight">
													<i class="fas fa-shopping-cart"></i>
												</button>
												<?php } ?>
		
											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							<?php } ?>
							<?php } ?>
							
          				</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
	<?php } ?>

	<?php }else{ ?>
	<section class="ct-center mt-mobile my-5">
		<div class="ml-3">
				
			<p class="h4 font-weight-normal">
				<a class="d-inline-block">
					<i class="far fa-frown bar-display text-second-site-section" style="font-size: 5em;"></i>
				</a>
				<a class="ml-3 d-inline-block text-second-site-section">
					Ops!<br>
					Desculpe, não encontramos produtos no site.<br>
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
	</section>	
	<?php } ?>