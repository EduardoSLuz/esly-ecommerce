<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb <?php echo htmlspecialchars( $layout["bgLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">Fale Conosco</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("informationsLinks");?>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal">Fale Conosco</p>
					<hr>

					<div id="alertsInfoContact">
						
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
					
					<form id="formInfoContact" class="formInfoContact row" method="POST" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

						<div class="my-2 col-md-6">
							<label for="NameContact">Nome Completo:</label>
							<input type="text" class="form-control" id="NameContact" name="NameContact" placeholder="Digite seu nome" value='<?php if( isset($userValues["login"]) && isset($userValues["nameUser"]) && isset($userValues["surnameUser"]) && $userValues["login"] == true && !empty($userValues["nameUser"])  ){ ?><?php echo htmlspecialchars( $userValues["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userValues["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
						</div>

						<div class="my-2 col-md-6">
							<label for="EmailContact">E-mail:</label>
							<input type="email" class="form-control" id="EmailContact" name="EmailContact" placeholder="Digite seu e-mail" value='<?php if( isset($userValues["login"]) && isset($userValues["emailUser"]) && $userValues["login"] == true && !empty($userValues["emailUser"])  ){ ?><?php echo htmlspecialchars( $userValues["emailUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>'>
						</div>

						<div class="my-2 col-md-12">
							<label for="SubjectContact">Assunto:</label>
							<input type="text" class="form-control" id="SubjectContact" name="SubjectContact" placeholder="Digite o assunto">
						</div>

						<div class="my-2 col-md-12">
							<label for="MessageContact">Mensagem:</label>
							<textarea type="text" class="form-control" id="MessageContact" name="MessageContact" placeholder="Digite a mensagem" rows="5"></textarea>
						</div>

						<div class="my-2 col-md justify-content-md-center">
							<div class="g-recaptcha" data-sitekey="6LevbfwUAAAAAJiitBmG-CqLM9NYIhfQaFJHdeaF"></div>
						</div>

						<div class="col-md-12 text-right">
							<button type="submit" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mt-3">Enviar Mensagem</button>
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
				
				<?php require $this->checkTemplate("informationsLinks");?>
			</div>

		</nav>

	</div>