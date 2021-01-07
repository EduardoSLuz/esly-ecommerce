// Forms Page Store Register
$('.formStoreRegister').on('submit', function(e) {

    var url = $(this).attr("action");

    e.preventDefault();

    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        // alert(response);
        // console.log(response);
        
        $("#alertsRegister").load( url + " #alertsRegister > *" );
        setTimeout( function(){ 
            $("#alertsRegister").load(  url + " #alertsRegister > *" ); 
        } , 1000);

    })

});

$("#btnSearchCep").on("click", function(e) {
        
    var cep = $("#inputCep").val();

    if(cep.length == 9)
    {
        cep = cep.replace("-", "");

        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                $("#inputStreet").val(dados.logradouro);
                $("#inputDistrict").val(dados.bairro);

                /*
                $.ajax({
                    url: "/admin/stores/search-city/",
                    method: "POST",
                    data: "city="+dados.localidade+"&nick="+dados.uf
                }).done(function(response){
                    $("#selectCity").val(response);
                    $('#selectCity').trigger('change');
                })
                */

            } 
            else {
                alert("CEP não encontrado.");
            }
        });
    }

});

// Forms Page Store Info
    
//Form Info Descrição
$('.formInfoDesc').on('submit', function(e) { 

    var url = $(this).attr("action");
    var store = $(this).data('store'); 

    e.preventDefault();
    
    var dados = $(this).serialize();

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        //alert(response);
        $("#alertsInfoDesc").load( "/admin/stores/"+ store +"/info/ #alertsInfoDesc > *" );
        setTimeout( function(){ 
            $("#alertsInfoDesc").load( "/admin/stores/"+ store +"/info/ #alertsInfoDesc > *" ); 
        } , 1000);

    })

});

// Modal Info Help
$('#modalInfoHelp').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget); 
    var title = button.data('title'); 
    var descripton = button.data('descripton'); 
    var modalTitle = button.data('modal-title'); 
    var id = button.data('id'); 
    var type = button.data('type'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formInfoHelp').attr("data-type", type);
    modal.find('.modal-body #formInfoHelp').attr("data-id", id);
    modal.find('.modal-body #inputTitleHelp').val(title);
    modal.find('.modal-body #inputDescHelp').val(descripton);
});

$('#modalInfoHelp').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Modal Info Help
$('.formInfoHelp').on('submit', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/help/";

    e.preventDefault();

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsInfoHelp").load( "/admin/stores/"+store+"/info/ #alertsInfoHelp > *" );
        setTimeout( function(){ 
            $("#alertsInfoHelp").load( "/admin/stores/"+store+"/info/ #alertsInfoHelp > *" ); 
        } , 1000);
        
        if(response == 1)
        {
            $("#dataInfoHelp").load( "/admin/stores/"+store+"/info/ #dataInfoHelp > *" );
        }

    })

});

// Button Delete Info Help
$('.btnDeleteInfoHelp').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/help/";

    dados = "type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsDeleteInfoHelp").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoHelp > *" );
        setTimeout( function(){ 

            $("#alertsDeleteInfoHelp").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoHelp > *" );
            
        } , 1500);

    });

});

// Modal Info Promo
$("#selectTypePromo").on('change', function(e){

    var val = $(this).val();

    $(".typesPromo").addClass("d-none");
    $("#typePromo" + val).removeClass("d-none");

});

$('#modalInfoPromo').on('show.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var idPromoType = button.data('id-type'); 
    var modalTitle = button.data('modal-title'); 
    var title = button.data('title'); 
    var description = button.data('description'); 
    var code = button.data('code'); 
    var value = button.data('value'); 
    var valueType = button.data('value-type'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formInfoPromo').attr("data-type", type);
    modal.find('.modal-body #formInfoPromo').attr("data-id", id);
    modal.find('.modal-body #selectTypePromo').val(idPromoType);
    modal.find('.modal-body #typePromo' + idPromoType).removeClass("d-none");
    modal.find('.modal-body #inputCuponPromo').val(code);
    modal.find('.modal-body #inputValueCuponPromo').val(value);
    modal.find('.modal-body #selectTypeCuponPromo').val(valueType);
    modal.find('.modal-body #inputInfoPromoFreight').val(value);
    modal.find('.modal-body #inputTitlePromo').val(title);
    modal.find('.modal-body #inputDescPromo').val(description);

});

