<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Cadastro</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Cadastro</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          
          <div id="alertsRegister">
            
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
          
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cadastro</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <form class="formStoreRegister" action="/admin/stores/<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>/register/">

                    <div class="row">

                      <div class="form-group col-sm-5">
                        <label for="inputName">Nome</label>
                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo htmlspecialchars( $store["0"]["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                      </div>
  
                      <div class="form-group col-sm-4">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" value="<?php echo htmlspecialchars( $store["0"]["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>
  
                      <div class="form-group col-sm-2">
                        <label for="inputCnpj">Cnpj</label>
                        <input type="text" id="inputCnpj" name="inputCnpj" class="form-control maskCnpj" value="<?php echo htmlspecialchars( $store["0"]["cnpjStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                      </div>
  
                      <div class="form-group col-sm-1">
                        <label for="inputStore">Loja</label>
                        <input type="text" id="inputStore" name="inputStore" class="form-control text-center" value="<?php echo htmlspecialchars( $store["0"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                      </div>
  
                      <div class="form-group col-sm-2">
                        <label for="inputTelephone">Telefone</label>
                        <input type="text" id="inputTelephone" name="inputTelephone" class="form-control text-center maskTel" value="<?php echo htmlspecialchars( $store["0"]["telephoneStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>
  
                      <div class="form-group col-sm-2">
                        <label for="inputWp">Whatsapp</label>
                        <input type="text" id="inputWp" name="inputWp" class="form-control text-center maskTel" value="<?php echo htmlspecialchars( $store["0"]["whatsappStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>
  
                      <div class="form-group col-sm-1">
                        <label for="inputStatus">Status</label>
                        <select name="inputStatus" id="inputStatus" class="custom-select">
                          <option value="0">Inativa</option>
                          <option value="1">Ativa</option>
                        </select>
                      </div>
  
                      <script>
                        document.getElementById("inputStatus").value = "<?php echo htmlspecialchars( $store["0"]["statusStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                      </script>
  
                    </div>
                    <!-- /.row -->
  
                    <p class="h5">Endereço</p>
                    <div class="row">
  
                      <div class="form-group col-md-3 col-lg-5">
                        <label for="selectCity">Cidade</label>
                        <select name="selectCity" id="selectCity" class="custom-select select2bs4">
                          <?php if( isset($cities) && $cities != 0 ){ ?>
                          <option value="0">Selecione uma Cidade</option>
                          <?php $counter1=-1;  if( isset($cities) && ( is_array($cities) || $cities instanceof Traversable ) && sizeof($cities) ) foreach( $cities as $key1 => $value1 ){ $counter1++; ?>
                          <optgroup label="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <?php $kState = $key1; ?>
                              <?php $kUf = $value1["sigla"]; ?>
                              <?php if( isset($value1["cidades"]) && count($value1["cidades"]) > 0 ){ ?>
                              <?php $counter2=-1;  if( isset($value1["cidades"]) && ( is_array($value1["cidades"]) || $value1["cidades"] instanceof Traversable ) && sizeof($value1["cidades"]) ) foreach( $value1["cidades"] as $key2 => $value2 ){ $counter2++; ?>
                              <option value="<?php echo htmlspecialchars( $kState, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $kUf, ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                              <?php } ?>
                              <?php }else{ ?>
                              <option value="0">Sem Dados</option>
                              <?php } ?>
                          </optgroup>
                          <?php } ?>
                          <?php }else{ ?>
                          <option value="0">Sem Dados</option>
                          <?php } ?>
                        </select>
                      </div>
  
                      <script>
                        document.getElementById("selectCity").value = "<?php echo htmlspecialchars( $store["0"]["codeCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                      </script>
  
                      <div class="form-group col-sm-2">
                        <label for="inputCep">Cep</label>
                        
                        <div class="input-group">
                          <input type="text" id="inputCep" name="inputCep" class="form-control text-center maskCep" value="<?php echo htmlspecialchars( $store["0"]["cepStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                          <button type="button" id="btnSearchCep" class="btn btn-sm btn-light border">
                            <i class="fas fa-search-location"></i>
                          </button>
                        </div>

                      </div>
  
                      <div class="form-group col-sm-5">
                        <label for="inputDistrict">Bairro</label>
                        <input type="text" id="inputDistrict" name="inputDistrict" class="form-control" value="<?php echo htmlspecialchars( $store["0"]["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                      </div>
  
                      <div class="form-group col-sm-6">
                        <label for="inputStreet">Rua</label>
                        <input type="text" id="inputStreet" name="inputStreet" class="form-control" value="<?php echo htmlspecialchars( $store["0"]["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                      </div>
  
                      <div class="form-group col-sm-1">
                        <label for="inputNumber">Número</label>
                        <input type="text" id="inputNumber" name="inputNumber" class="form-control text-center" value="<?php echo htmlspecialchars( $store["0"]["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required>
                      </div>
  
                      <div class="form-group col-sm-5">
                        <label for="inputComplement">Complemento</label>
                        <input type="text" id="inputComplement" name="inputComplement" class="form-control" value="<?php echo htmlspecialchars( $store["0"]["complementStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      </div>
  
                      <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-primary px-5">Salvar</button>
                      </div>
  
                    </div>
                    <!-- /.row -->
                    
                  </form>
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

        
        