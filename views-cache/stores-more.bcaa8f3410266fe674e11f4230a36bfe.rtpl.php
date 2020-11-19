<?php if(!class_exists('Rain\Tpl')){exit;}?>    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Loja 01</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Loja 01</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div id="DivLeft" class="col-sm-6">
              
              <!-- REGISTER EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Cadastro</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="form-group col-sm-10">
                      <label for="inputName">Nome</label>
                      <input type="text" id="inputName" class="form-control" value="Astemac Ecommerce">
                    </div>

                    <div class="form-group col-sm-2">
                      <label for="inputStore">Loja</label>
                      <input type="text" id="inputStore" class="form-control text-center" value="01" disabled>
                    </div>

                    <div class="form-group col-sm-9">
                      <label for="inputEmail">E-mail</label>
                      <input type="email" id="inputEmail" class="form-control" value="suporte@astemac.com.br">
                    </div>

                    <div class="form-group col-sm-3">
                      <label for="inputCnpj">Cnpj</label>
                      <input type="text" id="inputCnpj" class="form-control" value="01234567891011
                      ">
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="inputTelephone">Telefone</label>
                      <input type="text" id="inputTelephone" class="form-control" value="67996218853">
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="inputWp">Whatsapp</label>
                      <input type="text" id="inputWp" class="form-control" value="67996218853">
                    </div>

                    <div class="form-group col-sm-4">
                      <label for="inputStatus">Status</label>
                      <input type="text" id="inputStatus" class="form-control" value="Ativo" disabled>
                    </div>

                    <div class="col-sm-12 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- INFO EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Sobre a empresa</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="form-group col-sm-12">
                      <label for="inputName">Descrição</label>
                      <textarea name="textInfo" class="form-control" rows="5" placeholder="Fale sobre sua empresa!"></textarea>
                    </div>

                    <div class="col-sm-12 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- PROMOTIONS EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Promoções</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalInfoPromo"> <i class="far fa-plus-square"></i> </a> 

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="accordion col-sm-12" id="AccordinTwo">
						
                      <div class="card btn btn-light border mt-2 mb-0" data-toggle="collapse" data-target="#col1" aria-expanded="true" aria-controls="collapse">
                      
                        <p class="py-2 my-0 h6 text-left">
                          <span>Frete Grátis </span>
                          <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoPromo"><i class="fas fa-pen"></i></a>
                          <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                        </p>						  
                      
                      </div>
                      <div id="col1" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinTwo">
                      
                        <div class="card-body">
                          <p class="my-0">Você escolhe a sua cidade, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confimação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.</p>
                        </div>
                      
                      </div>

                      <div class="card btn btn-light border mt-2 mb-0" data-toggle="collapse" data-target="#col2" aria-expanded="true" aria-controls="collapse">
                      
                        <p class="py-2 my-0 h6 text-left">
                          <span>CUPOM 25% DESCONTO</span>
                          <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoPromo"><i class="fas fa-pen"></i></a>
                          <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                        </p>						  
                      
                      </div>
                      <div id="col2" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinTwo">
                      
                        <div class="card-body">
                          <p class="my-0">Você escolhe a sua cidade, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confimação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.</p>
                        </div>
                      
                      </div>

                      <div class="card btn btn-light border mt-2 mb-0" data-toggle="collapse" data-target="#col3" aria-expanded="true" aria-controls="collapse">
                      
                        <p class="py-2 my-0 h6 text-left">
                          <span>PAGUE MENOS</span>
                          <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoPromo"><i class="fas fa-pen"></i></a>
                          <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                        </p>						  
                      
                      </div>
                      <div id="col3" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinTwo">
                      
                        <div class="card-body">
                          <p class="my-0">Você escolhe a sua cidade, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confimação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.</p>
                        </div>
                      
                      </div>
                      
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- SOCIAL EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Redes Sociais</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalInfoSocial"> <i class="far fa-plus-square"></i> </a> 

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Icone</th>
                            <th>Tipo</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Facebook</td>
                            <td><i class="fab fa-facebook-f"></i></td>
                            <td>Site</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoSocial"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Instagram</td>
                            <td><i class="fab fa-instagram"></i></td>
                            <td>Site</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoSocial"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Play Store</td>
                            <td><i class="fab fa-google-play"></i></td>
                            <td>App</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoSocial"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- INFO EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Infomações das lojas</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="col-sm-12">
                      <p>Exibir:</p>

                      <!-- checkbox -->
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoStore" name="infoStore">
                          <label for="infoStore">
                            Sobre a Empresa
                          </label>
                        </div>
                      </div>
                      
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoStores" name="infoStores">
                          <label for="infoStores">
                            Nossas Lojas
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoPartners" name="infoPartners">
                          <label for="infoPartners">
                            Parceiros
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoHelp" name="infoHelp">
                          <label for="infoHelp">
                            Perguntas Frequentes
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoContact" name="infoContact">
                          <label for="infoContact">
                            Fale Conosco
                          </label>
                        </div>
                      </div>
                      
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoContactWork" name="infoContactWork">
                          <label for="infoContactWork">
                            Trabalhe Conosco
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="infoPromo" name="infoPromo">
                          <label for="infoPromo">
                            Promoções
                          </label>
                        </div>
                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- TYPE FREIGHT EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Tipos de Frete</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalTypeFreigth"> <i class="far fa-plus-square"></i> </a> 

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Normal</td>
                            <td>R$ 2,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalTypeFreigth"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Express</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalTypeFreigth"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- HORARY EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Horários de Agendamento (Entrega)</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Per. 1</th>
                            <th>Valor Per. 1</th>
                            <th>Per. 2</th>
                            <th>Valor Per. 2</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Segunda</td>
                            <td>08:00 às 13:00</td>
                            <td>R$ 3,00</td>
                            <td>14:00 às 20:00</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalHoraryDelivery"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Terça</td>
                            <td>08:00 às 13:00</td>
                            <td>R$ 3,00</td>
                            <td>14:00 às 20:00</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalHoraryDelivery"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Quarta</td>
                            <td>08:00 às 13:00</td>
                            <td>R$ 3,00</td>
                            <td>14:00 às 20:00</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalHoraryDelivery"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>

            <div id="DivRight" class="col-sm-6">

              <!-- ADDRESS EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Endereço</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="form-group col-sm-10">
                      <label for="selectCity">Cidade</label>
                      <select name="selectCity" id="selectCity" class="custom-select">
                        <option value="0">Selecione uma cidade</option>
						            <optgroup label="Mato Grosso do Sul">
                          <option value="0">Campo Grande</option>
                        </optgroup>
                      </select>
                    </div>

                    <div class="form-group col-sm-2">
                      <label for="inputCep">Cep</label>
                      <input type="text" id="inputCep" class="form-control text-center" value="79020-200">
                    </div>

                    <div class="form-group col-sm-10">
                      <label for="inputStreet">Rua</label>
                      <input type="text" id="inputStreet" class="form-control" value="Rua Capitão Airton P. Rebouças">
                    </div>

                    <div class="form-group col-sm-2">
                      <label for="inputNumber">Número</label>
                      <input type="text" id="inputNumber" class="form-control" value="825
                      ">
                    </div>

                    <div class="form-group col-sm-6">
                      <label for="inputDistrict">Bairro</label>
                      <input type="text" id="inputDistrict" class="form-control" value="São Conrado">
                    </div>

                    <div class="form-group col-sm-6">
                      <label for="inputComplement">Complemento</label>
                      <input type="text" id="inputComplement" class="form-control" value="Ao lado da Conveniencia Liberatti">
                    </div>

                    <div class="col-sm-12 text-right">
                      <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- HELP EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Perguntas Frequentes</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalInfoHelp"> <i class="far fa-plus-square"></i> </a>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="accordion col-sm-12" id="AccordinOne">
						
                      <div class="card btn btn-light border mt-2 mb-0" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse">
                      
                        <p class="py-2 my-0 h6 text-left">
                          <span>Como Funciona? </span>
                          <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoHelp"><i class="fas fa-pen"></i></a>
                          <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                        </p>						  
                      
                      </div>
                      <div id="collapse1" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinOne">
                      
                        <div class="card-body">
                          <p class="my-0">Você escolhe a sua cidade, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confimação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.</p>
                        </div>
                      
                      </div>

                      <div class="card btn btn-light border mt-2 mb-0" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse">
                      
                        <p class="py-2 my-0 h6 text-left">
                          <span>Posso retirar as compras no mercado?</span>
                          <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoHelp"><i class="fas fa-pen"></i></a>
                          <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                        </p>						  
                      
                      </div>
                      <div id="collapse2" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinOne">
                      
                        <div class="card-body">
                          <p class="my-0">Você escolhe a sua cidade, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confimação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.</p>
                        </div>
                      
                      </div>

                      <div class="card btn btn-light border mt-2 mb-0" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse">
                      
                        <p class="py-2 my-0 h6 text-left">
                          <span>Posso cancelar minha compra?</span>
                          <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoHelp"><i class="fas fa-pen"></i></a>
                          <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                        </p>						  
                      
                      </div>
                      <div id="collapse3" class="collapse bg-white border" aria-labelledby="headingOne" data-parent="#AccordinOne">
                      
                        <div class="card-body">
                          <p class="my-0">Você escolhe a sua cidade, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confimação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.</p>
                        </div>
                      
                      </div>
                      
                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- PARTNERS EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Parceiros</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalInfoPartners"> <i class="far fa-plus-square"></i> </a> 

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Astemac</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoPartners"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Alexander Pierce</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalInfoPartners"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- PAY EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Opções de Pagamento</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalPayment"> <i class="far fa-plus-square"></i> </a> 

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Dinheiro</td>
                            <td>Na Retirada</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalPayment"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>MasterCard</td>
                            <td>Na Entrega</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalPayment"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>PagSeguro</td>
                            <td>Online</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalPayment"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- HEADER DEP EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Cabeçalho de Departamentos</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

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
                          <tr>
                            <td>1</td>
                            <td>Bebidas</td>
                            <td>Departamento</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Promoções</td>
                            <td>Página</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Cupons</td>
                            <td>Página</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Churrasco</td>
                            <td>Departamento</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Dúvidas</td>
                            <td>Página</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Cervejas</td>
                            <td>Departamento</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Frutas</td>
                            <td>Departamento</td>
                            <td>Ativo</td>
                            <td>
                              <a href="#" class="text-dark mx-2" data-toggle="modal" data-target="#modalHeaderDep"><i class="fas fa-pen"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                  </div>
                  <!-- /.row -->

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- FOOTER EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Rodapé da página</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <div class="col-sm-12">
                      <p>Exibir:</p>

                      <!-- checkbox -->
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutSocial" name="layoutSocial">
                          <label for="layoutSocial">
                            Redes Sociais
                          </label>
                        </div>
                      </div>
                      
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutSuport" name="layoutSuport">
                          <label for="layoutSuport">
                            Suporte
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutInstitutional" name="layoutInstitutional">
                          <label for="layoutInstitutional">
                            Institucional
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutPayment" name="layoutPayment">
                          <label for="layoutPayment">
                            Formas de Pagamento
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutApp" name="layoutApp">
                          <label for="layoutApp">
                            Baixe Nosso App
                          </label>
                        </div>
                      </div>
                      
                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutSecurity" name="layoutSecurity">
                          <label for="layoutSecurity">
                            Site Seguro
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutPromo" name="layoutPromo">
                          <label for="layoutPromo">
                            Receba Ofertas Exclusivas
                          </label>
                        </div>
                      </div>

                      <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="layoutInfo" name="layoutInfo">
                          <label for="layoutInfo">
                            Mais informações
                          </label>
                        </div>
                      </div>

                    </div>

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- FRETING EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Frete</h3>&nbsp;
                  <a href="#" class="text-success" data-toggle="modal" data-target="#modalFreigth"> <i class="far fa-plus-square"></i> </a> 

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
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
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalFreigth"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Campo Grande - MS</td>
                            <td>R$ 3,00</td>
                            <td>Express</td>
                            <td>R$ 8,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalFreigth"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Aquidauana - MS</td>
                            <td>R$ 5,00</td>
                            <td>Normal</td>
                            <td>R$ 7,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalFreigth"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- HORARY EXAMPLE -->
              <div class="card card-default collapsed-card">
                <div class="card-header">
                  <h3 class="card-title">Horários de Agendamento (Retirada)</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: none;">
                  
                  <div class="row">

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0 col-sm-12">
                      <table class="table table-head-fixed table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Dia</th>
                            <th>Per. 1</th>
                            <th>Valor Per. 1</th>
                            <th>Per. 2</th>
                            <th>Valor Per. 2</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Segunda</td>
                            <td>08:00 às 13:00</td>
                            <td>R$ 3,00</td>
                            <td>14:00 às 20:00</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalHoraryDelivery"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Terça</td>
                            <td>08:00 às 13:00</td>
                            <td>R$ 3,00</td>
                            <td>14:00 às 20:00</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalHoraryDelivery"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Quarta</td>
                            <td>08:00 às 13:00</td>
                            <td>R$ 3,00</td>
                            <td>14:00 às 20:00</td>
                            <td>R$ 5,00</td>
                            <td>
                              <a href="#" class="text-dark" data-toggle="modal" data-target="#modalHoraryDelivery"><i class="fas fa-pen"></i></a>&nbsp;
                              <a href="#" class="text-dark"><i class="far fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->

                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

        
        