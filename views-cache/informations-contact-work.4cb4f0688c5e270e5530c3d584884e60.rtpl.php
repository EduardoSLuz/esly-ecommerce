<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb <?php echo htmlspecialchars( $layout["bgLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">Trabalhe Conosco</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("informationsLinks");?>

				</div>

				<div class="col-md">

					<p class="h5 text-uppercase font-weight-normal">Trabalhe Conosco</p>
					<hr>
					
					<form action="/loja-<?php echo htmlspecialchars( $links["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/contact-work/" method="POST">

						<label for="NameContact">Nome Completo:</label>
						<input type="text" class="form-control is-invalid" id="NameContact" name="NameContact" placeholder="Digite seu nome">
						<div class="invalid-feedback">
							Empty
						</div><br>

						<label for="EmailContact">E-mail:</label>
						<input type="text" class="form-control is-invalid" id="EmailContact" name="EmailContact" placeholder="Digite seu e-mail">
						<div class="invalid-feedback">
							Empty
						</div><br>

    					<label for="ArchiveContact">Curriculo:</label><br>
						<input type="file" class="form-control is-invalid text-truncate" id="ArchiveContact" name="ArchiveContact">
						<div class="invalid-feedback">
							Empty
						</div><br>

						<div class="g-recaptcha" data-sitekey="6LevbfwUAAAAAJiitBmG-CqLM9NYIhfQaFJHdeaF"></div>

						<button type="submit" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> mt-3">Enviar</button>

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