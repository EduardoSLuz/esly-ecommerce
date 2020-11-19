<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="text-link-site-section">Conta</a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/" class="text-link-site-section">Meus Dados</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Alterar Senha</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">
					
					<p class="h4 font-weight-normal text-second-site-section">Alterar minha senha</p>
					<hr>

					<div id="alertsAccountDataPassword">
						
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
					
					<form id="formAccountDataPassword" class="formAccountDataPassword" method="POST" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
						<div class="my-3">
							<label for="PassInfo" class="text-second-site-section">Senha Atual:</label>
							<div class="input-group">
								<div class="input-group-prepend border">
									<button type="button" id="BtnLock" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassInfo', 'BtnLock', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
								</div>
								<input type="password" class="form-control col-md-6" id="PassInfo" name="PassInfo" placeholder="Digite sua senha atual" tabindex="1" autofocus>
							</div>
						</div>

						<div class="my-3">
							<label for="PassInfo" class="text-second-site-section">Nova Senha:</label>
							<div class="input-group">
								<div class="input-group-prepend border">
									<button type="button" id="BtnLock2" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassNewInfo', 'BtnLock2', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
								</div>
								<input type="password" class="form-control col-md-6" id="PassNewInfo" name="PassNewInfo" placeholder="Digite sua nova senha" tabindex="2">
							</div>
						</div>

						<div class="my-3">
							<label for="PassInfo" class="text-second-site-section">Nova Senha (Confirme):</label>
							<div class="input-group">
								<div class="input-group-prepend border">
									<button type="button" id="BtnLock3" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassNewCfInfo', 'BtnLock3', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
								</div>
								<input type="password" class="form-control col-md-6" id="PassNewCfInfo" name="PassNewCfInfo" placeholder="Confirme sua nova senha" tabindex="3">
							</div>
						</div>

						<div class="my-3">
							<button type="submit" class="btn btn-main-site-section text-btn-site-section" tabindex="4">Salvar</button>
						</div>
						
					</form>

				</div>

			</div>
			
		</div>

	</section>
	
	<script> document.getElementById('SxInfo').value = "<?php echo htmlspecialchars( $userAll["genreUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"</script>
	
	<?php require $this->checkTemplate("accountBar");?>