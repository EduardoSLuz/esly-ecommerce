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
    //dados = dados + "&type=" + type + "&id=" + id + "&day=" + day;

    $("#overlayCheckoutPrime").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

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

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/address/`;
    var price = $('.checkboxAddress:checked').data('price');

    price = price == undefined ? "" : price;
    
    var dados = $(this).serialize();
    dados = dados + "&price=" + price;
    
    $("#overlayCheckoutAddress").removeClass('d-none');

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

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

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

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

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

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

        console.log(response);

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
