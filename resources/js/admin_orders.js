// WINDOW ON LOAD
$( window ).on( "load", function() {
    if($("#formListOrders").length) {
        $("#formListOrders").submit();
    }
});

// Atualizar constantemente
setInterval(function() {

    $("#formListOrders").submit();
    $("#formListOrdersHorary").submit();

}, 1750);

// Form List Orders
$('.formListOrders').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this.children[0]).val();
    var status = $(this.children[1]).val();
    var paid = $(this.children[2]).val();
    var dateIni = $(this.children[3]).val();
    var dateFin = $(this.children[4]).val();
    var url = "/admin/orders/?store="+store+"&status="+status+"&paid="+paid+"&ini="+dateIni+"&fin="+dateFin;
    
    $("#tbListOrders").load( url +  " #tbListOrders > *"); 

});

// Form List Order Horary
$('.formListOrdersHorary').on('submit', function(e) { 

    e.preventDefault();

    var store = $(this.children[0]).val();
    var status = $(this.children[1]).val();
    var paid = $(this.children[2]).val();
    var dateIni = $(this.children[3]).val();
    var dateFin = $(this.children[4]).val();
    var url = "/admin/orders-horary/?store="+store+"&status="+status+"&paid="+paid+"&ini="+dateIni+"&fin="+dateFin;
    
    $("#tbListOrdersHorary").load( url +  " #tbListOrdersHorary > *"); 

});

$(".inputsListOrders").on("change input", function(e){
   
    $("#formListOrders").submit();

});

// Modal Order Item
$('#modalOrderItem').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var modalTitle = button.data('modal-title'); 
    var id = button.data('id'); 
    var cart = button.data('cart'); 
    var order = button.data('order'); 
    var type = button.data('type'); 
    var item = button.data('item'); 
    var qtd = button.data('qtd'); 
    var similar = button.data('similar'); 
    var price = button.data('price'); 
    var discount = button.data('discount'); 
    var total = button.data('total'); 
    var modal = $(this);

    if(similar == 1) { similar = "Sim" } else { similar = "Não" }

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formOrderItem').attr("data-type", type);
    modal.find('.modal-body #formOrderItem').attr("data-id", id);
    modal.find('.modal-body #formOrderItem').attr("data-cart", cart);
    modal.find('.modal-body #formOrderItem').attr("data-order", order);
    modal.find('.modal-body #selectProductOrder').val(item);
    modal.find('.modal-body #selectProductOrder').trigger('change');
    modal.find('.modal-body #inputQtdOrder').val(qtd);
    modal.find('.modal-body #inputSimilarOrder').val(similar);
    modal.find('.modal-body #inputPriceOrder').val(price);
    modal.find('.modal-body #inputDescOrder').val(discount);
    modal.find('.modal-body #inputTotalOrder').val(total);

});

$('#modalOrderItem').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Order Item
$('.formOrderItem').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var cart = $(this).attr("data-cart");
    var order = $(this).attr("data-order");
    var type = $(this).attr("data-type");
    var url = "/admin/orders/"+order+"/products/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id + "&cart=" + cart;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsOrderItem").load( "/admin/orders/"+order+"/ #alertsOrderItem > *");
        setTimeout( function(){ 
            $("#alertsOrderItem").load( "/admin/orders/"+order+"/ #alertsOrderItem > *"); 
        } , 1000);
        
        if(response == 1)
        {
            $("#tbOrderItem").load( "/admin/orders/"+order+"/ #tbOrderItem > *");
            $("#tbValuesOrder").load( "/admin/orders/"+order+"/ #tbValuesOrder > *");
        }

    })

});

// Btn Order Promo Delete
$('.btnOrderItemDelete').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var order = $(this).attr("data-order");
    var type = $(this).attr("data-type");
    var url = "/admin/orders/"+order+"/products/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsOrderItem").load( "/admin/orders/"+order+"/ #alertsOrderItem > *");
        setTimeout( function(){ 
            $("#alertsOrderItem").load( "/admin/orders/"+order+"/ #alertsOrderItem > *"); 
        } , 1000);
        
        if(response == 1)
        {
            window.location.reload();
        }

    })

});

