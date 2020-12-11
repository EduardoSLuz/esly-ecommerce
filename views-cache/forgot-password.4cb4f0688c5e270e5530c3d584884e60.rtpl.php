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

					<div id="alertsLoginForgot" class="alert alert-success alert-dismissible fade d-none text-left" role="alert">
						<span class="msgAlert">Msg</span>

						<button type="button" class="close d-none msgAlertClose" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>

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
					
					<div class="my-2 text-center">

						<div id="overlayForgotPass" class="btn d-none">
							<div class="overlay d-flex justify-content-center align-items-center">
								<i class="fas fa-1x fa-sync fa-spin"></i>
							</div>
						</div>

						<button type="submit" class="btn btn-main-site-section text-btn-site-section" tabindex="2">Recuperar Senha</button>

					</div>
					
					<p class="h6 font-weight-light text-second-site-section">
						*Por favor, contacte-nos se tiver qualquer problema para redefinir a sua senha.*
					</p>

				</form>


			</div>
			
		</div>

	</section>