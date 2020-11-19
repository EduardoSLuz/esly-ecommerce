<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				  	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/login/" class="text-link-site-section">Login</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Esqueci Minha Senha</li>
				</ol>
			</nav>

			<div id="BarLogin" class="text-center">

				<form id="formLoginForgot" class="formLoginForgot offset-md-3 col-md-6 py-3" method="POST" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

					<p class="h4 font-weight-normal text-second-site-section">Esqueci Minha Senha</p>

					<p class="h6 font-weight-normal text-second-site-section my-2">
						Esqueceu a sua senha? Insira o seu endereço de e-mail abaixo, e lhe enviaremos um e-mail permitindo que a redefina.
					</p>

					<div id="alertsLoginForgot">

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

					<div class="input-group text-center mt-4 border border-secondary rounded">
						
						<div class="input-group-prepend">
						  <span class="input-group-text null-bd bg-white" id="basic-addon1"><i class="far fa-envelope text-second-site-section"></i></span>
						</div>

						<input type="email" class="form-control null-bd border-left-0 rounded-right" placeholder="E-mail" aria-label="Email" aria-describedby="basic-addon1" name="emailUser" value="<?php echo htmlspecialchars( $registerValues["emailUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="150" tabindex="1" autofocus>
					
					</div>

					<div class="google-reCap mt-3">
						<div class="g-recaptcha" data-sitekey="6LevbfwUAAAAAJiitBmG-CqLM9NYIhfQaFJHdeaF"></div>
					</div>
					
					<button type="submit" class="btn btn-main-site-section text-btn-site-section my-3" tabindex="2">Recuperar Senha</button>
					<p class="h6 font-weight-light text-second-site-section">
						*Por favor, contacte-nos se tiver qualquer problema para redefinir a sua senha.*
					</p>

				</form>


			</div>
			
		</div>

	</section>