$('#inputQtdOrder').on('input change', function (e){
    
    var qtd = parseFloat($(this).val());
   
    if(qtd < 0 || qtd === ""){ qtd = 0; $(this).val(0); }

    var price = parseFloat($("#inputPriceOrder").val());
    var total = parseFloat(qtd * price);
    var dis = parseFloat($("#inputDescOrder").val());
    
    if(dis > total || dis < 0){ dis = 0;}

    if(isNaN(total) == false)
    {
        $("#inputTotalOrder").val(parseFloat(Math.round( (total - dis) * 100) / 100).toFixed(2));
    }

});

$('#selectProductOrder').on('change', function (e){
    
    var select = $(this).val();
    var data = $('#selectProductOrder [value="' + select + '"]').data('price');

    if(data >= 0 && select > 0)
    {
        $("#inputPriceOrder").val(data);
        $("#inputQtdOrder").change();
    }

});

$('#inputDescOrder').on('keyup', function (e){
    
    var value = $(this).val();

    if(value < 0 || value == ""){ $(this).val(0) }

    $("#inputQtdOrder").change();

});

// Modal Order Pay
$('#modalOrderPay').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var modalTitle = button.data('modal-title'); 
    var id = button.data('id'); 
    var pay = button.data('payment'); 
    var type = button.data('type'); 
    var change = button.data('change'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formOrderPayment').attr("data-type", type);
    modal.find('.modal-body #formOrderPayment').attr("data-id", id);
    modal.find('.modal-body #selectTypePayOrder').val(pay);
    modal.find('.modal-body #selectTypePayOrder').trigger('change');
    modal.find('.modal-body #inputOrderPay').val(change);

});

// Form Order Pay
$('.formOrderPayment').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var url = "/admin/orders/"+id+"/payment/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsOrderPayment").load( "/admin/orders/"+id+"/ #alertsOrderPayment > *");
        setTimeout( function(){ 
            $("#alertsOrderPayment").load( "/admin/orders/"+id+"/ #alertsOrderPayment > *"); 
        } , 1000);
        
        if(response == 1)
        {
            $("#opOrderPayment").load( "/admin/orders/"+id+"/ #opOrderPayment > *");
        }

    })

});

$('#selectTypePayOrder').on('change', function (e){
    
    var select = $(this).val();
    var data = $('#selectTypePayOrder [value="' + select + '"]').data('name');

    $('.inputsOrderPayment').addClass("d-none");

    if(data == "Dinheiro")
    {
        $('#inputOrderPay').prop("disabled", false);
        $('#inputsOrderPay1').removeClass("d-none");
    } else {
        $('#inputOrderPay').prop("disabled", true);
    }

});

// Modal Order Horary
$('#modalOrderHorary').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var modalTitle = button.data('modal-title'); 
    var id = button.data('id'); 
    var type = button.data('type'); 
    var date = button.data('date'); 
    var init = button.data('init'); 
    var final = button.data('final'); 
    var value = button.data('value'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formOrderHorary').attr("data-type", type);
    modal.find('.modal-body #formOrderHorary').attr("data-id", id);
    modal.find('.modal-body #dateHoraryOrder').val(date);
    modal.find('.modal-body #timeInitOrder').val(init);
    modal.find('.modal-body #timeFinalOrder').val(final);
    modal.find('.modal-body #priceHoraryOrder').val(value);

});

$('#selectHoraryOrder').on('change', function (e){
    
    var select = $(this).val();
    var date = $('#selectHoraryOrder [value="' + select + '"]').data('date');
    var init = $('#selectHoraryOrder [value="' + select + '"]').data('init');
    var final = $('#selectHoraryOrder [value="' + select + '"]').data('final');
    var value = $('#selectHoraryOrder [value="' + select + '"]').data('value');

    if(select != 0)
    {
        $("#dateHoraryOrder").val(date);
        $("#timeInitOrder").val(init);
        $("#timeFinalOrder").val(final);
        $("#priceHoraryOrder").val(value);
    }

});

