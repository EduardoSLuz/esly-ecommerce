// Atualizar constantemente
setInterval(function() {

    getNotifications();

}, 1000);

// Select Store Admin
$('#selectStAdmin').on('change', function(e) { 

    var st = $(this).val();
    var url = "/admin/alter-st/";
    var dados = "st=" + st;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(){
        window.location.reload();
    })

});

$("body").on("click tap", function(e){
  
    if($("#audioNotification").attr("data-status") == 0)
    {
        $("#audioNotification").attr("data-status", 1);
    }

});

$("#btnNotificationsStores").on("click tap", function(e){
  
    if($("#audioNotification").attr('loop') != undefined)
    {
        $("#audioNotification").removeAttr('loop');
    }

});

function getNotifications()
{

    $.ajax({
        url: "/admin/getnotifications/",
        method: "POST",
        data: "id=1"
    }).done(function(response){

        if(response == 1)
        {
            $("#audioNotification").attr('loop', true);
            $("#audioNotification").attr('loop', true);
            playNot();
        }

        $("#notificationsStores").load( "/admin/ #notificationsStores > *");
        $("#notificationsStores2").load( "/admin/ #notificationsStores2 > *");
        $("#gridPanelControl").load( "/admin/ #gridPanelControl > *");

    })

}

function playNot()
{
    $("#audioNotification").prop('volume', 1.0);
    $("#audioNotification").trigger('play');
}

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

function msgTextAlert(alert, msg, type = 1, time = 2000)
{

    if($(alert).val() !== undefined)
    {

        if(type == 1){
            $(alert).removeClass("text-danger");
            $(alert).addClass("text-success");
        } else {
            $(alert).removeClass("text-success");
            $(alert).addClass("text-danger");
        }
        
        $(alert).text(msg);

        $(alert).removeClass("d-none");
        setTimeout( function(){ 
            $(alert).addClass("d-none");
        } , time);
    
    }
    
}

function msgAlertText(alert, msg, type = 1, time = 2000)
{

    if($(alert).attr('id') !== undefined)
    {

        $(`${alert} a`).text(msg);

        if(type == 1){
            
            $(alert).removeClass("text-danger");
            $(alert).addClass("text-success");

            $(`${alert} i`).removeClass();
            $(`${alert} i`).addClass("fas fa-check");

        } else {
            
            $(alert).removeClass("text-success");
            $(alert).addClass("text-danger");

            $(`${alert} i`).removeClass();
            $(`${alert} i`).addClass("fas fa-times");

        }
        
        $(alert).removeClass("d-none");
        setTimeout( function(){ 
            $(alert).addClass("d-none");
        } , time);
    
    }
    
}

$(".searchCep").on("input", function(e) {

    let cep = $(this).val();
    let url = "/geocoding_api_for_cep";
    let dados = `cep=${cep}&cod=2621`;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(response != 0 && response != "" && JSON.parse(response) !== undefined)
        {
            let json = JSON.parse(response);
            
            $(".cityAddress").val(json.city + " - " + json.uf);
            $(".districtAddress").val(json.district);
            $(".streetAddress").val(json.street);
        
        } else if(response == 0 && response != ""){
            msgAlert(".alertModalAddress", "CEP NÃO ENCONTRADO!", 0, 1000);
        }

    })

});

$(".clickMe").click();
$(".clickMe").removeClass("clickMe");

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}