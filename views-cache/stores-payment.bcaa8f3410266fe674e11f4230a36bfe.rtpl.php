<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Pagamento</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Pagamento</li>
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
                  <h3 class="card-title">Opções de Pagamento&nbsp;</h3> 
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalPayment" data-type="1" data-id="0" data-modal-title="Adicionar uma Opção de Pagamento" data-id-type="0" data-desc=""> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="alertsDeletePayOption">
            
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

                  <div id="dataPayOption" class="row">

                    <?php if( $storePay != 0 ){ ?>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storePay) && ( is_array($storePay) || $storePay instanceof Traversable ) && sizeof($storePay) ) foreach( $storePay as $key1 => $value1 ){ $counter1++; ?>
                          <tr id="trPayOption<?php echo htmlspecialchars( $value1["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <?php if( $value1["type"] == 1 ){ ?>Na Retirada<?php } ?>
                              <?php if( $value1["type"] == 2 ){ ?>Na Entrega<?php } ?>
                              <?php if( $value1["type"] == 3 ){ ?>Online<?php } ?>
                            </td>
                            <td>

                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalPayment" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar uma Opção de Pagamento" data-id-type="<?php echo htmlspecialchars( $value1["idPaymentType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-desc="<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i></button>
                            
                              <button type="button" class="btnDeletePayOption btn btn-tool px-1" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>

                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <?php }else{ ?>
                    <p class="h6">
                      <b><i>Sem Dados</i></b>
                    </p>
                    <?php } ?>

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

        
        