<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display NoPrintabled">
				<ol class="breadcrumb bg-site-section px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Carrinho</li>
				</ol>
			</nav>

			<div>

				<div class="NoPrintabled">
					<p class="h4 font-weight-normal text-second-site-section">Carrinho</p>

					<p class="mt-4 h6 font-weight-normal text-second-site-section">
						<i class="fas fa-store"></i> Unidade de atendimento: Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>
					</p>
				</div>

				<div id="alertCartCheckout" class='alert alert-success alert-dismissible fade show d-none text-left <?php if( isset($alerts["status"]) && $alerts["status"] == 1 ){ ?>msgAlertNow<?php } ?>' data-msg="<?php echo htmlspecialchars( $alerts["msg"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-status="<?php echo htmlspecialchars( $alerts["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-time="<?php echo htmlspecialchars( $alerts["time"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="alert">
					<span class="msgAlert">Msg</span>
				</div>

				<?php if( $cart["items"] != 0 ){ ?>
				<p class="tx-09em mt-3 text-right NoPrintabled">
					
					<button type="button" class="btn btn-sm btn-outline-danger ml-2 PopRemoveItem" data-toggle="popover" data-placement="top" data-trigger="hover" data-boundary="window" data-html="true" data-content="
					<span class='text-center'>
						Você ira mesmo remover o carrinho?
					</span>
					" data-action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/product/0/delete/" data-id="0" data-key=""><i class="far fa-trash-alt"></i> <b>Remover carrinho</b> 
					</button>
				</p>	

				<div id="TitlePrinter" class="display-None">
					<span class="text-second-site-section">https://<?php echo htmlspecialchars( $HTTP, ENT_COMPAT, 'UTF-8', FALSE ); ?>/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/cart/</span>
					<p class="text-second-site-section"><br>Carrinho (Loja 01) - Emitido em <?php echo date('d/m/Y'); ?> às <?php echo date('H:i:s'); ?></p>
				</div>
				
				<div id="InfoPrinter" class="display-None my-3">
					<p class="tx-09em font-weight-normal text-second-site-section">
						Marque a opção <b>Similar</b> para substituir o produto em caso de indisponibilidade no momento da separação ou deixe o campo desmarcado caso não deseje substituí-lo.
					</p>
				</div>

				<div class="NoPrintabled">
					<p class="tx-09em font-weight-normal d-mobile text-second-site-section">
						Marque a opção <b>Similar</b> para substituir o produto em caso de indisponibilidade no momento da separação ou deixe o campo desmarcado caso não deseje substituí-lo.
					</p>
	
					<p class="tx-09em font-weight-normal d-mobile-show text-second-site-section">
						Marque a opção <b>Similar</b> para substituir o produto em caso de indisponibilidade.
					</p>
				</div>

				<div class="table-responsive mt-2 scroll-null">
					<div class="table-ini">
						<table class="table table-sm bg-white border">
							<thead>
								<tr class="">
									<th class="font-weight-normal border-right text-second-site-section align-middle px-3 py-3">Item</th>
									<th class="font-weight-normal border-right text-second-site-section text-center align-middle">Quantidade</th>
									<th class="font-weight-normal border-right text-second-site-section text-center align-middle">Subtotal</th>
									<th class="font-weight-normal border-right text-second-site-section text-center align-middle NoPrintabled">
										<a class="text-danger cursorPointer PopRemoveItem" data-toggle="popover" data-placement="top" data-trigger="hover" data-boundary="window" data-html="true" data-content="
											<span class='text-center'>
												Você ira mesmo limpar o carrinho?
											</span>
										" data-action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/product/0/delete/" data-id="0" data-key="">
											<i class="fas fa-times"></i> <b class="d-mobile">Limpar carrinho</b>
										</a>
									</th>
									<th class="font-weight-normal text-center text-second-site-section align-middle">
										Similar 
										<i class="fas fa-question-circle" data-toggle="tooltip" data-placement="top" title="Marque para permitir a troca por similar caso não tenha o item no momento da separação." data-boundary="window"></i>
									</th>
								</tr>
							</thead>
							<tbody>
								
								<!-- PENDENTE: ALTERAR O MODO DE ATUALIZAR A QUANTIDADE DE PRODUTOS E ALTERAR A LISTA DE PRODUTOS DA PG: /HOME/, /SEARCH/, /DEPARTAMENT-PRODUCTS/, /PRODUCTS-DETAILS/ -->
								
								<?php $counter1=-1;  if( isset($cart["items"]) && ( is_array($cart["items"]) || $cart["items"] instanceof Traversable ) && sizeof($cart["items"]) ) foreach( $cart["items"] as $key1 => $value1 ){ $counter1++; ?>
								<tr id="checkoutCart<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									<td>
										<div class="row NoPrintabled">
											<div class="col-md-2 bar-display">
												<img src='<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="img-fluid" width="150px" alt="Produto <?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
											</div>
											<div class="col-md" >

												<?php if( isset($value1["details"]) && !empty($value1["details"]) ){ ?>
												<span class="tx-tableMobile td-ini text-decoration-none d-inline-block text-truncate text-break font-weight-normal  text-danger">	
													<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
												</span>
												<?php }else{ ?>
												<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/product/<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="tx-tableMobile td-ini text-decoration-none d-inline-block text-truncate text-break font-weight-normal text-second-site-section">	
													<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
												</a>
												<?php } ?>
												
												<p class="mt-2">
													
													<?php if( isset($value1["details"]) && $value1["details"] != '' ){ ?>
													<b class="text-danger"> <i class="fas fa-times"></i> <?php echo htmlspecialchars( $value1["details"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
													<?php }else{ ?>
													<b>
														R$ <?php echo maskPrice($value1["priceItem"]); ?>
														<?php if( isset($value1["unitPrime"]["freeFill"]) && $value1["unitPrime"]["freeFill"] == 1 ){ ?>
														<?php echo htmlspecialchars( $value1["unitReference"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
														<?php }else{ ?>
														<?php echo htmlspecialchars( $value1["unitReference"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php if( $value1["unitPrime"]["name"] != $value1["unitOrigin"]["name"] ){ ?>- <?php echo htmlspecialchars( $value1["unitPrime"]["valueStock"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["unitOrigin"]["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>
														<?php } ?>
													</b>
													<?php } ?>

												</p>
	
											</div>
										</div>

										<div class="display-None py-auto">
											<span class='<?php if( isset($value1["details"]) && !empty($value1["details"]) ){ ?>text-danger<?php }else{ ?>text-second-site-section<?php } ?>'>	
												<?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
											</span>
											
											<p class="text-second-site-section">
												
												<?php if( isset($value1["details"]) && $value1["details"] != '' ){ ?>
												<b class="text-danger"> <i class="fas fa-times"></i> <?php echo htmlspecialchars( $value1["details"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
												<?php }else{ ?>
												<b>R$ <?php echo maskPrice($value1["priceItem"]); ?></b>
												<?php } ?>

											</p>
										</div>
									</td>
									<td class="text-center align-middle">

										<div class="NoPrintabled">

											<form class="formUpdateItem" data-id="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cart="<?php echo htmlspecialchars( $value1["idCartItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												
												<div class="btn-group">
													
													<?php if( isset($value1["unitPrime"]["freeFill"]) && $value1["unitPrime"]["freeFill"] == 1 ){ ?>
													
													<input id="inputCart<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCart" type="text" class="form-control form-control-sm text-center maskMoney2" value="<?php echo htmlspecialchars( $value1["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 100px;">

													<button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm"><i class="fas fa-sync-alt"></i></button>

													<?php }else{ ?>

													<button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm" onClick="removeItem('inputCart<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-minus"></i></button>

													<input id="inputCart<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="inputCart" type="number" class="btn btn-light ipt-cart-sm text-center btn-sm" value="<?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly="true">
	
													<button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm" onClick="addItem('inputCart<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"><i class="fas fa-plus"></i></button>

													<?php } ?>

												</div>
												
												<div id="overlayCheckoutCart" class="btn d-none">
													<div class="overlay d-flex justify-content-center align-items-center">
														<i class="fas fa-1x fa-sync fa-spin"></i>
													</div>
												</div>

											</form>
											
										</div>

										<div id="itemQtd" class="display-None">
											
											<span class="text-second-site-section">
												<?php if( isset($value1["unitPrime"]["freeFill"]) && $value1["unitPrime"]["freeFill"] == 1 ){ ?>
												<?php echo htmlspecialchars( $value1["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
												<?php }else{ ?>
												<?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> 
												<?php } ?>
											</span>

										</div>
										
									</td>
									<td class="text-center align-middle">
										
										<div id="itemTotal<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="text-decoration-none">
											<span class="tx-tableMobile text-second-site-section"> R$ <?php echo maskPrice($value1["totalItem"]); ?></span>
										</div>

									</td>
									
									<td class="text-center NoPrintabled align-middle">
										
										<a id="PopRemoveItem" class="h5 text-danger cursorPointer PopRemoveItem" data-toggle="popover" data-placement="left" data-trigger="hover" title="Você ira remover esse item?" data-html="true" data-content="
											<p class='text-center'><?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
										" data-action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/product/<?php echo htmlspecialchars( $value1["idCartItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete/" data-id="1" data-key="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-times"></i>
										</a>

									</td>
									<td class="text-center align-middle">
										<input type="checkbox" class="checkSimilar cursorPointer" name="checkSimilar" data-key="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cart="<?php echo htmlspecialchars( $value1["idCartItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["similar"] == 1 ){ ?>checked<?php } ?> data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									</td>
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
					</div>

					<div class="display-None">
						<hr>
					</div>
				</div>

				<div class="NoPrintabled">
					<p class="tx-IconCart font-weight-normal text-second-site-section border-bottom pb-2">
						O preço e a disponibilidade dos itens estão sujeitos a alterações. O carrinho de compras é um local temporário para armazenar uma lista de seus itens e reflete o preço mais atualizado de cada um deles.<br>
						<a class="d-mobile text-second-site-section text-decoration-none">Você tem um cupom de desconto? Solicitamos que você insira seu código abaixo.</a>
					</p>
				</div>

				<div class="row">

					<div class="col-md-5 NoPrintabled">
						<?php if( 0 == 1 ){ ?>
						<label for="InputCoupon" class="text-second-site-section">Cupom Desconto:</label>

						<form action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/promo/" method="POST">
							<div class="input-group text-center px-0 col-md-6">

								<input type="text" id="inputPromo" name="inputPromo" class="form-control" placeholder="Informe seu cupom" maxlength="25">
	
								<div class="input-group-prepend">
									<button type="submit" id="BtnAplica" class="input-group-text btn btn-light rounded-right">Aplicar</button>
								</div>
	
							</div>

							<?php if( $cart["idPromo"] != 0 && $cart["promoInfo"] != 0 ){ ?>
							<p class="h6 font-weight-normal mt-2">
								<i class="fas fa-caret-right"></i> <i>Cupom aplicado:</i> <b><?php echo htmlspecialchars( $cart["promoInfo"]["code"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $cart["promoInfo"]["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
							</p>
							<?php } ?>
						</form>
						<?php } ?>

						<label for="InputFreigth" class="text-second-site-section">Simular Frete:</label>

						<form class="formFreigth" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/cart/freigth/" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="POST">
							<div class="input-group text-center px-0 col-md-8">

								<input type="text" id="inputFreigth" name="inputFreigth" class="freightSimulator form-control maskCep" placeholder="_____-___" value='<?php if( isset($freight) && $freight != 0 ){ ?><?php echo htmlspecialchars( $freight["cep"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
	
								<div class="input-group-prepend">
									<button type="submit" id="BtnFreigth" class="input-group-text btn btn-outline-second-site-section rounded-right">Calcular</button>
								</div>
	
							</div>

							<p id="priceFreigth" class="mt-1">
								<?php if( isset($freight) && $freight != 0 ){ ?>
								
								<?php if( $freight["details"]["0"]["status"] == 1 || $freight["details"]["1"]["status"] == 1 ){ ?>
								
								<span class="text-second-site-section"><i class="fas fa-angle-double-right"></i> <?php if( $freight["onlyCity"] == 0 ){ ?><?php echo htmlspecialchars( $freight["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>,<?php } ?> <?php echo htmlspecialchars( $freight["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $freight["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>:</span><br>
								
								<?php $counter1=-1;  if( isset($freight["details"]) && ( is_array($freight["details"]) || $freight["details"] instanceof Traversable ) && sizeof($freight["details"]) ) foreach( $freight["details"] as $key1 => $value1 ){ $counter1++; ?>
								
								<?php if( $value1["status"] == 1 ){ ?>
								<i class="px-3 text-second-site-section"><b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b> - <?php if( $value1["value"] > 0 ){ ?>R$ <?php echo maskPrice($value1["value"]); ?><?php }else{ ?><a class="text-success">Grátis</a><?php } ?><br></i>
								<?php } ?>

								<?php } ?>
								
								<?php }else{ ?>
								
								<i class="text-second-site-section">Frete Indisponível</i>

								<?php } ?>
								
								<?php } ?>
							</p>
						</form>
						
					</div>

					<div class="col-md-7 text-right mt-mobNavbar">
						
						<p id="cartTotal" class="h5 font-weight-normal">
							<span class="text-secondary">Subtotal:</span>  <b>R$<?php echo maskPrice($cart["totalCart"]); ?></b>
						</p>
						
					</div>

				</div>

				<div class="NoPrintabled">
					<hr class="mt-5 ">

					<div class="row">
						
						<div class="col-6">
							<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-sm btn-light border border-dark"><i class="fas fa-arrow-left"></i> <b class="font-weight-normal d-mobile">Continuar comprando</b></a>
						</div>

						<div class="col-6 text-right">
							<?php if( isset($userValues["login"]) && $userValues["login"] == false ){ ?>
							<button class="btn btn-sm btn-main-site-section text-btn-site-section" data-toggle="modal" data-target="#modalMsgAlertLinks" data-title="Faça login ou cadastre-se para finalizar seu pedido!" data-link="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/" data-text="Fazer Login" data-link2="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/register/" data-text2="Cadastrar-se">Finalizar compra <i class="fas fa-arrow-right"></i></button>
							<?php }else{ ?>
							<button type="button" class="btn btn-sm btn-main-site-section text-btn-site-section btnCheckCart" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Finalizar compra <i class="fas fa-arrow-right"></i></button>
							<?php } ?>
						</div>

					</div>
				</div>
				<?php }else{ ?>
				<p class="h1 my-3 font-weight-normal text-second-site-section">
					O carrinho está vazio <i class="far fa-grimace"></i>
				</p>

				<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-sm btn-outline-main-site-section">Fazer compras</a>
				<?php } ?>
				

			</div>
			
		</div>

	</section>

	<?php if( 0==1 ){ ?>
	<!-- MODAL SAVE LIST SHOPPING 
		<div class="modal fade" id="ModalSaveListShop" tabindex="-1" role="dialog" aria-labelledby="ModalSaveListShop" aria-hidden="true">
			
			<div class="modal-dialog">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body mx-3">
						
						<p class="h4 font-weight-normal">
							Criar lista de compras dos itens do carrinho
						</p>

						<label>Nome da lista de compras <small class="tx-09em">(mínimo de 10 caracteres)</small></label>
						<input class="form-control">
						<small>Ex. Compras de Julho.</small>

						<p class="my-3">
							Após a lista ser salva é possível adicioná-la futuramente ao carrinho sem perder tempo procurando pelos itens.
						</p>
						
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-light border border-dark" data-dismiss="modal">Sair</button>
						<button type="button" class="btn btn-sm btn-primary">Salvar</button>
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		MODAL Comment Product  
		<div class="modal fade" id="ModalCommentProduct" tabindex="-1" role="dialog" aria-labelledby="ModalCommentProduct" aria-hidden="true">
			
			<div class="modal-dialog">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body px-4">
						
						<p class="h5 font-weight-normal">Observação sobre o item:</p>

						<p class="tx-IconCart font-weight-normal text-uppercase">PANETTONE ARCOR PREMIUM CHOCOLATE 530G</p>

						<div>
							
							<div class="my-2">
								<textarea class="form-control" name="CommentProduct" id="CommentProduct" rows="7" placeholder="Escolher laranjas maduras e bonitas"></textarea>
							</div>

						</div>
						
					</div>

					<div class="modal-footer text-right px-4 pb-3">
						<button type="button" class="btn btn-light btn-sm border border-secondary" data-dismiss="modal">Sair</button>
						<button type="button" class="btn btn-primary btn-sm">Salvar</button>
					</div>
			  
				</div>
			
			</div>
		  
		</div> -->
	<?php } ?>