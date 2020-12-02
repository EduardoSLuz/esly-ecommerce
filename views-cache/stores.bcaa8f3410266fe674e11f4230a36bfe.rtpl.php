<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Lojas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item active">Lojas</li>
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
                  <h3 class="card-title">Todas as Lojas</h3>
  
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="max-height: 450px;">
                  <table class="table table-head-fixed table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($stores) && ( is_array($stores) || $stores instanceof Traversable ) && sizeof($stores) ) foreach( $stores as $key1 => $value1 ){ $counter1++; ?>
                      <tr style="cursor: pointer;" onclick="window.location.assign('/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/register/')">
                        <td>
                          <?php echo htmlspecialchars( $value1["idStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          <?php echo htmlspecialchars( $value1["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          <span class="tag tag-success">
                            <?php if( $value1["statusStore"] == 1 ){ ?>Ativa<?php }else{ ?>Inativa<?php } ?>
                          </span>
                        </td>
                        <td class="h5">
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/register/"><i class="far fa-edit"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/"><i class="fas fa-cog"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/payment/"><i class="fas fa-dollar-sign"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/layout/"><i class="far fa-file-alt"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/freight/"><i class="fas fa-truck"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/horary/"><i class="far fa-clock"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/images/"><i class="far fa-image"></i></a>
                            <a class="mx-1" href="/admin/stores/<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/products/"><i class="fas fa-th-list"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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

        
        