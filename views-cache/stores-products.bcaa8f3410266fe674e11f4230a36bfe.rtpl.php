<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Produtos</h1>
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
            
            
          
          </div>
          
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header row border-bottom-0 align-items-center">
                  
                  <div class="card-title col-md-6">
                    <h5>Produtos</h5> 
                  </div>
  
                  <div class="card-tools col-12 offset-md-2 col-md-4">

                    <form id="formSearchListProducts" class="formListProducts input-group input-group-sm" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                      <select class="custom-select inputsListUser" name="selectStatusOrders" id="selectStatusOrders">
                        <option value="0">Por Código do Produto:</option>
                        <option value="1">Por Departamento:</option>
                        <option value="2">Por Descrição:</option>
                      </select>

                      <input type="search" name="table_search" class="form-control inputsListUser float-right" placeholder="Search" oninput="$('#formSearchListProducts').submit()">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>

                    </form>
                  </div>
                  
                </div>
                <!-- /.card-header -->
                <div id="tbListProductsConfig" class="card-body table-responsive p-0">
                  
                  <?php if( isset($products) && is_array($products) && count($products) > 0 ){ ?>
                  <table class="table table-head-fixed text-nowrap">
                    
                    <tbody>
                      
                      <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td>
                          
                          <div class="row">
                            
                            <div class="col-md-2 col-5 bar-display">
                              <img src='<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' class="img-fluid" width="150px" alt="Produto <?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            </div>

                            <div class="col-md-10 col-7 row align-items-center">
                              
                              <div class="col-md">
                                <b>Código: #<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
                              
                                <p class="text-wrap">
                                  <?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                  <br> DEPARTAMENTO: <?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                                  <br> <b>R$<?php echo maskPrice($value1["priceFinal"]); ?> - <i>Quantidade Estoque: <?php echo htmlspecialchars( $value1["stock"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></b>
                                </p>
                              </div>

                              <div class="col-md text-right">
                                <a href="#" class="h5" data-toggle="modal" data-target="#modalProductsConfig" data-id="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="1" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-src="<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-archive="<?php echo htmlspecialchars( $value1["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-unit="<?php echo htmlspecialchars( $value1["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-qtd="<?php echo htmlspecialchars( $value1["unitsMeasures"]["0"]["valueStock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-price="<?php echo htmlspecialchars( $value1["priceFinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-free="<?php echo htmlspecialchars( $value1["unitsMeasures"]["0"]["freeFill"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></a>
                              </div>

                            </div>

                          </div>

                        </td>
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
        
        