<?php if(!class_exists('Rain\Tpl')){exit;}?>	<section class="ct-center">

		<div class="ct-ini mt-mobNavbar">
			
			<nav aria-label="breadcrumb" class="bar-display">
				<ol class="breadcrumb <?php echo htmlspecialchars( $layout["bgLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
					<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Home</a></li>
				 	<li class="breadcrumb-item"><a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/requests/">Account</a></li>
				  	<li class="breadcrumb-item active" aria-current="page">My Info</li>
				</ol>
			</nav>

			<div class="row">

				<div class="col-md-3 bar-display">
					
					<?php require $this->checkTemplate("accountLinks");?>

				</div>

				<div class="col-md">
					<p class="h4 font-weight-normal">Meus dados</p>
					
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
					
					<form class="mt-3 row" method="POST">
						
						<div class="col-md-12">
							<label for="NameInfo">Nome Completo:</label>
							<input type="text" class="form-control" id="NameInfo" name="NameInfo" placeholder="Digite seu nome" value="<?php echo htmlspecialchars( $userAll["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userAll["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="col-md-6 mt-3">
							<label for="CpfInfo">Cpf:</label>
							<input type="text" class="form-control maskCpf" id="CpfInfo" name="CpfInfo" placeholder="___.___.___-__" value="<?php echo htmlspecialchars( $userAll["cpfUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="col-md-6 mt-3">
							<label for="DataNasInfo">Data Nascimento:</label>
							<input type="date" class="form-control" id="DateInfo" name="DateInfo" value="<?php echo htmlspecialchars( $userAll["dateBirthUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="col-md-12 mt-3">
							<label for="SxInfo">Gênero:</label>
							<select id="SxInfo" name="SxInfo" class="custom-select" required>
								<option value selected>Selecione seu gênero</option>
								<option value="1">Feminino</option>
								<option value="2">Masculino</option>
								<option value="3">Outros</option>
							</select>
						</div>

						<div class="col-md-6 mt-3">
							<label for="TelInfo">Telefone:</label>
							<input type="text" class="form-control maskTel" id="TelInfo" name="TelInfo" placeholder="(__) _____-____" value="<?php echo htmlspecialchars( $userAll["telephoneUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="col-md-6 mt-3">
							<label for="WpInfo">Whatsapp:</label>
							<input type="text" class="form-control maskTel" id="WpInfo" name="WpInfo" placeholder="(__) _____-____" value="<?php echo htmlspecialchars( $userAll["whatsappUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
						</div>

						<div class="col-md-6 mt-3">
							<button type="submit" class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Salvar</button>
						</div>

						<div class="col-md-6 mt-3 text-right">
							<a href="/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/account/data/password/" class="btn btn-light border border-dark">Alterar minha senha</a>
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
	
	<div id="mySidenav" class="sidenav shadow cart-BtnFloat">
		<a href="javascript:void(0)" class="closebtn text-dark" onclick="closeNav()">
			<i class="fas fa-times h4"></i>
		</a>
		
		<div class="mx-3">
				
			<?php require $this->checkTemplate("accountLinks");?>
			
		</div>

	</div>

	<!-- MODALS PAGE INICIO -->

		<!-- MODAL ALTER STORES -->
		<div class="modal fade" id="ModalAlterStores" tabindex="-1" role="dialog" aria-labelledby="ModalAlterStores" aria-hidden="true">
			
			<div class="modal-dialog modal-dialog-centered modal-sm">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">
				  
						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body">
						
						<h4 class="text-center">
							Seja bem vindo!
						</h4>

						<p>
							Em qual das lojas você deseja acessar?
						</p>
						
						<select name="SelectStoresModal" id="SelectStoresModal" class="custom-select">
							<option value="1">Loja 01</option>
							<option value="2">Loja 02</option>
							<option value="3">Loja 03</option>
						</select>
						
						<button type="button" class="btn btn-primary text-white w-100 mt-3">Acessar</button>

						<p class="mt-2">
							Não encontrou a loja? No momento, o serviço de delivery está atendendo à algumas regiões.
						</p>

						<p>
							Conheça todas as lojas disponíveis para as compras.
						</p>
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL CONSULTATION REGIONS  -->
		<div class="modal fade" id="ModalConsultationRegions" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationRegions" aria-hidden="true">
			
			<div class="modal-dialog modal-dialog-centered modal-sm">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0 pb-2">
						
						<h5 class="text-left">
							<i class="fas fa-truck"></i> Regiões Atendidas
						</h5>

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body py-0">
						
						<h5 class="font-weight-normal">Loja 01</h5>
						<hr>

						<ul class="txList-StyleNone text-left">
							<li><i class="fas fa-map-marker-alt"></i> Centro</li>
							<li><i class="fas fa-map-marker-alt"></i> Jardim Noroeste</li>
							<li><i class="fas fa-map-marker-alt"></i> Jardim São Conrado</li>
							<li><i class="fas fa-map-marker-alt"></i> Nova Bahia</li>
							<li><i class="fas fa-map-marker-alt"></i> Tiradentes</li>
						</ul>
						
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL CONSULTATION HORARY  -->
		<div class="modal fade" id="ModalConsultationHorary" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationHorary" aria-hidden="true">
			
			<div class="modal-dialog modal-lg">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body">
						
						<div class="row">

							<div class="col-md">
								
								<p class="h5">
									Horários de retirada
								</p>

								<p class="mt-3">
									<b>Segunda-Feira:</b><br>
									09:00 - 12:00<br>
									14:00 - 18:00
								</p>

								<p>
									<b>Terça-Feira até Sexta-Feira:</b><br>
									08:00 - 12:00<br>
									13:00 - 20:00
								</p>

								<p>
									<b>Sábado e Domingo</b><br>
									09:00 - 15:00<br>
									
								</p>

							</div>

							<div class="col-md">
								
								<p class="h5">
									Horários de Entrega
								</p>

								<label for="SelectRegionModal">Escolha um região:</label><br>
								<div class="input-group">
									
									<select id="SelectRegionModal" class="custom-select">
										<option>Centro</option>
										<option>Jardim Noroeste</option>
										<option>Jardim São Conrado</option>
									</select>

									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
									</div>
								</div>


							</div>

						</div>
						
					</div>
			  
				</div>
			
			</div>
		  
		</div>

		<!-- MODAL Change Password  -->
		<div class="modal fade" id="ModalChangePassword" tabindex="-1" role="dialog" aria-labelledby="ModalChangePassword" aria-hidden="true">
			
			<div class="modal-dialog">
			 
				<div class="modal-content">
				
					<div class="modal-header border-bottom-0">

						<button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
							<i class="fas fa-times"></i>
						</button>
				
					</div>
				
					<div class="modal-body px-4">
						
						<p class="h4 font-weight-normal"><i class="fas fa-lock"></i> Alterar Minha Senha</p>

						<div>
							
							<div class="my-2">
								<label for="PassCurrent">Senha Atual:</label>
								<input type="password" class="form-control" id="PassCurrent" name="PassCurrent" placeholder="Digite sua senha atual">
							</div>

							<div class="my-2">
								<label for="NewPass">Nova Senha:</label>
								<input type="password" class="form-control" id="NewPass" name="NewPass" placeholder="Digite sua nova senha">
							</div>

							<div class="my-2">
								<label for="NewPassConfirm">Confirme a Nova Senha:</label>
								<input type="password" class="form-control" id="NewPassConfirm" name="NewPassConfirm" placeholder="Digite novamente sua nova senha">
							</div>

						</div>
						
					</div>

					<div class="modal-footer text-right px-4 pb-3">
						<button type="button" class="btn btn-light btn-sm border border-secondary" data-dismiss="modal">Sair</button>
						<button type="button" class="btn btn-primary btn-sm">Salvar</button>
					</div>
			  
				</div>
			
			</div>
		  
		</div>