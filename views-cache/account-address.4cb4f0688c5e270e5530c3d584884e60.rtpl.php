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
					<p class="h3 text-uppercase font-weight-normal">
						Endereços
					</p>
					
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
					
					<div class="row">
							
						<?php if( $userAddress != false ){ ?>

						<?php $counter1=-1;  if( isset($userAddress) && ( is_array($userAddress) || $userAddress instanceof Traversable ) && sizeof($userAddress) ) foreach( $userAddress as $key1 => $value1 ){ $counter1++; ?>
						<div class="col-sm-6 mt-3">
							<div class="card">
								<div class="card-body">
									
									<div class="row">
										<p class="h5 col-6">#<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
										<form class="h5 col-6 text-right" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/delete/" method="post">
											<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/edit/?code=<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-sm btn-light border border-dark btnEditAddress" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<a class='h6 font-weight-normal text-center'>Editar</a>">
												<i class="far fa-edit">
											</i></a>

											<button type="submit" class="btn btn-light btn-sm border border-dark" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<a class='h6 font-weight-normal text-center'>Deseja realmente remover?</a>">
												<i class="far fa-trash-alt"></i>
											</button>

											<input type="hidden" name="adCode" value="<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

										</form>
									</div>
									
										<p class="my-1">
											<span><?php echo htmlspecialchars( $value1["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
											<span> - <?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span> 
											<span><?php if( $value1["complement"] != '' ){ ?> - <?php echo htmlspecialchars( $value1["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></span>
										</p>
										<p class="my-1">
											<span><?php if( $value1["reference"] != '' ){ ?><?php echo htmlspecialchars( $value1["reference"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> Sem referência <?php } ?></span>
										</p>
										<p class="my-1">
											<span><?php echo maskCep($value1["cep"]); ?></span>
											<span> - <?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
										</p>
										<p class="my-1">
											<span><?php echo htmlspecialchars( $value1["nameCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
											<span> - <?php echo htmlspecialchars( $value1["nickState"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
										</p>
								</div>
								<form id="formMain<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="card-footer bg-transparent text-center" action="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/update/" method="POST">

									<input id="ckAd<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="ckAd" type="checkbox" class="cursorPointer" <?php if( $value1["mainAddress"] == 1 ){ ?> checked <?php } ?> onclick="formMain<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.submit()"> 
									<a class="h6 font-weight-normal cursorPointer" onclick="ExecuteClick('ckAd<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')"> Selecionar como principal</a>
									
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

					<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/address/new/" class="my-2 btn btn-sm btn-light border border-<?php echo htmlspecialchars( $layout["colorLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $layout["txLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-toggle="popover" data-placement="top" data-trigger="hover" data-html="true" data-content="<a class='h6 font-weight-normal text-center'>Adicionar um endereço novo</a>"><i class="fas fa-plus"></i> Adicionar endereço</a>

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