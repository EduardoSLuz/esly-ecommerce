// Cart
$('.formUpdateItem').on('submit', function(e) {

    var id = $(this).attr("data-id");
    var cart = $(this).attr("data-cart");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/cart/product/${cart}/update/`;
    var qtd = this.inputCart.value;

    e.preventDefault();

    var dados = new FormData();

    dados.append("qtd", qtd); 
    dados.append("id", id); 

    $("#overlayCheckoutCart").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != undefined)
        {

            if(json.status == 1)
            {

                $(`#checkoutCart${id} #itemQtd${id}`).load( `/loja-${store}/checkout/cart/ #checkoutCart${id} #itemQtd${id} > *`);
                $(`#checkoutCart${id} #itemTotal${id}`).load( `/loja-${store}/checkout/cart/ #checkoutCart${id} #itemTotal${id} > *`);
                $("#cartTotal").load( `/loja-${store}/checkout/cart/ #cartTotal` );
                $("#dropdownBootstrap").load( `/loja-${store}/ #dropdownBootstrap` );

            } else if (json.number !== undefined){
                $(`#inputCart${id}`).val(json.number);
            }

            if(json.status == 0)
            {
                $("#alertBoxCartNot").removeClass("d-none"); 
                msgAlert("#alertCartNot", json.msg, json.status, 1000)

                setTimeout( function(){ 
                    $("#alertBoxCartNot").addClass("d-none"); 
                } , 1000); 
            }

        } 

    }).always(function(){
        $("#overlayCheckoutCart").addClass("d-none");
    });

});

$('.formFreigth').on('submit', function(e) {

    let url = $(this).attr("action");
    let fr = this.inputFreigth.value;
    let store = $(this).attr("data-store");

    e.preventDefault();

    let dados = new FormData();

    dados.append("inputFreigth", fr); 

    $('#alertTextCart').addClass('d-none');
    $('#listCepCart').html("");
    $('#overlayCartAlert').removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){

        if(response != 0 && response != "" && isJson(response))
        {
            let json = JSON.parse(response);
            
            if(json.status == 1)
            {
                $("#listCepCart").load( `/loja-${store}/checkout/cart/ #listCepCart`, function(){
                    $('#overlayCartAlert').addClass('d-none');
                });
                
            } else {
                msgAlertText('#alertTextCart', json.msg, json.status);
            }
            
        }

    }).always(function(response){
        if(isJson(response) == false || isJson(response) && JSON.parse(response).status == 0) $('#overlayCartAlert').addClass('d-none');
    });


});

$('.checkSimilar').on('click', function(e) {

    var cart = $(this).attr("data-cart");
    var id = $(this).attr("data-key");
    var check = 0;
    var store = $(this).attr("data-store");
    var url = `/loja-${id}/checkout/cart/product/${cart}/update/`;

    if($(this).is(':checked')){
        check = 1; 
    } 

    var dados = new FormData();

    dados.append("check", check); 
    dados.append("id", id); 

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != undefined)
        {

            if(json.status == 1)
            {

                $("#dropdownBootstrap").load( `/loja-${store}/ #dropdownBootstrap` );

            } else {
               
                $("#alertBoxCartNot").removeClass("d-none"); 
                msgAlert("#alertCartNot", json.msg, json.status, 1000)

                setTimeout( function(){ 
                    $("#alertBoxCartNot").addClass("d-none"); 
                } , 1000); 
            
            }

        } 

    })

});

$('.PopRemoveItem').on('click', function(e) {

    var url = $(this).attr("data-action");
    var qtd = $(this).attr("data-id");
    var id = $(this).attr("data-key");

    var dados = new FormData();

    dados.append("qtd", qtd); 
    dados.append("id", id); 

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){
        
        if(response == 1){
            window.location.reload();
        } else{
            document.location.reload(true);
        }

    });	

});

$('.btnCheckCart').on('click', function(e) {

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/cart/`;
    var dados = ""; 
    
    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        let json = JSON.parse(response);

        if(json !== undefined)
        {

            if(json.type == 1)
            {
                msgAlert("#alertCartCheckout", json.msg, json.status, 2000);
            } else if(json.type == 2)
            {
                $('#modalUserRegister').modal('show');
            } else if(json.type == 0 && json.status == 1){
                window.location.href = "/loja-"+store+"/checkout/delivery-pickup/";
            }

        }

    })

});

$('.modalFormAccountData').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/cart/account/`;

    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

            msgAlert("#alertModalAccountData", json.msg, json.status, 1500);

            if(json.status == 1)
            {
                setTimeout( function(){ 
                    window.location.href = "/loja-"+store+"/checkout/delivery-pickup/";
                } , 1500);
            }

        } 

    })

});

