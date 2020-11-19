<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Usuários</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item active">Usuários</li>
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
                <div class="card-header row border-bottom-0 align-items-center">
                  
                  <div class="card-title col-12 col-md">
                    <h5>Todos os Usuários</h5> 
                  </div>
  
                  <div class="card-tools col-12 col-md">

                    <form id="formListUsers" class="formListUsers input-group input-group-sm">
                      
                      <select class="custom-select mr-2 inputsListUser" name="selectStoreOrders" id="selectStoreOrders">
                        <option value="0">Clientes</option>
                        <option value="1">Admin</option>
                      </select>

                      <select class="custom-select mr-2 inputsListUser" name="selectStatusOrders" id="selectStatusOrders">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                      </select>

                      <input type="text" name="table_search" class="form-control inputsListUser float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>

                    </form>
                  </div>
                  
                </div>
                
                <!-- /.card-header -->
                <div id="tbListUsers" class="card-body table-responsive p-0" style="max-height: 450px;">
                  
                  <?php if( isset($userData) && $userData != 0 ){ ?>
                  <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Whatsapp</th>
                        <th>Cpf</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($userData) && ( is_array($userData) || $userData instanceof Traversable ) && sizeof($userData) ) foreach( $userData as $key1 => $value1 ){ $counter1++; ?>
                      <tr style="cursor: pointer;" onclick="window.location.assign('/admin/users/<?php echo htmlspecialchars( $value1["idUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
                        <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["emailUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <?php if( isset($value1["whatsappUser"]) && !empty($value1["whatsappUser"]) && strlen($value1["whatsappUser"]) == 11 ){ ?>
                          <?php echo maskTel($value1["whatsappUser"]); ?>
                          <?php }else{ ?>
                          Sem Whatsapp
                          <?php } ?>
                        </td>
                        <td>
                          <?php if( isset($value1["cpfUser"]) && !empty($value1["cpfUser"]) && strlen($value1["cpfUser"]) == 11 ){ ?>
                          <?php echo maskCpf($value1["cpfUser"]); ?>
                          <?php }else{ ?>
                          Sem CPF
                          <?php } ?>
                        </td>
                        <td><?php if( $value1["statusUser"] == 1 ){ ?>Ativo<?php }else{ ?>Inativo<?php } ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <?php }else{ ?>
                  <p class="h6 text-center border-top py-3">
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

        
        