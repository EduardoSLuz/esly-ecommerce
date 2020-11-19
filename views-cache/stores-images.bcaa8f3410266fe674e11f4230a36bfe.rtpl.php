<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Imagens</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Imagens</li>
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
          <div id="dataImages" class="row">
            
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Imagens do Site &nbsp;</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <?php if( isset($storeImgs) && $storeImgs != 0 ){ ?>
                  <div class="row align-items-center justify-content-center">

                    <?php if( isset($storeImgs["0"]) ){ ?>
                    <div class="col-sm-4 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["0"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;" alt="Logo Global">
                      <p class="text-center profile-username"> 
                        Logo Desktop - Global 
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["0"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["0"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["0"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Logo Desktop - Global"><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                    <?php if( isset($storeImgs["6"]) ){ ?>
                    <div class="col-sm-2 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["6"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;max-height: 120px;" alt="Logo Mobile - Global">
                      <p class="text-center profile-username"> 
                        Logo Mobile - Global
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["6"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["6"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["6"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Logo Mobile - Global"><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                    <?php if( isset($storeImgs["1"]) ){ ?>
                    <div class="col-sm-5 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["1"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;" alt="Banner Global">
                      <p class="text-center profile-username"> 
                        Banner Global 
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["1"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["1"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["1"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Banner Global"><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                    <?php if( isset($storeImgs["2"]) ){ ?>
                    <div class="col-sm-4 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["2"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;" alt="Logo Desktop - Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <p class="text-center profile-username"> 
                        Logo Desktop - Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["2"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["2"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["2"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Logo Desktop - Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> "><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                    <?php if( isset($storeImgs["5"]) ){ ?>
                    <div class="col-sm-2 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["5"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;max-height: 120px;" alt="Logo Mobile - Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <p class="text-center profile-username"> 
                        Logo Mobile - Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["5"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["5"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["5"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Logo Mobile - Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> "><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                    <?php if( isset($storeImgs["4"]) ){ ?>
                    <div class="col-sm-3 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["4"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;" alt="Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <p class="text-center profile-username"> 
                        Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> 
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["4"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["4"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["4"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                    <?php if( isset($storeImgs["3"]) ){ ?>
                    <div class="col-sm-2 text-center my-4">
                      
                      <img src="<?php echo htmlspecialchars( $storeImgs["3"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;" alt="Login">
                      <p class="text-center profile-username"> 
                        Login 
                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar Imagem do Site" data-type="2" data-src="<?php echo htmlspecialchars( $storeImgs["3"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $storeImgs["3"]["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $storeImgs["3"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Login"><i class="fas fa-pen"></i></button> 
                      </p>
                      
                    </div>
                    <?php } ?>

                  </div>
                  <!-- /.row -->
                  <?php }else{ ?>
                  <p class="h6">
                    <b><i>Sem Dados</i></b>
                  </p>
                  <?php } ?>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Imagens da Página Inicial &nbsp;</h3> 
                  <?php if( isset($storeImgs["promotions"]) && is_array($storeImgs["promotions"]) && $storeImgs["ctPromo"] < 10 ){ ?>
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalImages" data-modal-title="Inserir uma Imagem para Página Inicial" data-type="1" data-src="/resources/imgs/logos/default.png" data-origin="<?php echo htmlspecialchars( $storeImgs["src"]["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $storeImgs["promotions"]["1"]["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php echo htmlspecialchars( $storeImgs["ctPromo"] + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?>.png" data-file="" data-name="Img #<?php echo htmlspecialchars( $storeImgs["ctPromo"] + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="far fa-plus-square"></i> Adicionar</a>
                  <?php } ?>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                  <div id="alertsDeleteImages">
            
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
                  
                  <?php if( isset($storeImgs) && isset($storeImgs["promotions"]) && $storeImgs != 0 ){ ?>
                  <div class="row align-items-center">

                    <?php $counter1=-1;  if( isset($storeImgs["promotions"]) && ( is_array($storeImgs["promotions"]) || $storeImgs["promotions"] instanceof Traversable ) && sizeof($storeImgs["promotions"]) ) foreach( $storeImgs["promotions"] as $key1 => $value1 ){ $counter1++; ?>
                    <?php if( $value1["src"] != '' ){ ?>
                    <div id="colImgsPromo<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="col-sm-4">
                      
                      <img src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="img-fluid" style="border:solid 2px #b3b3b3 ;" alt="Imagem Promoção #<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      <p class="text-center profile-username"> 
                        Img #<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?> 

                        <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalImages" data-modal-title="Alterar uma Imagem da Página Inicial" data-type="2" data-src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $value1["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-file="<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="Img #<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></button> 
                        <?php if( $key1 == $storeImgs["ctPromo"] ){ ?>
                        <button type="button" class="btn btn-tool px-0 btnDeleteImages" data-type="3" data-id="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-origin="<?php echo htmlspecialchars( $value1["origin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>
                        <?php } ?>
                      </p>
                      
                    </div>
                    <?php } ?>
                    <?php } ?>

                  </div>
                  <!-- /.row -->
                  <?php }else{ ?>
                  <p class="h6">
                    <b><i>Sem Dados</i></b>
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

        
        