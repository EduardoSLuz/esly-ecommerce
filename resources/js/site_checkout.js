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

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != "undefined")
        {

            if(json.status == 1)
            {

                $(`#checkoutCart${id} #itemQtd${id}`).load( `/loja-${store}/checkout/cart/ #checkoutCart${id} #itemQtd${id} > *`);
                $(`#checkoutCart${id} #itemTotal${id}`).load( `/loja-${store}/checkout/cart/ #checkoutCart${id} #itemTotal${id} > *`);
                $("#cartTotal").load( `/loja-${store}/checkout/cart/ #cartTotal` );
                $("#dropdownBootstrap").load( `/loja-${store}/ #dropdownBootstrap` );

            } else if (json.number !== 'undefined'){
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

    })

});

$('.formFreigth').on('submit', function(e) {

    var url = $(this).attr("action");
    var fr = this.inputFreigth.value;
    var store = $(this).attr("data-store");

    e.preventDefault();

    var dados = new FormData();

    dados.append("inputFreigth", fr); 

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){
        if(response == 1)
        {
            $("#priceFreigth").load( "/loja-"+store+"/checkout/cart/ #priceFreigth" );
        } else {
            $("#priceFreigth").html(response);
        }
    })

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
        
        if(json != "undefined")
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
        
        if(response == 1)
        {
            $('#modalUserRegister').modal('show');
        } else{
            window.location.href = "/loja-"+store+"/checkout/delivery-pickup/";
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
        
        $("#alertModalAccountData").load( "/loja-"+store+"/checkout/cart/ #alertModalAccountData > *");
        setTimeout( function(){ 
            $("#alertModalAccountData").load( "/loja-"+store+"/checkout/cart/ #alertModalAccountData > *"); 
            if(response == 1)
            {
                window.location.href = "/loja-"+store+"/checkout/delivery-pickup/";
            }
        } , 2000);

    })

});

// Checkout Delivery - Withdrawal
$('.formCheckoutPrime').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/delivery-pickup/`;

    var dados = $(this).serialize();
    //dados = dados + "&type=" + type + "&id=" + id + "&day=" + day;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertCheckoutPrime").load( "/loja-"+store+"/checkout/delivery-pickup/ #alertCheckoutPrime > *");
        setTimeout( function(){ 
            $("#alertCheckoutPrime").load( "/loja-"+store+"/checkout/delivery-pickup/ #alertCheckoutPrime > *"); 
        } , 2000);

        if(response == 1)
        {
            window.location.href = "/loja-"+store+"/checkout/horary/";
        } else if(response == 2) {
            window.location.href = "/loja-"+store+"/checkout/address/";
        } else if(response == 0 && response != ""){
            window.location.reload();
        }

    })

});

// Checkout Address
$('.formCheckoutAddress').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/address/`;
    var price = $('.checkboxAddress:checked').data('price');

    price = price == undefined ? "" : price;
    
    var dados = $(this).serialize();
    dados = dados + "&price=" + price;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertCheckoutAddress").load( "/loja-"+store+"/checkout/address/ #alertCheckoutAddress > *");
        setTimeout( function(){ 
            $("#alertCheckoutAddress").load( "/loja-"+store+"/checkout/address/ #alertCheckoutAddress > *"); 
        } , 2000);

        if(response == 1)
        {
            window.location.href = "/loja-"+store+"/checkout/horary/";
        } else if(response == 0 && response != ""){
            window.location.reload();
        }

    })

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
    
    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertCheckoutHorary").load( "/loja-"+store+"/checkout/horary/ #alertCheckoutHorary > *");
        setTimeout( function(){ 
            $("#alertCheckoutHorary").load( "/loja-"+store+"/checkout/horary/ #alertCheckoutHorary > *"); 
        } , 2000);

        if(response == 1)
        {
            window.location.href = "/loja-"+store+"/checkout/payment/";
        } else if(response == 0 && response != ""){
            window.location.reload();
        }

    })

});

// Checkout Payment
$('.formCheckoutPayment').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/payment/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertCheckoutPayment").load( "/loja-"+store+"/checkout/payment/ #alertCheckoutPayment > *");
        setTimeout( function(){ 
            $("#alertCheckoutPayment").load( "/loja-"+store+"/checkout/payment/ #alertCheckoutPayment > *"); 
        } , 2000);

        if(response == 1)
        {
            window.location.href = "/loja-"+store+"/checkout/resume/";
        } else if(response == 0 && response != ""){
            window.location.reload();
        }

    })

});

// Obs Product
$('.formObsProduct').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/resume/obs/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertModalObsProduct").load( "/loja-"+store+"/checkout/resume/ #alertModalObsProduct > *");
        setTimeout( function(){ 
            $("#alertModalObsProduct").load( "/loja-"+store+"/checkout/resume/ #alertModalObsProduct > *"); 
        } , 1000);

    })

});

// Obs Product
$('.formCheckoutResume').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/resume/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertCheckoutResume").load( "/loja-"+store+"/checkout/resume/ #alertCheckoutResume > *");
        setTimeout( function(){ 
            $("#alertCheckoutResume").load( "/loja-"+store+"/checkout/resume/ #alertCheckoutResume > *"); 
        } , 2000);

        if(response == 1)
        {
            window.location.href = "/loja-"+store+"/account/requests/";
        } else if(response == 0 && response != ""){
            window.location.reload();
        }

    })

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
