<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/" class="text-link-site-section">Login</a></li>
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/forgot-password/" class="text-link-site-section">Esqueci minha senha</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">	Redefinir senha</li>
				</ol>
			</nav>

			<div class="row justify-content-md-center">
				
				<form id="formLoginForgotReset" class="formLoginForgotReset col-md-5 text-center" method="post" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-code="<?php echo htmlspecialchars( $forgotCode, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					<p class="h4 font-weight-normal text-second-site-section">Redefinir minha senha</p>

					<div id="alertsLoginForgotReset" class="alert alert-success alert-dismissible fade d-none text-left" role="alert">
						
						<span class="msgAlert">Msg</span>

						<button type="button" class="close d-none msgAlertClose" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

					</div>

					<div class="my-3">
						<label for="PassInfo" class="text-second-site-section">Nova Senha:</label>
						<div class="input-group">
							<div class="input-group-prepend border">
								<button type="button" id="BtnLock2" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassNewInfo', 'BtnLock2', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
							</div>
							<input type="password" class="form-control" id="PassNewInfo" name="PassNewInfo" placeholder="Digite sua nova senha" tabindex="2">
						</div>
					</div>

					<div class="my-3">
						<label for="PassInfo" class="text-second-site-section">Nova Senha (Confirme):</label>
						<div class="input-group">
							<div class="input-group-prepend border">
								<button type="button" id="BtnLock3" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('PassNewCfInfo', 'BtnLock3', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
							</div>
							<input type="password" class="form-control" id="PassNewCfInfo" name="PassNewCfInfo" placeholder="Confirme sua nova senha" tabindex="3">
						</div>
					</div>

					<div class="my-3">

						<div id="overlayForgotPassReset" class="btn d-none">
							<div class="overlay d-flex justify-content-center align-items-center">
								<i class="fas fa-1x fa-sync fa-spin"></i>
							</div>
						</div>

						<button type="submit" class="btn btn-main-site-section text-btn-site-section" tabindex="4">Alterar</button>

					</div>
					
				</form>

			</div>
			
		</div>

	</section>