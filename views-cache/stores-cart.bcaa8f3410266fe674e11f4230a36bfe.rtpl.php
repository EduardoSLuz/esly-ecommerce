<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja 01 - Configurações do Carrinho</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Config. Carrinho</li>
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
                  <h3 class="card-title">Carrinho</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <form class="formInfoCart" action="/admin/stores/<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/cart/" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    
                    <div id="alertsInfoDesc">
            
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

                    <div class="row">

                      <div class="form-group col-sm-3">
                        
                        <label for="inputName">Valor Mínimo Para Pedido:</label>
                        
                        <div class="input-group mb-3">

                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-danger"><i class="fas fa-times"></i></button>
                          </div>
                          
                          <input type="text" class="form-control" disabled>
                        </div>
                        
                      </div>
  
                      <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
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

        
        