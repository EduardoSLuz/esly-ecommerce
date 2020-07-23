<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Caminho...</a></li>
				  <li class="breadcrumb-item active" aria-current="page">Produto</li>
				</ol>
			</nav>

			<div class="row">
				
				<div id="BarImgProduct" class="col-md-6">

					<p class="h5 font-weight-normal text-uppercase navbar-display">Alho KG</p>
					
					<div class="border rounded text-center shadow-sm bd-ImgProductDt">
						<img src="/resources/imgs/produtos/alho.jpeg" class="img-fluid p-5 img-ProductDetails" alt="">
					</div>
					
				</div>

				<div id="BarProductDetails" class="col-md-6">

					<p class="h3 font-weight-normal text-uppercase bar-display">Alho KG</p>

					<p class="btn-group btn-group-toggle mt-2" data-toggle="buttons">

						<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('PriceInt', 'PriceDec', '5', '50')">
							<input id="btnWeigth" type="radio" value="100g"> 100g
						</label>
						
						<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('PriceInt', 'PriceDec', '10', '50')">
							<input id="btnWeigth2" type="radio" value="200g"> 200g
						</label>
						
						<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('PriceInt', 'PriceDec', '15', '50')">
							<input id="btnWeigth3" type="radio" value="300g"> 300g
						</label>
						
						<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('PriceInt', 'PriceDec', '50', '00')">
							<input id="btnWeigth4" type="radio" value="1Kg" checked> 1Kg
						</label>
					</p>	

					<p class="h3 mt-1">

						<b class="text-dark text-decoration-none">	
							R$ <a id="PriceInt" class="tx-1_5em">50</a><a id="PriceDec" class="tx-1em">,00</a>	
						</b>

					</p>

					<form id="FormCartProducts" class="mt-4">
						
						<div id="BarCartProductDetails" class="btn-group">

							<div class="btn-group w-50">
								<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCard')"><b class="h5">-</b></button>
							</div>

								
							<div class="btn-group">
								<input id="inputCard" type="number" min="1" class="w-100 text-center" value="1">
							</div>

								
							<div class="btn-group w-50">
									
								<button type="button" class="btn btn-primary" onClick="addItem('inputCard')"><b class="h5">+</b></button>
								
							</div>

								
							<div class="btn-group w-100">
								<a href="#" class="btn btn-success bd-RdRight">
									<i id="iconCart" class="fas fa-shopping-cart"></i> Adicionar
								</a>
							</div>

						</div>
					
					</form>

					<p class="h6 font-weight-normal mt-4 text-left">
						<a>Código: #00000000000</a> 
						<a> | Marca: empty</a> 
					</p>

					<hr class="mt-4">

					<p class="tx-IconCart font-weight-normal text-left">
						* Preços de produtos pesáveis podem sofrer variação de acordo com o peso.<br>
						* Imagem meramente ilustrativa.<br>
						* Sujeito à disponibilidade de estoque.
					</p>

					<p class="h5 font-weight-normal text-left">Compartilhar</p>

					<p class="mt-3 text-left">
						<a href="mailto:?subject=ALHO KG&body=file:///C:/ESL/Ecommerce/product-details.html&recipient=" class="text-dark text-decoration-none h4 mr-3"><i class="far fa-envelope"></i></a>
						<a href="javascript: window.open('https://www.facebook.com/sharer/sharer.php?u=https://www.eduardosluz.com.br/product-details.html&display=popup&ref=plugin&src=like&kid_directed_site=0&app_id=113869198637480', '', 'width=600,height=500')" class="text-dark text-decoration-none h4 mr-3"><i class="fa fa-facebook-f"></i></a>
						<a href="javascript: window.open('https://twitter.com/intent/tweet?text=ALHO 20KG&url=https://www.eduardosluz.com.br/product-details.html', '', 'width=600,height=500')" class="text-dark text-decoration-none h4 mr-3"><i class="fab fa-twitter"></i></a>
						<a href="javascript: window.open('https://api.whatsapp.com/send?text=ALHO 20KG - https://www.eduardosluz.com.br/product-details.html', '', 'width=600,height=500')" class="text-dark text-decoration-none h4 mr-3"><i class="fab fa-whatsapp"></i></a>
					</p>



				</div>

			</div>
			
			<div id="Carousel-MoreItems" class="mt-4">
				
				<p class="h4 font-weight-normal"> PRODUTOS VISITADOS POR QUEM PROCURA ESTE ITEM </p>

				<div class="ct-carousel mt-3">
					<div class="row cards-CartTwo">
						<div class="owl-carousel owl-theme owl-loaded">
						<div class="CarouselTwo owl-stage-outer">
								
							<div class="owl-stage text-center">
								
								<div class="owl-item text-center">
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts', 'CardSubProducts','CardProducts')" onMouseOut="hideCart('FormCardProducts', 'CardSubProducts','CardProducts', 'inputCardProducts')">
										
											<img src="/resources/imgs/produtos/alface.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											
											<div id="CardSubProducts" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Alface Crespo</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProductsPriceInt', 'CardProductsPriceDec', '2', '48')">
														<input id="btnCardProductsWeigth" type="radio" value="UN" checked> UN
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">	
															R$<a id="CardProductsPriceInt" class="h3">2</a><a id="CardProductsPriceDec" class="h6">,48</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts')">+</button>
														
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
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts2" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts2', 'CardSubProducts2','CardProducts2')" onMouseOut="hideCart('FormCardProducts2', 'CardSubProducts2','CardProducts2', 'inputCardProducts2')">
										
											<img src="/resources/imgs/produtos/mandioca.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											<div id="CardSubProducts2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Mandioca</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts2PriceInt', 'CardProducts2PriceDec', '2', '99')">
														<input id="btnCardProducts2Weigth" type="radio" value="500g"> 500g
													</label>
													
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts2PriceInt', 'CardProducts2PriceDec', '5', '49')">
														<input id="btnCardProducts2Weigth2" type="radio" value="1Kg" checked> 1Kg
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">		
															R$<a id="CardProducts2PriceInt" class="h3">5</a><a id="CardProducts2PriceDec" class="h6">,99</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts2" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts2')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts2" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts2')">+</button>
														
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
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts3" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts3', 'CardSubProducts3','CardProducts3')" onMouseOut="hideCart('FormCardProducts3', 'CardSubProducts3','CardProducts3', 'inputCardProducts3')">
										
											<img src="/resources/imgs/produtos/batata doce.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											<div id="CardSubProducts3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Batata Doce</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts3PriceInt', 'CardProducts3PriceDec', '2', '85')">
														<input id="btnCardProducts3Weigth" type="radio" value="1Kg" checked> 1Kg
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">	
															R$<a id="CardProducts3PriceInt" class="h3">2</a><a id="CardProducts3PriceDec" class="h6">,85</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts3" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts3')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts3" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts3')">+</button>
														
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
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts4" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts4', 'CardSubProducts4','CardProducts4')" onMouseOut="hideCart('FormCardProducts4', 'CardSubProducts4','CardProducts4', 'inputCardProducts4')">
										
											<img src="/resources/imgs/produtos/cebola.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											<div id="CardSubProducts4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Cebola Nacional</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts4PriceInt', 'CardProducts4PriceDec', '5', '99')">
														<input id="btnCardProducts4Weigth" type="radio" value="250g"> 250g
													</label>
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts4PriceInt', 'CardProducts4PriceDec', '11', '99')">
														<input id="btnCardProducts4Weigth2" type="radio" value="500g"> 500g
													</label>
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts4PriceInt', 'CardProducts4PriceDec', '19', '99')">
														<input id="btnCardProducts4Weigth3" type="radio" value="1Kg" checked> 1Kg
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">	
															R$<a id="CardProducts4PriceInt" class="h3">19</a><a id="CardProducts4PriceDec" class="h6">,99</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts4" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts4')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts4" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts4')">+</button>
														
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
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts5" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts5', 'CardSubProducts5','CardProducts5')" onMouseOut="hideCart('FormCardProducts5', 'CardSubProducts5','CardProducts5', 'inputCardProducts5')">
										
											<img src="/resources/imgs/produtos/alho.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											<div id="CardSubProducts5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Alho</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0 table-responsive" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts5PriceInt', 'CardProducts5PriceDec', '5', '50')">
														<input id="btnCardProducts5Weigth" type="radio" value="100g"> 100g
													</label>
													
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts5PriceInt', 'CardProducts5PriceDec', '10', '50')">
														<input id="btnCardProducts5Weigth" type="radio" value="200g"> 200g
													</label>
													
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts5PriceInt', 'CardProducts5PriceDec', '15', '50')">
														<input id="btnCardProducts5Weigth" type="radio" value="300g"> 300g
													</label>
													
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts5PriceInt', 'CardProducts5PriceDec', '50', '00')">
														<input id="btnCardProducts5Weigth" type="radio" value="1Kg" checked> 1Kg
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">	
															R$<a id="CardProducts5PriceInt" class="h3">50</a><a id="CardProducts5PriceDec" class="h6">,00</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts5" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts5')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts5" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts5')">+</button>
														
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
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts6" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts6', 'CardSubProducts6','CardProducts6')" onMouseOut="hideCart('FormCardProducts6', 'CardSubProducts6','CardProducts6', 'inputCardProducts6')">
										
											<img src="/resources/imgs/produtos/rucula.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											<div id="CardSubProducts6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Rucula</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts6PriceInt', 'CardProducts6PriceDec', '2', '50')">
														<input id="btnCardProducts6Weigth" type="radio" value="UN" checked> UN
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">	
															R$<a id="CardProducts6PriceInt" class="h3">2</a><a id="CardProducts6PriceDec" class="h6">,50</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts6" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts6')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts6" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts6')">+</button>
														
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
									
									<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
										<div id="CardProducts7" class="card bg-white card-Carousel" onMouseOver="showCart('FormCardProducts7', 'CardSubProducts7','CardProducts7')" onMouseOut="hideCart('FormCardProducts7', 'CardSubProducts7','CardProducts7', 'inputCardProducts7')">
										
											<img src="/resources/imgs/produtos/banana.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">
	
											<div id="CardSubProducts7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">
	
												<div>
													<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
														<b>Banana Prata</b>
													</p>
	
												<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">
	
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts7PriceInt', 'CardProducts7PriceDec', '1', '15')">
														<input id="btnCardProducts7Weigth" type="radio" value="300g"> 300g
													</label>
													
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts7PriceInt', 'CardProducts7PriceDec', '2', '20')">
														<input id="btnCardProducts7Weigth" type="radio" value="500g"> 500g
													</label>
													
													<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('CardProducts7PriceInt', 'CardProducts7PriceDec', '3', '99')">
														<input id="btnCardProducts7Weigth" type="radio" value="1K" checked> 1Kg
													</label>
												</p>	
	
													<p class="mt-4">
														<b class="text-dark text-decoration-none">	
															R$<a id="CardProducts7PriceInt" class="h3">3</a><a id="CardProducts7PriceDec" class="h6">,99</a>	
														</b>
													</p>
												</div>
			
											</div>
											
											<form id="FormCardProducts7" class="card-BarT1 mt-auto">
							
												<div class="btn-group btn-group-justified">
	
													<div class="btn-group w-100">
														<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardProducts7')">-</button>
													</div>
	
														
													<div class="btn-group w-100">
														<input id="inputCardProducts7" type="number" min="1" class="w-100 text-center" value="1">
													</div>
	
														
													<div class="btn-group w-100">
															
														<button type="button" class="btn btn-primary" onClick="addItem('inputCardProducts7')">+</button>
														
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

			</div>

			<div id="Carousel-IntItems" class="mt-mobNavbar">

				<p class="h5 text-uppercase font-weight-normal text-center">Coisas que podem te interessar</p>
		
				<div class="container mt-3">
					
					<div class="row cards-CartOne">
						
						<div class="owl-carousel owl-theme owl-loaded">
							
							<div class="CarouselOne owl-stage-outer">
								
								<div class="owl-stage">
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded mx-auto d-block rounded-circle bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/alface.png" alt="Produtos">
											<span class="">Alface</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/maca.jpeg" alt="Produtos">
											<span class="">Maçã</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/cafe.jpg" alt="Produtos">
											<span class="">Café</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/cokkie.jpeg" alt="Produtos">
											<span class="">Cokkies</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/cerveja.jpeg" alt="Produtos">
											<span class="">Cervejas</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/abacate.jpeg" alt="Produtos">
											<span class="">Abacate</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/banana.jpeg" alt="Produtos">
											<span class="">Banana</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white border carousel-ImgCircle" src="/resources/imgs/produtos/mandioca.jpeg" alt="Produtos">
											<span class="">Mandioca</span>
										</a>	
									</div>
									
									<div class="owl-item text-center">
										<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/" class="text-dark text-decoration-none">
											<img class="rounded-circle rounded mx-auto d-block bg-white borde carousel-ImgCircle" src="/resources/imgs/produtos/iogurtet.jpeg" alt="Produtos">
											<span class="">iogurtes</span>
										</a>	
									</div>
									
								</div>
							
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
						
						<h4 class="text-center">
							Seja bem vindo!
						</h4>

						<p>
							Em qual das lojas você deseja acessar?
						</p>
						
						<select name="SelectStoresModal" id="SelectStoresModal" class="custom-select">
							<option value="1">Loja 01</option>
							<option value="2">Loja 02</option>
							<option value="3">Loja 03</option>
						</select>
						
						<button type="button" class="btn btn-primary text-white w-100 mt-3">Acessar</button>

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
						
						<h5 class="text-left">
							<i class="fas fa-truck"></i> Regiões Atendidas
						</h5>

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body py-0">
						
						<h5 class="font-weight-normal">Loja 01</h5>
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