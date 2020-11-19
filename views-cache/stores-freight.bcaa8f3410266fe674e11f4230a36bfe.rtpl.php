<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Frete</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Frete</li>
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
                  <h3 class="card-title">Frete &nbsp;</h3> 
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalFreigth" data-type="1" data-id="0" data-modal-title="Adicionar um Frete" data-district="" data-city="0" data-cep="" data-details='[{"value" : "0", "status" : "0"}, {"value" : "0", "status" : "0"}]' data-only="0"> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                  <div id="alertsDeleteFreight">
            
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
                  
                  <div id="dataFreight" class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      
                      <?php if( isset($storeFreight) && $storeFreight != 0 ){ ?>
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Região</th>
                            <th>Cidade</th>
                            <th>Cep</th>
                            <th>Tipos</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storeFreight) && ( is_array($storeFreight) || $storeFreight instanceof Traversable ) && sizeof($storeFreight) ) foreach( $storeFreight as $key1 => $value1 ){ $counter1++; ?>
                          <tr id="trFreight<?php echo htmlspecialchars( $value1["idFreight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <?php if( $value1["onlyCity"] == 0 ){ ?>
                              <?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                              <?php }else{ ?>
                              Por toda cidade
                              <?php } ?>
                            </td>
                            <td><?php echo htmlspecialchars( $value1["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo maskCep($value1["cep"]); ?></td>
                            <td><?php $counter2=-1;  if( isset($value1["details"]) && ( is_array($value1["details"]) || $value1["details"] instanceof Traversable ) && sizeof($value1["details"]) ) foreach( $value1["details"] as $key2 => $value2 ){ $counter2++; ?><?php if( $key2 == 0 ){ ?><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php }else{ ?>, <?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php } ?></td>
                            <td>

                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalFreigth" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idFreight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar um Frete" data-district="<?php echo htmlspecialchars( $value1["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-city="<?php echo htmlspecialchars( $value1["codeCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cep='<?php echo maskCep($value1["cep"]); ?>' data-details='<?php echo json_encode($value1["details"]); ?>' data-only="<?php echo htmlspecialchars( $value1["onlyCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i></button>
                            
                              <button type="button" class="btnDeleteFreight btn btn-tool px-1" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idFreight"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>

                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      <?php }else{ ?>
                      <p class="h6">
                        <b><i>Sem Dados</i></b>
                      </p>
                      <?php } ?>

                    </div>
                    <!-- /.card-body -->

                  </div>
                  <!-- /.row -->

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

        
        