$('#modalInfoPromo').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Modal Info Promotions
$('.formInfoPromo').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/promo/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        // alert(response);
        $("#alertsInfoPromo").load( "/admin/stores/"+store+"/info/ #alertsInfoPromo > *" );
        setTimeout( function(){ 
            $("#alertsInfoPromo").load( "/admin/stores/"+store+"/info/ #alertsInfoPromo > *" ); 
        } , 1000);
        
        if(response == 1)
        {
            $("#dataInfoPromo").load( "/admin/stores/"+store+"/info/ #dataInfoPromo > *" );
        }

    })

});

// Form Promotions Info Email
$('.formInfoEmailPromo').on('submit', function(e) { 

    e.preventDefault();
    
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/promo-email/";
    var dados = $(this).serialize();

    $("#overlayInfoPromo").removeClass("d-none");

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        
        let json = JSON.parse(response);

        console.log(json);

        msgTextAlert("#alertTextInfoPromo", json.msg, json.status, 1000);
        
        /*
        $("#alertsLayoutColor").load( "/admin/stores/"+store+"/layout/ #alertsLayoutColor > *");
        setTimeout( function(){ 
            $("#alertsLayoutColor").load( "/admin/stores/"+store+"/layout/ #alertsLayoutColor > *"); 
            window.location.reload();
        } , 1000);
        */
        
    }).always(function() {
        $("#overlayInfoPromo").addClass("d-none");
    });

});

// Button Delete Info Promotions
$('.btnDeleteInfoPromo').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/promo/";

    dados = "type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsDeleteInfoPromo").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoPromo > *" );
        setTimeout( function(){ 

            $("#alertsDeleteInfoPromo").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoPromo > *" );
            
        } , 1500);

    });

});

// Modal Info Partners
$('#modalInfoPartners').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var modalTitle = button.data('modal-title'); 
    var src = button.data('src'); 
    var arc = button.data('archive'); 
    var name = button.data('name'); 
    var link = button.data('link'); 
    var modal = $(this);
    link = link.substr(8);

    if(src == "") src = "/resources/imgs/logos/default.png";

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formInfoPartner').attr("data-type", type);
    modal.find('.modal-body #formInfoPartner').attr("data-id", id);
    modal.find('.modal-body #formInfoPartner').attr("data-archive", arc);
    modal.find('.modal-body #imgInfoPartner').attr("src", src);
    modal.find('.modal-body #inputNamePartner').val(name);
    modal.find('.modal-body #inputLinkPartner').val(link);

});

$('#modalInfoPartners').on('hide.bs.modal', function (e) {
    window.location.reload(true);
});

// Form Info Partner
$("#formInfoPartner").submit(function(e) {
    
    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var arc = $(this).attr("data-archive");
    var store = $(this).attr("data-store");

    var formData = new FormData(this);
    
    formData.append("id", id); 
    formData.append("type", type); 
    formData.append("arc", arc); 

    $.ajax({
        url: "/admin/stores/"+store+"/info/partner/",
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function(response){
        
        if(response != "")
        {
            var json = JSON.parse(response);

            if(json.name != "") {
                $("#imgInfoPartner").attr("src", json.file);
                $("#formInfoPartner").attr("data-archive", json.name);
            }    

        }
        $("#alertsInfoPartner").load( "/admin/stores/"+store+"/info/ #alertsInfoPartner > *" );
        setTimeout( function(){ 

            $("#alertsInfoPartner").load( "/admin/stores/"+store+"/info/ #alertsInfoPartner > *" );
            
        } , 1250);

    });

});

// Button Delete Info Partner
$('.btnDeleteInfoPartner').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var arc = $(this).attr("data-archive");
    var store = $(this).attr("data-store");

    var url = "/admin/stores/"+store+"/info/partner/";

    dados = "type=" + type + "&id=" + id + "&arc=" + arc;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){


        $("#alertsDeleteInfoPartner").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoPartner > *" );
        setTimeout( function(){ 

            $("#alertsDeleteInfoPartner").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoPartner > *" );
        
            if(response != "")
            {
                var json = JSON.parse(response);

                if(json.res == 1) {
                    window.location.reload();
                }    

            }
            
        } , 100);
    
    });

});

