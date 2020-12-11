// Form Email Promotions
$('.formLoginMaster').on('submit', function(e) { 

    e.preventDefault();

    var url = "/master/";
    var dados = $(this).serialize();

    $("#overlayLoginMaster").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);
        
        if(json != undefined)
        {

            msgAlert("#alertLoginMaster", json.msg, json.status, 1500);

            if(json.status == 1)
            {
                setTimeout( function(){ 
                    location.href = "/master/home/";
                } , 1500);
            }

        } else {
            msgAlert("#alertLoginMaster", "Erro Crítico", 0);
        }

    }).always(function() {
        $("#overlayLoginMaster").addClass("d-none");
    });

});

function msgAlert(alert, msg, type = 1, time = 2000)
{

    if($(alert).val() !== undefined)
    {

        if(type == 1){
            $(alert).removeClass("alert-danger");
            $(alert).addClass("alert-success");
        } else {
            $(alert).removeClass("alert-success");
            $(alert).addClass("alert-danger");
        }
        
        $(alert + " .msgAlert").text(msg);

        $(alert).removeClass("d-none");
        $(alert).addClass("show");
        setTimeout( function(){ 
            $(alert).removeClass("show");
            $(alert).addClass("d-none");
        } , time);
    }
    
}
