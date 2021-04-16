<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Empresas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/master/home/">Home</a></li>
                <li class="breadcrumb-item active">Empresas</li>
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
                  <h3 class="card-title">Todas as Empresas</h3>
  
                </div>
                <!-- /.card-header -->
                <div id="tbMasterCompanies" class="card-body table-responsive p-0" style="max-height: 450px;">
                  <table class="table table-head-fixed table-hover text-nowrap table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th>ID</th>
                        <th>SITE</th>
                        <th>DIRECTORY</th>
                        <th>STATUS</th>
                        <th>CODE_MSG</th>
                        <th>DATE_UPDATE</th>
                        <th>OPTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $counter1=-1;  if( isset($company) && ( is_array($company) || $company instanceof Traversable ) && sizeof($company) ) foreach( $company as $key1 => $value1 ){ $counter1++; ?>
                      <tr class="text-center">
                        <td>
                          <?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          <?php echo htmlspecialchars( $value1["host"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          /<?php echo htmlspecialchars( $value1["directory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          <span class="tag tag-success">
                            <?php if( $value1["status"] == 1 ){ ?>Ativa<?php }else{ ?>Inativa<?php } ?>
                          </span>
                        </td>
                        <td>
                          <?php echo htmlspecialchars( $value1["code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                        </td>
                        <td>
                          <?php echo date('H:i d/m/Y', strtotime($value1["dateUpdate"])); ?>
                        </td>
                        <td class="h5">
                            <a class="mx-1" href="#" data-toggle="modal" data-target="#modalCompanyRegister" data-cod="<?php echo htmlspecialchars( $value1["idCompany"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-edit"></i></a>
                            <a class="mx-1" href="https://www.<?php echo htmlspecialchars( $value1["host"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/admin/"><i class="fas fa-user-shield"></i></a>
                            <a class="mx-1" href="#" data-toggle="modal" data-target="#modalCompanyMercato" data-cod="<?php echo htmlspecialchars( $value1["idCompany"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-network-wired"></i></a>
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

        
        