// Modal Info Social
$('#modalInfoSocial').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var idType = button.data('id-type'); 
    var modalTitle = button.data('modal-title'); 
    var link = button.data('link'); 
    var modal = $(this);
    link = link.substr(8);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formInfoSocial').attr("data-type", type);
    modal.find('.modal-body #formInfoSocial').attr("data-id", id);
    modal.find('.modal-body #selectSocialType').val(idType);
    modal.find('.modal-body #selectSocialType').trigger('change');
    modal.find('.modal-body #inputLinkSocial').val(link);

});

$('#modalInfoSocial').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Modal Info Help
$('.formInfoSocial').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/social/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsInfoSocial").load( "/admin/stores/"+store+"/info/ #alertsInfoSocial > *");
        setTimeout( function(){ 
            $("#alertsInfoSocial").load( "/admin/stores/"+store+"/info/ #alertsInfoSocial > *"); 
        } , 1000);
        
        if(response == 1)
        {
            $("#dataInfoSocial").load( "/admin/stores/"+store+"/info/ #dataInfoSocial > *");
        }

    })

});

// Button Delete Info Social
$('.btnDeleteInfoSocial').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/info/social/";

    dados = "type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsDeleteInfoSocial").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoSocial > *" );
        if(response == 1) $("#trInfoSocial"+id).html("");
        setTimeout( function(){ 
            $("#alertsDeleteInfoSocial").load( "/admin/stores/"+store+"/info/ #alertsDeleteInfoSocial > *" );
            if(response == 1)
            {
                window.location.reload();
            }
            
        } , 1000);


    });

});

// Modal Payment
$('#modalPayment').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var idType = button.data('id-type'); 
    var desc = button.data('desc'); 
    var modalTitle = button.data('modal-title'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formPayOption').attr("data-type", type);
    modal.find('.modal-body #formPayOption').attr("data-id", id);
    modal.find('.modal-body #selectPayOption').val(idType);
    modal.find('.modal-body #selectPayOption').trigger('change');
    modal.find('.modal-body #inputPayDesc').val(desc);

});

$('#modalPayment').on('hide.bs.modal', function (e) {
    window.location.reload();
});

// Form Modal Info Help
$('.formPayOption').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/payment/option/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsPayOption").load( "/admin/stores/"+store+"/payment/ #alertsPayOption > *");
        setTimeout( function(){ 
            $("#alertsPayOption").load( "/admin/stores/"+store+"/payment/ #alertsPayOption > *"); 
        } , 1000);

        if(response == 1)
        {
            $("#dataPayOption").load( "/admin/stores/"+store+"/payment/ #dataPayOption > *");
        }

    })

});

// Button Delete Payment Option
$('.btnDeletePayOption').on('click', function(e) { 

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/payment/option/";

    dados = "type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsDeletePayOption").load( "/admin/stores/"+store+"/payment/ #alertsDeletePayOption > *" );
        if(response == 1) $("#trPayOption"+id).html("");
        
        setTimeout( function(){ 
            $("#alertsDeletePayOption").load( "/admin/stores/"+store+"/payment/ #alertsDeletePayOption > *" );
        } , 1000);

    });

});

// Modal Layout Header
$('#modalHeaderDep').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var idType = button.data('id-type'); 
    var desc = button.data('desc'); 
    var dep = button.data('dep'); 
    var link = button.data('link'); 
    var status = button.data('status'); 
    var modalTitle = button.data('modal-title'); 
    var modal = $(this);
    link = link.substr(8);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formLayoutDep').attr("data-type", type);
    modal.find('.modal-body #formLayoutDep').attr("data-id", id);
    modal.find('.modal-body #selectTypeDep').val(idType);
    modal.find('.modal-body #selectTypeDep').trigger('change');
    modal.find('.modal-body #inputDescDep').val(desc);
    modal.find('.modal-body #selectDepHeader').val(dep);
    modal.find('.modal-body #selectDepHeader').trigger('change');
    modal.find('.modal-body #selectStatusDep').val(status);
    modal.find('.modal-body #selectStatusDep').trigger('change');
    modal.find('.modal-body #inputLinkDep').val(link);

});

$('#modalHeaderDep').on('hide.bs.modal', function (e) {
    window.location.reload();
});

$("#selectTypeDep").on('change', function(e){

    var val = $(this).val();

    $(".typesDep").addClass("d-none");
    $("#typeDep" + val).removeClass("d-none");

});

