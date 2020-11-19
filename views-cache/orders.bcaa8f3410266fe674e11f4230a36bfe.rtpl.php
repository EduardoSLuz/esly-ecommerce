<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pedidos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item active">Pedidos</li>
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
                <div class="card-header row pb-1 border-0">
                  
                  <div class="card-title col-md-6">
                    <h5>Pedidos</h5> 
                  </div>
  
                  <form id="formListOrders" class="formListOrders col-md-6 table-responsive input-group-sm d-flex flex-row">

                    <select class="custom-select inputsListOrders mr-2" name="selectStoreOrders" id="selectStoreOrders" style="width: 100px;">
                      <option value="0">Todas</option>
                      <?php if( isset($stores) && $stores != 0 ){ ?>
                      <?php $counter1=-1;  if( isset($stores) && ( is_array($stores) || $stores instanceof Traversable ) && sizeof($stores) ) foreach( $stores as $key1 => $value1 ){ $counter1++; ?>
                      <option value="<?php echo htmlspecialchars( $value1["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                      <?php } ?>
                      <?php } ?>
                    </select>

                    <select class="custom-select inputsListOrders mr-2" name="selectStatusOrders" id="selectStatusOrders" style="width: 250px;">
                      <option value="0">Status</option>
                      <?php if( isset($ordersStatus) && $ordersStatus != 0 ){ ?>
                      <?php $counter1=-1;  if( isset($ordersStatus) && ( is_array($ordersStatus) || $ordersStatus instanceof Traversable ) && sizeof($ordersStatus) ) foreach( $ordersStatus as $key1 => $value1 ){ $counter1++; ?>
                      <?php if( $value1["typeOrder"] != 3 ){ ?><option value="<?php echo htmlspecialchars( $value1["idOrderStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?>
                      <?php } ?>
                      <?php } ?>
                    </select>

                    <select class="custom-select inputsListOrders mr-2" name="selectPaidOrders" id="selectPaidOrders" style="width: 90px;">
                      <option value="0">Não</option>
                      <option value="1">Pago</option>
                    </select>

                    <input type="date" id="inputStoreOrdersDateIni" name="inputStoreOrdersDateIni" class="form-control inputsListOrders mr-2" value='<?php echo date("Y-m-01", strtotime($param["ini"])); ?>'>
                    <input type="date" id="inputStoreOrdersDateFin" name="inputStoreOrdersDateFin" class="form-control inputsListOrders" value='<?php echo date("Y-m-d", strtotime($param["fin"])); ?>'>

                    <script>
                      document.getElementById("selectStoreOrders").value = "<?php echo htmlspecialchars( $param["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                      document.getElementById("selectStatusOrders").value = "<?php echo htmlspecialchars( $param["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                      document.getElementById("selectPaidOrders").value = "<?php echo htmlspecialchars( $param["paid"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";
                    </script>

                  </form>
                  
                </div>
                <!-- /.card-header -->
                <div id="tbListOrders" class="card-body table-responsive p-0" style="max-height: 450px;">
                  <?php if( isset($orders) && $orders != 0 ){ ?>
                  <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>CPF</th>
                        <th>Frete</th>
                        <th>Status</th>
                        <th>Pago</th>
                        <th>Data</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($orders) && ( is_array($orders) || $orders instanceof Traversable ) && sizeof($orders) ) foreach( $orders as $key1 => $value1 ){ $counter1++; ?>
                      <tr style="cursor: pointer;" onclick="window.location.assign('/admin/orders/<?php echo htmlspecialchars( $value1["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/')">
                        <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php echo htmlspecialchars( $value1["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo maskCpf($value1["infoUser"]["cpfUser"]); ?></td>
                        <td><?php echo htmlspecialchars( $value1["freight"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php echo htmlspecialchars( $value1["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <?php if( $value1["paid"] == 1 ){ ?>
                          Sim
                          <?php }else{ ?>
                          Não
                          <?php } ?>
                        </td>
                        <td><?php echo date("H:i", strtotime($value1["timeInsert"])); ?> - <?php echo date("d/m/Y", strtotime($value1["dateInsert"])); ?></td>
                        <td>R$ <?php echo maskPrice($value1["total"]); ?></td>
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

        
        