// Form Login
$('.formLogin').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/login/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response == 1)
        {
            window.location.href = `/loja-${store}/account/requests/`;
        } else if(response.length > 5){
            window.location.href = response;
        }

        $("#alertsLogin").load( `/loja-${store}/login/ #alertsLogin > *`);
        setTimeout( function(){ 
            $("#alertsLogin").load( `/loja-${store}/login/ #alertsLogin > *`); 
        } , 1000);

    })

});

// Form Login Register
$('.formLoginRegister').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/register/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response == 1)
        {
            window.location.href = `/loja-${store}/account/requests/`;
        } else if(response.length > 5){
            window.location.href = response;
        }

        $("#alertsLoginRegister").load( `/loja-${store}/register/ #alertsLoginRegister > *`);
        setTimeout( function(){ 
            $("#alertsLoginRegister").load( `/loja-${store}/register/ #alertsLoginRegister > *`); 
        } , 1000);

    })

});

// Form Login Forgot
$('.formLoginForgot').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/login/forgot-password/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsLoginForgot").load( `/loja-${store}/login/forgot-password/ #alertsLoginForgot > *`);
        
        if(response != 1)
        {
            setTimeout( function(){ 
                $("#alertsLoginForgot").load( `/loja-${store}/login/forgot-password/ #alertsLoginForgot > *`); 
            } , 2000);
        }

    })

});

// Form Login Forgot Reset
$('.formLoginForgotReset').on('submit', function(e) { 

    e.preventDefault();

    var code = $(this).attr("data-code");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/login/forgot-password/reset/`;
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response == 1)
        {
            window.location.href = `/loja-${store}/login/`;
        }

        $("#alertsLoginForgotReset").load( `/loja-${store}/login/forgot-password/reset/?code=${code} #alertsLoginForgotReset > *`);
        setTimeout( function(){ 

            $("#alertsLoginForgotReset").load( `/loja-${store}/login/forgot-password/reset/?code=${code} #alertsLoginForgotReset > *`); 

        } , 1000);


    })

});