// Form Modal Layout Help
$('.formLayoutDep').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/layout/header/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsLayoutHeader").load( "/admin/stores/"+store+"/layout/ #alertsLayoutHeader > *");
        setTimeout( function(){ 
            $("#alertsLayoutHeader").load( "/admin/stores/"+store+"/layout/ #alertsLayoutHeader > *"); 
        } , 1000);

       if(response == 1)
        {
            $("#dataLayoutHeader").load( "/admin/stores/"+store+"/layout/ #dataLayoutHeader > *");
        }

    })

});

// Btns Layout Info
$('.btnsLayoutInfo').on('click', function(e) { 
    
    var ck = 0;

    if($(this).attr("checked") == 'checked')
    {
        $(this).removeAttr("checked")
    } else{
        $(this).attr("checked", "checked")
        ck = 1;
    }
    
    var ly = $(this).attr("data-ly");
    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/layout/info/";

    dados = "ly=" + ly + "&ck=" + ck + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsLayoutInfo").load( "/admin/stores/"+store+"/layout/ #alertsLayoutInfo > *");
        setTimeout( function(){ 
            $("#alertsLayoutInfo").load( "/admin/stores/"+store+"/layout/ #alertsLayoutInfo > *"); 
        } , 750);

    })

});

// Btns Layout Footer
$('.btnsLayoutFooter').on('click', function(e) { 
    
    var ck = 0;

    if($(this).attr("checked") == 'checked')
    {
        $(this).removeAttr("checked")
    } else{
        $(this).attr("checked", "checked")
        ck = 1;
    }
    
    var ly = $(this).attr("data-ly");
    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/layout/footer/";

    dados = "ly=" + ly + "&ck=" + ck + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsLayoutFooter").load( "/admin/stores/"+store+"/layout/ #alertsLayoutFooter > *");
        setTimeout( function(){ 
            $("#alertsLayoutFooter").load( "/admin/stores/"+store+"/layout/ #alertsLayoutFooter > *"); 
        } , 750);

    })

});

// Form Modal Layout Help
$('.formLayoutColor').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/layout/color/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsLayoutColor").load( "/admin/stores/"+store+"/layout/ #alertsLayoutColor > *");
        setTimeout( function(){ 
            $("#alertsLayoutColor").load( "/admin/stores/"+store+"/layout/ #alertsLayoutColor > *"); 
            window.location.reload();
        } , 1000);

    })

});

$('#selectThemeColor').on("change", function(e){

    let store = $(this).attr("data-store");

    if($(this).val() == 0)
    {
        $(".detailsLayoutColor").attr("open", "true");
    }

    $(".detailsLayoutColor").load( "/admin/stores/"+store+"/layout/?themeColor="+$(this).val()+" .detailsLayoutColor > *");
    $(".iconThemeColor").load( "/admin/stores/"+store+"/layout/?themeColor="+$(this).val()+" .iconThemeColor > *");

});

// Modal Layout Header
$('#modalFreigth').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var modalTitle = button.data('modal-title'); 
    var district = button.data('district'); 
    var city = button.data('city'); 
    var cep = button.data('cep'); 
    var details = button.data('details'); 
    var only = button.data('only'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formFreight').attr("data-type", type);
    modal.find('.modal-body #formFreight').attr("data-id", id);
    modal.find('.modal-body #inputFreightDistrict').val(district);
    modal.find('.modal-body #selectFreightCity').val(city);
    modal.find('.modal-body #selectFreightCity').trigger('change');
    modal.find('.modal-body #inputFreightCep').val(cep);
    
    if(type == 1 || type == 2)
    {
        modal.find('.modal-body #selectFreightStatus0').val(details[0].status);
        modal.find('.modal-body #selectFreightStatus0').trigger('change');
        modal.find('.modal-body #inputFreightValue0').val(details[0].value);
        modal.find('.modal-body #selectFreightStatus1').val(details[1].status);
        modal.find('.modal-body #selectFreightStatus1').trigger('change');
        modal.find('.modal-body #inputFreightValue1').val(details[1].value);
    }

    if(only == 1)
    {
        modal.find('.modal-body #inputFreightCity').attr("checked", "checked");
    }

});

$('#modalFreigth').on('hide.bs.modal', function (e) {
    window.location.reload();
});

$("#selectFreightType").on("change", function (e) {

    var val = $(this).val();

    $(".FreightTypes").addClass("d-none");
    $("#groupFreightStatus" + val).removeClass("d-none");
    $("#groupFreightValue" + val).removeClass("d-none");

});

