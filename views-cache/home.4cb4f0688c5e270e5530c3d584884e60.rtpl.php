<?php if(!class_exists('Rain\Tpl')){exit;}?>
	<div class="ct-null bg-white">	  
		
		<div class="owl-carousel owl-theme owl-loaded">
					
			<div class="CarouselImgs owl-stage-outer">
				  
				<div class="owl-stage">
					
					<div class="owl-item">
						<a href="#"><img src="/resources/imgs/banners/promocao/Img-Promo.jpg" class="w-100 img-CarouselPrime" alt="..."></a>	
					</div>
					
					<div class="owl-item text-center">
						<a href="#"><img src="/resources/imgs/banners/promocao/Img-Promo2.png" class="w-100 img-CarouselPrime" alt="..."></a>
					</div>
					
					<div class="owl-item text-center">
						<a href="#"><img src="/resources/imgs/banners/promocao/Img-Promo3.jpg" class="w-100 img-CarouselPrime" alt="..."></a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	  
	<br>
	  
	<section class="mt-3">
	  
	 	<p class="h4 text-uppercase font-weight-light text-center">Produtos que podem te interessar</p>
		
		<div class="container mt-3">
			
			<div class="row cards-CartOne">
				  
				<div class="owl-carousel owl-theme owl-loaded">
					
					<div class="CarouselOne owl-stage-outer">
          				
						<div class="owl-stage">
            				
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded mx-auto d-block rounded-circle bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/alface.png" alt="Produtos">
									<span class="">Alface</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/maca.jpeg" alt="Produtos">
									<span class="">Maçã</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/cafe.jpg" alt="Produtos">
									<span class="">Café</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/cokkie.jpeg" alt="Produtos">
									<span class="">Cokkies</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/cerveja.jpeg" alt="Produtos">
									<span class="">Cervejas</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/abacate.jpeg" alt="Produtos">
									<span class="">Abacate</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/banana.jpeg" alt="Produtos">
									<span class="">Banana</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/mandioca.jpeg" alt="Produtos">
									<span class="">Mandioca</span>
								</a>	
							</div>
							
							<div class="owl-item text-center">
								<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/" class="text-dark text-decoration-none">
									<img class="rounded-circle rounded mx-auto d-block bg-white borde carousel-ImgCircle" src="/resources/imgs/produtos/iogurtet.jpeg" alt="Produtos">
									<span class="">iogurtes</span>
								</a>	
							</div>
							
          				</div>
        			
					</div>
				</div>
			</div>
		</div>
	</section>
	  
	<section class="ct-center mt-mobile">
			
		<div class="ct-ini">
			<p class="h4 font-weight-light mb-4">
				<b>Promoções</b>
				<button type="button" class="btn btn-info btn-sm ml-2 rounded-pill">
					Ver mais <i class="fas fa-angle-double-right"></i> 
				</button>
			</p>
		</div>	
			
		<div class="ct-carousel">
			<div class="row cards-CartTwo">
      			<div class="owl-carousel owl-theme owl-loaded">
        			<div class="CarouselTwo owl-stage-outer">
          				
						<div class="owl-stage text-center">
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo', 'CardSubPromo','CardPromo')" onMouseOut="hideCart('FormCardPromo', 'CardSubPromo','CardPromo', 'inputCardPromo')">
								  
										<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-13%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Agua Mineral Petropolis S/G</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromoPriceInt', 'cardPromoPriceDec', '3', '48')">
													<input id="btnCardPromoWeigth" type="radio" value="1L" checked> 1L
												</label>
											</p>	

												<p>
													<b>												
														<a id="cardPromoPrice" class="h6">
															<s class="card-ColorPromoPrice">R$4,00</s>
														</a>
														R$<a id="cardPromoPriceInt" class="h3">3</a><a id="cardPromoPriceDec" class="h6">,48</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo2', 'CardSubPromo2','CardPromo2')" onMouseOut="hideCart('FormCardPromo2', 'CardSubPromo2','CardPromo2', 'inputCardPromo2')">
								  
										<img src="/resources/imgs/produtos/Adocante.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-15%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Adoçante</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromo2PriceInt', 'cardPromo2PriceDec', '15', '99')">
													<input id="btnCardPromo2Weigth" type="radio" value="400g" checked> 400g
												</label>
											</p>	

												<p class="mt-4">
													<b>												
														<a id="cardPromo2Price" class="h6">
															<s class="card-ColorPromoPrice">R$17,00</s>
														</a>
														R$<a id="cardPromo2PriceInt" class="h3">15</a><a id="cardPromo2PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo2" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft"  onClick="removeItem('inputCardPromo2')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo2" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo2')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo3', 'CardSubPromo3','CardPromo3')" onMouseOut="hideCart('FormCardPromo3', 'CardSubPromo3','CardPromo3', 'inputCardPromo3')">
								  
										<img src="/resources/imgs/produtos/acucar uniao.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-35%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Açucar União</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromo3PriceInt', 'cardPromo3PriceDec', '3', '85')">
													<input id="btnCardPromo3Weigth" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b>												
														<a id="cardPromo3Price" class="h6">
															<s class="card-ColorPromoPrice">R$5,00</s>
														</a>
														R$<a id="cardPromo3PriceInt" class="h3">3</a><a id="cardPromo3PriceDec" class="h6">,85</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo3" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo3')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo3" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo3')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo4', 'CardSubPromo4','CardPromo4')" onMouseOut="hideCart('FormCardPromo4', 'CardSubPromo4','CardPromo4', 'inputCardPromo4')">
								  
										<img src="/resources/imgs/produtos/biscoito oreo.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-40%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Biscoito Oreo</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromo4PriceInt', 'cardPromo4PriceDec', '2', '99')">
													<input id="btnCardPromo4Weigth" type="radio" value="150g" checked> 150g
												</label>
											</p>	

												<p class="mt-4">
													<b>												
														<a id="cardPromo4Price" class="h6">
															<s class="card-ColorPromoPrice">R$4,50</s>
														</a>
														R$<a id="cardPromo4PriceInt" class="h3">2</a><a id="cardPromo4PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo4" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo4')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo4" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo4')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo5', 'CardSubPromo5','CardPromo5')" onMouseOut="hideCart('FormCardPromo5', 'CardSubPromo5','CardPromo5', 'inputCardPromo5')">
								  
										<img src="/resources/imgs/produtos/panettone bauducco.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-24%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Pannetone Bauducco</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromo5PriceInt', 'cardPromo5PriceDec', '15', '00')">
													<input id="btnCardPromo5Weigth" type="radio" value="500g" checked> 500g
												</label>
											</p>	

												<p class="mt-4">
													<b>												
														<a id="cardPromo5Price" class="h6">
															<s class="card-ColorPromoPrice">R$18,00</s>
														</a>
														R$<a id="cardPromo5PriceInt" class="h3">15</a><a id="cardPromo5PriceDec" class="h6">,00</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo5" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo5')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo5" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo5')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo6', 'CardSubPromo6','CardPromo6')" onMouseOut="hideCart('FormCardPromo6', 'CardSubPromo6','CardPromo6', 'inputCardPromo6')">
								  
										<img src="/resources/imgs/produtos/trident.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-33%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Trident Melancia</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromo6PriceInt', 'cardPromo6PriceDec', '2', '50')">
													<input id="btnCardPromo6Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b>												
														<a id="cardPromo6Price" class="h6">
															<s class="card-ColorPromoPrice">R$3,50</s>
														</a>
														R$<a id="cardPromo6PriceInt" class="h3">2</a><a id="cardPromo6PriceDec" class="h6">,50</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo6" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo6')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo6" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo6')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardPromo7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardPromo7', 'CardSubPromo7','CardPromo7')" onMouseOut="hideCart('FormCardPromo7', 'CardSubPromo7','CardPromo7', 'inputCardPromo7')">
								  
										<img src="/resources/imgs/produtos/panettone arcor.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-20%&nbsp;</b>
											</label>
										</div>

										<div id="CardSubPromo7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Pannetone Arcor</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromo7PriceInt', 'cardPromo7PriceDec', '9', '49')">
													<input id="btnCardPromo7Weigth" type="radio" value="500g" checked> 500g
												</label>
											</p>	

												<p class="mt-4">
													<b>												
														<a id="cardPromo7Price" class="h6">
															<s class="card-ColorPromoPrice">R$12,00</s>
														</a>
														R$<a id="cardPromo7PriceInt" class="h3">9</a><a id="cardPromo7PriceDec" class="h6">,49</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardPromo7" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo7')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardPromo7" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardPromo7')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
          				</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	  	
	  
	  	<section class="ct-center mt-mobile">
			
			<div class="ct-ini">
				<p class="h4 font-weight-light mb-4">
					<b>Feira</b>
					<button type="button" class="btn btn-info btn-sm ml-2 rounded-pill">
						Ver mais <i class="fas fa-angle-double-right"></i> 
					</button>
				</p>
			</div>
		  
		  	<div class="ct-carousel">
			<div class="row cards-CartTwo">
      			<div class="owl-carousel owl-theme owl-loaded">
        			<div class="CarouselTwo owl-stage-outer">
          				
						<div class="owl-stage text-center">
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira', 'CardSubFeira','CardFeira')" onMouseOut="hideCart('FormCardFeira', 'CardSubFeira','CardFeira', 'inputCardFeira')">
								  
										<img src="/resources/imgs/produtos/alface.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div id="CardSubFeira" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Alface Crespo</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeiraPriceInt', 'cardFeiraPriceDec', '2', '48')">
													<input id="btnCardFeiraWeigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardFeiraPriceInt" class="h3">2</a><a id="cardFeiraPriceDec" class="h6">,48</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira2', 'CardSubFeira2','CardFeira2')" onMouseOut="hideCart('FormCardFeira2', 'CardSubFeira2','CardFeira2', 'inputCardFeira2')">
								  
										<img src="/resources/imgs/produtos/mandioca.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubFeira2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Mandioca</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira2PriceInt', 'cardFeira2PriceDec', '2', '99')">
													<input id="btnCardFeira2Weigth" type="radio" value="500g"> 500g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira2PriceInt', 'cardFeira2PriceDec', '5', '49')">
													<input id="btnCardFeira2Weigth2" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">		
														R$<a id="cardFeira2PriceInt" class="h3">5</a><a id="cardFeira2PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira2" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira2')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira2" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira2')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira3', 'CardSubFeira3','CardFeira3')" onMouseOut="hideCart('FormCardFeira3', 'CardSubFeira3','CardFeira3', 'inputCardFeira3')">
								  
										<img src="/resources/imgs/produtos/batata doce.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubFeira3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Batata Doce</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira3PriceInt', 'cardFeira3PriceDec', '2', '85')">
													<input id="btnCardFeira3Weigth" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardFeira3PriceInt" class="h3">2</a><a id="cardFeira3PriceDec" class="h6">,85</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira3" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira3')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira3" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira3')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira4', 'CardSubFeira4','CardFeira4')" onMouseOut="hideCart('FormCardFeira4', 'CardSubFeira4','CardFeira4', 'inputCardFeira4')">
								  
										<img src="/resources/imgs/produtos/cebola.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubFeira4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Cebola Nacional</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira4PriceInt', 'cardFeira4PriceDec', '5', '99')">
													<input id="btnCardFeira4Weigth" type="radio" value="250g"> 250g
												</label>
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira4PriceInt', 'cardFeira4PriceDec', '11', '99')">
													<input id="btnCardFeira4Weigth2" type="radio" value="500g"> 500g
												</label>
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira4PriceInt', 'cardFeira4PriceDec', '19', '99')">
													<input id="btnCardFeira4Weigth3" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardFeira4PriceInt" class="h3">19</a><a id="cardFeira4PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira4" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira4')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira4" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira4')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira5', 'CardSubFeira5','CardFeira5')" onMouseOut="hideCart('FormCardFeira5', 'CardSubFeira5','CardFeira5', 'inputCardFeira5')">
								  
										<img src="/resources/imgs/produtos/alho.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubFeira5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Alho</b>
												</p>

											<p class="btn-group btn-group-toggle m-0 table-responsive scroll-null" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira5PriceInt', 'cardFeira5PriceDec', '5', '50')">
													<input id="btnCardFeira5Weigth" type="radio" value="100g"> 100g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira5PriceInt', 'cardFeira5PriceDec', '10', '50')">
													<input id="btnCardFeira5Weigth" type="radio" value="200g"> 200g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira5PriceInt', 'cardFeira5PriceDec', '15', '50')">
													<input id="btnCardFeira5Weigth" type="radio" value="300g"> 300g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira5PriceInt', 'cardFeira5PriceDec', '50', '00')">
													<input id="btnCardFeira5Weigth" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardFeira5PriceInt" class="h3">50</a><a id="cardFeira5PriceDec" class="h6">,00</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira5" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira5')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira5" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira5')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira6', 'CardSubFeira6','CardFeira6')" onMouseOut="hideCart('FormCardFeira6', 'CardSubFeira6','CardFeira6', 'inputCardFeira6')">
								  
										<img src="/resources/imgs/produtos/rucula.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubFeira6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Rucula</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira6PriceInt', 'cardFeira6PriceDec', '2', '50')">
													<input id="btnCardFeira6Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardFeira6PriceInt" class="h3">2</a><a id="cardFeira6PriceDec" class="h6">,50</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira6" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira6')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira6" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira6')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardFeira7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardFeira7', 'CardSubFeira7','CardFeira7')" onMouseOut="hideCart('FormCardFeira7', 'CardSubFeira7','CardFeira7', 'inputCardFeira7')">
								  
										<img src="/resources/imgs/produtos/banana.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubFeira7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Banana Prata</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira7PriceInt', 'cardFeira7PriceDec', '1', '15')">
													<input id="btnCardFeira7Weigth" type="radio" value="300g"> 300g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira7PriceInt', 'cardFeira7PriceDec', '2', '20')">
													<input id="btnCardFeira7Weigth" type="radio" value="500g"> 500g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardFeira7PriceInt', 'cardFeira7PriceDec', '3', '99')">
													<input id="btnCardFeira7Weigth" type="radio" value="1K" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardFeira7PriceInt" class="h3">3</a><a id="cardFeira7PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardFeira7" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardFeira7')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardFeira7" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardFeira7')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
          				</div>
					</div>
				</div>
			</div>
			</div>
	  	</section>
	  
	  	<section class="ct-center mt-mobile">
			
			<div class="ct-ini">
				<p class="h4 font-weight-light mb-4">
					<b>Hortifruti</b>
					<button type="button" class="btn btn-info btn-sm ml-2 rounded-pill">
						Ver mais <i class="fas fa-angle-double-right"></i> 
					</button>
				</p>
			</div>
		  
		  	<div class="ct-carousel">
			<div class="row cards-CartTwo">
      			<div class="owl-carousel owl-theme owl-loaded">
        			<div class="CarouselTwo owl-stage-outer">
          				
						<div class="owl-stage text-center">
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti', 'CardSubHortiFruti','CardHortiFruti')" onMouseOut="hideCart('FormCardHortiFruti', 'CardSubHortiFruti','CardHortiFruti', 'inputCardHortiFruti')">
								  
										<img src="/resources/imgs/produtos/limao.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div id="CardSubHortiFruti" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Limão Taiti</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFrutiPriceInt', 'cardHortiFrutiPriceDec', '0', '50')">
													<input id="btnCardHortiFrutiWeigth" type="radio" value="100g"> 100g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFrutiPriceInt', 'cardHortiFrutiPriceDec', '0', '99')">
													<input id="btnCardHortiFrutiWeigth" type="radio" value="250g"> 250g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFrutiPriceInt', 'cardHortiFrutiPriceDec', '1', '75')">
													<input id="btnCardHortiFrutiWeigth" type="radio" value="500g" checked> 500g
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardHortiFrutiPriceInt" class="h3">1</a><a id="cardHortiFrutiPriceDec" class="h6">,75</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti2', 'CardSubHortiFruti2','CardHortiFruti2')" onMouseOut="hideCart('FormCardHortiFruti2', 'CardSubHortiFruti2','CardHortiFruti2', 'inputCardHortiFruti2')">
								  
										<img src="/resources/imgs/produtos/cenoura.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubHortiFruti2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Cenoura</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti2PriceInt', 'cardHortiFruti2PriceDec', '0', '99')">
													<input id="btnCardHortiFruti2Weigth" type="radio" value="250g"> 250g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti2PriceInt', 'cardHortiFruti2PriceDec', '1', '89')">
													<input id="btnCardHortiFruti2Weigth2" type="radio" value="500g" checked> 500g
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">		
														R$<a id="cardHortiFruti2PriceInt" class="h3">1</a><a id="cardHortiFruti2PriceDec" class="h6">,89</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti2" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti2')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti2" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti2')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti3', 'CardSubHortiFruti3','CardHortiFruti3')" onMouseOut="hideCart('FormCardHortiFruti3', 'CardSubHortiFruti3','CardHortiFruti3', 'inputCardHortiFruti3')">
								  
										<img src="/resources/imgs/produtos/kiwi.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubHortiFruti3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Kiwi Verde</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti3PriceInt', 'cardHortiFruti3PriceDec', '6', '50')">
													<input id="btnCardHortiFruti3Weigth" type="radio" value="500g"> 500g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti3PriceInt', 'cardHortiFruti3PriceDec', '13', '00')">
													<input id="btnCardHortiFruti3Weigth" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardHortiFruti3PriceInt" class="h3">13</a><a id="cardHortiFruti3PriceDec" class="h6">,50</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti3" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti3')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti3" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti3')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti4', 'CardSubHortiFruti4','CardHortiFruti4')" onMouseOut="hideCart('FormCardHortiFruti4', 'CardSubHortiFruti4','CardHortiFruti4', 'inputCardHortiFruti4')">
								  
										<img src="/resources/imgs/produtos/limao.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubHortiFruti4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Limão Siciliano</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti4PriceInt', 'cardHortiFruti4PriceDec', '1', '99')">
													<input id="btnCardHortiFruti4Weigth" type="radio" value="250g"> 250g
												</label>
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti4PriceInt', 'cardHortiFruti4PriceDec', '2', '99')">
													<input id="btnCardHortiFruti4Weigth2" type="radio" value="500g"> 500g
												</label>
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti4PriceInt', 'cardHortiFruti4PriceDec', '4', '99')">
													<input id="btnCardHortiFruti4Weigth3" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardHortiFruti4PriceInt" class="h3">4</a><a id="cardHortiFruti4PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti4" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti4')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti4" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti4')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti5', 'CardSubHortiFruti5','CardHortiFruti5')" onMouseOut="hideCart('FormCardHortiFruti5', 'CardSubHortiFruti5','CardHortiFruti5', 'inputCardHortiFruti5')">
								  
										<img src="/resources/imgs/produtos/maca.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubHortiFruti5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Maça</b>
												</p>

											<p class="btn-group btn-group-toggle m-0 table-responsive" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti5PriceInt', 'cardHortiFruti5PriceDec', '4', '99')">
													<input id="btnCardHortiFruti5Weigth" type="radio" value="300g"> 300g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti5PriceInt', 'cardHortiFruti5PriceDec', '6', '79')">
													<input id="btnCardHortiFruti5Weigth" type="radio" value="500g"> 500g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti5PriceInt', 'cardHortiFruti5PriceDec', '9', '50')">
													<input id="btnCardHortiFruti5Weigth" type="radio" value="700g"> 700g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti5PriceInt', 'cardHortiFruti5PriceDec', '12', '00')">
													<input id="btnCardHortiFruti5Weigth" type="radio" value="1,5Kg" checked> 1,5Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardHortiFruti5PriceInt" class="h3">12</a><a id="cardHortiFruti5PriceDec" class="h6">,00</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti5" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti5')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti5" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti5')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti6', 'CardSubHortiFruti6','CardHortiFruti6')" onMouseOut="hideCart('FormCardHortiFruti6', 'CardSubHortiFruti6','CardHortiFruti6', 'inputCardHortiFruti6')">
								  
										<img src="/resources/imgs/produtos/abacate.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubHortiFruti6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Abacate</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti6PriceInt', 'cardHortiFruti6PriceDec', '2', '79')">
													<input id="btnCardHortiFruti6Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardHortiFruti6PriceInt" class="h3">2</a><a id="cardHortiFruti6PriceDec" class="h6">,79</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti6" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti6')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti6" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti6')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardHortiFruti7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardHortiFruti7', 'CardSubHortiFruti7','CardHortiFruti7')" onMouseOut="hideCart('FormCardHortiFruti7', 'CardSubHortiFruti7','CardHortiFruti7', 'inputCardHortiFruti7')">
								  
										<img src="/resources/imgs/produtos/banana.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubHortiFruti7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Banana Prata</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti7PriceInt', 'cardHortiFruti7PriceDec', '1', '15')">
													<input id="btnCardHortiFruti7Weigth" type="radio" value="300g"> 300g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti7PriceInt', 'cardHortiFruti7PriceDec', '2', '20')">
													<input id="btnCardHortiFruti7Weigth" type="radio" value="500g"> 500g
												</label>
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardHortiFruti7PriceInt', 'cardHortiFruti7PriceDec', '3', '99')">
													<input id="btnCardHortiFruti7Weigth" type="radio" value="1Kg" checked> 1Kg
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardHortiFruti7PriceInt" class="h3">3</a><a id="cardHortiFruti7PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardHortiFruti7" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardHortiFruti7')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardHortiFruti7" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardHortiFruti7')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
          				</div>
					</div>
				</div>
			</div>
			</div>
	  	</section>
	  
	  <section class="ct-center mt-mobile">
			
			<div class="ct-ini">
				<p class="h4 font-weight-light mb-4">
					<b>Cervejas</b>
					<button type="button" class="btn btn-info btn-sm ml-2 rounded-pill">
						Ver mais <i class="fas fa-angle-double-right"></i> 
					</button>
				</p>
			</div>
		  
		  	<div class="ct-carousel">
			<div class="row cards-CartTwo">
      			<div class="owl-carousel owl-theme owl-loaded">
        			<div class="CarouselTwo owl-stage-outer">
          				
						<div class="owl-stage text-center">
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas', 'CardSubCervejas','CardCervejas')" onMouseOut="hideCart('FormCardCervejas', 'CardSubCervejas','CardCervejas', 'inputCardCervejas')">
								  
										<img src="/resources/imgs/produtos/cerveja amstel.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div id="CardSubCervejas" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Amstel Long Neck</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejasPriceInt', 'cardCervejasPriceDec', '3', '50')">
													<input id="btnCardCervejasWeigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCervejasPriceInt" class="h3">3</a><a id="cardCervejasPriceDec" class="h6">,50</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas2', 'CardSubCervejas2','CardCervejas2')" onMouseOut="hideCart('FormCardCervejas2', 'CardSubCervejas2','CardCervejas2', 'inputCardCervejas2')">
								  
										<img src="/resources/imgs/produtos/cerveja heineken.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCervejas2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Heineken Long Neck</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejas2PriceInt', 'cardCervejas2PriceDec', '4', '89')">
													<input id="btnCardCervejas2Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">		
														R$<a id="cardCervejas2PriceInt" class="h3">4</a><a id="cardCervejas2PriceDec" class="h6">,89</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas2" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas2')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas2" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas2')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas3', 'CardSubCervejas3','CardCervejas3')" onMouseOut="hideCart('FormCardCervejas3', 'CardSubCervejas3','CardCervejas3', 'inputCardCervejas3')">
								  
										<img src="/resources/imgs/produtos/cerveja heineken lt.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCervejas3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Heineken Lata</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejas3PriceInt', 'cardCervejas3PriceDec', '3', '70')">
													<input id="btnCardCervejas3Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCervejas3PriceInt" class="h3">3</a><a id="cardCervejas3PriceDec" class="h6">,70</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas3" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas3')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas3" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas3')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas4', 'CardSubCervejas4','CardCervejas4')" onMouseOut="hideCart('FormCardCervejas4', 'CardSubCervejas4','CardCervejas4', 'inputCardCervejas4')">
								  
										<img src="/resources/imgs/produtos/cerveja brahma ln.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCervejas4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Brahma Zero Long Neck</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejas4PriceInt', 'cardCervejas4PriceDec', '3', '99')">
													<input id="btnCardCervejas4Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCervejas4PriceInt" class="h3">3</a><a id="cardCervejas4PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas4" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas4')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas4" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas4')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas5', 'CardSubCervejas5','CardCervejas5')" onMouseOut="hideCart('FormCardCervejas5', 'CardSubCervejas5','CardCervejas5', 'inputCardCervejas5')">
								  
										<img src="/resources/imgs/produtos/cerveja brahma zero.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCervejas5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Brahma Zero Lata</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejas5PriceInt', 'cardCervejas5PriceDec', '2', '50')">
													<input id="btnCardCervejas5Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCervejas5PriceInt" class="h3">2</a><a id="cardCervejas5PriceDec" class="h6">,50</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas5" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas5')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas5" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas5')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas6', 'CardSubCervejas6','CardCervejas6')" onMouseOut="hideCart('FormCardCervejas6', 'CardSubCervejas6','CardCervejas6', 'inputCardCervejas6')">
								  
										<img src="/resources/imgs/produtos/cerveja glacial.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
										
										<div class="card-img-overlay text-right">
											<label class="text-white h6 bg-primary">
												<b>&nbsp;-50%&nbsp;</b>
											</label>
										</div>
										
										<div id="CardSubCervejas6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Glacial Lata</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejas6PriceInt', 'cardCervejas6PriceDec', '2', '00')">
													<input id="btnCardCervejas6Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">
														<a id="cardCervejas6Price" class="h6">
															<s class="card-ColorPromoPrice">R$3,00</s>
														</a>
														R$<a id="cardCervejas6PriceInt" class="h3">2</a><a id="cardCervejas6PriceDec" class="h6">,00</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas6" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas6')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas6" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas6')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCervejas7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCervejas7', 'CardSubCervejas7','CardCervejas7')" onMouseOut="hideCart('FormCardCervejas7', 'CardSubCervejas7','CardCervejas7', 'inputCardCervejas7')">
								  
										<img src="/resources/imgs/produtos/cerveja brahma.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCervejas7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Braham Extra Long Neck</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCervejas7PriceInt', 'cardCervejas7PriceDec', '3', '99')">
													<input id="btnCardCervejas7Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCervejas7PriceInt" class="h3">3</a><a id="cardCervejas7PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCervejas7" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCervejas7')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCervejas7" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCervejas7')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
          				</div>
					</div>
				</div>
			</div>
			</div>
	    </section>
	  
	  <section class="ct-center mt-mobile">
			
			<div class="ct-ini">
				<p class="h4 font-weight-light mb-4">
					<b>Iorgutes</b>
					<button type="button" class="btn btn-info btn-sm ml-2 rounded-pill">
						Ver mais <i class="fas fa-angle-double-right"></i> 
					</button>
				</p>
			</div>
		  
		  	<div class="ct-carousel">
			<div class="row cards-CartTwo">
      			<div class="owl-carousel owl-theme owl-loaded">
        			<div class="CarouselTwo owl-stage-outer">
          				
						<div class="owl-stage text-center">
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes', 'CardSubIorgutes','CardIorgutes')" onMouseOut="hideCart('FormCardIorgutes', 'CardSubIorgutes','CardIorgutes', 'inputCardIorgutes')">
								  
										<img src="/resources/imgs/produtos/iorgute ninho.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div id="CardSubIorgutes" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Ninho Nestle</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutesPriceInt', 'cardIorgutesPriceDec', '8', '49')">
													<input id="btnCardIorgutesWeigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardIorgutesPriceInt" class="h3">8</a><a id="cardIorgutesPriceDec" class="h6">,49</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes2', 'CardSubIorgutes2','CardIorgutes2')" onMouseOut="hideCart('FormCardIorgutes2', 'CardSubIorgutes2','CardIorgutes2', 'inputCardIorgutes2')">
								  
										<img src="/resources/imgs/produtos/iorgute batavo.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubIorgutes2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Abacaxi Batavo</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutes2PriceInt', 'cardIorgutes2PriceDec', '3', '79')">
													<input id="btnCardIorgutes2Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">		
														R$<a id="cardIorgutes2PriceInt" class="h3">3</a><a id="cardIorgutes2PriceDec" class="h6">,79</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes2" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes2')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes2" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes2')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes3', 'CardSubIorgutes3','CardIorgutes3')" onMouseOut="hideCart('FormCardIorgutes3', 'CardSubIorgutes3','CardIorgutes3', 'inputCardIorgutes3')">
								  
										<img src="/resources/imgs/produtos/iogurtet.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubIorgutes3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Chocolate Branco</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutes3PriceInt', 'cardIorgutes3PriceDec', '5', '00')">
													<input id="btnCardIorgutes3Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p>
													<b class="text-dark text-decoration-none">	
														R$<a id="cardIorgutes3PriceInt" class="h3">5</a><a id="cardIorgutes3PriceDec" class="h6">,00</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes3" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes3')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes3" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes3')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes4', 'CardSubIorgutes4','CardIorgutes4')" onMouseOut="hideCart('FormCardIorgutes4', 'CardSubIorgutes4','CardIorgutes4', 'inputCardIorgutes4')">
								  
										<img src="/resources/imgs/produtos/iorgute verde campo.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubIorgutes4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Verde Campo</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutes4PriceInt', 'cardIorgutes4PriceDec', '5', '99')">
													<input id="btnCardIorgutes4Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardIorgutes4PriceInt" class="h3">5</a><a id="cardIorgutes4PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes4" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes4')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes4" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes4')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes5', 'CardSubIorgutes5','CardIorgutes5')" onMouseOut="hideCart('FormCardIorgutes5', 'CardSubIorgutes5','CardIorgutes5', 'inputCardIorgutes5')">
								  
										<img src="/resources/imgs/produtos/iorgute nestle.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubIorgutes5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Neston Nestle</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutes5PriceInt', 'cardIorgutes5PriceDec', '6', '80')">
													<input id="btnCardIorgutes5Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardIorgutes5PriceInt" class="h3">6</a><a id="cardIorgutes5PriceDec" class="h6">,80</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes5" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes5')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes5" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes5')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes6', 'CardSubIorgutes6','CardIorgutes6')" onMouseOut="hideCart('FormCardIorgutes6', 'CardSubIorgutes6','CardIorgutes6', 'inputCardIorgutes6')">
								  
										<img src="/resources/imgs/produtos/iorgute itambe.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
										
										<div id="CardSubIorgutes6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Itambé</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutes6PriceInt', 'cardIorgutes6PriceDec', '4', '40')">
													<input id="btnCardIorgutes6Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">
														R$<a id="cardIorgutes6PriceInt" class="h3">4</a><a id="cardIorgutes6PriceDec" class="h6">,40</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes6" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes6')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes6" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes6')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardIorgutes7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardIorgutes7', 'CardSubIorgutes7','CardIorgutes7')" onMouseOut="hideCart('FormCardIorgutes7', 'CardSubIorgutes7','CardIorgutes7', 'inputCardIorgutes7')">
								  
										<img src="/resources/imgs/produtos/iorgute neston.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubIorgutes7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Iorgute Neston Banana/Maça 170g</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardIorgutes7PriceInt', 'cardIorgutes7PriceDec', '3', '99')">
													<input id="btnCardIorgutes7Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p>
													<b class="text-dark text-decoration-none">	
														R$<a id="cardIorgutes7PriceInt" class="h3">3</a><a id="cardIorgutes7PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardIorgutes7" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardIorgutes7')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardIorgutes7" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardIorgutes7')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
          				</div>
					</div>
				</div>
			</div>
			</div>
	   </section>
	  
	  	<section class="ct-center mt-mobile">
			
			<div class="ct-ini">
				<p class="h4 font-weight-light mb-4">
					<b>Cozinha</b>
					<button type="button" class="btn btn-info btn-sm ml-2 rounded-pill">
						Ver mais <i class="fas fa-angle-double-right"></i> 
					</button>
				</p>
			</div>
		  
		  	<div class="ct-carousel">
			<div class="row cards-CartTwo">
      			<div class="owl-carousel owl-theme owl-loaded">
        			<div class="CarouselTwo owl-stage-outer">
          				
						<div class="owl-stage text-center">
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha', 'CardSubCozinha','CardCozinha')" onMouseOut="hideCart('FormCardCozinha', 'CardSubCozinha','CardCozinha', 'inputCardCozinha')">
								  
										<img src="/resources/imgs/produtos/faqueiro tramontina.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										
										<div id="CardSubCozinha" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Faqueiro Simples Tramontina</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinhaPriceInt', 'cardCozinhaPriceDec', '95', '90')">
													<input id="btnCardCozinhaWeigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p>
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCozinhaPriceInt" class="h3">95</a><a id="cardCozinhaPriceDec" class="h6">,90</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha2', 'CardSubCozinha2','CardCozinha2')" onMouseOut="hideCart('FormCardCozinha2', 'CardSubCozinha2','CardCozinha2', 'inputCardCozinha2')">
								  
										<img src="/resources/imgs/produtos/faqueiro inox.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCozinha2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Faqueiro Aço Inox Tramontina</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
												
												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinha2PriceInt', 'cardCozinha2PriceDec', '140', '99')">
													<input id="btnCardCozinha2Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p>
													<b class="text-dark text-decoration-none">		
														R$<a id="cardCozinha2PriceInt" class="h3">140</a><a id="cardCozinha2PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha2" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha2')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha2" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha2')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha3', 'CardSubCozinha3','CardCozinha3')" onMouseOut="hideCart('FormCardCozinha3', 'CardSubCozinha3','CardCozinha3', 'inputCardCozinha3')">
								  
										<img src="/resources/imgs/produtos/cuscuzeira tramontina.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCozinha3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Cuscuzeira Fundo 2.2l Tramontina</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinha3PriceInt', 'cardCozinha3PriceDec', '149', '90')">
													<input id="btnCardCozinha3Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p>
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCozinha3PriceInt" class="h3">149</a><a id="cardCozinha3PriceDec" class="h6">,90</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha3" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha3')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha3" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha3')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha4', 'CardSubCozinha4','CardCozinha4')" onMouseOut="hideCart('FormCardCozinha4', 'CardSubCozinha4','CardCozinha4', 'inputCardCozinha4')">
								  
										<img src="/resources/imgs/produtos/cutelo faca.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCozinha4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Cutelo Tramontina</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinha4PriceInt', 'cardCozinha4PriceDec', '29', '99')">
													<input id="btnCardCozinha4Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCozinha4PriceInt" class="h3">29</a><a id="cardCozinha4PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha4" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha4')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha4" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha4')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha5', 'CardSubCozinha5','CardCozinha5')" onMouseOut="hideCart('FormCardCozinha5', 'CardSubCozinha5','CardCozinha5', 'inputCardCozinha5')">
								  
										<img src="/resources/imgs/produtos/kit churrasco.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCozinha5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Kit Churrasco</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinha5PriceInt', 'cardCozinha5PriceDec', '19', '70')">
													<input id="btnCardCozinha5Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCozinha5PriceInt" class="h3">19</a><a id="cardCozinha5PriceDec" class="h6">,70</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha5" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha5')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha5" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha5')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha6', 'CardSubCozinha6','CardCozinha6')" onMouseOut="hideCart('FormCardCozinha6', 'CardSubCozinha6','CardCozinha6', 'inputCardCozinha6')">
								  
										<img src="/resources/imgs/produtos/moedores.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
										
										<div id="CardSubCozinha6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Moedores de Sal e Pimenta Tramontina</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinha6PriceInt', 'cardCozinha6PriceDec', '250', '00')">
													<input id="btnCardCozinha6Weigth" type="radio" value="UN" checked> UN
												</label>
											</p>	

												<p>
													<b class="text-dark text-decoration-none">
														R$<a id="cardCozinha6PriceInt" class="h3">250</a><a id="cardCozinha6PriceDec" class="h6">,00</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha6" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha6')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha6" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha6')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
							<div class="owl-item text-center">
								
								<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/">
									
									<div id="CardCozinha7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardCozinha7', 'CardSubCozinha7','CardCozinha7')" onMouseOut="hideCart('FormCardCozinha7', 'CardSubCozinha7','CardCozinha7', 'inputCardCozinha7')">
								  
										<img src="/resources/imgs/produtos/caldeirao.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

										<div id="CardSubCozinha7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

											<div>
												<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
													<b>Caldeirão Tramontina</b>
												</p>

											<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

												<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardCozinha7PriceInt', 'cardCozinha7PriceDec', '37', '99')">
													<input id="btnCardCozinha7Weigth" type="radio" value="UN" checked> UN
												</label>
												
											</p>	

												<p class="mt-4">
													<b class="text-dark text-decoration-none">	
														R$<a id="cardCozinha7PriceInt" class="h3">37</a><a id="cardCozinha7PriceDec" class="h6">,99</a>	
													</b>
												</p>
											</div>
		
										</div>
										
										<form id="FormCardCozinha7" class="card-BarT1 mt-auto">
						
											<div class="btn-group btn-group-justified">

												<div class="btn-group w-100">
													<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardCozinha7')">-</button>
												</div>

													
												<div class="btn-group w-100">
													<input id="inputCardCozinha7" type="number" min="1" class="w-100 text-center" value="1">
												</div>

													
												<div class="btn-group w-100">
														
													<button type="button" class="btn btn-primary" onClick="addItem('inputCardCozinha7')">+</button>
													
												</div>

													
												<div class="btn-group w-100">
													<a href="#" class="btn btn-success bd-RdRight">
														<i class="fas fa-shopping-cart"></i>
													</a>
												</div>

											</div>
										
										</form>
										
									</div>
								</a>
								
							</div>
							
          				</div>
					</div>
				</div>
			</div>
			</div>
	  </section>

	<!-- MODALS PAGE INICIO -->

		<!-- MODAL ALTER STORES -->
		<div class="modal fade" id="ModalAlterStores" tabindex="-1" role="dialog" aria-labelledby="ModalAlterStores" aria-hidden="true">
			
			<div class="modal-dialog modal-dialog-centered modal-sm">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">
				  
						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body">
						
						<p class="h4 text-center">
							Seja bem vindo!
						</p>

						<p>
							Em qual das lojas você deseja acessar?
						</p>
						
						<select name="SelectStoresModal" id="SelectStoresModal" class="custom-select">
							<option value="1">Loja 01</option>
							<option value="2">Loja 02</option>
							<option value="3">Loja 03</option>
						</select>
						
						<a class="btn btn-primary text-white w-100 mt-3">Acessar</a>

						<p class="mt-2">
							Não encontrou a loja? No momento, o serviço de delivery está atendendo à algumas regiões.
						</p>

						<p>
							Conheça todas as lojas disponíveis para as compras.
						</p>
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL CONSULTATION REGIONS  -->
		<div class="modal fade" id="ModalConsultationRegions" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationRegions" aria-hidden="true">
			
			<div class="modal-dialog modal-dialog-centered modal-sm">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0 pb-2">
						
						<p class="h5 text-left">
							<i class="fas fa-truck"></i> Regiões Atendidas
						</p>

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body py-0">
						
						<p class="h5 font-weight-normal">Loja 01</p>
						<hr>

						<ul class="txList-StyleNone text-left">
							<li><i class="fas fa-map-marker-alt"></i> Centro</li>
							<li><i class="fas fa-map-marker-alt"></i> Jardim Noroeste</li>
							<li><i class="fas fa-map-marker-alt"></i> Jardim São Conrado</li>
							<li><i class="fas fa-map-marker-alt"></i> Nova Bahia</li>
							<li><i class="fas fa-map-marker-alt"></i> Tiradentes</li>
						</ul>
						
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL CONSULTATION HORARY  -->
		<div class="modal fade" id="ModalConsultationHorary" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationHorary" aria-hidden="true">
			
			<div class="modal-dialog modal-lg">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body">
						
						<div class="row">

							<div class="col-md">
								
								<p class="h5">
									Horários de retirada
								</p>

								<p class="mt-3">
									<b>Segunda-Feira:</b><br>
									09:00 - 12:00<br>
									14:00 - 18:00
								</p>

								<p>
									<b>Terça-Feira até Sexta-Feira:</b><br>
									08:00 - 12:00<br>
									13:00 - 20:00
								</p>

								<p>
									<b>Sábado e Domingo</b><br>
									09:00 - 15:00<br>
									
								</p>

							</div>

							<div class="col-md">
								
								<p class="h5">
									Horários de Entrega
								</p>

								<label for="SelectRegionModal">Escolha um região:</label><br>
								<div class="input-group">
									
									<select id="SelectRegionModal" class="custom-select">
										<option>Centro</option>
										<option>Jardim Noroeste</option>
										<option>Jardim São Conrado</option>
									</select>

									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
									</div>
								</div>


							</div>

						</div>
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>