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
				
				<p class="h6">Relacionados</p>
				<hr>

				<div class="overflow-auto max-height">

					<p class="h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #1</a>
					</p>

					<p class="h6 my-2">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #2</a>
					</p>

					<p class="h6 my-2">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #3</a>
					</p>

					<p class="h6 my-2">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #4</a>
					</p>

					<p class="h6 my-2">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #5</a>
					</p>

					<p class="h6 my-2">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #6</a>
					</p>

					<p class="h6 my-2">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #7</a>
					</p>
					
				</div>

				<p class="mt-4 h6">Buscar nos resultados</p>
				<hr>

				<p>
					<form class="input-group mb-2" method="POST">

						<input type="text" class="form-control" placeholder="">
						
						<div class="input-group-append">
							<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
						</div>

					</form>

				</p>

				<p class="mt-4 h6">Marca</p>
				<hr>

				<div class="overflow-auto max-height">

					<p class="h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #1</a>
					</p>

					<p class="my-2 h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #2</a>
					</p>

					<p class="my-2 h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #3</a>
					</p>

					<p class="my-2 h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #4</a>
					</p>

					<p class="my-2 h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #5</a>
					</p>

					<p class="my-2 h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #6</a>
					</p>

					<p class="my-2 h6">
						<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #7</a>
					</p>
					
				</div>

				<p class="mt-4 h6">Preço</p>
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
						<p class="font-weight-normal h4"><?php echo htmlspecialchars( $departament, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
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

					<div class="row">

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCardPromo', 'productCard')" onmouseout="barCardHidden('FormCardPromo', 'productCard')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard', 'inputCardPrice')">
											<input name="btnRadioCard" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard2" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard2', 'inputCardPrice')">
											<input name="btnRadioCard2" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCardPrice">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCardPromo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCardPromo')">-</button>

										<input id="inputCardPromo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCardPromo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard2" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard2Promo', 'productCard2')" onmouseout="barCardHidden('FormCard2Promo', 'productCard2')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card2">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard2" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard2', 'inputCard2Price')">
											<input name="btnRadioCard2" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard22" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard22', 'inputCard2Price')">
											<input name="btnRadioCard22" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard2Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard2Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard2Promo')">-</button>

										<input id="inputCard2Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard2Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard3" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard3Promo', 'productCard3')" onmouseout="barCardHidden('FormCard3Promo', 'productCard3')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card3">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard3" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard3', 'inputCard3Price')">
											<input name="btnRadioCard3" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard32" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard32', 'inputCard3Price')">
											<input name="btnRadioCard32" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard3Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard3Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard3Promo')">-</button>

										<input id="inputCard3Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard3Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard4" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard4Promo', 'productCard4')" onmouseout="barCardHidden('FormCard4Promo', 'productCard4')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card4">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard4" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard4', 'inputCard4Price')">
											<input name="btnRadioCard4" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard42" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard42', 'inputCard4Price')">
											<input name="btnRadioCard42" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard4Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard4Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard4Promo')">-</button>

										<input id="inputCard4Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard4Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard5" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard5Promo', 'productCard5')" onmouseout="barCardHidden('FormCard5Promo', 'productCard5')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card5">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard5" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard5', 'inputCard5Price')">
											<input name="btnRadioCard5" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard52" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard52', 'inputCard5Price')">
											<input name="btnRadioCard52" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard5Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard5Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard5Promo')">-</button>

										<input id="inputCard5Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard5Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard6" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard6Promo', 'productCard6')" onmouseout="barCardHidden('FormCard6Promo', 'productCard6')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card6">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard6" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard6', 'inputCard6Price')">
											<input name="btnRadioCard6" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard62" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard62', 'inputCard6Price')">
											<input name="btnRadioCard62" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard6Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard6Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard6Promo')">-</button>

										<input id="inputCard6Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard6Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard7" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard7Promo', 'productCard7')" onmouseout="barCardHidden('FormCard7Promo', 'productCard7')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card7">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard7" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard7', 'inputCard7Price')">
											<input name="btnRadioCard7" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard72" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard72', 'inputCard7Price')">
											<input name="btnRadioCard72" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard7Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard7Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard7Promo')">-</button>

										<input id="inputCard7Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard7Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard8" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard8Promo', 'productCard8')" onmouseout="barCardHidden('FormCard8Promo', 'productCard8')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card8">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard8" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard8', 'inputCard8Price')">
											<input name="btnRadioCard8" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard82" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard82', 'inputCard8Price')">
											<input name="btnRadioCard82" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard8Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard8Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard8Promo')">-</button>

										<input id="inputCard8Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard8Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard9" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard9Promo', 'productCard9')" onmouseout="barCardHidden('FormCard9Promo', 'productCard9')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card9">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard9" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard9', 'inputCard9Price')">
											<input name="btnRadioCard9" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard92" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard92', 'inputCard9Price')">
											<input name="btnRadioCard92" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard9Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard9Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard9Promo')">-</button>

										<input id="inputCard9Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard9Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard10" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard10Promo', 'productCard10')" onmouseout="barCardHidden('FormCard10Promo', 'productCard10')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card10">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard10" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard10', 'inputCard10Price')">
											<input name="btnRadioCard10" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard102" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard102', 'inputCard10Price')">
											<input name="btnRadioCard102" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard10Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard10Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard10Promo')">-</button>

										<input id="inputCard10Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard10Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard11" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard11Promo', 'productCard11')" onmouseout="barCardHidden('FormCard11Promo', 'productCard11')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card11">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard11" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard11', 'inputCard11Price')">
											<input name="btnRadioCard11" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard112" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard112', 'inputCard11Price')">
											<input name="btnRadioCard112" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard11Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard11Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard11Promo')">-</button>

										<input id="inputCard11Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard11Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard12" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard12Promo', 'productCard12')" onmouseout="barCardHidden('FormCard12Promo', 'productCard12')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card12">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard12" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard12', 'inputCard12Price')">
											<input name="btnRadioCard12" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard122" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard122', 'inputCard12Price')">
											<input name="btnRadioCard122" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard12Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard12Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard12Promo')">-</button>

										<input id="inputCard12Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard12Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard13" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard13Promo', 'productCard13')" onmouseout="barCardHidden('FormCard13Promo', 'productCard13')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card13">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard13" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard13', 'inputCard13Price')">
											<input name="btnRadioCard13" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard132" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard132', 'inputCard13Price')">
											<input name="btnRadioCard132" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard13Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard13Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard13Promo')">-</button>

										<input id="inputCard13Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard13Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard14" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard14Promo', 'productCard14')" onmouseout="barCardHidden('FormCard14Promo', 'productCard14')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card14">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard14" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard14', 'inputCard14Price')">
											<input name="btnRadioCard14" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard142" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard142', 'inputCard14Price')">
											<input name="btnRadioCard142" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard14Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard14Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard14Promo')">-</button>

										<input id="inputCard14Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard14Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard15" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard15Promo', 'productCard15')" onmouseout="barCardHidden('FormCard15Promo', 'productCard15')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card15">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard15" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard15', 'inputCard15Price')">
											<input name="btnRadioCard15" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard152" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard152', 'inputCard15Price')">
											<input name="btnRadioCard152" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard15Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard15Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard15Promo')">-</button>

										<input id="inputCard15Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard15Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

						<div class="col-sm-3 col-6 mt-3">
							<div id="productCard16" class="card bd-RdLeft bd-RdRight" onmouseover="barCardVs('FormCard16Promo', 'productCard16')" onmouseout="barCardHidden('FormCard16Promo', 'productCard16')">
								
								<div class="text-center cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">
									<img src="/resources/imgs/produtos/agua sg 510ml.jpeg" class="img-fluid rounded-pill text-center card-ImgRes" alt="Card16">
								</div>
								<div class="card-body p-0 text-center">
								  
									<p class="my-0 text-truncate cursorPointer" onclick="window.location.assign('/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/produto/')">ÁGUA S/G</p>

									<p class="my-2 tx-IconCart btn-group btn-group-toggle m-0 overflow-auto scroll-null" data-toggle="buttons">

										<label id="btnRadioCard16" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>1</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard16', 'inputCard16Price')">
											<input name="btnRadioCard16" type="radio" value="500ML"> 500ML
										</label>

										<label id="btnRadioCard162" class="btn btn-light border btn-sm py-0 mr-1 rounded-pill card-BtnWeigth active" data-value="<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>" onclick="alterPrice('btnRadioCard162', 'inputCard16Price')">
											<input name="btnRadioCard162" type="radio" value="1L" checked> 1L
										</label>
										
									</p>

								  	<p class="h3">
										<span id="inputCard16Price">
											<small class='h6'>R$</small><a>3</a><small class='h6'>,85</small>
										</span>
									</p>
								</div>

								<form id="FormCard16Promo" class="mt-3 vs-card">
						
									<div class="btn-group btn-group-justified w-100">
	
										<button type="button" class="btn btn-sm btn-primary bd-RdLeft" onClick="removeItem('inputCard16Promo')">-</button>

										<input id="inputCard16Promo" type="number" min="1" class="w-25 text-center" value="1">

										<button type="button" class="btn btn-sm btn-primary" onClick="addItem('inputCard16Promo')">+</button>
										
										<a href="#" class="btn btn-sm btn-success bd-RdRight">
											<i class="fas fa-shopping-cart"></i>
										</a>
	
									</div>
								
								</form>

							</div>
							
						</div>

					</div>

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
				
			<p class="h6">Relacionados</p>
				<hr>

				<div class="overflow-auto max-height">

				<p class="h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #1</a>
				</p>

				<p class="h6 my-2">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #2</a>
				</p>

				<p class="h6 my-2">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #3</a>
				</p>

				<p class="h6 my-2">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #4</a>
				</p>

				<p class="h6 my-2">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #5</a>
				</p>

				<p class="h6 my-2">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #6</a>
				</p>

				<p class="h6 my-2">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" ><i class="fas fa-arrow-right"></i> Tipo #7</a>
				</p>
				
			</div>

			<p class="mt-3 h6">Buscar nos resultados</p>
			<hr>

			<p>
				<form class="input-group mb-2" method="POST">

					<input type="text" class="form-control" placeholder="">
					
					<div class="input-group-append">
						<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
					</div>

				</form>

			</p>

			<p class="mt-3 h6">Marca</p>
			<hr>

			<div class="overflow-auto max-height">

				<p class="h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #1</a>
				</p>

				<p class="my-2 h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #2</a>
				</p>

				<p class="my-2 h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #3</a>
				</p>

				<p class="my-2 h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #4</a>
				</p>

				<p class="my-2 h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #5</a>
				</p>

				<p class="my-2 h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #6</a>
				</p>

				<p class="my-2 h6">
					<a href="" class="font-weight-normal text-decoration-none text-secondary" >Marca #7</a>
				</p>
				
			</div>

			<p class="mt-3 h6">Preço</p>
			<hr>

			<form method="POST">
				<div class="input-group input-group-sm">
					<input type="text" class="form-control text-center" value="1">
					<a class="h4">&nbsp;-&nbsp;</a>
					<input type="text" class="form-control text-center" value="100">
				</div>

				<div class="text-left my-2">
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
						
						<p class="text-center h4">
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
						
						<p class="text-left h5">
							<i class="fas fa-truck"></i> Regiões Atendidas
						</p>

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body py-0">
						
						<p class="font-weight-normal h5">Loja 01</p>
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