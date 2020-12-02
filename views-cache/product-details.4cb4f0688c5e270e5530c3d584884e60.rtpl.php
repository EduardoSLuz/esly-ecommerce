<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $product["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-0/" class="text-link-site-section"><?php echo htmlspecialchars( $product["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $product["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $product["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section"><?php echo htmlspecialchars( $product["category"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				  <li class="breadcrumb-item text-link-site-section " aria-current="page"><?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
				</ol>
			</nav>

			<div class="row">
				
				<div id="BarImgProduct" class="col-md-6">

					<p class="h5 font-weight-normal text-second-site-section text-uppercase navbar-display"><?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
					
					<div class="border rounded text-center shadow-sm bd-ImgProductDt bg-white">
						<img src="<?php echo htmlspecialchars( $product["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid py-4 img-ProductDetails" alt="Product">
					</div>
					
				</div>

				<div id="BarProductDetails" class="col-md-6">

					<p class="h3 font-weight-normal text-uppercase bar-display text-second-site-section"><?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

					<p class="btn-group btn-group-toggle mt-2" data-toggle="buttons">

						<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth">
							<input id="btnWeigth" type="radio" value="<?php echo htmlspecialchars( $product["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <?php echo htmlspecialchars( $product["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
						</label>
						
					</p>	

					<p class="h3 mt-1">

						<?php if( $product["pricePromo"] > 0 && $product["pricePromo"] != $product["price"] ){ ?>
														
						<a class="h6">
							<s class="card-ColorPromoPrice">R$<?php echo number_format($product["price"], 2, ',', '.'); ?></s>
						</a>
						<span>R$</span><a class="tx-1_5em"><?php echo strstr(number_format($product["pricePromo"], 2, ',', '.'), ',', true); ?></a><a class="tx-1em"><?php echo strstr(number_format($product["pricePromo"], 2, ',', '.'), ','); ?></a>	
						
						<?php }else{ ?>

						<span>R$</span><a class="tx-1_5em"><?php echo strstr(number_format($product["price"], 2, ',', '.'), ',', true); ?></a><a class="tx-1em"><?php echo strstr(number_format($product["price"], 2, ',', '.'), ','); ?></a>

						<?php } ?>

					</p>

					<form id="formCardProduct" class="formEnvia mt-auto" data-id="<?php echo htmlspecialchars( $product["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
						<div class="btn-group btn-group-justified">

							<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="removeItem('inputCardProduct')">-</button>

							<input id="inputCardProduct" name="inputCardDiversos" type="number" class="w-25 text-center" value="1" readonly="true" max="<?php echo htmlspecialchars( $product["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

							<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="addItem('inputCardProduct')">+</button>

							<?php if( isset($userValues["login"]) && $userValues["login"] == false ){ ?>
							<button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section" data-toggle="modal" data-target="#modalMsgAlert" data-text="Deseja finalizar o pedido?" data-link="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/" data-btn-text="Finalizar" data-btn-text2="Continuar comprando">
								<i class="fas fa-shopping-cart"></i>
							</button>
							<?php }else{ ?>
							<button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section">
								<i class="fas fa-shopping-cart"></i>
							</button>
							<?php } ?>

						</div>
					
					</form>

					<p class="h6 font-weight-normal mt-4 text-left text-second-site-section">
						<a>Código: #<?php echo htmlspecialchars( $product["barCode"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> 
						<?php if( !empty($product["mark"]) ){ ?><a> | Marca: <?php echo htmlspecialchars( $product["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> <?php } ?>
					</p>

					<hr class="mt-4">

					<p class="tx-IconCart font-weight-normal text-left text-second-site-section">
						* Preços de produtos pesáveis podem sofrer variação de acordo com o peso.<br>
						* Imagem meramente ilustrativa.<br>
						* Sujeito à disponibilidade de estoque.
					</p>

					<?php if( 0==1 ){ ?>
					<p class="h5 font-weight-normal text-left">Compartilhar</p>

					<p class="mt-3 text-left">
						<a href='mailto:?subject=<?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&body=Acesse esse link https://<?php echo htmlspecialchars( $HTTP, ENT_COMPAT, 'UTF-8', FALSE ); ?>/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $product["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="text-dark text-decoration-none h4 mr-3"><i class="far fa-envelope"></i></a>
						<a href="javascript: window.open('https://www.facebook.com/sharer/sharer.php?u=https://www.eduardosluz.com.br/product-details.html&display=popup&ref=plugin&src=like&kid_directed_site=0&app_id=113869198637480', '', 'width=600,height=500')" class="text-dark text-decoration-none h4 mr-3"><i class="fa fa-facebook-f"></i></a>
						<a href="javascript: window.open('https://twitter.com/intent/tweet?text=ALHO 20KG&url=https://www.eduardosluz.com.br/product-details.html', '', 'width=600,height=500')" class="text-dark text-decoration-none h4 mr-3"><i class="fab fa-twitter"></i></a>
						<a href="javascript: window.open('https://api.whatsapp.com/send?text=ALHO 20KG - https://www.eduardosluz.com.br/product-details.html', '', 'width=600,height=500')" class="text-dark text-decoration-none h4 mr-3"><i class="fab fa-whatsapp"></i></a>
					</p>
					<?php } ?>

				</div>

			</div>
			
			<div id="Carousel-MoreItems" class="mt-4">
				
				<p class="h4 font-weight-normal text-second-site-section"> PRODUTOS VISITADOS POR QUEM PROCURA ESTE ITEM </p>

				<div class="ct-carousel mt-3">
					<div class="row cards-CartTwo">
						<div class="owl-carousel owl-theme owl-loaded">
						<div class="CarouselTwo owl-stage-outer">
								
							<div class="owl-stage text-center">
								
								<?php $counter1=-1;  if( isset($departament) && ( is_array($departament) || $departament instanceof Traversable ) && sizeof($departament) ) foreach( $departament as $key1 => $value1 ){ $counter1++; ?>
								<?php if( $key1 <= 11 && $value1["stock"] > 0 ){ ?>
								<div class="owl-item text-center">
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">
										
										<div id="card<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="card card-Carousel">
									
											<img src="<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

											<?php if( $value1["pricePromo"] > 0 ){ ?>
											<div class="card-img-overlay text-right">
												<label class="h6 btn-main-site-section text-btn-site-section">
													<b>&nbsp;<?php echo porcenDif($value1["price"], $value1["pricePromo"]); ?>%&nbsp;</b>
												</label>
											</div>
											<?php } ?>

											<div id="subCard<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0 text-second-site-section">
														<b><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
													</p>

												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill">
														<input id="btnCardPromoWeigth" type="radio"> <?php echo htmlspecialchars( $value1["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
													</label>
												</p>	

													<p>
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
			
											</div>
											

											<form id="formCard<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="formEnvia mt-auto" data-id="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							
												<div class="btn-group btn-group-justified w-100">
				
													<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section bd-RdLeft" onClick="removeItem('inputCard<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')">-</button>
			
													<input id="inputCard<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCardDiversos" type="number" class="w-25 text-center" value="1">
			
													<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section" onClick="addItem('inputCard<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')">+</button>
								
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

			</div>

			<div id="Carousel-IntItems" class="mt-5">

				<p class="h5 text-uppercase font-weight-normal text-center text-second-site-section">Coisas que podem te interessar</p>
		
				<div class="container mt-3">
					
					<div class="row cards-CartOne">
						
						<div class="owl-carousel owl-theme owl-loaded">
							
							<div class="CarouselOne owl-stage-outer">
								
								<div class="owl-stage">
									
									<?php $counter1=-1;  if( isset($views) && ( is_array($views) || $views instanceof Traversable ) && sizeof($views) ) foreach( $views as $key1 => $value1 ){ $counter1++; ?>
							
									<?php if( $key1 <= 8 ){ ?>
									
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
			</div>
			
		</div>

	</section>