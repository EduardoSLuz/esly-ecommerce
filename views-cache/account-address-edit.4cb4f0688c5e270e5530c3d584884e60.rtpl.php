<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb <?php echo htmlspecialchars( $layout["bgLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				   	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/">Account</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">Address</li>
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

					<div>

						<form class="row" action="" method="post">
							
							<div class="col-md-4 mt-3">
								<label for="CityAddress">Cidade:</label>
								<select class="custom-select">
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
								<label for="CepAddress">Cep:</label>
								<input type="text" class="form-control" id="CepAddress" name="CepAddress" placeholder="_ _ _ _ _ - _ _ _">
							</div>
							
							<div class="col-md-4 mt-3">
								<label for="DistrictAddress">Bairro:</label>
                       			<input type="text" class="form-control" id="DistrictAddress" name="DistrictAddress" placeholder="Insira o bairro">
							</div>

							<div class="col-md-9 mt-3">
								<label for="StreetAddress">Rua:</label>
                        		<input type="text" class="form-control" id="StreetAddress" name="StreetAddress" placeholder="Insira a rua">
							</div>

							<div class="col-md-3 mt-3">
								<label for="NumberAddress">Número:</label>
                        		<input type="text" class="form-control" id="NumberAddress" name="NumberAddress" placeholder="N°">
							</div>

							<div class="col-md-6 mt-3">
								<label for="ComplementAddress">Complemento:</label>
                        		<input type="text" class="form-control" id="ComplementAddress" name="ComplementAddress">	
							</div>

							<div class="col-md-6 mt-3">
								<label for="ReferenceAddress">Ponto de Referência:</label>
                        		<input type="text" class="form-control" id="ReferenceAddress" name="ReferenceAddress">	
							</div>

							<div class="col-md-6 mt-3">
								<input type="checkbox"> <a>É o endereço principal</a>
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

	<div id="mySidenav" class="sidenav shadow cart-BtnFloat">
		<a href="javascript:void(0)" class="closebtn text-dark" onclick="closeNav()">
			<i class="fas fa-times h4"></i>
		</a>
		
		<div class="mx-3">
				
			<?php require $this->checkTemplate("accountLinks");?>
			
		</div>

	</div>