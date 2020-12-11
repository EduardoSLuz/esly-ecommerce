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

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

            if(json.status != 1) msgAlert("#alertsLogin", json.msg, json.status, 1500);

            if(json.url !== undefined)
            {
                
                let newUrl = json.url;
                
                if(newUrl.length > 5)
                {
                    window.location.href = newUrl;
                } else {
                    window.location.href = `/loja-${store}/account/requests/`;
                }

            }

        } 

    })

});

// Form Login Register
$('.formLoginRegister').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/register/`;
    var dados = $(this).serialize();

    $("#overlayLoginRegister").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   

            if(json.status !== 1) msgAlert("#alertsLoginRegister", json.msg, json.status, 1500);

            if(json.url !== undefined)
            {
                
                let newUrl = json.url !== undefined ? json.url : "";
                
                if(newUrl.length > 5)
                {
                    window.location.href = newUrl;
                } else {
                    window.location.href = `/loja-${store}/account/requests/`;
                }

            }

        } 

    }).always(function(response){
        $("#overlayLoginRegister").addClass("d-none");
    });

});

// Form Login Forgot
$('.formLoginForgot').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this).attr("data-store");
    var url = `/loja-${store}/login/forgot-password/`;
    var dados = $(this).serialize();

    $("#overlayForgotPass").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
            msgAlert("#alertsLoginForgot", json.msg, json.status, 1500, json.fixed);
        } 

    }).always(function(response){
        $("#overlayForgotPass").addClass("d-none");
    });

});

// Form Login Forgot Reset
$('.formLoginForgotReset').on('submit', function(e) { 

    e.preventDefault();

    var code = $(this).attr("data-code");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/login/forgot-password/reset/`;
    var dados = $(this).serialize();
    
    $("#overlayForgotPassReset").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {   
           
            msgAlert("#alertsLoginForgotReset", json.msg, json.status, 2000, json.fixed);

            if(json.status == 1)
            {
                setTimeout( function(){ 
                    window.location.href = `/loja-${store}/login/`;
                } , 2000);
            }

        }
        
    }).always(function(response){
        $("#overlayForgotPassReset").addClass("d-none");
    });

});
