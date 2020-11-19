<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb <?php echo htmlspecialchars( $layout["bgLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/">Login</a></li>
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/forgot-password/">Esqueci minha senha</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">	Redefinir senha</li>
				</ol>
			</nav>

			<div class="row justify-content-md-center">
				
				<form id="formLoginForgotReset" class="formLoginForgotReset col-md-5 text-center" method="post" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-code="<?php echo htmlspecialchars( $forgotCode, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					<p class="h4 font-weight-normal">Redefinir minha senha</p>

					<div id="alertsLoginForgotReset">
					
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
	
						</div>
						<?php } ?>
	
					</div>

					<div class="my-3">
						<label for="PassInfo">Nova Senha:</label>
						<div class="input-group">
							<div class="input-group-prepend border">
								<button type="button" id="BtnLock2" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassNewInfo', 'BtnLock2', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock"></i></button>
							</div>
							<input type="password" class="form-control" id="PassNewInfo" name="PassNewInfo" placeholder="Digite sua nova senha" tabindex="2">
						</div>
					</div>

					<div class="my-3">
						<label for="PassInfo">Nova Senha (Confirme):</label>
						<div class="input-group">
							<div class="input-group-prepend border">
								<button type="button" id="BtnLock3" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassNewCfInfo', 'BtnLock3', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock"></i></button>
							</div>
							<input type="password" class="form-control" id="PassNewCfInfo" name="PassNewCfInfo" placeholder="Confirme sua nova senha" tabindex="3">
						</div>
					</div>

					<div class="my-3">
						<button type="submit" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" tabindex="4">Alterar</button>
					</div>
					
				</form>

			</div>
			
		</div>

	</section>