<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">
                Usuário - 
                <?php if( isset($userData) && isset($userData["0"]["nameUser"]) && !empty($userData["0"]["nameUser"]) ){ ?>
                <?php echo htmlspecialchars( $userData["0"]["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userData["0"]["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                <?php }else{ ?>
                Registro
                <?php } ?>
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/users/">Usuários</a></li>
                <li class="breadcrumb-item active">
                  <?php if( isset($userData) && isset($userData["0"]["nameUser"]) && !empty($userData["0"]["nameUser"]) ){ ?>
                  <?php echo htmlspecialchars( $userData["0"]["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userData["0"]["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                  <?php }else{ ?>
                  Registro
                  <?php } ?>
                </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cadastro</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">

                  <div id="alertsUserDetails">
            
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
                  
                  <form id="formUserDetails" class="formUserDetails row" method="POST" data-type="2" data-id='<?php if( isset($userData) && $userData != 0 ){ ?><?php echo htmlspecialchars( $userData["0"]["idUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>0<?php } ?>'>

                    <?php if( isset($userData) && $userData != 0 ){ ?>

                    <div class="form-group col-md-4">
                      <label for="inputName">Nome</label>
                      <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo htmlspecialchars( $userData["0"]["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userData["0"]["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite o nome">
                    </div>

                    <div class="form-group col-md-5">
                      <label for="inputEmail">E-mail</label>
                      <input type="email" id="inputEmail" name="inputEmail" class="form-control" value="<?php echo htmlspecialchars( $userData["0"]["emailUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite o e-mail">
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-lg-2">
                      <label for="inputCpf">Cpf</label>
                      <input type="text" id="inputCpf" name="inputCpf" class="form-control text-center maskCpf" value="<?php echo htmlspecialchars( $userData["0"]["cpfUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="000.000.000-00">
                    </div>

                    <div class="form-group col-md-2 col-sm-2 col-lg-1">
                      <label for="selectStatus">Status</label>
                      <select name="selectStatus" id="selectStatus" class="custom-select">
                        <option value="0">Inativo</option>
                        <option value="1">Ativo</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-lg-2">
                      <label for="inputTelephone">Telefone</label>
                      <input type="text" id="inputTelephone" name="inputTelephone" class="form-control text-center maskTel" value="<?php echo htmlspecialchars( $userData["0"]["telephoneUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="(00) 00000-0000">
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-lg-2">
                      <label for="inputWp">Whatsapp</label>
                      <input type="text" id="inputWp" name="inputWp" class="form-control text-center maskTel" value="<?php echo htmlspecialchars( $userData["0"]["whatsappUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="(00) 00000-0000">
                    </div>

                    <div class="form-group col-md-2">
                      <label for="selectGenre">Gênero</label>
                      <select name="selectGenre" id="selectGenre" class="custom-select">
                        <option value="0">Selecione um Gênero</option>
                        <option value="1">Feminino</option>
                        <option value="2">Masculino</option>
                        <option value="3">Outros</option>
                      </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-2 col-lg-1">
                      <label for="selectType">Tipo</label>
                      <select name="selectType" id="selectType" class="custom-select">
                        <option value="0">Cliente</option>
                        <option value="1">Admin</option>
                      </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-lg-2">
                      <label for="inputDateBirth">Data de Nascimento</label>
                      <input type="date" id="inputDateBirth" name="inputDateBirth" class="form-control text-center" value="<?php echo htmlspecialchars( $userData["0"]["dateBirthUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    </div>

                    <div class="col-sm-12 text-right">
                      <button type="submit" class="btn btn-primary px-5">Salvar</button>
                    </div>

                    <script>
                      document.getElementById("selectStatus").value = "<?php echo htmlspecialchars( $userData["0"]["statusUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                      document.getElementById("selectType").value = "<?php echo htmlspecialchars( $userData["0"]["admin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                      document.getElementById("selectGenre").value = "<?php echo htmlspecialchars( $userData["0"]["genreUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                    </script>
                    
                    <?php }else{ ?>
                    <p class="h6 col-md-12">
                      <b><i>NENHUM DADO ENCONTRADO</i></b>
                    </p>
                    <?php } ?>

                  </form>
                  <!-- /.row -->

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Dispositivos Cadastrados</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="max-height: 350px;">
                  
                  <?php if( isset($userData["0"]["devices"]) && $userData["0"]["devices"] != 0 ){ ?>
                  <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Dispositivo</th>
                        <th>Ultimo Acesso</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($userData["0"]["devices"]) && ( is_array($userData["0"]["devices"]) || $userData["0"]["devices"] instanceof Traversable ) && sizeof($userData["0"]["devices"]) ) foreach( $userData["0"]["devices"] as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["device"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo date("H:i", strtotime($value1["timeAccess"])); ?> - <?php echo date("d/m/Y", strtotime($value1["dateAccess"])); ?> </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php }else{ ?>
                  <p class="h6 text-center py-3">
                    <b><i>NENHUM DADO ENCONTRADO</i></b>
                  </p>
                  <?php } ?>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Endereços</h3>
                </div>
                <!-- /.card-header -->
                <div id="tbUsersAddress" class="card-body table-responsive p-0" style="max-height: 350px;">
                  
                  <?php if( isset($userData["0"]["address"]) && $userData["0"]["address"] != 0 ){ ?>
                  <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Cep</th>
                        <th>Cidade</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($userData["0"]["address"]) && ( is_array($userData["0"]["address"]) || $userData["0"]["address"] instanceof Traversable ) && sizeof($userData["0"]["address"]) ) foreach( $userData["0"]["address"] as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php if( isset($value1["cep"]) && strlen($value1["cep"]) == 8 ){ ?><?php echo maskCep($value1["cep"]); ?><?php } ?></td>
                        <td>
                          <?php if( !empty($value1["city"]) && !empty($value1["uf"]) ){ ?>
                          <?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          <?php } ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalUserAddress" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idAddress"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-user="<?php echo htmlspecialchars( $userData["0"]["idUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar o Endereço" data-city="<?php echo htmlspecialchars( $value1["codeCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cep='<?php if( isset($value1["cep"]) && strlen($value1["cep"]) == 8 ){ ?><?php echo maskCep($value1["cep"]); ?><?php } ?>' data-district="<?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-street="<?php echo htmlspecialchars( $value1["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-number="<?php echo htmlspecialchars( $value1["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-complement="<?php echo htmlspecialchars( $value1["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-reference="<?php echo htmlspecialchars( $value1["reference"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i> </button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php }else{ ?>
                  <p class="h6 text-center py-3">
                    <b><i>NENHUM DADO ENCONTRADO</i></b>
                  </p>
                  <?php } ?>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-header row pb-1">
                  
                  <div class="card-title col-md-6">
                    <h5>Pedidos</h5> 
                  </div>
  
                  <form id="formOrdersUser" class="formOrdersUser col-md-6 table-responsive input-group-sm d-flex flex-row" data-id="<?php echo htmlspecialchars( $userData["0"]["idUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <select class="custom-select inputsOrdersUser mr-2" name="selectStoreOrders" id="selectStoreOrders" style="width: 100px;">
                      <?php if( isset($stores) && $stores != 0 ){ ?>
                      <?php $counter1=-1;  if( isset($stores) && ( is_array($stores) || $stores instanceof Traversable ) && sizeof($stores) ) foreach( $stores as $key1 => $value1 ){ $counter1++; ?>
                      <option value="<?php echo htmlspecialchars( $value1["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                      <?php } ?>
                      <?php }else{ ?>
                      <option value="0">Vazio</option>
                      <?php } ?>
                    </select>

                    <select class="custom-select inputsOrdersUser mr-2" name="selectStoreOrders" id="selectStoreOrders" style="width: 250px;">
                      <option value="0">Status</option>
                      <?php if( isset($ordersStatus) && $ordersStatus != 0 ){ ?>
                      <?php $counter1=-1;  if( isset($ordersStatus) && ( is_array($ordersStatus) || $ordersStatus instanceof Traversable ) && sizeof($ordersStatus) ) foreach( $ordersStatus as $key1 => $value1 ){ $counter1++; ?>
                      <option value="<?php echo htmlspecialchars( $value1["idOrderStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>

                    <input type="date" id="inputStoreOrdersDateIni" name="inputStoreOrdersDateIni" class="form-control inputsOrdersUser mr-2" value='<?php echo date("Y-m-01"); ?>'>
                    <input type="date" id="inputStoreOrdersDateFin" name="inputStoreOrdersDateFin" class="form-control inputsOrdersUser" value='<?php echo date("Y-m-d"); ?>'>

                  </form>
                  
                </div>
                <!-- /.card-header -->
                <div id="tbOrdersUsers" class="card-body table-responsive p-0" style="max-height: 450px;">
                  <?php if( isset($userData["0"]["orders"]) && $userData["0"]["orders"] != 0 ){ ?>
                  <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Pago</th>
                        <th>Frete</th>
                        <th>Agendamento</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($userData["0"]["orders"]) && ( is_array($userData["0"]["orders"]) || $userData["0"]["orders"] instanceof Traversable ) && sizeof($userData["0"]["orders"]) ) foreach( $userData["0"]["orders"] as $key1 => $value1 ){ $counter1++; ?>
                      <tr style="cursor: pointer;" onclick="window.location.assign('/admin/orders/<?php echo htmlspecialchars( $value1["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
                        <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $userData["0"]["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $userData["0"]["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo date("H:i", strtotime($value1["timeInsert"])); ?> - <?php echo date("d/m/Y", strtotime($value1["dateInsert"])); ?></td>
                        <td><?php echo htmlspecialchars( $value1["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <?php if( $value1["paid"] == 1 ){ ?>
                          Sim
                          <?php }else{ ?>
                          Não
                          <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars( $value1["freight"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo date("H:i", strtotime($value1["timeInitial"])); ?> às <?php echo date("H:i", strtotime($value1["timeFinal"])); ?> - <?php echo date("d/m/Y", strtotime($value1["dateHorary"])); ?></td>
                        <td>R$ <?php echo maskPrice($value1["total"]); ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php }else{ ?>
                  <p class="h6 text-center py-3">
                    <b><i>NENHUM DADO ENCONTRADO</i></b>
                  </p>
                  <?php } ?>
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

        
        