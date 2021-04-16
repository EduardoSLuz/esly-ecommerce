<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">
                Pedido 
                <?php if( isset($orders) && $orders != 0 ){ ?>
                  #<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php if( $orders["0"]["codOrder"] > 0 ){ ?>- Server #<?php echo htmlspecialchars( $orders["0"]["codOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>
                <?php } ?>
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/orders/">Pedidos</a></li>
                <li class="breadcrumb-item active">
                  Pedido 
                  <?php if( isset($orders) && $orders != 0 ){ ?>
                  #<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                  <?php } ?>
                </li>
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
  
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    <h4>
                      <i class="fas fa-globe"></i> <?php echo htmlspecialchars( $orders["0"]["infoStore"]["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> E-commerce.
                      <small class="float-right">
                        Data: <?php echo date("H:i", strtotime($orders["0"]["timeInsert"])); ?> - <?php echo date("d/m/Y", strtotime($orders["0"]["dateInsert"])); ?> 
                      </small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <?php if( isset($orders["0"]["address"]["0"]) ){ ?>
                  <div class="col-sm-4 invoice-col">
                    De
                    <address>
                   
                      <strong><?php echo htmlspecialchars( $orders["0"]["infoStore"]["nameStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.</strong><br>
                      
                      <i><?php echo htmlspecialchars( $orders["0"]["address"]["0"]["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i>
                      <br> <i><?php echo htmlspecialchars( $orders["0"]["address"]["0"]["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["0"]["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($orders["0"]["address"]["0"]["cep"]); ?></i>
                      
                      <?php if( isset($orders["0"]["address"]["0"]["complement"]) && !empty($orders["0"]["address"]["0"]["complement"]) ){ ?>
                      <br><i><?php echo htmlspecialchars( $orders["0"]["address"]["0"]["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i>
                      <?php } ?>
                      
                      <br> Telefone: <?php if( $orders["0"]["infoStore"]["telephoneStore"] != 0 ){ ?> <?php echo maskTel($orders["0"]["infoStore"]["telephoneStore"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?> <br> E-mail: <?php if( $orders["0"]["infoStore"]["emailStore"] != '' ){ ?> <?php echo htmlspecialchars( $orders["0"]["infoStore"]["emailStore"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?>
                      <br> Whatsapp: <?php if( $orders["0"]["infoStore"]["whatsappStore"] != 0 ){ ?> <?php echo maskTel($orders["0"]["infoStore"]["whatsappStore"]); ?> <?php }else{ ?> <b>Sem whatsapp</b> <?php } ?>
                   
                    </address>
                  </div>
                  <?php } ?>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    Para
                    <address>
                    
                      <strong><?php echo htmlspecialchars( $orders["0"]["infoUser"]["nameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( !empty($orders["0"]["infoUser"]["surnameUser"]) ){ ?> <?php echo htmlspecialchars( $orders["0"]["infoUser"]["surnameUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>.<?php }else{ ?>.<?php } ?></strong>
                      
                      <?php if( isset($orders["0"]["address"]["1"]) ){ ?>
                      
                      <br><i><?php echo htmlspecialchars( $orders["0"]["address"]["1"]["street"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["number"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["district"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i>
                      <br> <i><?php echo htmlspecialchars( $orders["0"]["address"]["1"]["city"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["address"]["1"]["uf"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo maskCep($orders["0"]["address"]["1"]["cep"]); ?></i>

                      <?php if( isset($orders["0"]["address"]["1"]["complement"]) && !empty($orders["0"]["address"]["1"]["complement"]) ){ ?>
                      <br><i><?php echo htmlspecialchars( $orders["0"]["address"]["1"]["complement"], ENT_COMPAT, 'UTF-8', FALSE ); ?></i>
                      <?php } ?>
                      
                      <?php } ?>

                      <br> Telefone: <?php if( $orders["0"]["infoUser"]["telephoneUser"] != 0 ){ ?> <?php echo maskTel($orders["0"]["infoUser"]["telephoneUser"]); ?> <?php }else{ ?> <b>Sem Telefone</b> <?php } ?> <br> E-mail: <?php if( $orders["0"]["infoUser"]["emailUser"] != '' ){ ?> <?php echo htmlspecialchars( $orders["0"]["infoUser"]["emailUser"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> <b>Sem e-mail</b> <?php } ?>
                      <br> Whatsapp: <?php if( $orders["0"]["infoUser"]["whatsappUser"] != 0 ){ ?> <?php echo maskTel($orders["0"]["infoUser"]["whatsappUser"]); ?> <?php }else{ ?> <b>Sem whatsapp</b> <?php } ?>
                    
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <p class="mb-2">
                      <b>Tipo:</b>
                      <?php if( $orders["0"]["typeModality"] == 1 ){ ?>Retirada<?php } ?>
                      
                      <?php if( $orders["0"]["typeModality"] == 2 ){ ?>
                      
                      Entrega - <i><u><?php if( $orders["0"]["typeFreight"] == 0 ){ ?>Normal<?php }else{ ?>Express<?php } ?></u></i>
                      
                      <?php } ?><br>
                      <b>Status:</b> <?php echo htmlspecialchars( $orders["0"]["descStatus"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
                    </p>
                    <p class="mb-2">
                      <b>Pago:</b> 
                      
                      <?php if( $orders["0"]["paid"] == 1 ){ ?>
                      Sim
                      <?php }else{ ?>
                      Não
                      <?php } ?>
                      <br>

                      <?php if( 0==1 ){ ?>
                      <b>Código da Venda:</b> 1303030<br>
                      <a href="#"><b>Ver Nota Fiscal</b></a>
                      <?php } ?>

                    </p>
                    
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                  
                  <div class="col-md-12 my-2 no-print">
                    

                    <?php if( isset($orders) && $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] < 4 ){ ?>
                    <a href="#" class="text-success" data-toggle="modal" data-target="#modalOrderItem" data-type="1" data-id="0" data-modal-title="Adicionar um Item" data-order="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cart="<?php echo htmlspecialchars( $orders["0"]["cart"]["idCart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-item="0" data-qtd="1" data-similar="1" data-price="0" data-discount="0" data-total="0"> <i class="fas fa-plus"></i> Adicionar</a>
                    <?php } ?>

                    <button type="button" target="_blank" class="btn btn-sm btn-default float-right" onclick="printPage('/admin/orders/<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/teste/');"><i class="fas fa-print"></i> </button>

                  </div>

                  <div class="col-12 table-responsive">
                    <table id="tbOrderItem" class="table table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Produto</th>
                        <th>Unidade</th>
                        <th>Similar</th>
                        <th>Preço Item</th>
                        <th>Qtd</th>
                        <th>Subtotal</th>
                        <th>Desconto</th>
                        <th>Total</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php if( isset($orders["0"]["cart"]) && $orders["0"]["cart"]["items"] != 0 ){ ?>

                      <?php $counter1=-1;  if( isset($orders["0"]["cart"]["items"]) && ( is_array($orders["0"]["cart"]["items"]) || $orders["0"]["cart"]["items"] instanceof Traversable ) && sizeof($orders["0"]["cart"]["items"]) ) foreach( $orders["0"]["cart"]["items"] as $key1 => $value1 ){ $counter1++; ?>
                      <tr>
                        <td><?php echo htmlspecialchars( $key1 + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>
                          <?php echo htmlspecialchars( $value1["descProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>
													<?php if( isset($value1["subtypeDesc"]) && !empty(trim($value1["subtypeDesc"])) ){ ?><small><i>(<?php echo htmlspecialchars( $value1["subtypeDesc"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)</i></small><?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars( $value1["unitReference"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td><?php if( $value1["similar"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                        <td>R$ <?php echo maskPrice($value1["priceItem"]); ?></td>
                        <td><?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        <td>R$ <?php echo maskPrice($value1["priceItem"] * $value1["quantity"]); ?></td>
                        <td>R$ <?php echo maskPrice($value1["discount"]); ?></td>
                        <td>R$ <?php echo maskPrice($value1["totalItem"]); ?></td>
                        <td>
                          
                          <?php if( isset($orders) && $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] < 4 ){ ?>
                          <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalOrderItem" data-type="2" data-id="<?php echo htmlspecialchars( $value1["idCartItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar um Item" data-order="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-cart="<?php echo htmlspecialchars( $orders["0"]["cart"]["idCart"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-item="<?php echo htmlspecialchars( $value1["codProduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-qtd="<?php echo htmlspecialchars( $value1["quantity"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-similar="<?php echo htmlspecialchars( $value1["similar"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-price="<?php echo htmlspecialchars( $value1["priceItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-discount="<?php echo htmlspecialchars( $value1["discount"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-total="<?php echo htmlspecialchars( $value1["totalItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i> </button>
                          <button type="button" class="btnOrderItemDelete btn btn-tool px-1" data-type="3" data-id="<?php echo htmlspecialchars( $value1["idCartItem"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-order="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><i class="far fa-trash-alt"></i></button>
                          <?php }else{ ?>
                          <i class="fas fa-check px-3"></i>
                          <?php } ?>

                        </td>
                      </tr>
                      <?php } ?>

                      <?php }else{ ?>
                      <tr class="h6 text-center py-3">
                        <td colspan="8"><b><i>NENHUM PRODUTO ENCONTRADO</i></b></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>

                <?php if( isset($orders["0"]["cart"]) && !empty($orders["0"]["cart"]["obsCart"]) ){ ?>
                <div class="my-2">
                      
                  <details>
                    <summary class="h5"> <i>Observações do Pedido</i></summary>
                    <p><?php echo htmlspecialchars( $orders["0"]["cart"]["obsCart"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>                    
                  </details>

                  <hr>
                  
                </div>
                <?php } ?>
  
                <div class="row">

                  <div class="col-md-6 my-2">
                    
                    <p class="h5 font-weight-light mb-3">
                      Nome de quem irá <?php if( $orders["0"]["typeModality"] == 1 ){ ?>retirar<?php }else{ ?>receber<?php } ?>:<br>
                      <b><?php echo htmlspecialchars( $orders["0"]["nameRes"], ENT_COMPAT, 'UTF-8', FALSE ); ?></b>
                    </p>

                    <?php if( isset($orders["0"]["payment"]) && $orders["0"]["payment"] != 0 ){ ?>
                    <p id="opOrderPayment" class="h5 font-weight-light">
                      <span>Opção de Pagamento:</span> 
                      
                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] < 4 ){ ?>
                      <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalOrderPay" data-type="2" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar o Pagamento do Pedido" data-payment="<?php echo htmlspecialchars( $orders["0"]["payment"]["idPayment"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-change="<?php echo htmlspecialchars( $orders["0"]["changePay"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i> </button> 
                      <?php }else{ ?>
                      <i class="fas fa-check"></i>
                      <?php } ?>

                      <br> <i><?php echo htmlspecialchars( $orders["0"]["payment"]["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $orders["0"]["payment"]["description"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&nbsp;</i>
                      <img src="/resources/imgs/cards-payment/<?php echo htmlspecialchars( $orders["0"]["payment"]["image"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="my-0" alt="<?php echo htmlspecialchars( $orders["0"]["payment"]["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" title="<?php echo htmlspecialchars( $orders["0"]["payment"]["pay"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">  
                      <?php if( $orders["0"]["payment"]["pay"] == 'Dinheiro' ){ ?> <i> - Troco para: R$ <?php echo maskPrice($orders["0"]["changePay"]); ?></i><?php } ?>
                    </p>
                    <?php } ?>

                    <?php if( isset($orders) && $orders != 0 ){ ?>
                    <p id="opOrderHorary" class="h5 font-weight-light mt-1 mb-3">
                      <span>Agendamento:</span> 

                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] < 4 ){ ?>
                      <button type="button" class="btn btn-tool px-1" data-toggle="modal" data-target="#modalOrderHorary" data-type="2" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar o Agendamento" data-date="<?php echo htmlspecialchars( $orders["0"]["dateHorary"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-init="<?php echo htmlspecialchars( $orders["0"]["timeInitial"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-final="<?php echo htmlspecialchars( $orders["0"]["timeFinal"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-value="<?php echo htmlspecialchars( $orders["0"]["priceHorary"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i> </button> 
                      <?php }else{ ?>
                      <i class="fas fa-check"></i>
                      <?php } ?>
                      
                      <br> <span class="h5">
                        <i>
                         <?php echo utf8_encode(ucwords(strftime('%A', strtotime($orders["0"]["dateHorary"])))); ?> - <?php echo date('d/m/Y', strtotime($orders["0"]["dateHorary"])); ?> 
                         <br><?php echo date('H:i', strtotime($orders["0"]["timeInitial"])); ?> às <?php echo date('H:i', strtotime($orders["0"]["timeFinal"])); ?>
                        </i>
                      </span>
                    </p>
                    <?php } ?>

                    <p class="h5 font-weight-light my-1">
                      
                      Promoção Aplicada: 
                      <?php if( isset($orders) && isset($orders["0"]["idPromo"]) ){ ?>
                      
                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] < 4 ){ ?>
                      <button type="button" class="btn btn-tool px-0" data-toggle="modal" data-target="#modalOrderPromo" data-type="2" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-modal-title="Alterar a Promoção" data-promo="<?php echo htmlspecialchars( $orders["0"]["idPromo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-pen"></i> </button> 
                      <?php }else{ ?>
                      <i class="fas fa-check"></i>
                      <?php } ?>

                      <?php if( $orders["0"]["idPromo"] != 0 ){ ?>
                      <button type="button" class="btn btn-tool px-0 btnOrderPromoDelete" data-type="3" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <i class="fas fa-trash-alt"></i> </button> 
                      <?php } ?>

                      <?php } ?>
                    </p>
                    <div id="opOrderPromo" class="h5 my-1">
                      <?php if( isset($orders) && $orders["0"]["idPromo"] != 0 ){ ?>
                      <span><?php echo htmlspecialchars( $orders["0"]["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>
                      <?php }else{ ?>
                      <span><i>*Sem Promoção Aplicada*</i></span>
                      <?php } ?>
                    </div>
                    
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6 my-2">
                    <p class="lead">
                      
                      Ultima Atualização <?php echo date('H:i', strtotime($orders["0"]["timeUpdate"])); ?> - <?php echo date('d/m/Y', strtotime($orders["0"]["dateUpdate"])); ?>
                      
                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] >= 2 && $orders["0"]["idOrderStatus"] <= 3 ){ ?> &nbsp;
                      <button id="btnOrderAlert" type="button" class="btn btn-sm btn-outline-info" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-toggle="modal" data-target="#modalOrderAlert">
                        <i class="far fa-paper-plane"></i>
                      </button>
                      <?php } ?>

                    </p>
  
                    <div class="table-responsive">
                      <table id="tbValuesOrder" class="table">
                        
                        <?php if( isset($orders["0"]["subtotal"]) ){ ?>
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td>R$ <?php echo maskPrice($orders["0"]["subtotal"]); ?></td>
                        </tr>
                        <?php } ?>

                        <?php if( isset($orders) && $orders["0"]["typeModality"] == 2 ){ ?>
                        <tr>
                          <th>Frete</th>
                          <td>
                            <?php if( $orders["0"]["priceFreight"] > 0 ){ ?> R$ <?php echo maskPrice($orders["0"]["priceFreight"]); ?> <?php }else{ ?> <i class="text-success">Grátis</i> <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                        
                        <tr>
                          <th>Agendamento:</th>
                          <td>
                            <?php if( $orders["0"]["priceHorary"] > 0 ){ ?> R$ <?php echo maskPrice($orders["0"]["priceHorary"]); ?> <?php }else{ ?> <i class="text-success">Grátis</i> <?php } ?>
                          </td>
                        </tr>
                        
                        <?php if( isset($orders) && $orders["0"]["discount"] > 0 ){ ?>
                        <tr>
                          <th>Desconto Subtotal:</th>
                          <td>R$ <?php echo maskPrice($orders["0"]["discount"]); ?></td>
                        </tr>
                        <?php } ?>
                        
                        <?php if( isset($orders["0"]["total"]) ){ ?>
                        <tr>
                          <th>Total:</th>
                          <td>R$ <?php echo maskPrice($orders["0"]["total"]); ?></td>
                        </tr>
                        <?php } ?>
                        
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="no-print">
                  <div class="row">
                    
                    <div class="col-md-6 col-12 my-1">
                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] != 9 ){ ?>
                      <button type="button" class="btnOrderStatus btn btn-outline-danger" data-status="9" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <i class="fas fa-times"></i>
                        Cancelar
                      </button>

                      <div id="overlayOrderCancel" class="btn d-none">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-1x fa-sync fa-spin"></i>
                        </div>
                      </div>
                      
                      <?php } ?>
                    </div>
                    
                    <div class="col-md-6 col-12 my-1 text-right">
                      
                      <div id="overlayOrderStatus" class="btn d-none">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <i class="fas fa-1x fa-sync fa-spin"></i>
                        </div>
                      </div>

                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] == 2 ){ ?>
                      <button type="button" class="btnOrderStatus btn btn-success" data-status="3" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <i class="fas fa-clipboard-list"></i>
                        Separar Pedido
                      </button>
                      <?php } ?>

                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] == 3 ){ ?>
                      <button type="button" class="btnOrderStatus btn btn-success" data-status="4" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <i class="fas fa-shopping-basket"></i>
                        Confirmar Separação
                      </button>
                      <?php } ?>

                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] == 4 && $orders["0"]["typeModality"] == 1 ){ ?>
                      <button type="button" class="btnOrderStatus btn btn-success" data-status="7" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <i class="fas fa-check"></i>
                        Confirmar Retirada
                      </button>
                      <?php } ?>

                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] == 4 && $orders["0"]["typeModality"] == 2 ){ ?>
                      <button type="button" class="btnOrderStatus btn btn-success" data-status="5" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <i class="fas fa-truck"></i>
                        Confirmar Envio
                      </button>
                      <?php } ?>

                      <?php if( isset($orders) && $orders["0"]["idOrderStatus"] == 5 && $orders["0"]["typeModality"] == 2 ){ ?>
                      <button type="button" class="btnOrderStatus btn btn-success" data-status="6" data-id="<?php echo htmlspecialchars( $orders["0"]["idOrder"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        <i class="fas fa-check"></i>
                        Confirmar Entrega
                      </button>
                      <?php } ?>

                    </div>  

                  </div>
                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

        
        