// Checkout Delivery - Withdrawal
$('.formCheckoutPrime').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/delivery-pickup/`;

    var dados = $(this).serialize();

    $("#overlayCheckoutPrime").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        if(response != 0 && response != "" && isJson(response))
        {   

            let json = JSON.parse(response);

            if(json.status === 0) msgAlert("#alertCheckoutPrime", json.msg, json.status, 1500);

            if(json.options != undefined)
            {
                    
                if(json.options === 1)
                {
                    window.location.href = "/loja-"+store+"/checkout/horary/";
                } else if(json.options === 2) {
                    window.location.href = "/loja-"+store+"/checkout/address/";
                } else if(json.options === 0){
                    window.location.reload();
                }

            }

        } 

    }).always(function(){
        $("#overlayCheckoutPrime").addClass("d-none");
    });

});

// Checkout Address
$('.formCheckoutAddress').on('submit', function(e) { 

    e.preventDefault();

    let store = $(this).attr("data-store");
    let url = `/loja-${store}/checkout/address/`;
    let price = $('.checkList:checked').data('value');
    let name = $('.checkList:checked').data('name');
    let key = $('.checkList:checked').data('code');

    price = price == undefined ? "" : price;
    name = name == undefined ? "" : name;
    key = key == undefined ? 0 : key;
    
    let dados = $(this).serialize();
    dados = dados + `&price=${price}&name=${name}&key=${key}`;
    
    $("#overlayCheckoutAddress").removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        if(response != 0 && response != "" && isJson(response))
        {   

            let json = JSON.parse(response);

            if(json.status === 0) msgAlert("#alertCheckoutAddress", json.msg, json.status, 1500);

            if(json.options != undefined)
            {
                    
                if(json.options === 1)
                {
                    window.location.href = "/loja-"+store+"/checkout/horary/";
                } else {
                    window.location.reload();
                } 

            }

        } 

    }).always(function(){
        $("#overlayCheckoutAddress").addClass('d-none');
    });

});

$('.optionAddressList').on("click", function(e){

    $("#sectionTypeFreight").addClass('d-none');
    $("#overlayCheckoutAddrAlert").removeClass('d-none');

    let store = $(this).attr('data-store');
    let type = $(this).attr('data-type');
    let id = $(this).attr('data-code');
    
    if(parseInt(store) > 0 && id > 0)
    {
        $("#listAddressFreight").load( `/loja-${store}/checkout/address/?c=${id} #listAddressFreight`, function(){
            $("#sectionTypeFreight").removeClass('d-none');
            $("#overlayCheckoutAddrAlert").addClass('d-none');
            $(`#listItemAddr${type}`).click();
        });
    }

});

// Checkout Horary
$('.formCheckoutHorary').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/horary/`;
    var dados = $(this).serialize();
    var init = $('.inputCheckoutHorary:checked').data('init') == undefined ? "" : $('.inputCheckoutHorary:checked').data('init');
    var final = $('.inputCheckoutHorary:checked').data('final') == undefined ? "" : $('.inputCheckoutHorary:checked').data('final');
    var price = $('.inputCheckoutHorary:checked').data('price') == undefined ? "" : $('.inputCheckoutHorary:checked').data('price');
    var id = $('.inputCheckoutHorary:checked').data('id') == undefined ? "" : $('.inputCheckoutHorary:checked').data('id');
    var type = $('.inputCheckoutHorary:checked').data('type') == undefined ? "" : $('.inputCheckoutHorary:checked').data('type');

    dados = dados + "&init=" + init + "&final=" + final + "&price=" + price + "&id=" + id + "&type=" + type;
    
    $("#overlayCheckoutHorary").removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        if(response != 0 && response != "" && isJson(response))
        {   

            let json = JSON.parse(response);

            if(json.status === 0) msgAlert("#alertCheckoutHorary", json.msg, json.status, 1500);

            if(json.options != undefined)
            {
                    
                if(json.options === 1)
                {
                    window.location.href = "/loja-"+store+"/checkout/payment/";
                } else {
                    window.location.reload();
                } 

            }

        } 

    }).always(function(){
        $("#overlayCheckoutHorary").addClass('d-none');
    });

});

// Checkout Payment
$('.formCheckoutPayment').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/payment/`;
    var dados = $(this).serialize();

    $("#overlayCheckoutPayment").removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response != 0 && response != "" && isJson(response))
        {   

            let json = JSON.parse(response);

            if(json.status === 0) msgAlert("#alertCheckoutPayment", json.msg, json.status, 1500);

            if(json.options != undefined)
            {
                    
                if(json.options === 1)
                {
                    window.location.href = "/loja-"+store+"/checkout/resume/";
                } else {
                    window.location.reload();
                } 

            }

        } 

    }).always(function(){
        $("#overlayCheckoutPayment").addClass('d-none');
    });

});

// Obs Product
$('.formObsProduct').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/resume/obs/`;
    var dados = $(this).serialize();

    $("#overlayModalObsProduct").removeClass('d-none');
    
    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
            msgAlert("#alertModalObsProduct", json.msg, json.status, 2000);
        }
    }).always(function(){
        $("#overlayModalObsProduct").addClass('d-none');
    });

});

// Obs Product
$('.formCheckoutResume').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/resume/`;
    var dados = $(this).serialize();

    $("#overlayCheckoutResume").removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

            if(json.status === 0) msgAlert("#alertCheckoutResume", json.msg, json.status, 2000);

            if(json.options != undefined)
            {
                    
                if(json.options === 1)
                {
                    window.location.href = "/loja-"+store+"/account/requests/";
                } else {
                    setTimeout( function(){ 
                        window.location.reload();
                    } , 2000); 
                } 

            }

        } 

    }).always(function(){
        $("#overlayCheckoutResume").addClass('d-none');
    });

});

// Option Checkout Address
$(".optionCheckouAddress").on("click touch", function(e) {
    
    var target = $(this).parent();
    
    $(".optionCheckouAddressPm").removeClass("border-dark");
    $(".iconCheck").addClass("d-none");
    $(".checkboxAddress").removeAttr('checked');

    target.addClass("border-dark");
    $(this).children(".iconCheck").removeClass("d-none");
    $(this).children(".checkboxAddress").prop('checked', true);


});
