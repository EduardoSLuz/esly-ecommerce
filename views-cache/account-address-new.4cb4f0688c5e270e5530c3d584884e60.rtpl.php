<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb <?php echo htmlspecialchars( $layout["bgLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				   	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/">Account</a></li>
				   	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/">Address</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">Edit</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">

					<p class="h3 font-weight-normal">
						Editar Endereço de Entrega
					</p>

					<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  		<span aria-hidden="true">&times;</span>
							</button>

						</div>
					<?php } ?>

					<div>

						<form class="row" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/new/" method="post">
							
							<div class="col-md-4 mt-3">
								<label for="cityAddress">Cidade:</label>
								<select id="cityAddress" name="cityAddress" class="custom-select" required>
									<option value>Selecione uma cidade:</option>
									<?php $counter1=-1;  if( isset($state) && ( is_array($state) || $state instanceof Traversable ) && sizeof($state) ) foreach( $state as $key1 => $value1 ){ $counter1++; ?>
									<optgroup label="<?php echo htmlspecialchars( $value1["nameState"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
										<?php $counter2=-1;  if( isset($value1["city"]) && ( is_array($value1["city"]) || $value1["city"] instanceof Traversable ) && sizeof($value1["city"]) ) foreach( $value1["city"] as $key2 => $value2 ){ $counter2++; ?>
										<option value="<?php echo htmlspecialchars( $value2["idCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["nameCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
										<?php } ?>
									</optgroup>
									<?php } ?>
								</select>
							</div>

							<div class="col-md-4 mt-3">
								<label for="cepAddress">Cep:</label>
								<input type="text" class="form-control maskCep" id="cepAddress" name="cepAddress" placeholder="_ _ _ _ _ - _ _ _" value="<?php echo htmlspecialchars( $registerValues["cepAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
							</div>
							
							<div class="col-md-4 mt-3">
								<label for="districtAddress">Bairro:</label>
                       			<input type="text" class="form-control" id="districtAddress" name="districtAddress" placeholder="Insira o bairro" value="<?php echo htmlspecialchars( $registerValues["districtAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
							</div>

							<div class="col-md-9 mt-3">
								<label for="streetAddress">Rua:</label>
                        		<input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Insira a rua" value="<?php echo htmlspecialchars( $registerValues["streetAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
							</div>

							<div class="col-md-3 mt-3">
								<label for="numberAddress">Número:</label>
                        		<input type="text" class="form-control" id="numberAddress" name="numberAddress" placeholder="N°" value="<?php echo htmlspecialchars( $registerValues["numberAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
							</div>

							<div class="col-md-6 mt-3">
								<label for="complementAddress">Complemento:</label>
                        		<input type="text" class="form-control" id="complementAddress" name="complementAddress" placeholder="Complemento" value="<?php echo htmlspecialchars( $registerValues["complementAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	
							</div>

							<div class="col-md-6 mt-3">
								<label for="referenceAddress">Ponto de Referência:</label>
                        		<input type="text" class="form-control" id="referenceAddress" name="referenceAddress" placeholder="Referência" value="<?php echo htmlspecialchars( $registerValues["referenceAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">	
							</div>

							<div class="col-md-6 mt-3">
								<input class="cursorPointer" id="mainAddress" name="mainAddress" type="checkbox" <?php if( isset($registerValues["mainAddress"]) ){ ?>checked<?php } ?>> <a class="cursorPointer" onclick="ExecuteClick('mainAddress')">É o endereço principal</a>
							</div>

							<div class="col-md-12 mt-2 text-right">
								<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/" class="btn btn-light btn-sm border border-secondary">Voltar</a>
                				<input type="submit" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> btn-sm px-4" value="Salvar">
							</div>

						</form>

					</div>

				</div>

			</div>
			
		</div>

	</section>

	<script> 
		var city = "<?php echo htmlspecialchars( $registerValues["cityAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		if(city != 0)document.getElementById('cityAddress').value = city;
	</script>

	<div id="mySidenav" class="sidenav shadow cart-BtnFloat">
		<a href="javascript:void(0)" class="closebtn text-dark" onclick="closeNav()">
			<i class="fas fa-times h4"></i>
		</a>
		
		<div class="mx-3">
				
			<?php require $this->checkTemplate("accountLinks");?>
			
		</div>

	</div>