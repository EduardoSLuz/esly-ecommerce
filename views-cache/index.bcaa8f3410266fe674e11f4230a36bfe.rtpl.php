<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Painel de Controle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Painel de Controle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div id="gridPanelControl" class="row">
          
          <?php if( isset($notifications["details"]["0"]) ){ ?>

          <div class="col-lg-3 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo htmlspecialchars( $notifications["details"]["0"]["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

                <p>Novos Pedidos</p>
              </div>
              <div class="icon" onclick="window.location.assign('<?php echo htmlspecialchars( $notifications["details"]["0"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="cursor: pointer;">
                <i class="fas fa-clipboard-list"></i>
              </div>
              <a href="<?php echo htmlspecialchars( $notifications["details"]["0"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">Acessar <i class="fas fa-chevron-circle-right"></i> </a>
            </div>
          </div>
          <?php } ?>

          
          <?php if( isset($notifications["details"]["0"]) ){ ?>

          <!-- ./col -->
          <div class="col-lg-3 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Taxa de Vendas Mensal</p>
              </div>
              <div class="icon">
                <i class="far fa-chart-bar"></i>
              </div>
              <a href="#" class="small-box-footer">Acessar <i class="fas fa-chevron-circle-right"></i> </a>
            </div>
          </div>
          <!-- ./col -->
          <?php } ?>


          <?php if( isset($notifications["details"]["3"]) ){ ?>

          <div class="col-lg-3 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo htmlspecialchars( $notifications["details"]["3"]["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

                <p>Usuários Registrados (No Mês)</p>
              </div>
              <div class="icon" onclick="window.location.assign('<?php echo htmlspecialchars( $notifications["details"]["3"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="cursor: pointer;">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?php echo htmlspecialchars( $notifications["details"]["3"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">Acessar <i class="fas fa-chevron-circle-right"></i> </a>
            </div>
          </div>
          <!-- ./col -->
          <?php } ?>


          <?php if( isset($notifications["details"]["1"]) ){ ?>

          <div class="col-lg-3 col-sm-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo htmlspecialchars( $notifications["details"]["1"]["qtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

                <p>Pedidos Cancelados (Hoje)</p>
              </div>
              <div class="icon" onclick="window.location.assign('<?php echo htmlspecialchars( $notifications["details"]["1"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>')" style="cursor: pointer;">
                <i class="far fa-thumbs-down"></i>
              </div>
              <a href="<?php echo htmlspecialchars( $notifications["details"]["1"]["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="small-box-footer">Acessar <i class="fas fa-chevron-circle-right"></i> </a>
            </div>
          </div>
          <!-- ./col -->
          <?php } ?>


        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->