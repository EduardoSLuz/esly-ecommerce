<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Horários</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Horários</li>
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
                  <h3 class="card-title">Horários de Funcionamento da Loja &nbsp;</h3> 
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="dataHorary"  class="row">

                    <?php if( isset($storeHorary) && $storeHorary != 0 ){ ?>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12" style="max-height: 350px;">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Periodos</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storeHorary["0"]["details"]) && ( is_array($storeHorary["0"]["details"]) || $storeHorary["0"]["details"] instanceof Traversable ) && sizeof($storeHorary["0"]["details"]) ) foreach( $storeHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                            <td><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <?php if( isset($value1["horary"]) && $value1["horary"] != 0 ){ ?>
                              <?php $counter2=-1;  if( isset($value1["horary"]) && ( is_array($value1["horary"]) || $value1["horary"] instanceof Traversable ) && sizeof($value1["horary"]) ) foreach( $value1["horary"] as $key2 => $value2 ){ $counter2++; ?>
                              
                              <?php if( $value2["init"] != '00:00' && $value2["final"] != '00:00' ){ ?> 
                              <?php if( $key2 != 0 ){ ?><br><?php } ?> <?php echo htmlspecialchars( $value2["init"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value2["final"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                              <?php } ?>

                              <?php } ?>
                              <?php } ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalHorary" data-type="1" data-id="<?php echo htmlspecialchars( $storeHorary["0"]["idHorary"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar Horários de Funcionamento da Loja" data-id-day="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-day="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-details='<?php echo json_encode($value1["horary"]); ?>'> <i class="fas fa-pen"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <?php }else{ ?>
                    <p class="h6 col-sm-12">
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

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Horários para Entrega &nbsp;</h3> 
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="dataDelivery" class="row">
                   
                    <?php if( isset($storeHorary) && $storeHorary != 0 ){ ?>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12" style="max-height: 350px;">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Periodos</th>
                            <th>Valores</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storeHorary["0"]["details"]) && ( is_array($storeHorary["0"]["details"]) || $storeHorary["0"]["details"] instanceof Traversable ) && sizeof($storeHorary["0"]["details"]) ) foreach( $storeHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                            <td><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <?php if( isset($value1["delivery"]) && $value1["delivery"] != 0 ){ ?>
                              <?php $counter2=-1;  if( isset($value1["delivery"]) && ( is_array($value1["delivery"]) || $value1["delivery"] instanceof Traversable ) && sizeof($value1["delivery"]) ) foreach( $value1["delivery"] as $key2 => $value2 ){ $counter2++; ?>
                              
                              <?php if( $value2["init"] != '00:00' && $value2["final"] != '00:00' ){ ?> 
                              <?php if( $key2 != 0 ){ ?><br><?php } ?> <?php echo htmlspecialchars( $value2["init"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value2["final"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                              <?php } ?>

                              <?php } ?>
                              <?php } ?>
                            </td>
                            <td>
                              <?php if( isset($value1["delivery"]) && $value1["delivery"] != 0 ){ ?>
                              <?php $counter2=-1;  if( isset($value1["delivery"]) && ( is_array($value1["delivery"]) || $value1["delivery"] instanceof Traversable ) && sizeof($value1["delivery"]) ) foreach( $value1["delivery"] as $key2 => $value2 ){ $counter2++; ?>
                              
                              <?php if( $key2 != 0 ){ ?><br><?php } ?> R$ <?php echo maskPrice($value2["value"]); ?>

                              <?php } ?>
                              <?php } ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalHorary" data-type="2" data-id="<?php echo htmlspecialchars( $storeHorary["0"]["idHorary"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar Horários de Entrega" data-id-day="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-day="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-details='<?php echo json_encode($value1["delivery"]); ?>'> <i class="fas fa-pen"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <?php }else{ ?>
                    <p class="h6 col-sm-12">
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

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Horários para Retirada &nbsp;</h3> 
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="dataWithdrawal" class="row">

                    <?php if( isset($storeHorary) && $storeHorary != 0 ){ ?>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12" style="max-height: 350px;">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Periodos</th>
                            <th>Valores</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storeHorary["0"]["details"]) && ( is_array($storeHorary["0"]["details"]) || $storeHorary["0"]["details"] instanceof Traversable ) && sizeof($storeHorary["0"]["details"]) ) foreach( $storeHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                            <td><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <?php if( isset($value1["withdrawal"]) && $value1["withdrawal"] != 0 ){ ?>
                              <?php $counter2=-1;  if( isset($value1["withdrawal"]) && ( is_array($value1["withdrawal"]) || $value1["withdrawal"] instanceof Traversable ) && sizeof($value1["withdrawal"]) ) foreach( $value1["withdrawal"] as $key2 => $value2 ){ $counter2++; ?>
                              
                              <?php if( $value2["init"] != '00:00' && $value2["final"] != '00:00' ){ ?> 
                              <?php if( $key2 != 0 ){ ?><br><?php } ?> <?php echo htmlspecialchars( $value2["init"], ENT_COMPAT, 'UTF-8', FALSE ); ?> às <?php echo htmlspecialchars( $value2["final"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                              <?php } ?>

                              <?php } ?>
                              <?php } ?>
                            </td>
                            <td>
                              <?php if( isset($value1["withdrawal"]) && $value1["withdrawal"] != 0 ){ ?>
                              <?php $counter2=-1;  if( isset($value1["withdrawal"]) && ( is_array($value1["withdrawal"]) || $value1["withdrawal"] instanceof Traversable ) && sizeof($value1["withdrawal"]) ) foreach( $value1["withdrawal"] as $key2 => $value2 ){ $counter2++; ?>
                              
                              <?php if( $key2 != 0 ){ ?><br><?php } ?> R$ <?php echo maskPrice($value2["value"]); ?>

                              <?php } ?>
                              <?php } ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalHorary" data-type="3" data-id="<?php echo htmlspecialchars( $storeHorary["0"]["idHorary"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar Horários de Retirada" data-id-day="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-day="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-details='<?php echo json_encode($value1["withdrawal"]); ?>'> <i class="fas fa-pen"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <?php }else{ ?>
                    <p class="h6 col-sm-12">
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

        
        