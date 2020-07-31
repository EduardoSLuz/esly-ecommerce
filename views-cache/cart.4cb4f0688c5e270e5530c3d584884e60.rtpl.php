<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display NoPrintabled">
				<ol class="breadcrumb bg-white px-0">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
				  	<li class="breadcrumb-item active" aria-current="page">Cart</li>
				</ol>
			</nav>

			<div>

				<div class="NoPrintabled">
					<p class="h4 font-weight-normal">Carrinho</p>

					<p class="mt-4 h6 font-weight-normal text-secondary">
						<i class="fas fa-store"></i> Unidade de atendimento: Loja <?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
					</p>
				</div>

				<p class="tx-09em mt-3 text-right NoPrintabled">
					
					<button type="button" class="btn btn-sm btn-light border border-dark" data-toggle="modal" data-target="#ModalSaveListShop">
						<i class="far fa-save"></i> Salvar lista de compras 
					</button>
					
					<button type="button" class="btn btn-sm btn-light border border-dark ml-2 d-mobile" onclick="PrinterHTML()">
						<i class="fas fa-print"></i> Imprimir lista 
					</button>
					
					<button type="button" id="PopRemoveCart" class="btn btn-sm btn-light border border-dark ml-2" data-toggle="popover" data-placement="left" data-trigger="focus " title="Deseja mesmo remover o carrinho?" data-html="true" data-content="
					<div class='text-center'>
						<a class='btn btn-sm btn-success cursorPointer text-white'>Remover</a>
					</div>
					"><i class="far fa-trash-alt"></i> Remover carrinho 
					</button>
				</p>	

				<div id="TitlePrinter" class="display-None">
					<span>https://<?php echo htmlspecialchars( $links["HTTP"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/cart/</span>
					<p><br>Carrinho (Loja 01) - Emitido em 15/07/2020</p>
				</div>
				
				<div id="InfoPrinter" class="display-None my-3">
					<p class="tx-09em font-weight-normal">
						Marque a opção <b>Similar</b> para substituir o produto em caso de indisponibilidade no momento da separação ou deixe o campo desmarcado caso não deseje substituí-lo.
					</p>
				</div>

				<div class="NoPrintabled">
					<p class="tx-09em font-weight-normal d-mobile">
						Marque a opção <b>Similar</b> para substituir o produto em caso de indisponibilidade no momento da separação ou deixe o campo desmarcado caso não deseje substituí-lo.
					</p>
	
					<p class="tx-09em font-weight-normal d-mobile-show">
						Marque a opção <b>Similar</b> para substituir o produto em caso de indisponibilidade.
					</p>
				</div>

				<div class="table-responsive mt-2 scroll-null">
					<div class="table-ini">
						<table class="table table-sm">
							<thead>
								<tr class="tx-09em">
									<th class="font-weight-normal pr-5 border-bottom-0">Item</th>
									<th class="font-weight-normal text-center px-5 border-bottom-0">Quantidade</th>
									<th class="font-weight-normal text-center px-4 border-bottom-0">Subtotal</th>
									<th class="font-weight-normal text-center px-4 border-bottom-0 NoPrintabled">
										<button type="button" id="PopCleanCart" class="btn btn-danger btn-sm cursorPointer text-white" data-toggle="popover" data-placement="left" data-trigger="focus " title="Deseja mesmo limpar o carrinho?" data-html="true" data-content="
											<div class='text-center'>
												<a class='btn btn-sm btn-success cursorPointer text-white'>Limpar</a>
											</div>
										">
											<i class="fas fa-times"></i> <b class="font-weight-normal d-mobile">Limpar carrinho</b>
										</button>
									</th>
									<th class="font-weight-normal text-center px-4 border-bottom-0">Similar <i class="fas fa-question-circle"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="row NoPrintabled">
											<div class="col-md-2 bar-display">
												<img src="/resources/imgs/produtos/panettone arcor.png" class="img-fluid" width="150px">
											</div>
											<div class="col-md" >
												<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/produto/" class="tx-tableMobile td-ini text-decoration-none d-inline-block text-truncate text-break font-weight-normal text-dark">	
													PANETTONE ARCOR PREMIUM CHOCOLATE 530G
												</a>
												
												<p class="mt-2 tx-IconCart">
													<a>R$ 9,00</a><br>
													<a class="tx-1em cursorPointer" data-toggle="modal" data-target="#ModalCommentProduct"><i class="far fa-square"></i> Adicionar Observação</a>
												</p>
	
											</div>
										</div>

										<div class="display-None py-3">
											<span>	
												PANETTONE ARCOR PREMIUM CHOCOLATE 530G
											</span>
											
											<p class="tx-IconCart">
												<span>R$ 9,00</span>
											</p>
										</div>
									</td>
									<td class="text-center">

										<div class="NoPrintabled">

											<div class="btn-group">
												<button type="button" class="btn btn-primary btn-sm" onClick="removeItem('inputCard')">-</button>

												<input id="inputCard" type="number" min="1" class="btn btn-light btn-sm ipt-cart-sm text-center" value="1">

												<button type="button" class="btn btn-primary btn-sm" onClick="addItem('inputCard')">+</button>
											</div><br> 

											<button type="button" class="mt-2 btn btn-primary btn-sm" data-toggle="popover" data-placement="bottom" data-trigger="hover" data-html="true" data-content="Atualizar quantidade do item">Atualizar</button>
										</div>

										<div class="display-None py-4">
											<span> 1 </span>
										</div>
										
									</td>
									<td class="py-4 text-center">
										
										<div class="NoPrintabled">
											<a class="tx-tableMobile"> R$ 9,00</a>
										</div>

										<div class="display-None">
											<span class="tx-tableMobile"> R$ 9,00</span>
										</div>

									</td>
									
									<td class="py-4 text-center NoPrintabled">
										<button id="PopRemoveItem" class="btn btn-sm btn-outline-danger" data-toggle="popover" data-placement="left" data-trigger="focus " title="Deseja mesmo remover esse item?" data-html="true" data-content="
											<div class='text-center'>
												<p>PANETTONE ARCOR PREMIUM CHOCOLATE 530G</p>
												<a class='btn btn-sm btn-success cursorPointer text-white'>Remover</a>
											</div>
										"><i class="fas fa-times"></i>
									</button>
									</td>
									<td class="py-4 text-center">
										<input type="checkbox">
									</td>
								</tr>
							</tbody>
							
						</table>
					</div>

					<div class="display-None">
						<hr>
					</div>
				</div>

				<div class="NoPrintabled">
					<p class="tx-IconCart font-weight-normal border-bottom">
						O preço e a disponibilidade dos itens estão sujeitos a alterações. O carrinho de compras é um local temporário para armazenar uma lista de seus itens e reflete o preço mais atualizado de cada um deles.<br>
						<a class="d-mobile">Você tem um cupom de desconto? Solicitamos que você insira seu código abaixo.</a>
					</p>
				</div>

				<div class="row">

					<div class="col-md-5 NoPrintabled">
						<label for="InputCoupon">Cupom Desconto:</label>

						<div class="input-group text-center px-0 col-md-6">

							<input type="text" id="InputCoupon" class="form-control" placeholder="Informe seu cupom">

							<div class="input-group-prepend">
								<button type="button" id="BtnAplica" class="input-group-text btn btn-secondary rounded-right">Aplicar</button>
							</div>

						</div>
						
					</div>

					<div class="col-md-4 mt-mobNavbar NoPrintabled">
						<label for="InputFreigth">Simular Frete:</label>

						<div class="input-group text-center px-0 col-md-8">

							<input type="text" id="InputFreigth" class="form-control" placeholder="_____-___">

							<div class="input-group-prepend">
								<button type="button" id="BtnAplica" class="input-group-text btn btn-secondary rounded-right">Calcular</button>
							</div>

						</div>
						
					</div>

					<div class="col-md-3 text-right mt-mobNavbar">
						
						<p class="h5 font-weight-normal">
							<span class="text-secondary">Subtotal:</span>  <b>R$ 9,90</b>
						</p>
						
					</div>

				</div>

				<div class="NoPrintabled">
					<hr class="mt-5 ">

					<div class="row">
						
						<div class="col-6">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-sm btn-light border border-dark"><i class="fas fa-arrow-left"></i> <b class="font-weight-normal d-mobile">Continuar comprando</b></a>
						</div>

						<div class="col-6 text-right">
							<a href="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/checkout/delivery-pickup/" class="btn btn-sm btn-primary">Finalizar compra <i class="fas fa-arrow-right"></i></a>
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

		<!-- MODAL SAVE LIST SHOPPING  -->
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

		<!-- MODAL Comment Product  -->
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
		  
		</div>