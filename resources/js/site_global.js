// Modal Msg Alert
$('#modalMsgAlert').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var text = button.data('text'); 
    var btnlink = button.data('link'); 
    var btntext = button.data('btn-text'); 
    var btntext2 = button.data('btn-text2') == undefined ? "" : button.data('btn-text2'); 
    var modal = $(this);

    modal.find('.modal-content #formMsgAlert #titleTextMsg').text(text);
    modal.find('.modal-content #formMsgAlert #btnMsg').attr("href", btnlink);
    modal.find('.modal-content #formMsgAlert #btnMsg').text(btntext);

    if(btntext2 != "")
    {
        modal.find('.modal-content #formMsgAlert #btnMsg2').text(btntext2);
    } else { 
        $('.modal-content #formMsgAlert #btnMsg2').addClass("d-none"); 
    }

});

// Modal Msg Alert Links
$('#modalMsgAlertLinks').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var title = button.data('title'); 
    var btnlink = button.data('link'); 
    var btntext = button.data('text'); 
    var btnlink2 = button.data('link2') == undefined ? "" : button.data('link2'); 
    var btntext2 = button.data('text2') == undefined ? "" : button.data('text2'); 
    var modal = $(this);

    modal.find('.modal-content #formMsgAlertLinks #titleTextMsgLinks').text(title);
    modal.find('.modal-content #formMsgAlertLinks #btnMsgLinks').attr("href", btnlink);
    modal.find('.modal-content #formMsgAlertLinks #btnMsgLinks').text(btntext);

    if(btntext2 != "" && btnlink2 != "")
    {
        modal.find('.modal-content #formMsgAlertLinks #btnMsgLinks2').attr("href", btnlink2);
        modal.find('.modal-content #formMsgAlertLinks #btnMsgLinks2').text(btntext2);
    } else { 
        $('.modal-content #formMsgAlertLinks #btnMsgLinks2').addClass("d-none"); 
    }

});

// Modal Msg Alert
$('#modalSubTypesOptions').on('show.bs.modal', function (e) {
    
    $("#divListOptionsSubTypes").addClass('d-none');
    $("#overlayModalSubTypesOptions").removeClass('d-none');

    var button = $(e.relatedTarget); 
    var store = button.data('store'); 
    var title = button.data('title'); 
    var dad = button.data('dad'); 
    var id = button.data('id') == undefined ? 0 : button.data('id'); 
    var modal = $(this);

    modal.find('.modal-content #formModalSubTypesOptions .modal-title').text(title);
    modal.find('.modal-content #formModalSubTypesOptions').attr("data-code", dad);

    $("#listOptionsSubTypes").load(`/loja-${store}/?cod=${id} #listOptionsSubTypes > *`, function(){
        $("#overlayModalSubTypesOptions").addClass('d-none');
        $("#divListOptionsSubTypes").removeClass('d-none');
        $("#listOptionsSubTypes button").first().click();
    });

});

$('.formModalSubTypesOptions').on('submit', function(e) {

    e.preventDefault();

    let code = $(this).attr("data-code");
    let type = $(this).attr("data-type");

    $(`#${code}`).attr("data-subtype", type);
    
    $('#modalSubTypesOptions').modal('hide');
    $(`#${code}`).submit();

});

$(document).on('click', '.inputSubTypeOption', function(e){

    let val = $(this).attr("data-code");

    $(".formModalSubTypesOptions").attr("data-type", val);

});

// Bar Add Item
$('.formEnvia').on('submit', function(e) {

    e.preventDefault();

    let id = $(this).attr("data-id");
    let store = $(this).attr("data-store");
    let type = $(this).attr("data-type");
    let url = `/loja-${store}/checkout/cart/product/${id}/add/`;
    let subtype = $(this).attr("data-subtype");
    let detect = $(this).attr("data-detect");
    let card = $(this).attr("id");
    let qtd = this.inputCardDiversos.value;
    let dados = new FormData();

    dados.append("qtd", qtd); 
    dados.append("type", type); 
    dados.append("subtype", subtype); 

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

            msgAlert("#alertCartNot", json.msg, json.status, 2000)

        }
        
        if(detect == 0){
            $(`#${card} .msgAlertIcon`).attr("data-toggle", "modal");
            $(`#${card} .btn-cart-site-section`).attr("type", "button");
            $(`#${card} .msgAlertIcon`).click();
            $(`#${card} .msgAlertIcon`).attr("data-toggle", "");
            $(`#${card} .btn-cart-site-section`).attr("type", "submit");
        }

        $("#dropdownBootstrap").load( "/loja-"+store+"/ #dropdownBootstrap > *" );
        $("#BtnCart").load( "/loja-"+store+"/ #BtnCart > *" );
        
    })

});

$(".altUnitMeasure").on('click', function(e){

    let store = $(this).attr("data-store");
    let id = $(this).attr("data-id");
    let cod = $(this).attr("data-cod");
    let card = $(this).attr("data-dad");
    let key = $(this).attr("data-key");
    let prime = $(this).attr("data-prime");
    let url = `/loja-${store}/select-product-unit/`;
    let dados = `id=${id}&cod=${cod}`;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        let json = JSON.parse(response);

        if(json !== undefined)
        {
            $(`#card${card} .priceItemProduct`).text(json.price);                
            $(`#formCard${card}`).attr("data-type", cod);    
            
            if(json.freeFill == 1)
            {
                $(`#inputCardDiversos${card}`).attr('type', 'text');
                $(`#inputCardDiversos${card}`).removeAttr('readonly');
            } else {
                
                $(`#inputCardDiversos${card}`).val(1);
                $(`#inputCardDiversos${card}`).attr('type', 'number');
                $(`#inputCardDiversos${card}`).attr('readonly', true);
            }
            
        }

        if(key == prime)
        {
            $(`#card${card} .card-ColorPromoPrice`).removeClass("d-none");                
        } else {
            $(`#card${card} .card-ColorPromoPrice`).addClass("d-none");                
        }

    })

});

function msgAlert(alert, msg, type = 1, time = 2000, fixed = 0)
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
        
        if(fixed == 0)
        {
            setTimeout( function(){ 
                $(alert).removeClass("show");
                $(alert).addClass("d-none");
            } , time); 
        } else {
            $(".msgAlertClose").removeClass("d-none");
        }

    }
    
}

function msgAlertText(alert, msg, type = 1, time = 0)
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

        if(time > 0)
        {
            setTimeout( function(){ 
                $(alert).addClass("d-none");
            } , time);
        }
    
    }
    
}

$(function () {

    $("#overlayBody").addClass('d-none');
    $("#overlayBody").removeClass('d-flex');

    if($(".msgAlertNow").attr("id") !== undefined)
    {
    
        let id = $(".msgAlertNow").attr("id");
        let sts = $(".msgAlertNow").attr("data-status");
        let msg = $(".msgAlertNow").attr("data-msg");
        let time = $(".msgAlertNow").attr("data-time");

        msgAlert(`#${id}`, msg, sts, time);
        
        $(".msgAlertNow").removeClass("msgAlertNow");
    
    }

})