// Form Order Horary
$('.formOrderHorary').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var url = "/admin/orders/"+id+"/horary/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsOrderHorary").load( "/admin/orders/"+id+"/ #alertsOrderHorary > *");
        setTimeout( function(){ 
            $("#alertsOrderHorary").load( "/admin/orders/"+id+"/ #alertsOrderHorary > *"); 
        } , 1000);
        
        if(response == 1)
        {
            $("#opOrderHorary").load( "/admin/orders/"+id+"/ #opOrderHorary > *");
            $("#tbValuesOrder").load( "/admin/orders/"+id+"/ #tbValuesOrder > *");
        }

    })

});

// Modal Order Promo
$('#modalOrderPromo').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var modalTitle = button.data('modal-title'); 
    var id = button.data('id'); 
    var type = button.data('type'); 
    var promo = button.data('promo'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formOrderPromo').attr("data-type", type);
    modal.find('.modal-body #formOrderPromo').attr("data-id", id);
    modal.find('.modal-body #selectPromoOrder').val(promo);

});

$('#modalOrderPromo').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Order Promo
$('.formOrderPromo').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var url = "/admin/orders/"+id+"/promo/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsOrderPromo").load( "/admin/orders/"+id+"/ #alertsOrderPromo > *");
        setTimeout( function(){ 
            $("#alertsOrderPromo").load( "/admin/orders/"+id+"/ #alertsOrderPromo > *"); 
        } , 1000);
        
        if(response == 1)
        {
            $("#opOrderPromo").load( "/admin/orders/"+id+"/ #opOrderPromo > *");
            $("#tbValuesOrder").load( "/admin/orders/"+id+"/ #tbValuesOrder > *");
        }

    })

});

// Btn Order Promo Delete
$('.btnOrderPromoDelete').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var url = "/admin/orders/"+id+"/promo/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsOrderPromo").load( "/admin/orders/"+id+"/ #alertsOrderPromo > *");
        setTimeout( function(){ 
            $("#alertsOrderPromo").load( "/admin/orders/"+id+"/ #alertsOrderPromo > *"); 
        } , 1000);
        
        if(response == 1)
        {
            window.location.reload();
        }

    })

});

// Btn Order Status
$('.btnOrderStatus').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var status = $(this).attr("data-status");
    var url = "/admin/orders/"+id+"/status/";
    var dados = "status=" + status;
    var btn = status == 9 ? "overlayOrderCancel" : "overlayOrderStatus";

    $(`#${btn}`).removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        var json = response != 0 ? JSON.parse(response) : 0;

        if(json.description !== undefined)
        {

            modalMsg(json);
            $('#modalMsgAlert').modal('show');

            setTimeout( function(){ 
                $('#modalMsgAlert').modal('hide');
                
                if(json.id == 4)
                {
                    $('#btnOrderAlert').click();
                } else {
                    window.location.reload();
                }

            } , 1750);
                        
        } else if(json == 0){
            alert("Erro Fatal! favor entrar em contato com o suporte!");
        }
        
    }).always(function() {
        $(`#${btn}`).addClass("d-none");
    });

});

// Modal Order Alert
$('#modalOrderAlert').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var id = button.data('id'); 
    var modal = $(this);

    modal.find('#formOrderAlert').attr("data-id", id);

});

$('#modalOrderAlert').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Order Alert
$('.formOrderAlert').on('submit', function(e) { 

    e.preventDefault();

    $("#modalOrderAlert #overlayOrderAlert").removeClass("d-none");

    var id = $(this).attr("data-id");
    var url = "/admin/orders/"+id+"/alert/";

    var dados = "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        $("#alertsOrderAlert").load( "/admin/orders/"+id+"/ #alertsOrderAlert > *");
        setTimeout( function(){ 
            $("#alertsOrderAlert").load( "/admin/orders/"+id+"/ #alertsOrderAlert > *"); 
            if(response == 1)
            {
                window.location.reload();
            }
        } , 2000);

    }).always(function() {
        $("#modalOrderAlert #overlayOrderAlert").addClass("d-none");
    });

});

// Function
function modalMsg(json)
{

    if(json.description !== undefined)
    {
       
        var modal = $("#modalMsgAlert");

        modal.find('.modal-body #modalMsgIcon').addClass(`${json.icon} text-${json.color}`);
        modal.find('.modal-body #modalMsgText').addClass(`text-${json.color}`);
        modal.find('.modal-body #modalMsgText').text(json.description);

    }

}