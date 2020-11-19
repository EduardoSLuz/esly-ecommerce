<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				   	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="text-link-site-section">Conta</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Endereços</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">
					
					<p class="h4 text-uppercase font-weight-normal text-second-site-section">
						Endereços
					</p>
					<hr>

					<div id="alertUserAddress">
						
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  		<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<?php } ?>

						<?php if( $successMsg != '' ){ ?>	

						<div class="alert alert-success alert-dismissible fade show text-left" role="alert">
								
							<span><?php echo htmlspecialchars( $successMsg, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>

						</div>

						<?php } ?>

					</div>
					
					<div class="row">
							
						<?php if( $userAddress != false ){ ?>

						<?php $counter1=-1;  if( isset($userAddress) && ( is_array($userAddress) || $userAddress instanceof Traversable ) && sizeof($userAddress) ) foreach( $userAddress as $key1 => $value1 ){ $counter1++; ?>
						<div class="col-sm-6 mt-3">
							<div class="card">
								<div class="card-body">
									
									<div class="row">
										
										<p class="h5 col-6 text-second-site-section">#<?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
										<div class="h5 col-6 text-right">
											
											<a href="#" id="<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="text-second-site-section btnEditAddress" data-toggle="modal" data-target="#ModalAddress" data-modal-title="Alterar Endereço de Entrega" data-type="2" data-code="<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-city="<?php echo htmlspecialchars( $value1["codeCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cep='<?php echo maskCep($value1["cep"]); ?>' data-district="<?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-street="<?php echo htmlspecialchars( $value1["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-number="<?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-complement="<?php echo htmlspecialchars( $value1["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-reference="<?php echo htmlspecialchars( $value1["reference"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-main="<?php echo htmlspecialchars( $value1["mainAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-edit"></i></a>

											<a class="text-second-site-section btnDeleteUserAddress cursorPointer" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<a class='h6 font-weight-normal text-center'>Deseja realmente remover?</a>" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-code="<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
												<i class="far fa-trash-alt"></i>
											</a>

										</div>

									</div>
									
										<p class="my-1 text-second-site-section">
											<span><?php echo htmlspecialchars( $value1["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
											<span> - <?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
											<span><?php if( $value1["complement"] != '' ){ ?> - <?php echo htmlspecialchars( $value1["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></span>
										</p>
										<p class="my-1 text-second-site-section">
											<span><?php if( $value1["reference"] != '' ){ ?><?php echo htmlspecialchars( $value1["reference"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> Sem referência <?php } ?></span>
										</p>
										<p class="my-1 text-second-site-section">
											<span><?php echo maskCep($value1["cep"]); ?></span>
											<span> - <?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
										</p>
										<p class="my-1 text-second-site-section">
											<span><?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
											<span> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
										</p>
								</div>
								<form id="formMain<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="card-footer bg-transparent text-center" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/update/" method="POST">

									<input id="ckAd<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="ckAd" type="checkbox" class="cursorPointer" <?php if( $value1["mainAddress"] == 1 ){ ?> checked <?php } ?> onclick="formMain<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>.submit()"> 
									<a class="h6 font-weight-normal text-second-site-section cursorPointer" onclick="ExecuteClick('ckAd<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>')"> Selecionar como principal</a>
									
									<input type="hidden" name="adCode" value="<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

								</form>
							</div>
						</div>
						<?php } ?>

						
						<?php } ?>
							  
							<!-- <div class="col-sm-6 mt-mobNavbar mt-3">
								<div class="card border-dashed">
									<div class="card-body">
										
										<p class="py-5 mt-1 text-center">
											<a class="h5 text-decoration-none text-primary cursorPointer" data-toggle="modal" data-target="#ModalAddress">
												<i class="h1 fas fa-plus"></i><br>
												Novo endereço
											</a>
										</p>
										
									</div>
								</div>
					  		</div> -->
					</div>

					<a href="#" class="my-2 btn btn-sm btn-outline-main-site-section" data-toggle="modal" data-target="#ModalAddress" data-modal-title="Cadastrar Endereço de Entrega" data-type="1" data-code="0" data-city="0" data-cep="" data-district="" data-street="" data-number="" data-complement="" data-reference="" data-main="0"><i class="fas fa-plus"></i> Adicionar endereço</a>

				</div>

			</div>
			
		</div>

	</section>

	<?php require $this->checkTemplate("accountBar");?>