// Form Modal Freight
$('.formFreight').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/freight/freight/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsFreight").load( "/admin/stores/"+store+"/freight/ #alertsFreight > *");
        setTimeout( function(){ 
            $("#alertsFreight").load( "/admin/stores/"+store+"/freight/ #alertsFreight > *"); 
        } , 1000);
        
        if(response == 1)
        {
            $("#dataFreight").load( "/admin/stores/"+store+"/freight/ #dataFreight > *");
        }

    })

});

// Btn Delete Freight
$('.btnDeleteFreight').on('click', function(e) { 
    
    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/freight/freight/";

    dados = "type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsDeleteFreight").load( "/admin/stores/"+store+"/freight/ #alertsDeleteFreight > *");
        setTimeout( function(){ 
            $("#alertsDeleteFreight").load( "/admin/stores/"+store+"/freight/ #alertsDeleteFreight > *"); 
            if(response == 1)
            {
                $("#trFreight"+id).html("");
            }
        } , 750);

    })

});

// Search Cep
$("#inputFreightCep").on('change', function(e) {
    
    var cep = $(this).val();

    if(cep.length == 9)
    {
        cep = cep.replace("-", "");

        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                $("#inputFreightDistrict").val(dados.bairro);

            } 
            else {
                alert("CEP não encontrado.");
            }
        });
    }
});

// Modal Horary
$('#modalHorary').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var id = button.data('id'); 
    var modalTitle = button.data('modal-title'); 
    var day = button.data('day'); 
    var idDay = button.data('id-day'); 
    var details = button.data('details'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formHorary').attr("data-type", type);
    modal.find('.modal-body #formHorary').attr("data-id", id);
    modal.find('.modal-body #formHorary').attr("data-day", idDay);
    modal.find('.modal-body #textHoraryDay').text(day);
    //modal.find('.modal-body #inputFreightDistrict').val(district);
    
    if(type >= 1 && type <= 3)
    {
        modal.find('.modal-body #inputHoraryInit0').val(details[0].init);
        modal.find('.modal-body #inputHoraryFinal0').val(details[0].final);
        modal.find('.modal-body #inputHoraryValue0').val(details[0].value);
        modal.find('.modal-body #inputHoraryInit1').val(details[1].init);
        modal.find('.modal-body #inputHoraryFinal1').val(details[1].final);
        modal.find('.modal-body #inputHoraryValue1').val(details[1].value);
    }

    if(type == 2 || type == 3)
    {
        modal.find('.modal-body .typesHorary').removeClass('d-none');
    } else{
        modal.find('.modal-body .typesHorary').addClass('d-none');
    }

});

// Form Modal Horary
$('.formHorary').on('submit', function(e) { 

    e.preventDefault();

    var types = { 1 : "Horary", 2 : "Delivery", 3 : "Withdrawal"};
    var id = $(this).attr("data-id");
    var day = $(this).attr("data-day");
    var type = $(this).attr("data-type");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/horary/horary/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id + "&day=" + day;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsHorary").load( "/admin/stores/"+store+"/horary/ #alertsHorary > *");
        setTimeout( function(){ 
            $("#alertsHorary").load( "/admin/stores/"+store+"/horary/ #alertsHorary > *"); 
        } , 1000);

        if(response == 1)
        {
            $("#data"+ types[type]).load( "/admin/stores/"+store+"/horary/ #data"+types[type]+" > *");
        }

    })

});

