<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?> - Layout</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/stores/">Lojas</a></li>
                <li class="breadcrumb-item active">Loja <?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                <li class="breadcrumb-item active">Layout</li>
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
            
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Cabeçalho de Departamentos</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="dataLayoutHeader" class="row">

                    <?php if( $storeLayoutHeader != 0 ){ ?>
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $counter1=-1;  if( isset($storeLayoutHeader) && ( is_array($storeLayoutHeader) || $storeLayoutHeader instanceof Traversable ) && sizeof($storeLayoutHeader) ) foreach( $storeLayoutHeader as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                            <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                              <?php if( $value1["type"] == 1 ){ ?>Departamento<?php } ?>
                              <?php if( $value1["type"] == 2 ){ ?>Página<?php } ?>
                            </td>
                            <td>
                              <?php if( $value1["status"] == 1 ){ ?>
                              Ativo
                              <?php }else{ ?>
                              Inativo
                              <?php } ?>
                            </td>
                            <td>
                              <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalHeaderDep" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idLayoutHeader"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar um Cabeçalho" data-id-type="<?php echo htmlspecialchars( $value1["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-desc="<?php echo htmlspecialchars( $value1["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-dep="<?php echo htmlspecialchars( $value1["departament"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-link="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-status="<?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i></button> 
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
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

            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Infomações da loja&nbsp;</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  
                  <div id="alertsLayoutInfo">
            
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

                    <div class="col-sm-12">
                      <?php if( $storeLayoutInfo !=0 ){ ?>
                      <p>Exibir:</p>

                      <!-- checkbox -->
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoStore" name="infoStore" data-ly="lyInfo1" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo1"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoStore">
                            Sobre a Empresa
                          </label>
                        </div>
                      </div>
                      
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoStores" name="infoStores" data-ly="lyInfo2" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo2"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoStores">
                            Nossas Lojas
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoPartners" name="infoPartners" data-ly="lyInfo3" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo3"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoPartners">
                            Parceiros
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoHelp" name="infoHelp" data-ly="lyInfo4" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo4"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoHelp">
                            Perguntas Frequentes
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoContact" name="infoContact" data-ly="lyInfo5" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo5"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoContact">
                            Promoções
                          </label>
                        </div>
                      </div>
                      
                      <?php if( 0==1 ){ ?>
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoContactWork" name="infoContactWork" data-ly="lyInfo6" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo6"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoContactWork">
                            Fale Conosco
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" class="btnsLayoutInfo" id="infoPromo" name="infoPromo" data-ly="lyInfo7" data-id="<?php echo htmlspecialchars( $storeLayoutInfo["0"]["idLayoutInfo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutInfo["0"]["lyInfo7"] == 1 ){ ?>checked<?php } ?>>
                          <label for="infoPromo">
                            Trabalhe Conosco 
                          </label>
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

                </div>
                  <!-- /.row -->

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Rodapé da página&nbsp;</h3>
                  </div>
  
                  <!-- /.card-header -->
                  <div class="card-body">
                    
                    <div id="alertsLayoutFooter">
            
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

                      <div class="col-sm-12">
                        
                        <?php if( $storeLayoutFooter != 0 ){ ?>
                        <p>Exibir:</p>
  
                        <!-- checkbox -->
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutSocial" name="layoutSocial" data-ly="lyFooter1" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter1"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutSocial">
                              Redes Sociais
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutSuport" name="layoutSuport" data-ly="lyFooter2" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter2"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutSuport">
                              Suporte
                            </label>
                          </div>
                        </div>
  
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutInstitutional" name="layoutInstitutional" data-ly="lyFooter3" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter3"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutInstitutional">
                              Institucional
                            </label>
                          </div>
                        </div>
  
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutPayment" name="layoutPayment" data-ly="lyFooter4" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter4"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutPayment">
                              Formas de Pagamento
                            </label>
                          </div>
                        </div>
  
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutApp" name="layoutApp" data-ly="lyFooter5" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter5"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutApp">
                              Baixe Nosso App
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutSecurity" name="layoutSecurity" data-ly="lyFooter6" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter6"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutSecurity">
                              Site Seguro
                            </label>
                          </div>
                        </div>
  
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutPromo" name="layoutPromo" data-ly="lyFooter7" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter7"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutPromo">
                              Receba Ofertas Exclusivas
                            </label>
                          </div>
                        </div>
  
                        <div class="form-group clearfix">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" class="btnsLayoutFooter" id="layoutInfo" name="layoutInfo" data-ly="lyFooter8" data-id="<?php echo htmlspecialchars( $storeLayoutFooter["0"]["idLayoutFooter"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $storeLayoutFooter["0"]["lyFooter8"] == 1 ){ ?>checked<?php } ?>>
                            <label for="layoutInfo">
                              Mais informações
                            </label>
                          </div>
                        </div>
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

              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Cores da página &nbsp;
                      <button type="submit" class="btn btn-sm btn-outline-primary" form="formLayoutColor">Salvar</button>
                    </h3>
                  </div>
  
                  <!-- /.card-header -->
                  <div class="card-body">
                    
                    <div id="alertsLayoutColor">
            
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

                    <?php if( isset($storeLayoutColor) && $storeLayoutColor != 0 ){ ?>
                    <form id="formLayoutColor" class="formLayoutColor row" data-id="<?php echo htmlspecialchars( $storeLayoutColor["0"]["idLayoutColor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="2" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                      
                      <div class="col-lg-6 col-12">
                        <label for="selectThemeColor">Tema</label>
                        
                        <div class="input-group">
                          <select name="selectThemeColor" id="selectThemeColor" class="custom-select" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <option value="5">Amarelo</option>
                            <option value="1">Azul</option>
                            <option value="6">Ciano</option>
                            <option value="2">Cinza</option>
                            <option value="3">Verde</option>
                            <option value="4">Vermelho</option>
                            <option value="0">Personalizado</option>
                          </select>
  
                          <div class="input-group-append">
                            <span class="input-group-text iconThemeColor"><i class="fas fa-square-full" style="color: <?php echo htmlspecialchars( $storeLayoutColor["0"]["options"]["hd"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;"></i></span>
                          </div>
                        </div>

                      </div>

                      <details class="detailsLayoutColor col-md-12 mt-3">

                        <summary>Detalhes</summary>

                        <?php $ct = 0; ?>
                        <?php $counter1=-1;  if( isset($storeLayoutColor["0"]["options"]) && ( is_array($storeLayoutColor["0"]["options"]) || $storeLayoutColor["0"]["options"] instanceof Traversable ) && sizeof($storeLayoutColor["0"]["options"]) ) foreach( $storeLayoutColor["0"]["options"] as $key1 => $value1 ){ $counter1++; ?>
                        <div class="col-md-12 row">
  
                          <p class="h5 col-md-12">
                            <?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                          </p>
                          
                          <?php if( isset($value1["options"]) && count($value1["options"]) > 0 ){ ?>
                          <?php $keyMaster = $key1; ?>
                          <?php $counter2=-1;  if( isset($value1["options"]) && ( is_array($value1["options"]) || $value1["options"] instanceof Traversable ) && sizeof($value1["options"]) ) foreach( $value1["options"] as $key2 => $value2 ){ $counter2++; ?>
                          <?php $ct = $ct + 1; ?>
                          <div class="form-group col-lg-6 col-12">
                            <label for="<?php echo htmlspecialchars( $keyMaster, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></label>
    
                            <div class="input-group my-colorLy<?php echo htmlspecialchars( $ct, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                              <input type="text" class="form-control" id="<?php echo htmlspecialchars( $keyMaster, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  name="<?php echo htmlspecialchars( $keyMaster, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value2["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="<?php echo htmlspecialchars( $value2["icon"], ENT_COMPAT, 'UTF-8', FALSE ); ?> colorsLyFooter<?php echo htmlspecialchars( $ct, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: <?php echo htmlspecialchars( $value2["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;"></i></span>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                          <?php }else{ ?>
                          <p class="h6">
                            <b><i>Sem Dados</i></b>
                          </p>
                          <?php } ?>
  
                        </div>
                        <?php } ?>
                      </details>  

                      <script>
                        
                        let theme = "<?php echo htmlspecialchars( $storeLayoutColor["0"]["theme"], ENT_COMPAT, 'UTF-8', FALSE ); ?>";

                        document.getElementById("selectThemeColor").value = theme;
                        
                        if(theme == 0)
                        {
                          document.querySelector(".detailsLayoutColor").setAttribute("open", "true")
                        }

                      </script>
                      
                    </form>
                    <?php }else{ ?>
                    <p class="h6">
                      <b><i>Sem Dados</i></b>
                    </p>
                    <?php } ?>

                    <!-- /.row -->
                  </div>
                  <!-- /.card-body -->  
  
                </div>
                <!-- /.card -->
                  
              </div>

            </div>

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

        
        