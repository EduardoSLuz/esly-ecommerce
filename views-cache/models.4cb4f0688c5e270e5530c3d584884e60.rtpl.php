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
                        <option value="<?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">Loja <?php echo htmlspecialchars( $value1["store"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                    
                    <a class="btn <?php echo htmlspecialchars( $layout["btnLayout"], ENT_COMPAT, 'UTF-8', FALSE ); ?> text-white w-100 mt-3" onclick="window.location.href = '/loja-'+$('#SelectStoresModal').val()+'/'">Acessar</a>

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
                    <?php if( $storeRegion != 0 ){ ?>
                
                    <?php $counter1=-1;  if( isset($storeRegion) && ( is_array($storeRegion) || $storeRegion instanceof Traversable ) && sizeof($storeRegion) ) foreach( $storeRegion as $key1 => $value1 ){ $counter1++; ?>
                        
                    <p class="h5 my-2"><i class="fas fa-map-marked-alt"></i> <i><?php echo htmlspecialchars( $value1["nameState"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></p>

                    <ul class="list-group mb-3">
                        <?php $counter2=-1;  if( isset($value1["city"]) && ( is_array($value1["city"]) || $value1["city"] instanceof Traversable ) && sizeof($value1["city"]) ) foreach( $value1["city"] as $key2 => $value2 ){ $counter2++; ?>
                        <li class="list-group-item py-2 border-left-0 border-right-0 rounded-0"><i class="fas fa-map-marker-alt"></i> <b><?php echo htmlspecialchars( $value2["nameCity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>:</b>

                            <select class="border-0">
                            <?php $counter3=-1;  if( isset($value2["regions"]) && ( is_array($value2["regions"]) || $value2["regions"] instanceof Traversable ) && sizeof($value2["regions"]) ) foreach( $value2["regions"] as $key3 => $value3 ){ $counter3++; ?>
                                <option><i><?php echo htmlspecialchars( $value3["districtRegion"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i></option>
                            <?php } ?>
                            </select>
                        </li>   
                        <?php } ?>
                    </ul>

                    <?php } ?>

                    <?php }else{ ?>
                    <p><b>SEM DADOS</b></p>
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

                    <div class="col-md">
                        
                        <?php if( $storeHorary != 0 ){ ?>
                        <p class="h5">
                            Horários de retirada
                        </p>

                            <?php $counter1=-1;  if( isset($storeHorary) && ( is_array($storeHorary) || $storeHorary instanceof Traversable ) && sizeof($storeHorary) ) foreach( $storeHorary as $key1 => $value1 ){ $counter1++; ?>
                            <p class="mt-3">
                                <b><?php echo htmlspecialchars( $value1["dayName"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $value1["dayCode"] < 6 ){ ?>-Feira<?php } ?>:</b><br>
                                
                                <?php echo date('H:i', strtotime($value1["timeInitial"])); ?> às <?php echo date('H:i', strtotime($value1["timeFinal"])); ?>

                                <?php if( $value1["timeInitial2"] > $value1["timeInitial"] ){ ?>
                                    <br><?php echo date('H:i', strtotime($value1["timeInitial2"])); ?> às <?php echo date('H:i', strtotime($value1["timeFinal2"])); ?>
                                <?php } ?>
                            </p>
                            <?php } ?>

                        </ul>
                        <?php } ?>

                    </div>

                    <div class="col-md">
                        
                        <p class="h5">
                            Horários de Entrega
                        </p>

                        <select id="selectDeliveryType" class="custom-select" onchange="alterDeliveryType('selectDeliveryType')">
                            <?php if( $deliveryType != false ){ ?>
                            
                            <option value="0">Selecione o tipo de entrega:</option>
                            <?php $counter1=-1;  if( isset($deliveryType) && ( is_array($deliveryType) || $deliveryType instanceof Traversable ) && sizeof($deliveryType) ) foreach( $deliveryType as $key1 => $value1 ){ $counter1++; ?>
                            <option value="<?php echo htmlspecialchars( $value1["idDeliveryType"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["nameType"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>    
                            <?php } ?>
                            
                            <?php }else{ ?>
                            <option><b>SEM OPÇÕES DE ENTREGA</b></option>
                            <?php } ?>
                        </select>
                        
                        <div class="mt-3">
                            
                            <?php if( $deliveryHorary != false ){ ?>
                            
                            <?php $counter1=-1;  if( isset($deliveryHorary) && ( is_array($deliveryHorary) || $deliveryHorary instanceof Traversable ) && sizeof($deliveryHorary) ) foreach( $deliveryHorary as $key1 => $value1 ){ $counter1++; ?>
                            <div class="dvHorarys dvHorary<?php echo htmlspecialchars( $value1["idDeliveryType"], ENT_COMPAT, 'UTF-8', FALSE ); ?> d-none">
                                
                                <?php $counter2=-1;  if( isset($value1["horary"]) && ( is_array($value1["horary"]) || $value1["horary"] instanceof Traversable ) && sizeof($value1["horary"]) ) foreach( $value1["horary"] as $key2 => $value2 ){ $counter2++; ?>
                                
                                <?php if( $value2["timeHorary2"] != 0 || $value2["timeHorary"] != 0 ){ ?>
                                <p class="mt-3">
                                    <b><?php echo htmlspecialchars( $value2["dayName"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $value2["dayCode"] < 6 ){ ?>-Feira<?php } ?>:</b><br>
                                    
                                    <?php if( $value2["timeHorary"] != 0 ){ ?>
                                    <?php echo date('H:i', strtotime($value2["timeInitial"])); ?> às <?php echo date('H:i', strtotime($value2["timeFinal"])); ?>
                                    <?php } ?>
                                    
                                    <?php if( $value2["timeInitial2"] > $value2["timeInitial"] && $value2["timeHorary2"] != 0 ){ ?>
                                    <br><?php echo date('H:i', strtotime($value2["timeInitial2"])); ?> às <?php echo date('H:i', strtotime($value2["timeFinal2"])); ?>
                                    <?php } ?>
                                </p>
                                <?php } ?>
                                
                                <?php } ?>

                            </div>
                            <?php } ?>

                            <?php } ?>
                        </div>

                    </div>

                </div>
                
            </div>
      
        </div>
    
    </div>
  
</div>

<!-- MODELS ACCOUNT -->

<!-- MODAL MY ADDRESS  
    <div class="modal fade" id="ModalAddress" tabindex="-1" role="dialog" aria-labelledby="ModalAddress" aria-hidden="true">
			
    <div class="modal-dialog">
     
        <div class="modal-content">
        
            <div class="modal-header border-bottom-0">

                <button type="button" class="close btn btn-light p-2" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
        
            </div>
        
            <div class="modal-body px-4">
                
                <p class="h4 font-weight-normal"><i class="fas fa-map-marker-alt"></i> <a id="titleAddress">Cadastrar Endereço de Entrega</a></p>

                <div class="row">

                    <div class="col-md-6">
                        <label for="CityAddress">Cidade:</label>
                        <select class="custom-select">
                            <option>Selecione uma cidade</option>
                            <option>Campo Grande - MS</option>
                            <option>Corumba - MS</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="CepAddress">Cep:</label>
                        <input type="text" class="form-control" id="CepAddress" name="CepAddress" placeholder="_____-___">
                        <a class="tx-IconCart">Somente Números</a>
                    </div>

                    <div class="col-md-12">
                        <label for="DistrictAddress">Bairro:</label>
                        <input type="text" class="form-control" id="DistrictAddress" name="DistrictAddress">	
                    </div>

                    <div class="col-md-12">
                        <label for="StreetAddress">Rua:</label>
                        <input type="text" class="form-control" id="StreetAddress" name="StreetAddress">	
                    </div>

                    <div class="col-md-6">
                        <label for="NumberAddress">Número:</label>
                        <input type="text" class="form-control" id="NumberAddress" name="NumberAddress">	
                    </div>

                    <div class="col-md-6">
                        <label for="ComplementAddress">Complemento:</label>
                        <input type="text" class="form-control" id="ComplementAddress" name="ComplementAddress">	
                    </div>

                    <div class="col-md-12">
                        <label for="ReferenceAddress">Ponto de Referência:</label>
                        <input type="text" class="form-control" id="ReferenceAddress" name="ReferenceAddress">
                        <a><input type="checkbox"> É o endereço principal</a>
                    </div>

                </div>
                
            </div>

            <div class="modal-footer text-right px-4 pb-3">
                <button type="button" class="btn btn-light btn-sm border border-secondary" data-dismiss="modal">Sair</button>
                <button type="button" class="btn btn-primary btn-sm">Salvar</button>
            </div>
      
        </div>
    
    </div>
  
</div> -->