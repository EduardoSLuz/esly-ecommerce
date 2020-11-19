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
                <li class="breadcrumb-item"><a href="/admin/stores/<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>/">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
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
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalFreigth"> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Cidade/Estado</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Valor + Tipo</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Campo Grande - MS</td>
                            <td>R$ 3,00</td>
                            <td>Normal</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark mr-2" data-toggle="modal" data-target="#modalFreigth"><i class="fas fa-pen"></i></a>
                              <a href="#" class="text-dark mr-2"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Campo Grande - MS</td>
                            <td>R$ 3,00</td>
                            <td>Express</td>
                            <td>R$ 8,00</td>
                            <td>
                              <a href="#" class="text-dark mr-2" data-toggle="modal" data-target="#modalFreigth"><i class="fas fa-pen"></i></a>
                              <a href="#" class="text-dark mr-2"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Aquidauana - MS</td>
                            <td>R$ 5,00</td>
                            <td>Normal</td>
                            <td>R$ 7,00</td>
                            <td>
                              <a href="#" class="text-dark mr-2" data-toggle="modal" data-target="#modalFreigth"><i class="fas fa-pen"></i></a>
                              <a href="#" class="text-dark mr-2"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
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

        
        