$("#btnCityStores").on("click", function(e) {

    var city = $("#selectCityStores").val();

    if(city == 0)
    {
        $('.allStores').removeClass('d-none');
    } else{
        $('.allStores').addClass('d-none');
        $('.addressStore' + city).removeClass('d-none');
    }

    window.scrollTo(0, 350);

});

// Form Info Contact
$('.formInfoContact').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/contact/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsInfoContact").load( `/loja-${store}/contact/ #alertsInfoContact > *`);
        setTimeout( function(){ 

            $("#alertsInfoContact").load( `/loja-${store}/contact/ #alertsInfoContact > *`); 

        } , 2000);

    })

});

// Form Email Promotions
$('.formEmailPromo').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/email-promotions/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);

        if(json != "undefined")
        {

            msgAlert("#alertEmailPromo", json.msg, json.status);

        } else {
            msgAlert("#alertEmailPromo", "Erro Crítico", 0);
        }

    })

});