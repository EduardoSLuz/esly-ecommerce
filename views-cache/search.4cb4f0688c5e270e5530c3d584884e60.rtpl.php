<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-white">
				  <li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  <li class="breadcrumb-item active" aria-current="page">Search</li>
				</ol>
			  </nav>
		</div>

		<div class="row ct-ini">

			<div class="col-md-2 bar-display">
				
				<p class="h6">Buscar nos resultados</p>
				<hr>

				<p>
					<form class="input-group mb-2" method="POST">

						<input type="text" class="form-control" placeholder="">
						
						<div class="input-group-append">
							<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
						</div>

					</form>

				</p>

				<h6 class="mt-5">Marca</h6>
				<hr>

				<div class="overflow-auto max-height">
					
					<form class="" method="POST">

						<input type="checkbox" id="CheckMark" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark">Marca #1</label><br>
						
						<input type="checkbox" id="CheckMark2" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark2">Marca #2</label><br>

						<input type="checkbox" id="CheckMark3" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark3">Marca #3</label><br>

						<input type="checkbox" id="CheckMark4" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark4">Marca #4</label><br>

						<input type="checkbox" id="CheckMark5" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark5">Marca #5</label><br>

						<input type="checkbox" id="CheckMark6" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark6">Marca #6</label><br>

						<input type="checkbox" id="CheckMark7" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark7">Marca #7</label><br>

						<input type="checkbox" id="CheckMark8" class="mt-2 ckbx-ini">
						<label class="form-check-label h5 font-weight-normal" for="CheckMark8">Marca #8</label><br>
				
					</form>
					
				</div>

				<h6 class="mt-5">Preço</h6>
				<hr>

				<form method="POST">
					<div class="input-group input-group-sm">
						<input type="text" class="form-control text-center" value="1">
						<a class="h4">&nbsp;-&nbsp;</a>
						<input type="text" class="form-control text-center" value="100">
					</div>

					<div class="text-left mt-2">
						<button type="button" class="btn btn-primary btn-sm px-3">Filtrar</button>
					</div>
				</form>
				
			</div>

			<div id="ColSearchMaster" class="col-md-10 ct-Search">
				
				<div class="row">
					<div class="col-md-8">
						<h4 class="font-weight-normal">150 Resultados encontrados para <?php echo substr($search["s"], 0, 25); ?>...</h4>
					</div>

					<div class="col-md-4 text-right">
						<select class="btn btn-light border border-dark">
							<option>Ordenar por:</option>
							<option>Relevantes</option>
							<option>Mais baratos</option>
							<option>Mais caros</option>
							<option>A-Z</option>
							<option>Z-A</option>
						</select>

					</div>
				</div>
				
				<div class="col-md-12 px-0" >

					<div id="ProductsGrid" class="row text-center">

						<div class="ColunaCardsSearch col-md-3 mt-3">
							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
								<div id="CardSearch" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch', 'CardSubSearch','CardSearch')" onMouseOut="hideCart('FormCardSearch', 'CardSubSearch','CardSearch', 'inputCardSearch')">
							
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-13%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Agua Mineral Petropolis S/G</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearchPriceInt', 'cardSearchPriceDec', '3', '48')">
												<input id="btnCardSearchWeigth" type="radio" value="1L" checked> 1L
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearchPrice" class="h6">
														<s class="card-ColorSearchPrice">R$4,00</s>
													</a>
													R$<a id="cardSearchPriceInt" class="h3">3</a><a id="cardSearchPriceDec" class="h6">,48</a>	
												</b>
											</p>
										</div>

									</div>
									
									<form id="FormCardSearch" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch')">+</button>
												
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
						
						<div class="ColunaCardsSearch col-md-3 mt-3">
							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
								<div id="CardSearch2" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch2', 'CardSubSearch2','CardSearch2')" onMouseOut="hideCart('FormCardSearch2', 'CardSubSearch2','CardSearch2', 'inputCardSearch2')">
							
									<img src="/resources/imgs/produtos/Adocante.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-15%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch2" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Adoçante</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch2PriceInt', 'cardSearch2PriceDec', '15', '99')">
												<input id="btnCardSearch2Weigth" type="radio" value="400g" checked> 400g
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearch2Price" class="h6">
														<s class="card-ColorSearchPrice">R$17,00</s>
													</a>
													R$<a id="cardSearch2PriceInt" class="h3">15</a><a id="cardSearch2PriceDec" class="h6">,99</a>	
												</b>
											</p>
										</div>

									</div>
									
									<form id="FormCardSearch2" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft"  onClick="removeItem('inputCardSearch2')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch2" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch2')">+</button>
												
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
						
						<div class="ColunaCardsSearch col-md-3 mt-3">
							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
								<div id="CardSearch3" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch3', 'CardSubSearch3','CardSearch3')" onMouseOut="hideCart('FormCardSearch3', 'CardSubSearch3','CardSearch3', 'inputCardSearch3')">
							
									<img src="/resources/imgs/produtos/acucar uniao.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-35%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch3" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Açucar União</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch3PriceInt', 'cardSearch3PriceDec', '3', '85')">
												<input id="btnCardSearch3Weigth" type="radio" value="1Kg" checked> 1Kg
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearch3Price" class="h6">
														<s class="card-ColorSearchPrice">R$5,00</s>
													</a>
													R$<a id="cardSearch3PriceInt" class="h3">3</a><a id="cardSearch3PriceDec" class="h6">,85</a>	
												</b>
											</p>
										</div>

									</div>
									
									<form id="FormCardSearch3" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch3')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch3" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch3')">+</button>
												
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
						
						<div class="ColunaCardsSearch col-md-3 mt-3">
							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
										
								<div id="CardSearch4" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch4', 'CardSubSearch4','CardSearch4')" onMouseOut="hideCart('FormCardSearch4', 'CardSubSearch4','CardSearch4', 'inputCardSearch4')">
								
									<img src="/resources/imgs/produtos/biscoito oreo.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-40%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch4" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Biscoito Oreo</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch4PriceInt', 'cardSearch4PriceDec', '2', '99')">
												<input id="btnCardSearch4Weigth" type="radio" value="150g" checked> 150g
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearch4Price" class="h6">
														<s class="card-ColorSearchPrice">R$4,50</s>
													</a>
													R$<a id="cardSearch4PriceInt" class="h3">2</a><a id="cardSearch4PriceDec" class="h6">,99</a>	
												</b>
											</p>
										</div>

									</div>
									
									<form id="FormCardSearch4" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch4')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch4" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch4')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">
							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch5" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch5', 'CardSubSearch5','CardSearch5')" onMouseOut="hideCart('FormCardSearch5', 'CardSubSearch5','CardSearch5', 'inputCardSearch5')">
							  
									<img src="/resources/imgs/produtos/panettone bauducco.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-24%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch5" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Pannetone Bauducco</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch5PriceInt', 'cardSearch5PriceDec', '15', '00')">
												<input id="btnCardSearch5Weigth" type="radio" value="500g" checked> 500g
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearch5Price" class="h6">
														<s class="card-ColorSearchPrice">R$18,00</s>
													</a>
													R$<a id="cardSearch5PriceInt" class="h3">15</a><a id="cardSearch5PriceDec" class="h6">,00</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch5" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch5')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch5" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch5')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3 ">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch6" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch6', 'CardSubSearch6','CardSearch6')" onMouseOut="hideCart('FormCardSearch6', 'CardSubSearch6','CardSearch6', 'inputCardSearch6')">
							  
									<img src="/resources/imgs/produtos/trident.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-33%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch6" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Trident Melancia</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch6PriceInt', 'cardSearch6PriceDec', '2', '50')">
												<input id="btnCardSearch6Weigth" type="radio" value="UN" checked> UN
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearch6Price" class="h6">
														<s class="card-ColorSearchPrice">R$3,50</s>
													</a>
													R$<a id="cardSearch6PriceInt" class="h3">2</a><a id="cardSearch6PriceDec" class="h6">,50</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch6" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch6')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch6" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch6')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch7" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch7', 'CardSubSearch7','CardSearch7')" onMouseOut="hideCart('FormCardSearch7', 'CardSubSearch7','CardSearch7', 'inputCardSearch7')">
							  
									<img src="/resources/imgs/produtos/panettone arcor.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div class="card-img-overlay text-right">
										<label class="text-white h6 bg-primary">
											<b>&nbsp;-20%&nbsp;</b>
										</label>
									</div>

									<div id="CardSubSearch7" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Pannetone Arcor</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch7PriceInt', 'cardSearch7PriceDec', '9', '49')">
												<input id="btnCardSearch7Weigth" type="radio" value="500g" checked> 500g
											</label>
										</p>	

											<p class="mt-4">
												<b>												
													<a id="cardSearch7Price" class="h6">
														<s class="card-ColorSearchPrice">R$12,00</s>
													</a>
													R$<a id="cardSearch7PriceInt" class="h3">9</a><a id="cardSearch7PriceDec" class="h6">,49</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch7" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch7')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch7" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch7')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch8" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch8', 'CardSubSearch8','CardSearch8')" onMouseOut="hideCart('FormCardSearch8', 'CardSubSearch8','CardSearch8', 'inputCardSearch8')">
							  
									<img src="/resources/imgs/produtos/alface.png" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div id="CardSubSearch8" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Alface Crespo</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch8PriceInt', 'cardSearch8PriceDec', '2', '48')">
												<input id="btnCardSearch8Weigth" type="radio" value="UN" checked> UN
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch8PriceInt" class="h3">2</a><a id="cardSearch8PriceDec" class="h6">,48</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch8" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch8')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch8" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch8')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch9" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch9', 'CardSubSearch9','CardSearch9')" onMouseOut="hideCart('FormCardSearch9', 'CardSubSearch9','CardSearch9', 'inputCardSearch9')">
							  
									<img src="/resources/imgs/produtos/mandioca.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch9" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Mandioca</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch9PriceInt', 'cardSearch9PriceDec', '2', '99')">
												<input id="btnCardSearch9Weigth" type="radio" value="500g"> 500g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch9PriceInt', 'cardSearch9PriceDec', '5', '49')">
												<input id="btnCardSearch9Weigth2" type="radio" value="1Kg" checked> 1Kg
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">		
													R$<a id="cardSearch9PriceInt" class="h3">5</a><a id="cardSearch9PriceDec" class="h6">,99</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch9" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch9')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch9" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch9')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch10" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch10', 'CardSubSearch10','CardSearch10')" onMouseOut="hideCart('FormCardSearch10', 'CardSubSearch10','CardSearch10', 'inputCardSearch10')">
							  
									<img src="/resources/imgs/produtos/batata doce.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch10" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Batata Doce</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch10PriceInt', 'cardSearch10PriceDec', '2', '85')">
												<input id="btnCardSearch10Weigth" type="radio" value="1Kg" checked> 1Kg
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch10PriceInt" class="h3">2</a><a id="cardSearch10PriceDec" class="h6">,85</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch10" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch10')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch10" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch10')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch11" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch11', 'CardSubSearch11','CardSearch11')" onMouseOut="hideCart('FormCardSearch11', 'CardSubSearch11','CardSearch11', 'inputCardSearch11')">
							  
									<img src="/resources/imgs/produtos/cebola.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch11" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Cebola Nacional</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch11PriceInt', 'cardSearch11PriceDec', '5', '99')">
												<input id="btnCardSearch11Weigth" type="radio" value="250g"> 250g
											</label>
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch11PriceInt', 'cardSearch11PriceDec', '11', '99')">
												<input id="btnCardSearch11Weigth2" type="radio" value="500g"> 500g
											</label>
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch11PriceInt', 'cardSearch11PriceDec', '19', '99')">
												<input id="btnCardSearch11Weigth3" type="radio" value="1Kg" checked> 1Kg
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch11PriceInt" class="h3">19</a><a id="cardSearch11PriceDec" class="h6">,99</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch11" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch11')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch11" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch11')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch12" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch12', 'CardSubSearch12','CardSearch12')" onMouseOut="hideCart('FormCardSearch12', 'CardSubSearch12','CardSearch12', 'inputCardSearch12')">
							  
									<img src="/resources/imgs/produtos/alho.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch12" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Alho</b>
											</p>

										<p class="btn-group btn-group-toggle m-0 table-responsive" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch12PriceInt', 'cardSearch12PriceDec', '5', '50')">
												<input id="btnCardSearch12Weigth" type="radio" value="100g"> 100g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch12PriceInt', 'cardSearch12PriceDec', '10', '50')">
												<input id="btnCardSearch12Weigth" type="radio" value="200g"> 200g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch12PriceInt', 'cardSearch12PriceDec', '15', '50')">
												<input id="btnCardSearch12Weigth" type="radio" value="300g"> 300g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch12PriceInt', 'cardSearch12PriceDec', '50', '00')">
												<input id="btnCardSearch12Weigth" type="radio" value="1Kg" checked> 1Kg
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch12PriceInt" class="h3">50</a><a id="cardSearch12PriceDec" class="h6">,00</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch12" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch12')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch12" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch12')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">
							
							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch13" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch13', 'CardSubSearch13','CardSearch13')" onMouseOut="hideCart('FormCardSearch13', 'CardSubSearch13','CardSearch13', 'inputCardSearch13')">
							  
									<img src="/resources/imgs/produtos/rucula.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch13" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Rucula</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch13PriceInt', 'cardSearch13PriceDec', '2', '50')">
												<input id="btnCardSearch13Weigth" type="radio" value="UN" checked> UN
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch13PriceInt" class="h3">2</a><a id="cardSearch13PriceDec" class="h6">,50</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch13" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch13')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch13" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch13')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch14" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch14', 'CardSubSearch14','CardSearch14')" onMouseOut="hideCart('FormCardSearch14', 'CardSubSearch14','CardSearch14', 'inputCardSearch14')">
							  
									<img src="/resources/imgs/produtos/banana.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch14" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Banana Prata</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch14PriceInt', 'cardSearch14PriceDec', '1', '15')">
												<input id="btnCardSearch14Weigth" type="radio" value="300g"> 300g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch14PriceInt', 'cardSearch14PriceDec', '2', '20')">
												<input id="btnCardSearch14Weigth" type="radio" value="500g"> 500g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch14PriceInt', 'cardSearch14PriceDec', '3', '99')">
												<input id="btnCardSearch14Weigth" type="radio" value="1K" checked> 1Kg
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch14PriceInt" class="h3">3</a><a id="cardSearch14PriceDec" class="h6">,99</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch14" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch14')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch14" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch14')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch15" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch15', 'CardSubSearch15','CardSearch15')" onMouseOut="hideCart('FormCardSearch15', 'CardSubSearch15','CardSearch15', 'inputCardSearch15')">
							  
									<img src="/resources/imgs/produtos/limao.jpg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									
									<div id="CardSubSearch15" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Limão Taiti</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch15PriceInt', 'cardSearch15PriceDec', '0', '50')">
												<input id="btnCardSearch15Weigth" type="radio" value="100g"> 100g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch15PriceInt', 'cardSearch15PriceDec', '0', '99')">
												<input id="btnCardSearch15Weigth" type="radio" value="250g"> 250g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch15PriceInt', 'cardSearch15PriceDec', '1', '75')">
												<input id="btnCardSearch15Weigth" type="radio" value="500g" checked> 500g
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">	
													R$<a id="cardSearch15PriceInt" class="h3">1</a><a id="cardSearch15PriceDec" class="h6">,75</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch15" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch15')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch15" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch15')">+</button>
												
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

						<div class="ColunaCardsSearch col-md-3 mt-3">

							<a class="text-decoration-none" href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/">
									
								<div id="CardSearch16" class="card bg-white card-CarouselSearch" onMouseOver="showCart('FormCardSearch16', 'CardSubSearch16','CardSearch16')" onMouseOut="hideCart('FormCardSearch16', 'CardSubSearch16','CardSearch16', 'inputCardSearch16')">
							  
									<img src="/resources/imgs/produtos/cenoura.jpeg" class="img-fluid rounded mx-auto d-block card-ImgRes" alt="...">

									<div id="CardSubSearch16" class="card-body cardSub-Carousel cardSubT1-Carousel card-img-overlay p-0">

										<div>
											<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
												<b>Cenoura</b>
											</p>

										<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch16PriceInt', 'cardSearch16PriceDec', '0', '99')">
												<input id="btnCardSearch16Weigth" type="radio" value="250g"> 250g
											</label>
											
											<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardSearch16PriceInt', 'cardSearch16PriceDec', '1', '89')">
												<input id="btnCardSearch16Weigth2" type="radio" value="500g" checked> 500g
											</label>
										</p>	

											<p class="mt-4">
												<b class="text-dark text-decoration-none">		
													R$<a id="cardSearch16PriceInt" class="h3">1</a><a id="cardSearch16PriceDec" class="h6">,89</a>	
												</b>
											</p>
										</div>
	
									</div>
									
									<form id="FormCardSearch16" class="card-BarT1 mt-auto">
					
										<div class="btn-group btn-group-justified">

											<div class="btn-group w-100">
												<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch16')">-</button>
											</div>

												
											<div class="btn-group w-100">
												<input id="inputCardSearch16" type="number" min="1" class="w-100 text-center" value="1">
											</div>

												
											<div class="btn-group w-100">
													
												<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch16')">+</button>
												
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

					<!-- <div id="ProductsList" class="d-block mt-3"> 
						
						<div class="border row p-2">
							
							<div class="col-2 border text-center">

								<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" alt="Produto" class="img-thumbnail" style="width: 95px; height: 95px;">

								<div class="card-img-overlay text-right">
									<label class="text-white h6 bg-primary">
										<b>&nbsp;-13%&nbsp;</b>
									</label>
								</div>

							</div>

							<div class="col-4 border">
								
								<p class="card-title font-weight-light text-uppercase text-dark card-text m-0">
									<b>Agua Mineral Petropolis S/G</b>
								</p>

								<p class="btn-group btn-group-toggle m-0" data-toggle="buttons">

									<label class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" onClick="alterPriceItem('cardPromoPriceInt', 'cardPromoPriceDec', '3', '48')">
										<input id="btnCardPromoWeigth" type="radio" value="1L" checked> 1L
									</label>
									
								</p>

							</div>

							<div class="col-2 border">
								
								<b>												
									<a id="cardPromoPrice" class="h6">
										<s class="card-ColorPromoPrice">R$4,00</s>
									</a>
									R$<a id="cardPromoPriceInt" class="h3">3</a><a id="cardPromoPriceDec" class="h6">,48</a>	
								</b>

							</div>

							<div class="col-4 border">

								<div class="btn-group w-100">

									<div class="btn-group w-100">
										<button type="button" class="btn btn-primary bd-RdLeft" onClick="removeItem('inputCardSearch16')">-</button>
									</div>

										
									<div class="btn-group w-100">
										<input id="inputCardSearch16" type="number" min="1" class="w-100 text-center" value="1">
									</div>

										
									<div class="btn-group w-100">
											
										<button type="button" class="btn btn-primary" onClick="addItem('inputCardSearch16')">+</button>
										
									</div>

										
									<div class="btn-group w-100">
										<a href="#" class="btn btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
									</div>

								</div>

							</div>

						</div>
						
					</div> -->

					<hr>

					<div class="row">
						

						<div class="btn-group-toggle col-md">

							<a class="btn btn-light btn-sm border border-dark active" href="#">1</a>
							<a class="btn btn-light btn-sm border border-dark" href="#">2</a>
							<a class="btn btn-light btn-sm border border-dark" href="#">3</a>
							<a class="btn btn-light btn-sm border border-dark" href="#">4</a>
							<a class="btn btn-light btn-sm border border-dark" href="#">...</a>
							<a class="btn btn-light btn-sm border border-dark" href="#">Próxima</a>
							
						</div>
					
					</div>

				</div>

			</div>

		</div>
	</section>
	
	<div id="mySidenav" class="sidenav shadow cart-BtnFloat">
		<a href="javascript:void(0)" class="closebtn text-dark" onclick="closeNav()">
			<i class="fas fa-times h4"></i>
		</a>
		
		<div class="mx-3">
				
			<p class="h6">Buscar nos resultados</p>
			<hr>

			<p>
				<form class="input-group mb-2" method="POST">

					<input type="text" class="form-control" placeholder="">
					
					<div class="input-group-append">
						<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
					</div>

				</form>

			</p>

			<h6 class="mt-3">Marca</h6>
			<hr>

			<div class="overflow-auto max-height">
				
				<form class="" method="POST">

					<input type="checkbox" id="CheckMobMark" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark">Marca #1</label><br>
					
					<input type="checkbox" id="CheckMobMark2" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark2">Marca #2</label><br>

					<input type="checkbox" id="CheckMobMark3" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark3">Marca #3</label><br>

					<input type="checkbox" id="CheckMobMark4" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark4">Marca #4</label><br>

					<input type="checkbox" id="CheckMobMark5" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark5">Marca #5</label><br>

					<input type="checkbox" id="CheckMobMark6" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark6">Marca #6</label><br>

					<input type="checkbox" id="CheckMobMark7" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark7">Marca #7</label><br>

					<input type="checkbox" id="CheckMobMark8" class="mt-2 ckbx-ini">
					<label class="form-check-label h5 font-weight-normal" for="CheckMobMark8">Marca #8</label><br>
			
				</form>
				
			</div>

			<h6 class="mt-3">Preço</h6>
			<hr>

			<form method="POST">
				<div class="input-group input-group-sm">
					<input type="text" class="form-control text-center" value="1">
					<a class="h4">&nbsp;-&nbsp;</a>
					<input type="text" class="form-control text-center" value="100">
				</div>

				<div class="text-left mt-2">
					<button type="button" class="btn btn-primary btn-sm px-3">Filtrar</button>
				</div>
			</form>
			
		</div>
	</div>

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