<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="abs-center-x bcg-ini">
		<div id="img-logoInicial" class="img-fluid img-LogoIni">
			<div class="ct-carousel">
				<div>
					
					<br><br><br>
					<p class="<?php echo htmlspecialchars( $layout["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h3 tx-2em">INFORME SUA<br>
					<label class="<?php echo htmlspecialchars( $layout["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?> tx-2em">CIDADE <i class="fas fa-map-marker-alt"></i></label></p>
					<select id="selectStores" class="custom-select custom-select-lg slt-customLg text-capitalize bg-light border">
						<option value="0">Todas cidades</option>
						<?php $counter1=-1;  if( isset($cityStore) && ( is_array($cityStore) || $cityStore instanceof Traversable ) && sizeof($cityStore) ) foreach( $cityStore as $key1 => $value1 ){ $counter1++; ?>
							<option value="<?php echo htmlspecialchars( $value1["idStoreAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["cityStoreAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["stateStoreAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
						<?php } ?>
						
					</select><br>
					<input type="button" class="btn <?php echo htmlspecialchars( $layout["btn"], ENT_COMPAT, 'UTF-8', FALSE ); ?> btn-lg mt-2 mb-5 ipt-customLg" value="Encontrar lojas" onclick="alterStores('selectStores')">
				
				</div>
			</div>
		</div>	
	</section>  
	  
	<section class="ct-center mt-5">
		
		<div class="ct-ini">
			<p id="Title-Pes-Lojas" class="h4 text-center font-weight-normal">Explore as nossas lojas online</p>

			<div class="card-deck row">
				
				<?php $counter1=-1;  if( isset($stores) && ( is_array($stores) || $stores instanceof Traversable ) && sizeof($stores) ) foreach( $stores as $key1 => $value1 ){ $counter1++; ?>
					
				<div class="col-md-4 addressStore<?php echo htmlspecialchars( $value1["idStoreAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?> allStores">

					<div class="mt-4 card">

						<div class="text-center">
							<img class="card-img-top py-3" src="/resources/imgs/logos/logo.png" style="width: 275px;" alt="Logo da loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="card-body">
								<p class="card-title h4 font-weight-normal">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
								<p class="card-text text-secondary">
									<i class="fas fa-map-marker-alt"></i> 
									<?php echo htmlspecialchars( $value1["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["cityStoreAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["stateStoreAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($value1["cepStore"]); ?>
									<br>							
									<i class="fas fa-mobile-alt"></i> <?php echo maskTel($value1["telephoneStore"]); ?> <br>
									<i class="far fa-envelope"></i> <?php echo htmlspecialchars( $value1["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <br>
									<i class="fab fa-whatsapp"></i> <?php echo maskTel($value1["whatsappStore"]); ?>
								</p>
							</div>
							<div class="card-footer text-center">
								<a href="/loja-<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="btn <?php echo htmlspecialchars( $layout["btn"], ENT_COMPAT, 'UTF-8', FALSE ); ?> shadow-Btn">Acessar loja</a>
							</div>
					</div>
				</div>	
				<?php } ?>

			</div>
		</div>	
	</section>

	<footer id="Footer-RedesSociais" class="<?php echo htmlspecialchars( $layout["footerBar"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mt-5">
		
		<?php if( $socialStore["instagramStore"] != '' || $socialStore["facebookStore"] != '' || $socialStore["twitterStore"] != '' || $socialStore["youtubeStore"] != '' ){ ?>
		<div class="bcg-ini ct-center">
			
			<div class="text-right <?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?> py-2">
				<a class="font-weight-normal">Redes Sociais:</a>
				<?php if( $socialStore["instagramStore"] != '' ){ ?>
				<a href="<?php echo htmlspecialchars( $socialStore["instagramStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="<?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h5"><i class="fab fa-instagram"></i></a>&nbsp;   
				<?php } ?>
				
				<?php if( $socialStore["facebookStore"] != '' ){ ?>
				<a href="<?php echo htmlspecialchars( $socialStore["facebookStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="<?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h5"><i class="fab fa-facebook-square"></i></a>&nbsp;  
				<?php } ?>

				<?php if( $socialStore["twitterStore"] != '' ){ ?>
				<a href="<?php echo htmlspecialchars( $socialStore["twitterStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="<?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h5"><i class="fab fa-twitter-square"></i></a>&nbsp; 
				<?php } ?>

				<?php if( $socialStore["youtubeStore"] != '' ){ ?>
				<a href="<?php echo htmlspecialchars( $socialStore["youtubeStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="__blank" class="<?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?> h5"><i class="fab fa-youtube"></i></a>  
				<?php } ?>
			</div>
		
		</div>
		<?php }else{ ?>
			<div class="bcg-ini ct-center">
				<div class="text-right <?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?> py-2">
					<span class="font-weight-normal h5">Redes Sociais</span>
				</div>
			</div>
		<?php } ?>

	</footer>
	  
	<section id="FooterInfo" class="mt-5 ct-center mb-5">
		
		<div class="ct-ini row">
			
			<div class="col-md-4 mt-mob">
				
				<p class="h6">Suporte</p>
				<hr>
				<p class="h6 font-weight-normal my-3">
					<i class="fas fa-phone-alt"></i> (67) 9876-5432
				</p>

				<p class="h6 font-weight-normal my-3">
					<i class="fab fa-whatsapp"></i> (67) 98765-4321
				</p>

				<p class="h6 font-weight-normal my-3">
					<i class="far fa-envelope"></i> Suporte@astemacms.com.br
				</p>
			
			</div>
			
			
			<div class="col-md-4 mt-mob">
				
				<p class="h6">Site Seguro</p>
				<hr>
				
				<p>
				
					<div class="row ml-1">
						
						<img src="/resources/imgs/cards-security/google_security.png" alt="Google_Security" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Google" width="150" height="50">
						
						<img src="/resources/imgs/cards-security/Certising.png" alt="Certising" class="ml-3" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="Certising" width="100" height="50">
						
					</div>
					
				</p>
				
			</div>

			<div class="col-md-4 mt-mob">
				
				<p class="h6">Baixe Nosso App</p>
				<hr>
				
				<p>
				
					<div class="row ml-1">
						
						<a class="btn btn-light border" target="_blank" href="https://play.google.com">
							<i class="fab fa-google-play"></i>
							<span class="h6">Play Store</span>
						</a>
						
					</div>
					
				</p>
				
			</div>
		
		</div>
	  
	</section>

	<section class="<?php echo htmlspecialchars( $layout["footerBar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
		
		<div class="ct-center">
			<div class="py-2">

				<div class="row <?php echo htmlspecialchars( $layout["footerText"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					<div class="col-7">
						<a class="tx-footer"><b>© <?php echo htmlspecialchars( $socialStore["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo maskCnpj($socialStore["cnpjStore"]); ?></b></a>
					</div>

					<div class="col-5">
						<div class="text-right">

							<b class="tx-footer">Desenvolvido por: <a href="https://astemac.com.br" target="_blank" class="text-light h5">Astemac</a></b>

						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
    
	<!-- Bootstrap - Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	  
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  
	  
	<!-- Bootstrap - jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<!-- Custom Javascripts -->
	<script src="/resources/js/index.js"></script>
	  
  </body>
</html>
	