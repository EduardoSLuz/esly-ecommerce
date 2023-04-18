<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="modal fade" id="modalCompanyRegister" tabindex="-1" role="dialog" aria-labelledby="modalCompanyRegister" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered ">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title">Editar Empresa</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <form id="formModalCompanyRegister" class="formModalCompanyRegister row justify-content-center" data-cod="0">

                    <div class="form-group col-12">
                        <label for="inputModalCompanyRegisterHost" class="col-form-label">SITE:</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="inputModalCompanyRegisterHost" id="inputModalCompanyRegisterHost" placeholder="Host do site">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <label for="inputModalCompanyRegisterDBName" class="col-form-label">DB_NAME:</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="inputModalCompanyRegisterDBName" id="inputModalCompanyRegisterDBName" placeholder="DB_NAME">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <label for="inputModalCompanyRegisterDBUser" class="col-form-label">DB_USER:</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="inputModalCompanyRegisterDBUser" id="inputModalCompanyRegisterDBUser" placeholder="DB_USER">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <label for="inputModalCompanyRegisterDBPass" class="col-form-label">DB_PASS:</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="inputModalCompanyRegisterDBPass" id="inputModalCompanyRegisterDBPass" placeholder="DB_PASS">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-6">
                        <label for="inputModalCompanyRegisterDirectory" class="col-form-label">DIRECTORY:</label>
                        <div class="input-group">
                            <input type="text" class="form-control text-center" name="inputModalCompanyRegisterDirectory" id="inputModalCompanyRegisterDirectory" placeholder="DIRECTORY">
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-4">
                        <label for="selectModalCompanyRegisterStatus" class="col-form-label">STATUS:</label>
                        <div class="input-group">
                            <select name="selectModalCompanyRegisterStatus" id="selectModalCompanyRegisterStatus" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-12 col-sm-8">
                        <label for="selectModalCompanyRegisterCode" class="col-form-label">AVISO:</label>
                        <div class="input-group">
                            <select name="selectModalCompanyRegisterCode" id="selectModalCompanyRegisterCode" class="form-control">
                                <option value="0">Nenhum</option>
                                <option value="404">Dominio Inválido</option>
                                <option value="501">Atualizando Produtos</option>
                                <option value="500">Site Em Ajustes</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 d-flex-columns d-sm-flex justify-content-between">

                        <p id="textModalCompanyRegisterDateCreate">Data Criação: <b>H:i d/m/Y</b> </p>
                        <p id="textModalCompanyRegisterDateUpdate">Data Atualização: <b>H:i d/m/Y</b> </p>

                    </div>

                </form>
              
            </div>

            <div class="modal-footer">

                <div id="overlayModalCompanyRegister" class="btn d-none">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-3x fa-sync fa-spin"></i>
                    </div>
                </div>

                <div class="align-self-center mx-1 text-center py-2 py-sm-0">
                    <span id="alertTextModalCompanyRegister" class="h5 alert-text-admin text-danger d-none"> 
                        <a>NADA FOI ATUALIZADO</a> <i class="fas fa-times"></i> 
                    </span>
                </div>
                
                <button type="submit" class="btn btn-sm btn-outline-primary" form="formModalCompanyRegister">Salvar</button>
            
            </div>

        </div>
    
    </div>

</div>

<div class="modal fade" id="modalCompanyMercato" tabindex="-1" role="dialog" aria-labelledby="modalCompanyMercato" aria-hidden="true">
                
    <div class="modal-dialog modal-dialog-centered ">
    
        <div class="modal-content">
           
            <div class="modal-header">
              <h5 class="modal-title">Editar Conexão Mercato</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

                <form id="formModalCompanyMercato" class="formModalCompanyMercato row justify-content-center" data-cod="0" data-type="1">

                    <div class="form-group col-6">
                        <label for="inputModalCompanyMercatoPort" class="col-form-label">PORTA:</label>
                        <div class="input-group">
                            <input type="text" class="form-control maskNumber text-center" name="inputModalCompanyMercatoPort" id="inputModalCompanyMercatoPort" placeholder="Porta do Host">
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <label for="inputModalCompanyMercatoTime" class="col-form-label">TIME:</label>
                        <div class="input-group">
                            <input type="text" class="form-control maskStock text-center" name="inputModalCompanyMercatoTime" id="inputModalCompanyMercatoTime" placeholder="Hora(s)">
                        </div>
                    </div>

                    <div class="form-group col-6 col-md-4">
                        <label for="selectModalCompanyMercatoStatus" class="col-form-label">STATUS:</label>
                        <select name="selectModalCompanyMercatoStatus" id="selectModalCompanyMercatoStatus" class="form-control">
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <p id="textModalCompanyMercatoDateUpdate">Data Atualização Mercato: <b>H:i d/m/Y</b> </p>
                    </div>

                    <div class="form-group col-12 text-center">
                        <button type="button" class="btn btn-outline-primary btnModalCompanyMercatoType" data-type="2"> <i class="fas fa-1x fa-sync fa-spin"></i> List Products</button>
                        <button type="button" class="btn btn-outline-danger btnModalCompanyMercatoType" data-type="3"> <i class="fas fa-1x fa-sync fa-spin"></i> List Mercato</button>
                    </div>

                </form>
              
            </div>

            <div class="modal-footer">

                <div id="overlayModalCompanyMercato" class="btn d-none">
                    <div class="overlay d-flex justify-content-center align-items-center">
                        <i class="fas fa-3x fa-sync fa-spin"></i>
                    </div>
                </div>
                
                <div class="align-self-center mx-1 text-center py-2 py-sm-0">
                    <span id="alertTextModalCompanyMercato" class="h5 alert-text-admin text-danger d-none"> 
                        <a>NADA FOI ATUALIZADO</a> <i class="fas fa-times"></i> 
                    </span>
                </div>
                
                <button type="button" class="btn btn-sm btn-outline-primary btnModalCompanyMercatoType" form="formModalCompanyMercato" data-type="1">Salvar</button>
            
            </div>

        </div>
    
    </div>

</div>