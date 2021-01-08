<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="abs-center-x bcg-ini">
		<div id="img-logoInicial" class="img-fluid img-LogoIni">
			<div class="ct-carousel">
				
				<div class="py-5">
					
					<p class="h3 tx-2em">
						<span class="text-main-site-section">
							INFORME SUA <br>
							<label class="tx-2em">CIDADE <i class="fas fa-map-marker-alt"></i></label>
						</span>
					</p>
					
					<div class="mx-lg-0 mx-sm-auto mx-auto" style="max-width: 275px;">
						<select id="selectCityStores" class="custom-select custom-select-lg bg-light border">
							<option value="0">Todas Cidades</option>
							<?php if( isset($state) && $state != 0 ){ ?>
							<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?>
							<optgroup label="<?php echo htmlspecialchars( $value1["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
								<?php $kState = $key1; ?>
								<?php $counter2=-1;  if( isset($value1["city"]) && ( is_array($value1["city"]) || $value1["city"] instanceof Traversable ) && sizeof($value1["city"]) ) foreach( $value1["city"] as $key2 => $value2 ){ $counter2++; ?>
								<option value="<?php echo htmlspecialchars( $kState, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2, ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
								<?php } ?>
							</optgroup>
							<?php } ?>
							<?php } ?>
							
						</select>
						<input type="button" id="btnCityStores" class="btn btn-main-site-section text-btn-site-section btn-lg w-100 my-3" value="Encontrar lojas">
					</div>
				
				</div>
			</div>
		</div>	
	</section>  
	  
	<section class="ct-center mt-5">
		
		<div class="ct-ini">
			<p id="Title-Pes-Lojas" class="h4 text-center font-weight-normal text-second-site-section">Explore as nossas lojas online</p>

			<div class="card-deck row">
				
				<?php if( isset($store) && $store != 0 ){ ?>
				<?php $counter1=-1;  if( isset($store) && ( is_array($store) || $store instanceof Traversable ) && sizeof($store) ) foreach( $store as $key1 => $value1 ){ $counter1++; ?>
				
				<?php if( $value1["statusStore"] == 1 ){ ?>
				<div class="col-md-4 addressStore<?php echo htmlspecialchars( $value1["codeCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?> allStores card-deck">

					<div class="my-4 card">

						<div class="text-center px-2 py-3">
							<img class="card-img-top" src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>imgs/logo.png" style="max-width: 300px" alt="Logo da loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="card-body pt-0">
							
							<p class="card-title h4 font-weight-normal text-second-site-section">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
							
							<p class="card-text text-link-site-section py-1">
								<a href="https://www.google.com/maps/place/<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["cepStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section" target="_blank"><i class="fas fa-map-marker-alt"></i> 
								<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($value1["cepStore"]); ?>
								</a>
								<br>							
								<i class="fas fa-mobile-alt"></i> <?php if( $value1["telephoneStore"] != 0 ){ ?> <?php echo maskTel($value1["telephoneStore"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?> <br>
								<i class="far fa-envelope"></i> <?php if( $value1["emailStore"] != '' ){ ?> <?php echo htmlspecialchars( $value1["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?> <br>
								<i class="fab fa-whatsapp"></i> <?php if( $value1["whatsappStore"] != 0 ){ ?> <?php echo maskTel($value1["whatsappStore"]); ?> <?php }else{ ?> <b>Sem whatsapp</b> <?php } ?>
							</p>

						</div>

						<div class="card-footer text-center">
							<a href="/loja-<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn btn-main-site-section text-btn-site-section">Acessar loja</a>
						</div>
					</div>
				</div>
				<?php }else{ ?>
				
				<?php if( $key1 == 0 ){ ?>
				<div class="text-center w-100 py-5">
					<p class="h3 py-5">
						<i class="fas fa-exclamation-circle"></i> <i> Nenhuma Empresa Cadastrada!</i>
					</p>
				</div>	
				<?php } ?>

				<?php } ?>
				
				<?php } ?>
				<?php } ?>

			</div>
		</div>	
	</section>