// Modal Images
$('#modalImages').on('show.bs.modal', function (e) {
        
    var button = $(e.relatedTarget); 
    var type = button.data('type'); 
    var modalTitle = button.data('modal-title'); 
    var src = button.data('src'); 
    var origin = button.data('origin'); 
    var file = button.data('file'); 
    var name = button.data('name'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formImages').attr("data-type", type);
    modal.find('.modal-body #formImages').attr("data-origin", origin);
    modal.find('.modal-body #formImages').attr("data-file", file);
    modal.find('.modal-body #imageFormImgs').attr("src", src);
    modal.find('.modal-body #textFormImgs').text(name);
    //modal.find('.modal-body #inputFreightDistrict').val(district);
    
});

$('#modalImages').on('hide.bs.modal', function (e) {
    location.reload(true)
});

// Form Images
$("#formImages").submit(function(e) {
    
    e.preventDefault();

    var type = $(this).attr("data-type");
    var origin = $(this).attr("data-origin");
    var file = $(this).attr("data-file");
    var store = $(this).attr("data-store");

    var formData = new FormData(this);
    
    formData.append("origin", origin); 
    formData.append("type", type); 
    formData.append("file", file); 

    $.ajax({
        url: "/admin/stores/"+store+"/images/images/",
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function(response){
        
        if(response != "")
        {
            var json = JSON.parse(response);
            d = new Date();

            if(json.src != "" && json.res == 1) {
                
                $("#imageFormImgs").attr("src", json.src+d.getTime());

            }    

        }

        $("#alertsImages").load( "/admin/stores/"+store+"/images/ #alertsImages > *" );
        setTimeout( function(){ 

            $("#alertsImages").load( "/admin/stores/"+store+"/images/ #alertsImages > *" );
            
        } , 1000);

    });

});

// Btn Delete Images
$('.btnDeleteImages').on('click', function(e) { 
    
    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var origin = $(this).attr("data-origin");
    var store = $(this).attr("data-store");
    var url = "/admin/stores/"+store+"/images/images/";

    dados = "type=" + type + "&id=" + id + "&origin=" + origin;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        $("#alertsDeleteImages").load( "/admin/stores/"+store+"/images/ #alertsDeleteImages > *");
        setTimeout( function(){ 
            $("#alertsDeleteImages").load( "/admin/stores/"+store+"/images/ #alertsDeleteImages > *"); 
            if(response != "")
            {
                var json = JSON.parse(response);
                if(json.res == 1) {
                    $("#colImgsPromo"+id).html("");
                    window.location.reload(true);
                }    
            }
        } , 750);

    })

});

// Modal Products Config
$('#modalProductsConfig').on('show.bs.modal', function (e) {
        
    let button = $(e.relatedTarget); 
    let type = button.data('type'); 
    let id = button.data('id'); 
    let store = button.data('store'); 
    let src = button.data('src'); 
    let name = button.data('name'); 
    let unit = button.data('unit'); 
    let qtd = button.data('qtd'); 
    let price = button.data('price'); 
    let free = button.data('free'); 
    let modal = $(this);

    if(src == "" || src == undefined) src = "/resources/imgs/logos/default.png";

    modal.find('.modal-title .modal-subtitle').text(`#${id} ${name}`);
    modal.find('#formModalProductConfig').attr("data-type", type);
    modal.find('#formModalProductConfig').attr("data-id", id);
    modal.find('#formModalProductConfig').attr("data-archive", src);
    modal.find('#formModalProductConfig').attr("data-store", store);
    modal.find('#formModalProductConfig').attr("data-unit", 0);
    modal.find('#formModalProductConfig #imgProductLogo').attr("src", src);
    modal.find('#formModalProductConfig #inputUnitProduct').val(unit);
    modal.find('#formModalProductConfig #inputValueStockProduct').val(qtd);
    modal.find('#formModalProductConfig #inputPriceProduct').val(price);
    modal.find('#formModalProductConfig #inputPriceProduct').attr('data-number', price);

    if(free == 1) modal.find('#formModalProductConfig #freeFillProduct').attr('checked', true);

    if(unit != undefined) $("#listModalProductsConfigUnits").load( `/admin/stores/${store}/products/?cod=${id} #listModalProductsConfigUnits > *`, );

});

$('#modalProductsConfig').on('hide.bs.modal', function (e) {
    location.reload();
});

// Form Search List Products
$("#formSearchListProducts").submit(function(e){

    e.preventDefault();

    let store = $(this).attr("data-store");
    let option = $(this.children[0]).val();
    let search = $(this.children[1]).val();
    search = search.replace(" ", "%20");
    
    if(store !== undefined && option !== undefined && search !== undefined) $("#tbListProductsConfig").load( `/admin/stores/${store}/products/?option=${option}&s=${search} #tbListProductsConfig > *`);

});

