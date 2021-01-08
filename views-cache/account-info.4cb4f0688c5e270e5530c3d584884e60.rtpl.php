<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb bg-site-section">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/" class="text-link-site-section">Home</a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/" class="text-link-site-section">Conta</a></li>
				  	<li class="breadcrumb-item text-link-site-section" aria-current="page">Meus Dados</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">

					<p class="h4 font-weight-normal text-second-site-section">Meus dados</p>

					<hr>

					<div id="alertsAccountData" class='alert alert-success alert-dismissible fade d-none text-left' role="alert">
						<span class="msgAlert">Msg</span>
					</div>
					
					<form id="formAccountData" class="formAccountData mt-3 row" method="POST" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						
						<div class="col-md-12">
							<label for="NameInfo" class="text-second-site-section">Nome Completo:</label>
							<input type="text" class="form-control" id="NameInfo" name="NameInfo" placeholder="Digite seu nome" value="<?php echo htmlspecialchars( $userAll["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userAll["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" maxlength="150" required>
						</div>

						<div class="col-md-6 mt-3">
							<label for="CpfInfo" class="text-second-site-section">Cpf:</label>
							<input type="text" class="form-control maskCpf" id="CpfInfo" name="CpfInfo" placeholder="___.___.___-__" value="<?php echo htmlspecialchars( $userAll["cpfUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
						</div>

						<div class="col-md-6 mt-3">
							<label for="DataNasInfo" class="text-second-site-section">Data Nascimento:</label>
							<input type="date" class="form-control" id="DateInfo" name="DateInfo" value="<?php echo htmlspecialchars( $userAll["dateBirthUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
						</div>

						<div class="col-md-12 mt-3">
							<label for="SxInfo" class="text-second-site-section">Gênero:</label>
							<select id="SxInfo" name="SxInfo" class="custom-select" required>
								<option value selected>Selecione seu gênero</option>
								<option value="1">Feminino</option>
								<option value="2">Masculino</option>
								<option value="3">Outros</option>
							</select>
						</div>

						<div class="col-md-6 mt-3">
							<label for="TelInfo" class="text-second-site-section">Telefone:</label>
							<input type="text" class="form-control maskTel" id="TelInfo" name="TelInfo" placeholder="(__) _____-____" value="<?php echo htmlspecialchars( $userAll["telephoneUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
						</div>

						<div class="col-md-6 mt-3">
							<label for="WpInfo" class="text-second-site-section">Whatsapp:</label>
							<input type="text" class="form-control maskTel" id="WpInfo" name="WpInfo" placeholder="(__) _____-____" value="<?php echo htmlspecialchars( $userAll["whatsappUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
						</div>

						<div class="col-md-12">
							
							<div class="row">

								<div class="col-md-6 mt-3">
									<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/password/" class="btn btn-outline-second-site-section">Alterar minha senha</a>
								</div>
		
								<div class="col-md-6 mt-3 text-right">
									<button type="submit" class="btn btn-main-site-section text-btn-site-section">Salvar</button>
								</div>

							</div>

						</div>
						
					</form>

				</div>

			</div>
			
		</div>

	</section>
	
	<script> 
		var SxInfo = "<?php echo htmlspecialchars( $userAll["genreUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
		if(SxInfo != 0)document.getElementById('SxInfo').value = SxInfo;
	</script>
	
	<?php require $this->checkTemplate("accountBar");?>