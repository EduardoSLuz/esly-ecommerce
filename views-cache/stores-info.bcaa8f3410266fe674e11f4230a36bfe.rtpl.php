<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja 01 - Informações</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Informações</li>
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
                  <h3 class="card-title">Sobre a Empresa</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <form class="formInfoDesc" action="/admin/stores/<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>/info/store/" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                    
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

                      <div class="form-group col-sm-12">
                        <label for="inputName">Descrição</label>
                        <textarea id="textInfo" name="textInfo" class="form-control" rows="5" placeholder="Fale sobre sua empresa!"><?php echo htmlspecialchars( $storeInfo["0"]["textInfoStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
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

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Perguntas Frequentes &nbsp;</h3> 
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalInfoHelp" data-modal-title="Adicionar uma Pergunta" data-title="" data-descripton="" data-type="1"> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="alertsDeleteInfoHelp">
            
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

                    <div class="col-sm-12" id="dataInfoHelp">
						
                      <?php if( $storeHelp != 0 ){ ?>
                      <?php $counter1=-1;  if( isset($storeHelp) && ( is_array($storeHelp) || $storeHelp instanceof Traversable ) && sizeof($storeHelp) ) foreach( $storeHelp as $key1 => $value1 ){ $counter1++; ?>

                      <div class="card card-default collapsed-card">
                        <div class="card-header">
                          <h3 class="card-title"><?php echo htmlspecialchars( $value1["titleHelpStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
        
                          <div class="card-tools">
                            
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modalInfoHelp" data-modal-title="Alterar uma Pergunta" data-title="<?php echo htmlspecialchars( $value1["titleHelpStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-descripton="<?php echo htmlspecialchars( $value1["textHelpStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idStoreHelp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></button>
                            
                            <button type="button" class="btn btn-tool btnDeleteInfoHelp" data-card-widget="remove" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idStoreHelp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>

                          </div>
                        </div>

                        <div class="card-body" style="display: none;">
                          <p class="my-0"><?php echo htmlspecialchars( $value1["textHelpStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        </div>

                      </div>
                      <?php } ?>
                      <?php }else{ ?>
                      <p class="h6">
                        <b><i>Sem Dados</i></b>
                      </p>
                      <?php } ?>
                      
                    </div>

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
                  <h3 class="card-title">Promoções &nbsp;</h3> 
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalInfoPromo" data-type="1" data-id="0" data-id-type="0" data-modal-title="Adicionar uma Promoção" data-title="" data-description="" data-code="" data-value="" data-value-type="1"> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">

                  <div id="alertsDeleteInfoPromo">
            
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
                  
                  <form id="formInfoEmailPromo" class="formInfoEmailPromo row" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <div class="col-sm-12" id="dataInfoPromo">
						
                      <?php if( $storePromo != 0 ){ ?>
                      <?php $counter1=-1;  if( isset($storePromo) && ( is_array($storePromo) || $storePromo instanceof Traversable ) && sizeof($storePromo) ) foreach( $storePromo as $key1 => $value1 ){ $counter1++; ?>
                      <div class="card card-default collapsed-card">
                        
                        <div class="card-header">
                          <h3 class="card-title"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>

                          <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                            
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modalInfoPromo" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id-type="<?php echo htmlspecialchars( $value1["idPromoType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar uma Promoção" data-title="<?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-description="<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-code="<?php echo htmlspecialchars( $value1["code"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-value='<?php echo htmlspecialchars( $value1["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' data-value-type="<?php echo htmlspecialchars( $value1["valueType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></button>
                            
                            <button type="button" class="btn btn-tool btnDeleteInfoPromo" data-card-widget="remove" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>

                            <div class="btn btn-tool px-0 mx-0 d-none">
                              <div class="icheck-secondary d-inline">
                                <input type="checkbox" id="check-<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="check-<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <label for="check-<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></label>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="card-body" style="display: none;">
                          <p class="my-0"><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                        </div>

                      </div>
                      <?php } ?>
                      <?php }else{ ?>
                      <p class="h6">
                        <b><i>Sem Dados</i></b>
                      </p>
                      <?php } ?>
                      
                    </div>

                    <div class="col-12 text-right">

                      <p id="alertTextInfoPromo" class="text-success font-weight-bold d-none px-2">Alertas Enviados com Successo!</p>

                      <div id="overlayInfoPromo" class="btn d-none">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-1x fa-sync fa-spin"></i>
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary btn-sm d-none"><i class="far fa-paper-plane"></i> Enviar Alertas</button>
                    </div>

                  </form>
                  <!-- /.row -->

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Parceiros &nbsp;</h3> 
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalInfoPartners" data-type="1" data-id="0" data-modal-title="Adicionar um Parceiro" data-src="" data-archive="NEW" data-name="" data-link=""> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="alertsDeleteInfoPartner">
            
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
                    <!-- /.card-header -->
                    <div id="cardInfoPartner" class="card-body table-responsive p-0 col-sm-12">
                      
                      <?php if( $storePartner != 0 ){ ?>
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Link Site</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php $counter1=-1;  if( isset($storePartner) && ( is_array($storePartner) || $storePartner instanceof Traversable ) && sizeof($storePartner) ) foreach( $storePartner as $key1 => $value1 ){ $counter1++; ?>
                          <tr id="trInfoPartner<?php echo htmlspecialchars( $value1["idPartner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <td><?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>

                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalInfoPartners" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idPartner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar um Parceiro" data-src="<?php echo htmlspecialchars( $value1["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-archive="<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-link="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></button>
                            
                              <button type="button" class="btnDeleteInfoPartner btn btn-tool px-1" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idPartner"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-archive="<?php echo htmlspecialchars( $value1["file"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>

                            </td>
                          </tr>
                          <?php } ?>

                        </tbody>
                      </table>
                      <?php }else{ ?>
                      <p class="h6">
                        <b><i>Sem Dados</i></b>
                      </p>
                      <?php } ?>

                    </div>
                    <!-- /.card-body -->

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
                  <h3 class="card-title">Redes Sociais &nbsp;</h3> 
                  <a href="#" class="text-success py-1" data-toggle="modal" data-target="#modalInfoSocial" data-type="1" data-id="0" data-modal-title="Adicionar uma Rede Social" data-id-type="0" data-link=""> <i class="far fa-plus-square"></i> Adicionar</a>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="alertsDeleteInfoSocial">
            
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

                  <div id="dataInfoSocial" class="row">
                    
                    <?php if( $storeSocial != 0 ){ ?>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Link</th>
                            <th>Icone</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storeSocial["0"]) && ( is_array($storeSocial["0"]) || $storeSocial["0"] instanceof Traversable ) && sizeof($storeSocial["0"]) ) foreach( $storeSocial["0"] as $key1 => $value1 ){ $counter1++; ?>
                          <tr id="trInfoSocial<?php echo htmlspecialchars( $value1["idSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><i class="<?php echo htmlspecialchars( $value1["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"></i></td>
                            <td>
                             
                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalInfoSocial" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar uma Rede Social" data-id-type="<?php echo htmlspecialchars( $value1["idSocialType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-link="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-pen"></i></button>
                            
                              <button type="button" class="btnDeleteInfoSocial btn btn-tool px-1" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idSocial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>

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

        
        