<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="abs-center-x bcg-ini">
		<div id="img-logoInicial" class="img-fluid img-LogoIni">
			<div class="ct-carousel">
				<div>
					
					<br><br><br>
					<p class="<?php echo htmlspecialchars( $layout["txLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h3 tx-2em">INFORME SUA<br>
					<label class=" tx-2em">CIDADE <i class="fas fa-map-marker-alt"></i></label></p>
					<select id="selectStores" class="custom-select custom-select-lg slt-customLg bg-light border">
						<option value="0">Todas Cidades</option>
						<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?>
						<optgroup label="<?php echo htmlspecialchars( $value1["nameState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
							<?php $counter2=-1;  if( isset($value1["city"]) && ( is_array($value1["city"]) || $value1["city"] instanceof Traversable ) && sizeof($value1["city"]) ) foreach( $value1["city"] as $key2 => $value2 ){ $counter2++; ?>
							<option value="<?php echo htmlspecialchars( $value2["idCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["nameCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
							<?php } ?>
						</optgroup>
						<?php } ?>
						
					</select><br>
					<input type="button" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> btn-lg mt-2 mb-5 ipt-customLg" value="Encontrar lojas" onclick="alterStores('selectStores')">
				
				</div>
			</div>
		</div>	
	</section>  
	  
	<section class="ct-center mt-5">
		
		<div class="ct-ini">
			<p id="Title-Pes-Lojas" class="h4 text-center font-weight-normal">Explore as nossas lojas online</p>

			<div class="card-deck row">
				
				<?php $counter1=-1;  if( isset($store) && ( is_array($store) || $store instanceof Traversable ) && sizeof($store) ) foreach( $store as $key1 => $value1 ){ $counter1++; ?>
					
				<div class="col-md-4 addressStore<?php echo htmlspecialchars( $value1["idCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> allStores">

					<div class="mt-4 card">

						<div class="text-center">
							<img class="card-img-top py-3" src="/resources/imgs/logos/logo.png" style="width: 275px;" alt="Logo da loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="card-body">
								<p class="card-title h4 font-weight-normal">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
								<p class="card-text text-secondary">
									<a href="https://www.google.com/maps/place/<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["nameCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nickState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["cepStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-decoration-none text-secondary" target="_blank"><i class="fas fa-map-marker-alt"></i> 
									<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["nameCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["nickState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($value1["cepStore"]); ?>
									</a>
									<br>							
									<i class="fas fa-mobile-alt"></i> <?php if( $value1["telephoneStore"] != 0 ){ ?> <?php echo maskTel($value1["telephoneStore"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?> <br>
									<i class="far fa-envelope"></i> <?php if( $value1["emailStore"] != '' ){ ?> <?php echo htmlspecialchars( $value1["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?> <br>
									<i class="fab fa-whatsapp"></i> <?php if( $value1["whatsappStore"] != 0 ){ ?> <?php echo maskTel($value1["whatsappStore"]); ?> <?php }else{ ?> <b>Sem whatsapp</b> <?php } ?>
								</p>
							</div>
							<div class="card-footer text-center">
								<a href="/loja-<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> shadow-Btn">Acessar loja</a>
							</div>
					</div>
				</div>	
				<?php } ?>

			</div>
		</div>	
	</section>
