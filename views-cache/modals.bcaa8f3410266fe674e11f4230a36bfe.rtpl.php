<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( isset($storeHelp) ){ ?>
<!-- MODAL INFO HELP -->
<div class="modal fade" id="modalInfoHelp" tabindex="-1" role="dialog" aria-labelledby="modalInfoHelp" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar uma Pergunta</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsInfoHelp">
            
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
                
                <form id="formInfoHelp" class="formInfoHelp" data-type="1" data-id="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">  
                    <div class="form-group">
                        <label for="inputTitleHelp" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" name="inputTitleHelp" id="inputTitleHelp">
                    </div>

                    <div class="form-group">
                        <label for="inputDescHelp" class="col-form-label">Descrição:</label>
                        <textarea class="form-control" name="inputDescHelp" id="inputDescHelp" rows="5"></textarea>
                    </div>
               </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formInfoHelp">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storePromo) ){ ?>
<!-- MODAL INFO PROMO -->
<div class="modal fade" id="modalInfoPromo" tabindex="-1" role="dialog" aria-labelledby="modalInfoPromo" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar uma Promoção</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsInfoPromo">
            
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
              
                <form id="formInfoPromo" class="formInfoPromo row" data-type="1" data-id="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                    <div class="form-group col-12">
                        <label for="inputModalInfoPromoTitle" class="col-form-label">Titulo:</label>
                        <div class="input-group">
                            <input type="text" class="form-control maskNumber text-left" name="inputModalInfoPromoTitle" id="inputModalInfoPromoTitle" placeholder="Digite um titulo para promoção">
                        </div>
                    </div>   

                    <div class="form-group col-12">
                        <label for="inputModalInfoPromoDesc" class="col-form-label">Descrição:</label>
                        <div class="input-group">
                            <textarea class="form-control text-left" name="inputModalInfoPromoDesc" id="inputModalInfoPromoDesc" cols="3" placeholder="Insira uma descriçãp para promoção"></textarea>
                        </div>
                    </div>   

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formInfoPromo">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storePartner) ){ ?>
<!-- MODAL INFO PARTNERS -->
<div class="modal fade" id="modalInfoPartners" tabindex="-1" role="dialog" aria-labelledby="modalInfoPartners" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar um Parceiro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              
                <div id="alertsInfoPartner">
            
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

                <form id="formInfoPartner" method="POST" class="formInfoPartner row" data-type="1" data-id="0" data-archive="" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>" enctype="multipart/form-data">
                
                    <div class="col-md-6">
                        
                        <div class="text-center">
                            <img id="imgInfoPartner" src="/resources/imgs/logos/default.png" class="img-fluid" style="border:solid 3px #b3b3b3; max-height: 175px;" alt="Photo">
                        </div>

                        <p class="text-center profile-username"> 
                            Logo
                        </p>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputImgPartner" name="inputImgPartner" aria-describedby="inputGroupImgPartner" accept="image/png, image/jpeg">
                              <label class="custom-file-label text-truncate" for="inputImgPartner">Alterar imagem</label>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-md-6">
                       
                        <div class="form-group">
                            <label for="inputNamePartner" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" name="inputNamePartner" id="inputNamePartner">
                        </div>

                        <label for="inputLinkPartner" class="col-form-label">Link do Site:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="addHTTP">https://</span>
                            </div>
                            <input type="text" class="form-control" name="inputLinkPartner" id="inputLinkPartner" aria-label="inputLinkPartner" aria-describedby="addHTTP" placeholder="Ex: Astemac.com.br">
                        </div>

                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
                
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formInfoPartner">Salvar</button>

            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storeSocial) ){ ?>
<!-- MODAL INFO SOCIAL -->
<div class="modal fade" id="modalInfoSocial" tabindex="-1" role="dialog" aria-labelledby="modalInfoSocial" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar uma Rede Social</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                
                <div id="alertsInfoSocial">
            
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

                <form id="formInfoSocial" class="formInfoSocial row" method="POST" data-type="1" data-id="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <label for="selectSocialType" class="col-form-label">Rede Social / Tipo:</label>
                            <select class="custom-select select2bs4" name="selectSocialType" id="selectSocialType" style="width: 100%;">
                                <?php if( isset($storePromoType) && $storePromoType != 0 ){ ?>
                                <option value="0">Selecione a Rede Social</option>
                                <?php $counter1=-1;  if( isset($storeSocialType) && ( is_array($storeSocialType) || $storeSocialType instanceof Traversable ) && sizeof($storeSocialType) ) foreach( $storeSocialType as $key1 => $value1 ){ $counter1++; ?>
                                <option value="<?php echo htmlspecialchars( $value1["idSocialType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>
                                <?php }else{ ?>
                                <option value="0">Sem Dados</option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <label for="inputLinkSocial" class="col-form-label">Link do Site:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">https://</span>
                            </div>
                            <input type="text" class="form-control" name="inputLinkSocial" id="inputLinkSocial" aria-label="inputLinkSocial" placeholder="Ex: facebook.com.br/suapagina/">
                        </div>
    
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formInfoSocial">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storePay) ){ ?>
<!-- MODAL PAYMENT -->
<div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="modalPayment" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar uma Opção de Pagamento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                
                <div id="alertsPayOption">
            
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

                <form id="formPayOption" class="formPayOption row" method="POST" data-type="1" data-id="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                    <div class="col-md-12">
                        
                        <div class="form-group">
                            <label for="selectPayOption" class="col-form-label">Opção de Pagamento:</label>
                            <select class="custom-select" name="selectPayOption" id="selectPayOption">
                                <option value="0">Selecione uma Opção de Pagamento</option>
                                <?php if( isset($storePayType) && $storePayType != 0 ){ ?>
                                <?php $counter1=-1;  if( isset($storePayType) && ( is_array($storePayType) || $storePayType instanceof Traversable ) && sizeof($storePayType) ) foreach( $storePayType as $key1 => $value1 ){ $counter1++; ?>
                                <option value="<?php echo htmlspecialchars( $value1["idPaymentType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                <?php } ?>
                                <?php }else{ ?>
                                <option value="0">Sem Dados</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="selectPayType" class="col-form-label">Tipo:</label>
                            <select class="custom-select" name="selectPayType" id="selectPayType">
                                <option value="1">Retirada</option>
                                <option value="2">Entrega</option>
                                <option value="3">Online</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputPayDesc" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" name="inputPayDesc" id="inputPayDesc" rows="5"></textarea>
                        </div>
    
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formPayOption">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storeDep) ){ ?>
<!-- MODAL HEADER DEP -->
<div class="modal fade" id="modalHeaderDep" tabindex="-1" role="dialog" aria-labelledby="modalHeaderDep" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar um Cabeçalho</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                
                <div id="alertsLayoutHeader">
            
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

                <form id="formLayoutDep" class="formLayoutDep row" method="POST" data-type="1" data-id="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                    <div class="col-md-12 form-group">
                        <label for="inputDescDep" class="col-form-label">Descrição:</label>
                        <input type="text" class="form-control" name="inputDescDep" id="inputDescDep" placeholder="Ex: Cupons" maxlength="20">
                    </div>
                    
                    <div class="col-md-8 form-group">
                        <label for="selectTypeDep" class="col-form-label">Tipo:</label>
                        <select class="custom-select" name="selectTypeDep" id="selectTypeDep">
                            <option value="0">Selecione um tipo</option>
                            <option value="1">Departamento</option>
                            <option value="2">Página</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="selectStatusDep" class="col-form-label">Status:</label>
                        <select class="custom-select" name="selectStatusDep" id="selectStatusDep">
                            <option value="0">Inativo</option>
                            <option value="1">Ativo</option>
                            </optgroup>
                        </select>
                    </div>

                    <div id="typeDep1" class="typesDep col-md-12 form-group d-none">
                        <label for="selectDepHeader" class="col-form-label">Departamento:</label>
                        <select class="custom-select select2bs4" name="selectDepHeader" id="selectDepHeader">
                            <option value="0">Selecione um Departamento</option>
                            <?php if( isset($storeDep) && $storeDep != 0 ){ ?>
                            <?php $counter1=-1;  if( isset($storeDep) && ( is_array($storeDep) || $storeDep instanceof Traversable ) && sizeof($storeDep) ) foreach( $storeDep as $key1 => $value1 ){ $counter1++; ?>
                            <option><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                            <?php } ?>
                            </optgroup>
                        </select>
                    </div>

                    <div id="typeDep2" class="typesDep col-md-12 form-group d-none">
                        <label for="inputLinkDep" class="col-form-label">Link Página:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">https://</span>
                            </div>
                            <input type="text" class="form-control" name="inputLinkDep" id="inputLinkDep" placeholder="Ex: astemac.com.br/departaments/BEBIDAS-0/">
                        </div>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formLayoutDep">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storeFreight) ){ ?>
<!-- MODAL FREIGTH -->
<div class="modal fade" id="modalFreigth" tabindex="-1" role="dialog" aria-labelledby="modalFreigth" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar um Frete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsFreight">
            
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
              
                <form id="formFreight" class="formFreight row" method="POST" data-type="1" data-id="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <div class="col-md-7 row">
                        <p class="h5 col-md-12 my-0">
                            Endereço
                        </p>
    
                        <div class="form-group col-md-12">
                            <label for="inputFreightDistrict" class="col-form-label">Bairro</label>
                            <input type="text" class="form-control" name="inputFreightDistrict" id="inputFreightDistrict">
                        </div>
    
                        <div class="form-group col-sm-12 col-lg-8">
                            <label for="selectFreightCity" class="col-form-label">Cidade</label>
                            <select class="custom-select select2bs4" name="selectFreightCity" id="selectFreightCity">
                                <?php if( isset($cities) && $cities != 0 ){ ?>
                                <option value="0">Selecione uma Cidade</option>
                                <?php $counter1=-1;  if( isset($cities) && ( is_array($cities) || $cities instanceof Traversable ) && sizeof($cities) ) foreach( $cities as $key1 => $value1 ){ $counter1++; ?>
                                <optgroup label="<?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <?php $kState = $key1; ?>
                                    <?php $kUf = $value1["sigla"]; ?>
                                    <?php if( isset($value1["cidades"]) && count($value1["cidades"]) > 0 ){ ?>
                                    <?php $counter2=-1;  if( isset($value1["cidades"]) && ( is_array($value1["cidades"]) || $value1["cidades"] instanceof Traversable ) && sizeof($value1["cidades"]) ) foreach( $value1["cidades"] as $key2 => $value2 ){ $counter2++; ?>
                                    <option value="<?php echo htmlspecialchars( $kState, ENT_COMPAT, 'UTF-8', FALSE ); ?>_<?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2, ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $kUf, ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <option value="0">Sem Dados</option>
                                    <?php } ?>
                                </optgroup>
                                <?php } ?>
                                <?php }else{ ?>
                                <option value="0">Sem Dados</option>
                                <?php } ?>
                            </select>
                        </div>
    
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="inputFreightCep" class="col-form-label">Cep</label>
                            <input type="text" class="form-control maskCep" name="inputFreightCep" id="inputFreightCep" placeholder="00000-000" required>
                        </div>

                    </div>

                    <div class="col-md-5 row justify-content-md-center">
                        
                        <p class="h5 col-md-12 my-0">
                            Tipos de Frete
                        </p>
                        
                        <div class="form-group col-sm-12 col-lg-6">
                            <label for="selectFreightType" class="col-form-label">Tipo</label>
                            <select class="custom-select" name="selectFreightType" id="selectFreightType">
                                <option value="0">Normal</option>    
                                <option value="1">Express</option>    
                            </select>
                        </div>

                        <div id="groupFreightStatus0" class="form-group col-sm-12 col-lg-6 FreightTypes">
                            <label for="selectFreightStatus0" class="col-form-label">Status</label>
                            <select class="custom-select" name="selectFreightStatus0" id="selectFreightStatus0">
                                <option value="0">Inativo</option>    
                                <option value="1">Ativo</option>    
                            </select>
                        </div>
    
                        <div id="groupFreightValue0" class="form-group col-sm-12 col-lg-7 FreightTypes">
                            <label for="inputFreightValue0" class="col-form-label">Valor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="text" class="form-control maskMoney2" name="inputFreightValue0" id="inputFreightValue0" placeholder="0.00">
                            </div>
                        </div>

                        <div id="groupFreightStatus1" class="form-group col-sm-12 col-lg-6 FreightTypes d-none">
                            <label for="selectFreightStatus1" class="col-form-label">Status</label>
                            <select class="custom-select" name="selectFreightStatus1" id="selectFreightStatus1">
                                <option value="0">Inativo</option>    
                                <option value="1">Ativo</option>    
                            </select>
                        </div>
    
                        <div id="groupFreightValue1" class="form-group col-sm-12 col-lg-7 FreightTypes d-none">
                            <label for="inputFreightValue1" class="col-form-label">Valor</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="text" class="form-control maskMoney2" name="inputFreightValue1" id="inputFreightValue1" placeholder="0.00">
                            </div>
                        </div>


                    </div>

                    <div class="form-group col-md-12">
                        <input type="checkbox" id="inputFreightCity" name="inputFreightCity">
                        <label for="inputFreightCity">
                            Frete para toda cidade.
                        </label>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formFreight">Salvar</button>
            </div>

        </div>
    
    </div>

</div>

<!-- MODAL HORARY -->
<div class="modal fade" id="modalFreightNew" tabindex="-1" role="dialog" aria-labelledby="modalFreightNew" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Alterar Frete</h4>
            </div>

            <div class="modal-body">

                <div id="alertsModalFreight" class="alert alert-success alert-dismissible fade d-none text-left" role="alert">
                    <span class="msgAlert">Msg</span>
                </div>
              
                <form id="formModalFreight" class="formModalFreight row" method="POST" data-store="0" data-type="1" data-id="0" data-unit="1" data-cod="0">

                    <div class="col-12 row justify-content-center">
                        
                        <div class="form-group col-12 col-sm-5 col-lg-4 my-0">
                            <label for="inputDistanceFreight">Distância Máx.</label>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control maskMoney2 text-center" name="inputDistanceFreight" id="inputDistanceFreight" placeholder="Ex: 10 KM">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">KM</span>
                                </div>
                                <button type="button" class="btn btn-sm btn-primary btnUpdateUnitFreight d-block mx-1" data-unit="1"><i class="fas fa-sync-alt"></i></button>
                            </div>
                        </div>

                    </div>
                    
                    <div class="col-12"><hr></div>

                    <div class="col-12 row">

                        <div class="col-12 col-sm-6">
                            
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control text-center" name="inputTypeFreight" id="inputTypeFreight" placeholder="Inserir Novo Tipo">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary btnUpdateUnitFreight" data-unit="2"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            
                            <div class="list-group py-2 table-responsive" id="listTabFreight" role="tablist" style="max-height: 150px;">
                                
                                <?php if( isset($typesFreight["0"]["details"]) && is_array($typesFreight["0"]["details"]) && count($typesFreight["0"]["details"]) > 0 ){ ?>
                                
                                <?php $counter1=-1;  if( isset($typesFreight["0"]["details"]) && ( is_array($typesFreight["0"]["details"]) || $typesFreight["0"]["details"] instanceof Traversable ) && sizeof($typesFreight["0"]["details"]) ) foreach( $typesFreight["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                                <span id="btnListTypesFreight<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class='list-group-item list-group-item-action py-1 cursor-pointer d-flex justify-content-between btnListTypesFreight <?php if( $key1 == 0 ){ ?>active<?php } ?>' data-toggle="list" role="tab" data-id="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-value="<?php echo htmlspecialchars( $value1["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-time="<?php echo htmlspecialchars( $value1["time"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                   <a><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a> <a class="text-danger btnDeleteTypeFreight" data-id="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-times"></i></a>
                                </span>
                                <?php } ?>

                                <?php }else{ ?>
                                <span class="border rounded py-1 text-danger text-center" data-toggle="list">Nenhum Tipo Encontrado</span>
                                <?php } ?>
                                
                            </div>

                        </div>

                        <div class="col-12 col-sm-6 row justify-content-center">
                            
                            <div class="form-group col-12 col-lg-6">
                                <label for="inputNameTypeFreight" class="my-0">Nome</label>
                                <input type="text" class="form-control form-control-sm text-center" name="inputNameTypeFreight" id="inputNameTypeFreight" placeholder="Digite uma descrição">
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="inputValueTypeFreight" class="my-0">Valor</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">R$</span>
                                    </div>
                                    <input type="text" class="form-control maskMoney2 text-center" name="inputValueTypeFreight" id="inputValueTypeFreight" placeholder="Ex: R$ 10.00">
                                </div>
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="inputTimeTypeFreight" class="my-0">Tempo</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control maskNumber text-center" name="inputTimeTypeFreight" id="inputTimeTypeFreight" placeholder="Ex: 30 Min">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Minuto(s)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center my-0">
                                <button type="button" class="btn btn-sm btnUpdateUnitFreight px-3 btn-primary" data-unit="3"><i class="fas fa-check"></i></button>
                            </div>

                        </div>

                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Sair</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storeHorary) && $storeHorary != 0 ){ ?>
<!-- MODAL HORARY -->
<div class="modal fade" id="modalHorary" tabindex="-1" role="dialog" aria-labelledby="modalHorary" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar Horários de Agendamento (Entrega)</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsHorary">
            
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
              
                <form id="formHorary" class="formHorary row justify-content-center" method="POST" data-type="1" data-id="0" data-day="0" data-store="<?php echo htmlspecialchars( $id, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <p class="col-md-12 h5 my-0">
                        <i>Dia: <a id="textHoraryDay">DIA</a></i>
                    </p>

                    <div class="form-group col-md-8">
                        <label for="inputHoraryInit0" class="col-form-label">Periodo 1:</label>
                        <div class="input-group mb-3">
                            <input type="time" id="inputHoraryInit0" name="inputHoraryInit0" class="form-control">
                            <div class="input-group-prepend">
                            <span class="input-group-text">às</span>
                            </div>
                            <input type="time" id="inputHoraryFinal0" name="inputHoraryFinal0" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-md-4 typesHorary d-none">
                        <label for="inputHoraryValue0" class="col-form-label">Valor Periodo 1:</label>
                        <input type="text" class="form-control" name="inputHoraryValue0" id="inputHoraryValue0" placeholder="R$ 0,00">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="inputHoraryInit1" class="col-form-label">Periodo 2:</label>
                        <div class="input-group mb-3">
                            <input type="time" id="inputHoraryInit1" name="inputHoraryInit1" class="form-control">
                            <div class="input-group-prepend">
                            <span class="input-group-text">às</span>
                            </div>
                            <input type="time" id="inputHoraryFinal1" name="inputHoraryFinal1" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-md-4 typesHorary d-none">
                        <label for="inputHoraryValue1" class="col-form-label">Valor Periodo 2:</label>
                        <input type="text" class="form-control" name="inputHoraryValue1" id="inputHoraryValue1" placeholder="R$ 0,00">
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formHorary">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($storeImgs) && $storeImgs != 0 ){ ?>
<!-- MODAL IMAGES -->
<div class="modal fade" id="modalImages" tabindex="-1" role="dialog" aria-labelledby="modalImages" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar imagem</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              
                <div id="alertsImages">
            
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

                <form id="formImages" class="formImages row justify-content-center" method="POST" data-type="1" data-id="0" data-origin="" data-file="" data-store="" enctype="multipart/form-data">
                
                    <div class="col-md-12">
                        
                        <div class="text-center">
                            <img id="imageFormImgs" src="/resources/imgs/logos/default.png" class="img-fluid" style="border:solid 3px #b3b3b3; max-height: 250px;" alt="Imagem do Modal">
                        </div>

                        <p id="textFormImgs" class="text-center profile-username"> 
                            Logo
                        </p>

                        <div class="input-group">
                            <div class="custom-file offset-md-3 col-md-6">
                              <input type="file" class="custom-file-input" id="inputImg" name="inputImg" aria-describedby="inputImg" accept="image/png, image/jpeg">
                              <label class="custom-file-label text-truncate" for="inputImg">Alterar imagem</label>
                            </div>
                        </div>
                        
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formImages">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($orders) && isset($products) ){ ?>
<!-- MODAL ORDER ITEM -->
<div class="modal fade" id="modalOrderItem" tabindex="-1" role="dialog" aria-labelledby="modalOrderItem" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar um Item</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsOrderItem">
            
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
              
                <form id="formOrderItem" class="formOrderItem row justify-content-center" method="POST" data-type="1" data-id="0" data-cart="0" data-order="0">
                    
                    <div class="form-group col-md-9">
                        <label for="selectProductOrder">Produto:</label>
                        <select id="selectProductOrder" name="selectProductOrder" class="form-control select2bs4">
                          <option value="0">Selecione um Produto</option>
                          <?php if( $products != 0 && is_array($products) ){ ?>
                          <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                          <option value="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-price="<?php echo htmlspecialchars( $value1["priceFinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["unit"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                          <?php } ?>
                          <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputQtdOrder">Quantidade:</label>
                        <input type="text" class="form-control text-center" name="inputQtdOrder" id="inputQtdOrder" value="0" onkeyup="somenteNumeros(this)">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputSimilarOrder">Similar:</label>
                        <input type="text" class="form-control text-center" name="inputSimilarOrder" id="inputSimilarOrder" value="Sim" disabled>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputPriceOrder">Preço Item:</label>
                        <input type="text" class="form-control text-center maskMoney2" name="inputPriceOrder" id="inputPriceOrder" value="0.00" disabled>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputDescOrder">Desconto:</label>
                        <input type="text" class="form-control text-center maskMoney2" name="inputDescOrder" id="inputDescOrder" value="0.00">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="inputTotalOrder">Subtotal:</label>
                        <input type="text" class="form-control text-center maskMoney2" name="inputTotalOrder" id="inputTotalOrder" value="0.00" disabled>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formOrderItem">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($orders) && isset($pays) ){ ?>
<!-- MODAL ORDER PAY -->
<div class="modal fade" id="modalOrderPay" tabindex="-1" role="dialog" aria-labelledby="modalOrderPay" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar o Pagamento do Pedido</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsOrderPayment">
            
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
              
                <form id="formOrderPayment" class="formOrderPayment row justify-content-center" method="POST" data-type="1" data-id="0">
                    
                    <div class="form-group col-md-12">
                        <label for="selectTypePayOrder">Opção de Pagamento:</label>
                        <select id="selectTypePayOrder" name="selectTypePayOrder" class="custom-select select2bs4">
                          <option value="0">Selecione uma Opção</option>
                          <?php if( isset($pays) && $pays != 0 ){ ?>
                          <?php $counter1=-1;  if( isset($pays) && ( is_array($pays) || $pays instanceof Traversable ) && sizeof($pays) ) foreach( $pays as $key1 => $value1 ){ $counter1++; ?>
                          <optgroup label="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                            <?php if( $value1["pays"] ){ ?>
                            <?php $counter2=-1;  if( isset($value1["pays"]) && ( is_array($value1["pays"]) || $value1["pays"] instanceof Traversable ) && sizeof($value1["pays"]) ) foreach( $value1["pays"] as $key2 => $value2 ){ $counter2++; ?>
                            <option value="<?php echo htmlspecialchars( $value2["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="<?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value2["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value2["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                            <?php } ?>
                            <?php }else{ ?>
                            <option value disabled>Sem Opções</option>
                            <?php } ?>
                          </optgroup>
                          <?php } ?>
                          <?php } ?>
                        </select>
                    </div>

                    <div id="inputsOrderPay1" class="form-group col-sm-5 inputsOrderPayment d-none">
                        <label for="inputOrderPay" class="col-form-label">Troco</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control maskMoney2" name="inputOrderPay" id="inputOrderPay" placeholder="0.00">
                        </div>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formOrderPayment">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($orders) && isset($horary) ){ ?>
<!-- MODAL ORDER HORARY -->
<div class="modal fade" id="modalOrderHorary" tabindex="-1" role="dialog" aria-labelledby="modalOrderHorary" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar o Agendamento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertsOrderHorary">
            
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
              
                <form id="formOrderHorary" class="formOrderHorary row justify-content-center" method="POST" data-type="1" data-id="0">
                    
                    <div class="form-group col-md-12">
                        <label for="selectHoraryOrder">Horários</label>
                        <select id="selectHoraryOrder" name="selectHoraryOrder" class="custom-select select2bs4">
                            <option value="0">Selecione um Horário</option>
                            <?php if( isset($horary) && $horary != 0 ){ ?>
                            <?php $counter1=-1;  if( isset($horary["0"]["details"]) && ( is_array($horary["0"]["details"]) || $horary["0"]["details"] instanceof Traversable ) && sizeof($horary["0"]["details"]) ) foreach( $horary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                            <optgroup label='<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo date("d/m/Y", strtotime($value1["date"])); ?>'>
                                <?php if( isset($value1["horary"]) ){ ?>
                                <?php $dayOrder = $value1["date"]; ?>
                                <?php $counter2=-1;  if( isset($value1["horary"]) && ( is_array($value1["horary"]) || $value1["horary"] instanceof Traversable ) && sizeof($value1["horary"]) ) foreach( $value1["horary"] as $key2 => $value2 ){ $counter2++; ?>
                                <option value='<?php echo date("dmY", strtotime($dayOrder)); ?><?php echo htmlspecialchars( $key2, ENT_COMPAT, 'UTF-8', FALSE ); ?>' data-date="<?php echo htmlspecialchars( $dayOrder, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-init="<?php echo htmlspecialchars( $value2["init"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-final="<?php echo htmlspecialchars( $value2["final"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-value="<?php echo htmlspecialchars( $value2["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <?php echo date("H:i", strtotime($value2["init"])); ?> às <?php echo date("H:i", strtotime($value2["final"])); ?> - 
                                    <?php if( $value2["value"] > 0 ){ ?>R$ <?php echo maskPrice($value2["value"]); ?><?php }else{ ?><i>Grátis</i><?php } ?>
                                </option>
                                <?php } ?>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>

                    <p class="col-md-12 h6"><b>Personalizar</b></p>

                    <div class="form-group col-md-5">
                        <input type="date" id="dateHoraryOrder" name="dateHoraryOrder" class="form-control" min='<?php echo date("Y-m-d"); ?>'>
                    </div>

                    <div class="form-group col-md-7">
                        <div class="input-group">
                            <input type="time" id="timeInitOrder" name="timeInitOrder" class="form-control">
                            <div class="input-group-prepend">
                                <span class="input-group-text">às</span>
                            </div>
                            <input type="time" id="timeFinalOrder" name="timeFinalOrder" class="form-control">
                        </div>
                    </div>

                    <div class="form-group col-md-5">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" id="priceHoraryOrder" name="priceHoraryOrder" class="form-control maskMoney2" placeholder="0.00">
                        </div>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formOrderHorary">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($orders) && isset($promotions) ){ ?>
<!-- MODAL ORDER PROMO -->
<div class="modal fade" id="modalOrderPromo" tabindex="-1" role="dialog" aria-labelledby="modalOrderPromo" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar a Promoção</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              
                <div id="alertsOrderPromo">
            
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

                <form id="formOrderPromo" class="formOrderPromo row justify-content-center" method="POST" data-type="1" data-id="0">
                    
                    <div class="form-group col-md-12">
                        <label for="selectPromoOrder">Promoção:</label>
                        <select id="selectPromoOrder" name="selectPromoOrder" class="custom-select">
                          <?php if( isset($promotions) && $promotions != 0 ){ ?>
                          <option value="0">Selecione uma Promoção</option>
                          <?php $counter1=-1;  if( isset($promotions) && ( is_array($promotions) || $promotions instanceof Traversable ) && sizeof($promotions) ) foreach( $promotions as $key1 => $value1 ){ $counter1++; ?>
                          <option value="<?php echo htmlspecialchars( $value1["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                          <?php } ?>
                          <?php }else{ ?>
                          <option value="0">SEM DADOS</option>
                          <?php } ?>
                        </select>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formOrderPromo">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($userData) ){ ?>
<!-- MODAL USER ADDRESS -->
<div class="modal fade" id="modalUserAddress" tabindex="-1" role="dialog" aria-labelledby="modalUserAddress" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Alterar o Endereço</h5>
            </div>

            <div class="modal-body">
                
                <div id="alertModalAddress" class="alert alert-success alert-dismissible fade d-none text-left alertModalAddress" role="alert">
                    <span class="msgAlert">Msg</span>
                </div>

                <form id="formUserAddress" class="formUserAddress row justify-content-center" method="POST" data-type="1" data-id="0" data-user="0">

                    <div class="form-group col-12 col-sm-4">
                        <label for="inputUserAddressCep">CEP</label>
                        <input type="text" id="inputUserAddressCep" name="inputUserAddressCep" class="form-control text-center maskCep searchCep">
                    </div>

                    <div class="form-group col-12 col-sm-8">
                        <label for="inputUserAddressCity">Cidade:</label>
                        <input type="text" id="inputUserAddressCity" name="inputUserAddressCity" class="form-control cityAddress" placeholder="Sua Cidade" readonly="true">
                    </div>

                    <div class="form-group col-12">
                    <label for="inputUserAddressDistrict">Bairro</label>
                    <input type="text" id="inputUserAddressDistrict" name="inputUserAddressDistrict" class="form-control districtAddress">
                    </div>
                    
                    <div class="form-group col-12 col-sm-8">
                    <label for="inputUserAddressStreet">Rua</label>
                    <input type="text" id="inputUserAddressStreet" name="inputUserAddressStreet" class="form-control streetAddress">
                    </div>

                    <div class="form-group col-12 col-sm-4">
                    <label for="inputUserAddressNumber">Número</label>
                    <input type="text" id="inputUserAddressNumber" name="inputUserAddressNumber" class="form-control text-center">
                    </div>

                    <div class="form-group col-12">
                    <label for="inputUserAddressComplement">Complemento</label>
                    <input type="text" id="inputUserAddressComplement" name="inputUserAddressComplement" class="form-control">
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal"><i class="fas fa-times"></i> Sair</button>
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formUserAddress">Salvar</button>
            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<?php if( isset($orders) ){ ?>
<!-- Modal Order Alert   -->
<div class="modal fade" id="modalOrderAlert" tabindex="-1" role="dialog" aria-labelledby="modalOrderAlert" aria-hidden="true">
    
    <div class="modal-dialog modal-sm modal-dialog-centered">
        
        <div class="modal-content">

            <div id="overlayOrderAlert" class="d-none">
                <div class="overlay d-flex justify-content-center align-items-center">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
            
            <form id="formOrderAlert" class="formOrderAlert p-2" data-id="0" method="POST">
                
                <div class="modal-header py-2">
                     <h5 class="modal-title text-center w-100">Avisar Cliente</h5>
                </div>

                <div class="modal-body text-center ">
                    
                    <div id="alertsOrderAlert" class="alert alert-success alert-dismissible fade d-none text-left" role="alert">
                        <span class="msgAlert">Msg</span>
                    </div>

                    <p class="h5 font-weight-light ">
                        Se esse pedido sofreu alterações, o site pode enviar um e-mail para o cliente avisando sobre a alteração.
                    </p>

                    <p class="h5 font-weight-normal">
                        Deseja enviar o e-mail?
                    </p>
                    
                </div>

                <div class="btn-group modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Sim</a>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Não</button>
                </div>
    
            </form>
        
        </div>
    
    </div>
    
</div>
<?php } ?>

<!-- Modal Msg Alert   -->
<div class="modal fade" id="modalMsgAlert" tabindex="-1" role="dialog" aria-labelledby="modalMsgAlert" aria-hidden="true">
    
    <div class="modal-dialog modal-sm modal-dialog-centered">
        
        <div class="modal-content">

            <form class="p-2" data-id="0">
                
                <div class="modal-body text-center ">
                
                    <p class="h1 font-weight-light">
                        <i id="modalMsgIcon" class="p-3"></i><br>
                    </p>

                    <p id="modalMsgText" class="my-0 h5 font-weight-light">
                        Sem Status
                    </p>
               
                </div>
    
            </form>
        
        </div>
    
    </div>
    
</div>

<?php if( isset($products) && $products != 0 ){ ?>
<!-- MODAL PRODUCTS ALTER -->
<div class="modal fade" id="modalProductsConfig" tabindex="-1" role="dialog" aria-labelledby="modalProductsConfig" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered modal-lg">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Configurar Produto - <span class="modal-subtitle">#123 desc</span> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div id="modal-product-config">
                
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    
                    <li class="nav-item btnTypeModalProductsConfig" role="presentation" data-code="1"> 
                      <a class="nav-link text-dark active rounded-0" id="OptionLogo-tab" data-toggle="tab" href="#OptionLogo" role="tab" aria-controls="OptionLogo" aria-selected="true"> <i class="far fa-image"></i> <span class="d-lg-inline d-none">Logo</span> </a>
                    </li>
                    
                    <li class="nav-item btnTypeModalProductsConfig" role="presentation" data-code="2">
                      <a class="nav-link text-dark rounded-0" id="OptionUnitPro-tab" data-toggle="tab" href="#OptionUnitPro" role="tab" aria-controls="OptionUnitPro" aria-selected="false"> <i class="fas fa-ruler"></i> <span class="d-lg-inline d-none">Unidades de Medida</span> </a>
                    </li>

                    <li class="nav-item btnTypeModalProductsConfig" role="presentation" data-code="3">
                        <a class="nav-link text-dark rounded-0" id="OptionSubType-tab" data-toggle="tab" href="#OptionSubType" role="tab" aria-controls="OptionSubType" aria-selected="false"> <i class="fas fa-grip-horizontal"></i> <span class="d-lg-inline d-none">SubTipos</span> </a>
                    </li>

                </ul>

                <form id="formModalProductConfig" class="formModalProductConfig tab-content modal-body" data-type="0" data-id="0" data-unit="0_0" data-archive="/" data-store="0" enctype="multipart/form-data">
                    
                    <div id="alertModalProductConfigImg" class="alert alert-dismissible d-none fade text-left" role="alert">
                        <span class="msgAlert">Msg</span>
                    </div>
                    
                    <div class="tab-pane fade show active" id="OptionLogo" role="tabpanel" aria-labelledby="OptionLogo-tab">

                        <div class="row justify-content-md-center">
                
                            <div class="col-md-6">
                                
                                <div id="bdImgProductLogo" class="text-center">
                                    <img id="imgProductLogo" src="/resources/imgs/logos/default.png" class="img-fluid" style="border:solid 3px #b3b3b3; max-height: 175px;" alt="Photo">
                                </div>
        
                                <p class="text-center profile-username"> 
                                    Imagem do Produto <br>
                                    <small class="font-weight-light">(Tamanho Recomendado: 800 x 800px)</small>
                                </p>
        
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="inputImgProductLogo" name="inputImgProductLogo" aria-describedby="inputGroupImgPartner" accept="image/png, image/jpeg">
                                      <label class="custom-file-label text-truncate" for="inputImgProductLogo">Alterar imagem</label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-primary" form="formModalProductConfig">Salvar</button>
                                </div>
                                
                            </div>
        
                        </div>

                    </div>

                    <div class="tab-pane fade" id="OptionUnitPro" role="OptionUnitPro" aria-labelledby="OptionUnitPro-tab">
                        
                        <div class="row justify-content-md-center">
        
                            <div class="col-md-6 col-lg-5">
                               
                                <div class="form-group">
                                    
                                    <label for="inputAddMeasureProduct" class="col-form-label">Adicionar Medida:<br></label>
                                    
                                    <div class="btn-group w-100">
                                        <input type="text" class="form-control" name="inputAddMeasureProduct" id="inputAddMeasureProduct">
                                        <button type="button" class="btn btn-primary btnMeasureProduct" data-id="1"> <i class="fas fa-plus"></i> </button>
                                    </div>

                                </div>

                                <div id="listModalProductsConfigUnits" class="list-group table-responsive py-2" role="tablist" style="max-height: 200px;">
                                    
                                    <?php if( isset($listUnits["unitsMeasures"]) && is_array($listUnits["unitsMeasures"]) ){ ?>
                                    
                                    <?php $counter1=-1;  if( isset($listUnits["unitsMeasures"]) && ( is_array($listUnits["unitsMeasures"]) || $listUnits["unitsMeasures"] instanceof Traversable ) && sizeof($listUnits["unitsMeasures"]) ) foreach( $listUnits["unitsMeasures"] as $key1 => $value1 ){ $counter1++; ?>
                                    <div class='list-group-item list-group-item-action <?php if( $key1 == 0 ){ ?>active<?php } ?> cursor-pointer d-flex p-0' data-toggle="list" role="tab">
                                    
                                        <div id="listUnit<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class='p-2 <?php if( $key1 > 0 ){ ?>col-10<?php }else{ ?>col-12<?php } ?> btnListUnitProductsConfig' data-id="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-name="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-stock='<?php echo htmlspecialchars( $value1["valueStock"], ENT_COMPAT, 'UTF-8', FALSE ); ?>' data-price="<?php echo htmlspecialchars( $value1["price"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-free-fill="<?php echo htmlspecialchars( $value1["freeFill"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-auto-up="<?php echo htmlspecialchars( $value1["automaticUpdate"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-code="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-status="<?php echo htmlspecialchars( $value1["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                            <b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <i>#<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></b> 
                                        </div>

                                        <?php if( $key1 > 0 ){ ?> 
                                        <div class="p-2 col-2 text-right">
                                            <a class="text-danger btnMeasureProduct" data-id="3" data-code="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-times"></i> </a> 
                                        </div>
                                        <?php } ?>


                                    </div>
                                    <?php } ?>

                                    <?php }else{ ?>
                                    <span class="list-group-item list-group-item-action h6 text-center text-danger">
                                       SEM UNIDADES DE MEDIDA
                                    </span>
                                    <?php } ?>

                                </div>
        
                            </div>

                            <div class="col-md-6 col-lg-7">
                               
                                <div class="row justify-content-center">

                                    <div class="form-group col-3 col-sm-2 col-md-4 col-lg-2">
                                        <label for="inputIdNumber" class="col-form-label">ID:</label>
                                        <input type="text" class="form-control maskNumber" id="inputIdNumber" name="inputIdNumber" placeholder="#ID">
                                    </div>

                                    <div class="form-group col-9 col-sm-5 col-md-8 col-lg-5">
                                        <label for="inputUnitProduct" class="col-form-label">Unidade:</label>
                                        <input type="text" class="form-control" id="inputUnitProduct" name="inputUnitProduct" readonly="true">
                                    </div>

                                    <div class="form-group col-8 col-sm-5 col-md-7 col-lg-5">
                                        <label for="inputValueStockProduct" class="col-form-label">
                                            Valor no Estoque:
                                            <span class="text-info d-md-none d-lg-inline h6" data-toggle="tooltip" data-placement="top" title="A partir de 2 números, o valor vira decimal. Preste muita atenção ao digitar!" data-boundary="window"><i class="far fa-question-circle"></i></span> 
                                        </label>
                                        <input type="text" class="form-control maskStock" name="inputValueStockProduct" id="inputValueStockProduct" readonly="true">
                                    </div>

                                    <div class="form-group col-4 col-sm-3 col-md-5 col-lg-3">
                                        <label for="inputStatusUnit" class="col-form-label">Status:</label>
                                        <select name="inputStatusUnit" id="inputStatusUnit" class="form-control">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-7 col-sm-6 col-md-10 col-lg-7">
        
                                        <label for="inputPriceProduct" class="col-form-label">Preço Final:</label>
                                        
                                        <div class="input-group">
                                            
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">R$</span>
                                            </div>
                                            
                                            <input type="text" class="form-control maskMoney2 rounded" name="inputPriceProduct" id="inputPriceProduct" readonly="true" data-number="1">

                                            <button id="btnUpdateUnitProduct" type="button" class="btn btn-sm btn-info mx-1 btnMeasureProduct" data-id="2" data-code="0"><i class="fas fa-check"></i></button>
                                        
                                        </div>

                                    </div>

                                    <div class="col-12 text-center">
                                        
                                        <div id="divFreeFillProduct" class="form-group my-2">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="freeFillProduct" name="freeFillProduct">
                                                <label for="freeFillProduct">
                                                  Permitir Preechimento Livre
                                                </label>
                                            </div>
                                        </div>

                                        <div id="divAutomaticUpdateProduct" class="form-group my-2 d-none">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="automaticUpdateProduct" name="automaticUpdateProduct">
                                                <label for="automaticUpdateProduct">
                                                  Permitir Atualização Automática
                                                </label>
                                            </div>
                                        </div>

                                    </div>
            
                                </div>

                            </div>
        
                        </div>

                    </div>

                    <div class="tab-pane fade" id="OptionSubType" role="tabpanel" aria-labelledby="OptionSubType-tab">

                        <div class="row justify-content-md-center">
                
                            <div class="col-lg-6 row justify-content-center">

                                <div class="form-group col-6">
                                    <label for="inputDescSubType" class="col-form-label">Descrição:</label>
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control text-center" name="inputDescSubType" id="inputDescSubType" placeholder="Descrição do SubTipo">
                                    </div>
                                </div>

                                <div class="form-group col-6">
                                    <label for="selectStatusSubType" class="col-form-label">Status:</label>
                                    <div class="input-group input-group-sm">
                                        <select name="selectStatusSubType" id="selectStatusSubType" class="form-control">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                        <button type="button" class="btn btn-sm btn-primary d-block mx-1 btnMeasureProduct" data-id="1"><i class="fas fa-sync-alt"></i></button>
                                    </div>
                                </div>

                                <hr class="col-12 mt-1">
                                
                                <div class="form-group col-12">
                                    <div class="btn-group w-100">
                                        <input type="text" class="form-control form-control-sm text-center" name="inputAddSubType" id="inputAddSubType" placeholder="Adicionar um SubTipo">
                                        <button type="button" class="btn btn-sm btn-primary btnMeasureProduct" data-id="2"> <i class="fas fa-plus"></i> </button>
                                    </div>
                                </div>

                                <div id="listModalProductsConfigSubTypes" class="list-group table-responsive col-11" style="max-height: 150px;">
                                    
                                    <?php if( isset($listUnits["subTypes"]["types"]) && is_array($listUnits["subTypes"]["types"]) && count($listUnits["subTypes"]["types"]) > 0 ){ ?>
                                    <?php $counter1=-1;  if( isset($listUnits["subTypes"]["types"]) && ( is_array($listUnits["subTypes"]["types"]) || $listUnits["subTypes"]["types"] instanceof Traversable ) && sizeof($listUnits["subTypes"]["types"]) ) foreach( $listUnits["subTypes"]["types"] as $key1 => $value1 ){ $counter1++; ?>
                                    <span class="list-group-item list-group-item-action list-group-item-light py-2 d-flex justify-content-between">
                                        <a class="text-dark"><?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?></a> <a class="text-danger cursor-pointer btnMeasureProduct" data-id="3" data-code="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="fas fa-times"></i></a>
                                    </span>
                                    <?php } ?>
                                    <?php }else{ ?>
                                    <span class="list-group-item list-group-item-action list-group-item-light py-2 d-flex justify-content-between text-danger cursor-pointer">
                                        <a><i class="fas fa-exclamation-circle"></i> Nenhum SubTipo Cadastrado</a> 
                                    </span>
                                    <?php } ?>
                                    
                                </div>

                            </div>
        
                        </div>

                    </div>

                </form>
              
            </div>

            <div class="modal-footer py-3">
                
                <div id="overlayModalProductConfig" class="btn d-none">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-3x fa-sync fa-spin"></i>
                    </div>
                </div>

            </div>

        </div>
    
    </div>

</div>
<?php } ?>

<!-- MODAL CART CONFIG -->
<div class="modal fade" id="modalCartConfig" tabindex="-1" role="dialog" aria-labelledby="modalCartConfig" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered ">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title">Configurações Carrinho</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <div id="alertModalCartConfig" class="alert alert-dismissible d-none fade text-left" role="alert">
                    <span class="msgAlert">Msg</span>
                </div>

                <form id="formCartConfig" class="formCartConfig row justify-content-center" method="POST" data-id="0" data-store="0">

                    <div class="col-sm-4 col-md-5">

                        <label for="inputValueMin">Valor Mínimo do Carrinho:</label>

                        <div class="input-group mb-3">
                            
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" id="checkAllowMin" name="checkAllowMin" >
                                </div>
                            </div>
                            <input type="text" class="form-control maskMoney2" id="inputValueMin" name="inputValueMin">

                        </div>

                    </div>

                </form>
              
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-outline-primary" form="formCartConfig">Salvar</button>
            </div>

        </div>
    
    </div>

</div>