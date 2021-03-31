$('#modalCompanyRegister').on('show.bs.modal', function (e) {
        
    let btn = $(e.relatedTarget) !== undefined ? $(e.relatedTarget) : 0; 
    let cod = btn.data('cod') !== undefined ? btn.data('cod') : 0; 
    let modal = $(this) !== undefined ? $(this) : 0;
    let url = "/master/companies/companies_register/";
        
    if(cod !== 0)
    {
        
        $("#overlayModalCompanyRegister").removeClass('d-none');

        let dados = `register=${cod}&code=aXVsKzNrZmd1QjZsSmJsOFhWNm10KzV5VjlMR2pHTzRiU3pHbTR3VUdQOD0=`;

        $.ajax({
            url: url,
            method: "POST",
            data: dados
        }).done(function(response){

            if(isJson(response))
            {

                let json = JSON.parse(response);
                
                modal.find('.modal-body #formModalCompanyRegister').attr("data-cod", cod);
                modal.find('#formModalCompanyRegister #inputModalCompanyRegisterHost').val(json.host);
                modal.find('#formModalCompanyRegister #inputModalCompanyRegisterDBName').val(json.db_name);
                modal.find('#formModalCompanyRegister #inputModalCompanyRegisterDBUser').val(json.db_user);
                modal.find('#formModalCompanyRegister #inputModalCompanyRegisterDBPass').val(json.db_pass);
                modal.find('#formModalCompanyRegister #inputModalCompanyRegisterDirectory').val(json.directory);
                modal.find('#formModalCompanyRegister #selectModalCompanyRegisterStatus').val(json.status);
                modal.find('#formModalCompanyRegister #selectModalCompanyRegisterStatus').trigger('change');
                modal.find('#formModalCompanyRegister #selectModalCompanyRegisterCode').val(json.code);
                modal.find('#formModalCompanyRegister #selectModalCompanyRegisterCode').trigger('change');
                modal.find('#formModalCompanyRegister #textModalCompanyRegisterDateCreate b').text(json.dateCreate);
                modal.find('#formModalCompanyRegister #textModalCompanyRegisterDateUpdate b').text(json.dateUpdate);

            } else {
                modal.modal('hide');
            }

        }).always(function() {
            $("#overlayModalCompanyRegister").addClass('d-none');
        });

    } else {
        modal.modal('hide');
    }
    
});

$('#modalCompanyMercato').on('show.bs.modal', function (e) {
        
    let btn = $(e.relatedTarget) !== undefined ? $(e.relatedTarget) : 0; 
    let cod = btn.data('cod') !== undefined ? btn.data('cod') : 0; 
    let modal = $(this) !== undefined ? $(this) : 0;
    let url = "/master/companies/companies_register/";
        
    if(cod !== 0)
    {
        
        $("#overlayModalCompanyMercato").removeClass('d-none');

        let dados = `register=${cod}&code=aXVsKzNrZmd1QjZsSmJsOFhWNm10KzV5VjlMR2pHTzRiU3pHbTR3VUdQOD0=`;

        $.ajax({
            url: url,
            method: "POST",
            data: dados
        }).done(function(response){

            if(isJson(response))
            {

                let json = JSON.parse(response);
    
                modal.find('.modal-body #formModalCompanyMercato').attr("data-cod", cod);
                modal.find('.modal-body #formModalCompanyMercato').attr("data-type", 1);
                modal.find('#formModalCompanyMercato #inputModalCompanyMercatoPort').val(json['mercato'][0]['port']);
                modal.find('#formModalCompanyMercato #inputModalCompanyMercatoTime').val(json['mercato'][0]['time']);
                modal.find('#formModalCompanyMercato #selectModalCompanyMercatoStatus').val(json['mercato'][0]['status']);
                modal.find('#formModalCompanyMercato #textModalCompanyMercatoDateUpdate b').text(json['mercato'][0]['dateUpdate']);

            } else {
                modal.modal('hide');
            }

        }).always(function() {
            $("#overlayModalCompanyMercato").addClass('d-none');
        });

    } else {
        modal.modal('hide');
    }
    
});

$('.formModalCompanyRegister').on('submit', function(e) { 

    e.preventDefault();

    let url = "/master/companies/register/";
    let cod = $(this).attr('data-cod') !== undefined ? $(this).attr('data-cod') : 0;
    let dados = $(this).serialize();
    dados = dados + `&cod=${cod}`;

    $("#overlayModalCompanyRegister").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(isJson(response))
        {
            let json = JSON.parse(response);

            msgAlertText('#alertTextModalCompanyRegister', json.msg, json.status);
            
            if(json.status == 1) $("#tbMasterCompanies").load( `/master/companies/ #tbMasterCompanies > *`);

        } else {
            msgAlertText("#alertTextModalCompanyRegister", "Erro: Nada Foi Retornado!", 0);
        }

    }).always(function() {
        $("#overlayModalCompanyRegister").addClass("d-none");
    });

});

$('.formModalCompanyMercato').on('submit', function(e) { 

    e.preventDefault();

    let url = "/master/companies/mercato/";
    let cod = $(this).attr('data-cod') !== undefined ? $(this).attr('data-cod') : 0;
    let type = $(this).attr('data-type') !== undefined ? $(this).attr('data-type') : 0;
    let dados = $(this).serialize();
    dados = dados + `&cod=${cod}&type=${type}`;

    $("#overlayModalCompanyMercato").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(isJson(response))
        {
            
            let json = JSON.parse(response);

            msgAlertText('#alertTextModalCompanyMercato', json.msg, json.status);

        } else {
            msgAlertText("#alertTextModalCompanyMercato", "Erro: Nada Foi Retornado!", 0);
        }

    }).always(function() {
        $("#overlayModalCompanyMercato").addClass("d-none");
    });

});

$('.btnModalCompanyMercatoType').on('click', function(e) { 

    let type = $(this).data('type') !== undefined ? $(this).data('type') : 0;
    let form = $('.formModalCompanyMercato');

    form.attr('data-type', type);
    form.submit();

});