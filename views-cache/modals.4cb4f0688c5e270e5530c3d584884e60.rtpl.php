<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- MODELS HEADER -->
    
<!-- MODAL ALTER STORES -->
    <div class="modal fade" id="ModalAlterStores" tabindex="-1" role="dialog" aria-labelledby="ModalAlterStores" aria-hidden="true">
                
        <div class="modal-dialog modal-dialog-centered modal-sm">
        
            <div class="modal-content">
            
                <div class="modal-header border-bottom-0">
            
                    <button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
            
                </div>
            
                <div class="modal-body">
                    
                    <p class="h4 text-center">
                        Seja bem vindo!
                    </p>

                    <p>
                        Em qual das lojas você deseja acessar?
                    </p>
                    
                    <select name="SelectStoresModal" id="SelectStoresModal" class="custom-select">
                        <?php $counter1=-1;  if( isset($storeAll) && ( is_array($storeAll) || $storeAll instanceof Traversable ) && sizeof($storeAll) ) foreach( $storeAll as $key1 => $value1 ){ $counter1++; ?>
                        <?php if( $value1["statusStore"] == 1 ){ ?><option value="<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?>
                        <?php } ?>
                    </select>
                    
                    <button type="button" class="btn btn-main-site-section text-btn-site-section w-100 mt-3" onclick="window.location.href = '/loja-'+$('#SelectStoresModal').val()+'/'">Acessar</button>

                    <p class="mt-2">
                        Não encontrou a loja? No momento, o serviço de delivery está atendendo à algumas regiões.
                    </p>

                    <p>
                        Conheça todas as lojas disponíveis para as compras.
                    </p>
                    
                </div>
        
            </div>
        
        </div>
    
    </div>

<!-- MODAL CONSULTATION REGIONS  -->
<div class="modal fade" id="ModalConsultationRegions" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationRegions" aria-hidden="true">
			
    <div class="modal-dialog modal-dialog-centered">
     
        <div class="modal-content">
        
            <div class="modal-header border-bottom-0 pb-2">
                
                <p class="h5 text-left">
                    <i class="fas fa-truck"></i> Regiões Atendidas - Loja <?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>
                </p>

                <button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
        
            </div>
        
            <div class="modal-body py-0">
                
                <div class="pb-3">
                    <?php if( isset($storeRegion) && $storeRegion != 0 ){ ?>
                
                    <p class="h5 my-2"><i class="fas fa-map-marked-alt"></i> <i><?php echo htmlspecialchars( $store["0"]["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i> - <b><?php echo htmlspecialchars( $store["0"]["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b> </p>

                    <ul class="list-group mb-3">
                        <li class="list-group-item py-2 border-left-0 border-right-0 rounded-0">
                            <i class="fas fa-map-marker-alt"></i> Até <?php echo htmlspecialchars( $storeRegion["0"]["distance"], ENT_COMPAT, 'UTF-8', FALSE ); ?> KM da Região: <?php echo htmlspecialchars( $store["0"]["streetStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $store["0"]["numberStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $store["0"]["districtStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($store["0"]["cepStore"]); ?>
                        </li>   
                    </ul>

                    <?php }else{ ?>
                    <p class="text-center border-top border-bottom h5 py-2"><i>SEM DADOS</i></p>
                    <?php } ?>
                </div>
                
                
            </div>
      
        </div>
    
    </div>
  
</div>   

<!-- MODAL CONSULTATION HORARY  -->
<div class="modal fade" id="ModalConsultationHorary" tabindex="-1" role="dialog" aria-labelledby="ModalConsultationHorary" aria-hidden="true">
			
    <div class="modal-dialog modal-lg">
     
        <div class="modal-content">
        
            <div class="modal-header border-bottom-0">

                <button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
        
            </div>
        
            <div class="modal-body">
                
                <div class="row">

                    <div class="col-md px-5">
                        
                        <?php if( isset($storeHorary) && $storeHorary != 0 ){ ?>
                        <p class="h5">
                            Horários de Retirada
                        </p>

                        <hr>

                            <div class="row justify-content-md-center">
                                <?php $counter1=-1;  if( isset($storeHorary["0"]["details"]) && ( is_array($storeHorary["0"]["details"]) || $storeHorary["0"]["details"] instanceof Traversable ) && sizeof($storeHorary["0"]["details"]) ) foreach( $storeHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                                <p class="mt-3 col-md-6">
                                    <b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $key1 < 6 ){ ?>-Feira<?php } ?>:</b><br>
                                    
                                    <?php $withdrawal = $value1["withdrawal"]; ?>
                                    <?php $counter2=-1;  if( isset($value1["withdrawal"]) && ( is_array($value1["withdrawal"]) || $value1["withdrawal"] instanceof Traversable ) && sizeof($value1["withdrawal"]) ) foreach( $value1["withdrawal"] as $key2 => $value2 ){ $counter2++; ?>
                                    
                                    <?php if( $key2 == 0 ){ ?>
                                    <?php echo date('H:i', strtotime($value2["init"])); ?> às <?php echo date('H:i', strtotime($value2["final"])); ?>
                                    <?php } ?>

                                    <?php if( $key2 == 1 && $withdrawal["1"]["init"] > $withdrawal["0"]["init"] ){ ?>
                                    <br><?php echo date('H:i', strtotime($value2["init"])); ?> às <?php echo date('H:i', strtotime($value2["final"])); ?>
                                    <?php } ?>

                                    <?php } ?>
                                    
                                </p>
                                <?php } ?>
                            </div>
                        
                        <hr>    

                        </ul>
                        <?php } ?>

                    </div>

                    <div class="col-md px-5">

                        <?php if( isset($storeHorary) && $storeHorary != 0 ){ ?>
                        <p class="h5">
                            Horários de Entrega
                        </p>
                        <hr>

                            <div class="row justify-content-md-center">
                                <?php $counter1=-1;  if( isset($storeHorary["0"]["details"]) && ( is_array($storeHorary["0"]["details"]) || $storeHorary["0"]["details"] instanceof Traversable ) && sizeof($storeHorary["0"]["details"]) ) foreach( $storeHorary["0"]["details"] as $key1 => $value1 ){ $counter1++; ?>
                                <p class="mt-3 col-md-6">
                                    <b><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $key1 < 6 ){ ?>-Feira<?php } ?>:</b><br>
                                    
                                    <?php $delivery= $value1["delivery"]; ?>
                                    <?php $counter2=-1;  if( isset($value1["delivery"]) && ( is_array($value1["delivery"]) || $value1["delivery"] instanceof Traversable ) && sizeof($value1["delivery"]) ) foreach( $value1["delivery"] as $key2 => $value2 ){ $counter2++; ?>
                                    
                                    <?php if( $key2 == 0 ){ ?>
                                    <?php echo date('H:i', strtotime($value2["init"])); ?> às <?php echo date('H:i', strtotime($value2["final"])); ?>
                                    <?php } ?>

                                    <?php if( $key2 == 1 && $delivery["1"]["init"] > $delivery["0"]["init"] ){ ?>
                                    <br><?php echo date('H:i', strtotime($value2["init"])); ?> às <?php echo date('H:i', strtotime($value2["final"])); ?>
                                    <?php } ?>

                                    <?php } ?>
                                    
                                </p>
                                <?php } ?>
                            </div>

                        <hr>

                        </ul>
                        <?php } ?>

                    </div>

                </div>
                
            </div>
      
        </div>
    
    </div>
  
</div>

<div class="modal fade" id="ModalAddress" tabindex="-1" role="dialog" aria-labelledby="ModalAddress" aria-hidden="true">
			
    <div class="modal-dialog">
     
        <div class="modal-content">
        
            <div class="modal-body px-4">
                
                <div class="py-2">
                    <p class="h4 font-weight-normal text-center"><i class="fas fa-map-marker-alt"></i> <a id="modal-title">Cadastrar Endereço de Entrega</a></p>

                    <p class="text-center">* <i>Digite seu CEP para inserir sua cidade</i> *</p>
                </div>

                <div id="alertModalAddress" class="alert alert-success alert-dismissible fade d-none text-left" role="alert">
                    <span class="msgAlert">Msg</span>
                </div>

                <form id="modalFormAddress" class="modalFormAddress row" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-type="0" data-code="0">

                    <div class="col-sm-4 col-md-4 mb-2">
                        <label for="cepAddress">CEP:</label>
                        <input type="text" class="form-control maskCep searchCep" id="cepAddress" name="cepAddress" placeholder="_____-___">
                    </div>

                    <div class="col-sm-8 col-md-8 mb-2">
                        <label for="cityAddress">Cidade:</label>
                        <input type="text" class="form-control" id="cityAddress" name="cityAddress" placeholder="Sua Cidade" readonly="true">
                    </div>

                    <div class="col-md-12 my-2">
                        <label for="districtAddress">Bairro:</label>
                        <input type="text" class="form-control cepDistrict" id="districtAddress" name="districtAddress" placeholder="Digite o Bairro">	
                    </div>

                    <div class="col-sm-8 my-2">
                        <label for="streetAddress">Rua:</label>
                        <input type="text" class="form-control cepStreet" id="streetAddress" name="streetAddress" placeholder="Digite a rua">	
                    </div>

                    <div class="col-sm-4 my-2">
                        <label for="numberAddress">Número:</label>
                        <input type="text" class="form-control" id="numberAddress" name="numberAddress" placeholder="Ex: 257">	
                    </div>

                    <div class="col-12 my-2">
                        <label for="complementAddress">Complemento:</label>
                        <input type="text" class="form-control" id="complementAddress" name="complementAddress" placeholder="Complemento">	
                    </div>

                    <div class="col-12 my-0">
                        <input id="mainAddress" name="mainAddress" type="checkbox" class="cursorPointer"> 
                        <label for="mainAddress" class="cursorPointer">É o endereço principal</label>
                    </div>

                </form>
                
            </div>

            <div class="modal-footer text-right px-4 pb-3">
            
                <div id="overlayModalAddress" class="btn d-none">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-1x fa-sync fa-spin"></i>
                    </div>
                </div>

                <button class="btn btn-sm btn-light border border-dark" data-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> Sair</button>
                <button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm" form="modalFormAddress">Salvar</button>
            
            </div>
      
        </div>
    
    </div>
  
</div>

<?php if( isset($order) && isset($order["payment"]) && $order["payment"] != 0 ){ ?>
<!-- MODAL Comment Product   -->
<div class="modal fade" id="ModalCommentProduct" tabindex="-1" role="dialog" aria-labelledby="ModalCommentProduct" aria-hidden="true">
    
    <div class="modal-dialog">
        
        <div class="modal-content">
        
            <div class="modal-header border-bottom-0">

                <button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
        
            </div>

            <form id="formObsProduct" class="formObsProduct" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                
                <div class="modal-body px-4">
                
                    <p class="h5 font-weight-normal">Observação sobre o pedido:</p>

                    <div id="alertModalObsProduct" class='alert alert-dismissible fade d-none text-left' role="alert">
						<span class="msgAlert">Msg</span>
					</div>
                    
                    <div id="msgFormOrder"></div>

                    <div class="my-3">
                        
                        <div class="my-2">
                            <textarea class="form-control" name="inputObsProduct" rows="7" placeholder="Escolher laranjas maduras e bonitas"><?php if( isset($order) && isset($order["payment"]) && isset($cart["obs"]) ){ ?><?php echo htmlspecialchars( $cart["obs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?></textarea>
                        </div>
    
                    </div>
                    
                </div>
    
                <div class="modal-footer text-right px-4 pb-3">
                    
                    <div id="overlayModalObsProduct" class="btn d-none">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-1x fa-sync fa-spin"></i>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-main-site-section text-btn-site-section">Salvar</button>

                </div>

            </form>
        
        </div>
    
    </div>
    
</div>
<?php } ?>

<?php if( isset($orders) ){ ?>
<!-- Modal Order Cancel   -->
<div class="modal fade" id="modalOrderCancel" tabindex="-1" role="dialog" aria-labelledby="modalOrderCancel" aria-hidden="true">
    
    <div class="modal-dialog modal-sm modal-dialog-centered">
        
        <div class="modal-content">

            <form id="formOrderCancel" class="formOrderCancel p-2" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="0">
                
                <div class="modal-body text-center border-top border-bottom border-secondary">
                
                    <p class="h5"><i>Você quer mesmo cancelar esse pedido?</i></p>

                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Não</button>
                        <button type="submit" class="btn btn-sm btn-success">Sim</button>
                    </div>
               
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

            <form id="formMsgAlert" class="formMsgAlert p-2" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="0">
                
                <div class="modal-body text-center ">
                
                    <p id="titleTextMsg" class="h5"><i>Msg de Alerta</i></p>

                    <div>
                        <button id="btnMsg2" type="button" class="btn btn-sm btn-light border" data-dismiss="modal">Sair</button>
                        <a id="btnMsg" href="/" class="btn btn-sm btn-success">Ir para a página</a>
                    </div>
               
                </div>
    
            </form>
        
        </div>
    
    </div>
    
</div>

<div class="modal fade" id="modalMsgAlertLinks" tabindex="-1" role="dialog" aria-labelledby="modalMsgAlertLinks" aria-hidden="true">
    
    <div class="modal-dialog modal-sm modal-dialog-centered">
        
        <div class="modal-content">

            <form id="formMsgAlertLinks" class="formMsgAlertLinks p-2" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-id="0">
                
                <div class="modal-body text-center ">
                
                    <p id="titleTextMsgLinks" class="h5 mb-3"><i>Msg de Alerta</i></p>

                    <div>
                        <a id="btnMsgLinks" href="/" class="btn btn-sm btn-outline-second-site-section">Fazer Login</a>
                        <a id="btnMsgLinks2" href="/" class="btn btn-sm btn-outline-second-site-section">Cadastrar-se</a>
                    </div>
               
                </div>
    
            </form>
        
        </div>
    
    </div>
    
</div>

 
<div class="modal fade" id="modalUserRegister" tabindex="-1" role="dialog" aria-labelledby="modalUserRegister" aria-hidden="true">
			
    <div class="modal-dialog modal-dialog-centered">
     
        <div class="modal-content">
        
            <div class="modal-header border-bottom-0">

                <button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
        
            </div>
        
            <div class="modal-body px-4">
                
                <p class="h4 font-weight-normal">Complete seu Cadastro</p>

                <div id="alertModalAccountData" class='alert alert-dismissible fade show d-none text-left' role="alert">
					<span class="msgAlert">Msg</span>
				</div>

                <form id="modalFormAccountData" class="modalFormAccountData row justify-content-md-center" data-store="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">

                    <div class="col-md-12 my-2">
                        <label for="modalInputName">Nome Completo:</label>
                        <input type="text" class="form-control" id="modalInputName" name="modalInputName" placeholder="Digite seu nome completo">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="modalInputCpf">Cpf:</label>
                        <input type="text" class="form-control maskCpf" id="modalInputCpf" name="modalInputCpf" placeholder="___.___.___-__">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="modalInputDateBirth">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="modalInputDateBirth" name="modalInputDateBirth">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="modalInputTelephone">Telefone:</label>
                        <input type="text" class="form-control maskTel" id="modalInputTelephone" name="modalInputTelephone" placeholder="(__) ____-____">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="modalInputWhatsapp">Whatsapp:</label>
                        <input type="text" class="form-control maskTel" id="modalInputWhatsapp" name="modalInputWhatsapp" placeholder="(__) ____-____">
                    </div>

                    <div class="col-md-6 my-2">
                        <label for="modalSelectGenre">Genêro:</label>
                        <select name="modalSelectGenre" id="modalSelectGenre" class="custom-select">
                            <option value="0">Selecione seu gênero</option>
                            <option value="1">Feminino</option>
                            <option value="2">Masculino</option>
                            <option value="3">Outros</option>
                        </select>
                    </div>

                </form>
                
            </div>

            <div class="modal-footer text-right px-4 pb-3">
                <button type="button" class="btn btn-light btn-sm border border-secondary" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-main-site-section text-btn-site-section btn-sm" form="modalFormAccountData">Salvar</button>
            </div>
      
        </div>
    
    </div>
  
</div>

<?php if( isset($subTypes) ){ ?>
<!-- Modal SubTypes Options   -->
<div class="modal fade" id="modalSubTypesOptions" tabindex="-1" role="dialog" aria-labelledby="modalSubTypesOptions" aria-hidden="true">
    
    <div class="modal-dialog modal-sm modal-dialog-centered">
        
        <div class="modal-content">

            <form id="formModalSubTypesOptions" class="formModalSubTypesOptions p-2" data-code="0" data-type="0">
                
                <div class="modal-body text-center">
                
                    <p>
                        <i class="modal-title h4">SubType</i>
                        <hr>
                    </p>

                    <div id="overlayModalSubTypesOptions" class="btn d-none">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-3x fa-sync fa-spin"></i>
                        </div>
                    </div>

                    <div id="divListOptionsSubTypes">
                        <div id="listOptionsSubTypes" class="btn-group-toggle d-flex justify-content-center" data-toggle="buttons">
                            <?php if( isset($subTypes["0"]["subTypes"]["types"]) && isset($subTypes["0"]["subTypes"]["status"]) && $subTypes["0"]["subTypes"]["status"] == 1 && is_array($subTypes["0"]["subTypes"]["types"]) && count($subTypes["0"]["subTypes"]["types"]) > 0 ){ ?>
                            <?php $counter1=-1;  if( isset($subTypes["0"]["subTypes"]["types"]) && ( is_array($subTypes["0"]["subTypes"]["types"]) || $subTypes["0"]["subTypes"]["types"] instanceof Traversable ) && sizeof($subTypes["0"]["subTypes"]["types"]) ) foreach( $subTypes["0"]["subTypes"]["types"] as $key1 => $value1 ){ $counter1++; ?>
                            <button type="button" class="btn btn-light border border-dark rounded-0 mx-1 inputSubTypeOption" data-code="<?php echo htmlspecialchars( $key1, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><input type="radio"><?php echo htmlspecialchars( $value1, ENT_COMPAT, 'UTF-8', FALSE ); ?></button>
                            <?php } ?>
                            <?php }else{ ?>
                            <label class="text-danger"> <i class="fa fas-times"></i> Tipo Inválido!</label>
                            <?php } ?>
                        </div>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-sm btn-cart-site-section text-btn-site-section">Adicionar ao Carrinho <i class="fas fa-check"></i></button>
                    
                </div>
    
            </form>
        
        </div>
    
    </div>
    
</div>
<?php } ?>