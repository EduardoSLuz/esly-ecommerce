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
						Adicionar Endereço de Entrega
					</p>

					<div id="alertsAccountAddressNew">
						
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  		<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<?php } ?>

					</div>

					<form id="formAccountAddressNew" class="formAccountAddressNew row" method="POST" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
						<div class="col-md-4 mt-3">
							<label for="cityAddress">Cidade:</label>
							<select name="cityAddress" id="cityAddress" class="custom-select select2bs4">
								<?php if( isset($cities) && $cities != 0 ){ ?>
								<option value>Selecione uma Cidade</option>
								<?php $counter1=-1;  if( isset($cities) && ( is_array($cities) || $cities instanceof Traversable ) && sizeof($cities) ) foreach( $cities as $key1 => $value1 ){ $counter1++; ?>
								<optgroup label="<?php echo htmlspecialchars( $value1["state"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
									<?php $kState = $key1; ?>
									<?php $kUf = $value1["uf"]; ?>
									<?php if( isset($value1["city"]) && count($value1["city"]) > 0 ){ ?>
									<?php $counter2=-1;  if( isset($value1["city"]) && ( is_array($value1["city"]) || $value1["city"] instanceof Traversable ) && sizeof($value1["city"]) ) foreach( $value1["city"] as $key2 => $value2 ){ $counter2++; ?>
									<option value="<?php echo htmlspecialchars( $kState, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $kUf, ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
									<?php } ?>
									<?php }else{ ?>
									<option value="0">Sem Dados</option>
									<?php } ?>
								</optgroup>
								<?php } ?>
								<?php }else{ ?>
								<option value="0">Sem Dados</option>
								<?php } ?>
							</select>
						</div>

						<div class="col-md-4 mt-3">
							<label for="cepAddress">Cep:</label>
							<input type="text" class="form-control maskCep" id="cepAddress" name="cepAddress" placeholder="_ _ _ _ _ - _ _ _" value="<?php echo htmlspecialchars( $registerValues["cepAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
						</div>
						
						<div class="col-md-4 mt-3">
							<label for="districtAddress">Bairro:</label>
							<input type="text" class="form-control" id="districtAddress" name="districtAddress" placeholder="Insira o bairro" value="<?php echo htmlspecialchars( $registerValues["districtAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="150" required>
						</div>

						<div class="col-md-9 mt-3">
							<label for="streetAddress">Rua:</label>
							<input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Insira a rua" value="<?php echo htmlspecialchars( $registerValues["streetAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="150" required>
						</div>

						<div class="col-md-3 mt-3">
							<label for="numberAddress">Número:</label>
							<input type="text" class="form-control" id="numberAddress" name="numberAddress" placeholder="N°" value="<?php echo htmlspecialchars( $registerValues["numberAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="20" required>
						</div>

						<div class="col-md-6 mt-3">
							<label for="complementAddress">Complemento:</label>
							<input type="text" class="form-control" id="complementAddress" name="complementAddress" placeholder="Complemento" value="<?php echo htmlspecialchars( $registerValues["complementAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="100">	
						</div>

						<div class="col-md-6 mt-3">
							<label for="referenceAddress">Ponto de Referência:</label>
							<input type="text" class="form-control" id="referenceAddress" name="referenceAddress" placeholder="Referência" value="<?php echo htmlspecialchars( $registerValues["referenceAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="100">	
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

	</section>

	<div id="myBarnav" class="shadow cart-BtnFloat">
			
		<nav id="menu-site">
			
			<div class="backdrop"></div>
			<div class="menu-info border px-2">
				
				<div class="text-right">
					<a class="close-menu text-dark h4 cursorPointer"><i class="fas fa-times"></i></a>
				</div>
				
				<?php require $this->checkTemplate("accountLinks");?>
			</div>

		</nav>

	</div>