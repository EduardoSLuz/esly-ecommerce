<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/" class="text-link-site-section">Login</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Cadastro</li>
				</ol>
			</nav>

			<div id="BarLogin" class="text-center">

				<form id="formLoginRegister" class="formLoginRegister offset-md-3 col-md-6 py-3" method="POST" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					<p class="h2 font-weight-normal text-second-site-section">Cadastre-se</p>

					<div id="alertsLoginRegister">
						
						<?php if( $errorRegister != '' ){ ?>
						<div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
							
							<span><?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
							
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						  		<span aria-hidden="true">&times;</span>
							</button>

						</div>
						<?php } ?>

					</div>

					<div class="input-group text-center mt-4 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <span class="input-group-text null-bd bg-white" id="basic-addon1"><i class="far fa-envelope text-second-site-section"></i></span>
						</div>

						<input type="email" name="emailUser" class="form-control null-bd border-left-0 rounded-right" placeholder="E-mail" aria-describedby="Email User" value="<?php echo htmlspecialchars( $registerValues["emailUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="150" tabindex="1" autofocus>
					
					</div>

					<div class="input-group text-center mt-3 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <button type="button" id="BtnLock" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('passUser', 'BtnLock', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
						</div>

						<input type="password" id="passUser" name="passUser" class="form-control null-bd border-left-0 rounded-right" placeholder="Senha" aria-describedby="BtnLock" onpaste="return false" oncopy="return false"  oncut="return false" tabindex="2">
	
					</div>

					<div class="input-group text-center mt-3 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <button type="button" id="BtnLockRepeat" class="input-group-text null-bd bg-white" onclick="AlterTypeInput('passRepeatUser', 'BtnLockRepeat', 'fas fa-lock', 'fas fa-unlock')"><i id="IconePass" class="fas fa-lock text-second-site-section"></i></button>
						</div>

						<input type="password" id="passRepeatUser" name="passRepeatUser" class="form-control null-bd border-left-0 rounded-right" placeholder="Senha (confirme)" aria-describedby="BtnLockRepeat" onpaste="return false" oncopy="return false"  oncut="return false" tabindex="3">
	
					</div>

					<div class="google-reCap mt-3">
						<div class="g-recaptcha" data-sitekey="6LevbfwUAAAAAJiitBmG-CqLM9NYIhfQaFJHdeaF"></div>
					</div>
					
					<button type="submit" class="btn btn-main-site-section text-btn-site-section mt-3" tabindex="4">Cadastrar</button>
					
					<!-- <button type="submit" class="btn btn-outline-danger mt-3 w-100 d-none"><i class="fab fa-google"></i> Continuar com Gmail</button> -->

				</form>


			</div>
			
		</div>

	</section>