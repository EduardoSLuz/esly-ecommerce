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

// Bar Add Item
$('.formEnvia').on('submit', function(e) {

    var id = $(this).attr("data-id");
    var store = $(this).attr("data-store");
    var url = `/loja-${store}/checkout/cart/product/${id}/add/`;
    var qtd = this.inputCardDiversos.value;

    e.preventDefault();

    var dados = new FormData();

    dados.append("qtd", qtd); 

    $.ajax({
        url: url,
        method: "POST",
        data: dados,
        processData: false,
        contentType: false
    }).done(function(response){

        if(response == 1)
        {   
            $("#alertBoxCartNot").removeClass("d-none"); 
            $("#alertCartNot").addClass("show"); 
            setTimeout( function(){ 
                $("#alertCartNot").removeClass("show"); 
                $("#alertBoxCartNot").addClass("d-none"); 
            } , 1000); 
        }

        $("#dropdownBootstrap").load( "/loja-"+store+"/ #dropdownBootstrap > *" );
        $("#BtnCart").load( "/loja-"+store+"/ #BtnCart > *" );

    })

});