// Form Modal Products Config
$("#formModalProductConfig").submit(function(e) {
    
    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var arc = $(this).attr("data-archive");
    var code = $(this).attr("data-unit");
    var store = $(this).attr("data-store");

    var formData = new FormData(this);
    
    formData.append("id", id); 
    formData.append("type", type); 
    formData.append("arc", arc); 
    formData.append("code", code); 
    
    $('#overlayModalProductConfig').removeClass('d-none');

    $.ajax({
        url: `/admin/stores/${store}/products/config/`,
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    }).done(function(response){
        
        let json = JSON.parse(response);
        
        if(json !== undefined)
        {

            if(type == 1 && json.src !== undefined && json.status == 1)
            {
            
                $("#tbListOrders").load( "/admin/stores/"+store+"/products/ #tbListOrders > *" );
                $("#modalProductsConfig #imgProductLogo").attr('src', json.src);
                $(this).attr('data-archive', json.src);
            
            } else if(type == 2 && json.status == 1){
                
                $("#listModalProductsConfigUnits").load( `/admin/stores/${store}/products/?cod=${id} #listModalProductsConfigUnits > *` );
                if(json.code !== undefined && json.code == 3) $("#listUnit0").click();

            }

            msgAlert("#alertModalProductConfigImg", json.msg, json.status, 1500);
        } 

    }).always(function(){
        $('#overlayModalProductConfig').addClass('d-none');
    });

    $('#overlayModalProductConfig').addClass('d-none');

});

$(".btnTypeModalProductsConfig").on('click', function(e){
    
    let code = $(this).attr('data-code') !== undefined ? $(this).attr('data-code') : 0;
    
    $("#formModalProductConfig").attr('data-type', code);

    if(code != 2) $("#formModalProductConfig").attr('data-unit', 0);

});

$(document).on('click', '.btnMeasureProduct', function(){
    
    let code = $(this).attr("data-id") !== undefined && $.isNumeric($(this).attr("data-id")) ? $(this).attr("data-id") : 0;
    let id = $(this).attr("data-code") !== undefined && $.isNumeric($(this).attr("data-code")) ? $(this).attr("data-code") : 0;
    let json = { 1:"1_0", 2:`2_${id}`, 3:`3_${id}` };

    if(code >= 1 && code <= 3)
    {
        $("#formModalProductConfig").attr('data-unit', json[code]);
        $("#formModalProductConfig").submit();
    }

});


$(document).on('click', '.btnListUnitProductsConfig', function(){

    let id = $(this).attr('data-id');
    let name = $(this).attr('data-name');
    let stock = $(this).attr('data-stock');
    let price = $(this).attr('data-price');
    let freeFill = $(this).attr('data-free-fill');
    let autoUp = $(this).attr('data-auto-up');

    if(id >= 1)
    {
        $("#modalProductsConfig #inputUnitProduct").removeAttr('readonly');
        $("#modalProductsConfig #inputValueStockProduct").removeAttr('readonly');
        $("#modalProductsConfig #inputPriceProduct").removeAttr('readonly');
        $("#modalProductsConfig #divFreeFillProduct").addClass('d-none');
        $("#modalProductsConfig #divAutomaticUpdateProduct").removeClass('d-none');
    } else {
        $("#modalProductsConfig #inputUnitProduct").attr('readonly', true);
        $("#modalProductsConfig #inputValueStockProduct").attr('readonly', true);
        $("#modalProductsConfig #inputPriceProduct").attr('readonly', true);
        $("#modalProductsConfig #divFreeFillProduct").removeClass('d-none');
        $("#modalProductsConfig #divAutomaticUpdateProduct").addClass('d-none');
    }

    $("#modalProductsConfig #inputUnitProduct").val(name);
    $("#modalProductsConfig #inputValueStockProduct").val(stock);
    $("#modalProductsConfig #inputPriceProduct").val(price);
    $("#modalProductsConfig #btnUpdateUnitProduct").attr("data-code", id);

    if(freeFill == 1)
    {
        $("#modalProductsConfig #freeFillProduct").attr('checked', true);
    } else {
        $("#modalProductsConfig #freeFillProduct").removeAttr('checked');
    }

    if(autoUp == 1)
    {
        $("#modalProductsConfig #automaticUpdateProduct").attr('checked', true);
    } else {
        $("#modalProductsConfig #automaticUpdateProduct").removeAttr('checked');
    }

});

$("#inputValueStockProduct").on('input', function(e){
    
    let number = $("#inputPriceProduct").attr('data-number');
    let price = number !== undefined && $.isNumeric(number) ? parseFloat(number) : 0;
    let value = $(this).val();

    if(value !== undefined && $.isNumeric(value)) 
    {
        $("#inputPriceProduct").val(parseFloat(price*value));
    }

})