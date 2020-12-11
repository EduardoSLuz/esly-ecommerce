// Modal Order Horary
$('#modalOrderCancel').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var id = button.data('id'); 
    var modal = $(this);

    modal.find('.modal-content #formOrderCancel').attr("data-id", id);

});

// Form Order Promo
$('.formOrderCancel').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/account/requests/cancel/`;

    dados = "id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response == 1)
        {
            window.location.reload(true);
        }

    })

});

// Form Account Data
$('.formAccountData').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/account/data/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
            msgAlert("#alertsAccountData", json.msg, json.status, 1500);
        } 

    })

});

// Form Account Data Password
$('.formAccountDataPassword').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/account/data/password/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
            msgAlert("#alertsAccountDataPassword", json.msg, json.status, 1500);

            if(json.status == 1)
            {
                location.href = `/loja-${store}/account/data/`;
            }

        } 

    })

});

// Form Account Address New
$('.formAccountAddressNew').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/account/address/new/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response == 1)
        {
            window.location.href = `/loja-${store}/account/address/`;
        }

        $("#alertsAccountAddressNew").load( `/loja-${store}/account/address/new/ #alertsAccountAddressNew > *`);
        setTimeout( function(){ 

            $("#alertsAccountAddressNew").load( `/loja-${store}/account/address/new/ #alertsAccountAddressNew > *`); 

        } , 2000);

    })

});

// Btn Delete Address
$('.btnDeleteUserAddress').on('click', function(e) { 

    var store = $(this).attr("data-store");
    var code = $(this).attr("data-code");
    var url = `/loja-${store}/account/address/delete/`;
    var dados = `adCode=${code}`;
    
    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
           
            msgAlert("#alertUserAddress", json.msg, json.status, 1500);
            
            if(json.status == 1)
            {
                setTimeout( function(){ 
                    window.location.href = `/loja-${store}/account/address/`;
                } , 1500);
            }

        } 

    })

});

// Form Account Address New
$('.formAccountAddressEdit').on('submit', function(e) { 

    e.preventDefault();

    var code = $(this).attr("data-code");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/account/address/edit/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsAccountAddressEdit").load( `/loja-${store}/account/address/edit/?code=${code} #alertsAccountAddressEdit > *`);
        setTimeout( function(){ 

            $("#alertsAccountAddressEdit").load( `/loja-${store}/account/address/edit/?code=${code} #alertsAccountAddressEdit > *`); 

        } , 2000);

    })

});

// Modal Insert Address
$('#ModalAddress').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('code'); 
    var city = button.data('city'); 
    var cep = button.data('cep'); 
    var district = button.data('district'); 
    var street = button.data('street'); 
    var number = button.data('number'); 
    var complement = button.data('complement'); 
    var reference = button.data('reference'); 
    var main = button.data('main'); 
    var modalTitle = button.data('modal-title'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #modalFormAddress').attr("data-type", type);
    modal.find('.modal-body #modalFormAddress').attr("data-code", id);
    modal.find('.modal-body #cityAddress').val(city);
    modal.find('.modal-body #cityAddress').trigger('change');
    modal.find('.modal-body #cepAddress').val(cep);
    modal.find('.modal-body #districtAddress').val(district);
    modal.find('.modal-body #streetAddress').val(street);
    modal.find('.modal-body #numberAddress').val(number);
    modal.find('.modal-body #complementAddress').val(complement);
    modal.find('.modal-body #referenceAddress').val(reference);
    
    if(main == 1)
    { 
        modal.find('.modal-body #mainAddress').attr("checked", true);
    } else {
        modal.find('.modal-body #mainAddress').removeAttr("checked");
    }

});

$('#ModalAddress').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Account Address New
$('.modalFormAddress').on('submit', function(e) { 

    e.preventDefault();

    var type = $(this).attr("data-type");
    var code = $(this).attr("data-code");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/account/address/`;
    var dados = $(this).serialize();
    dados = dados + `&code=${code}&type=${type}`;

    $("#overlayModalAddress").removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
           
            msgAlert("#alertModalAddress", json.msg, json.status, 2000);
            
            if(json.status == 1)
            {
                setTimeout( function(){ 
                    $('#ModalAddress').modal('hide');
                } , 2000);
            }

        } 

    }).always(function(){
        $("#overlayModalAddress").addClass('d-none');
    });

});

$(".inputSearchCep").on("input", function(e) {
        
    var cep = $(this).val();

    if(cep.length == 9)
    {
        cep = cep.replace("-", "");

        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                $(".cepDistrict").val(dados.logradouro);
                $(".cepStreet").val(dados.bairro);
            } 
            else {
                alert("CEP não encontrado.");
            }
        });
    }

});