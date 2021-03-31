// WINDOW ON LOAD
$( window ).on( "load", function() {
    if($("#formListUsers").length) {
        $("#formListUsers").submit();
    }
});

// Form List Users
$('.formListUsers').on('submit', function(e) { 

    e.preventDefault();

    var type = $(this.children[0]).val();
    var status = $(this.children[1]).val();
    var name = $(this.children[2]).val();
    name = name.replace(" ", "%20");
    var url = "/admin/users/?type="+type+"&status="+status+"&desc="+name;

    $("#tbListUsers").load( url +  " #tbListUsers > *");
    
});

$(".inputsListUser").on("change input", function(e){
   
    $("#formListUsers").submit();

});

// Form Modal User Address
$('.formUserDetails').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var url = "/admin/users/"+id+"/details/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){

        if(JSON.parse(response) !== undefined)
        {
            let json = JSON.parse(response);
            
            msgAlert("#alertsUserDetails", json.msg, json.status, 1000);
        
        }

    })

});

// Modal User Address
$('#modalUserAddress').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget); 
    var modalTitle = button.data('modal-title'); 
    var id = button.data('id'); 
    var idUser = button.data('user'); 
    var type = button.data('type'); 
    var city = button.data('city'); 
    var cep = button.data('cep'); 
    var district = button.data('district'); 
    var street = button.data('street'); 
    var number = button.data('number'); 
    var complement = button.data('complement'); 
    var modal = $(this);

    modal.find('.modal-title').text(modalTitle);
    modal.find('.modal-body #formUserAddress').attr("data-type", type);
    modal.find('.modal-body #formUserAddress').attr("data-id", id);
    modal.find('.modal-body #formUserAddress').attr("data-user", idUser);
    modal.find('.modal-body #inputUserAddressCep').val(cep);
    modal.find('.modal-body #inputUserAddressCity').val(city);
    modal.find('.modal-body #inputUserAddressDistrict').val(district);
    modal.find('.modal-body #inputUserAddressStreet').val(street);
    modal.find('.modal-body #inputUserAddressNumber').val(number);
    modal.find('.modal-body #inputUserAddressComplement').val(complement);
});

// Form Modal User Address
$('.formUserAddress').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var idUser = $(this).attr("data-user");
    var type = $(this).attr("data-type");
    var url = "/admin/users/"+idUser+"/address/";

    var dados = $(this).serialize();
    dados = dados + "&type=" + type + "&id=" + id;

    $.ajax({
        url: url,
        method: "POST",
        data: dados
    }).done(function(response){
        
        if(JSON.parse(response) !== undefined)
        {
            let json = JSON.parse(response);
            
            msgAlert("#alertModalAddress", json.msg, json.status, 1000);

            if(json.status == 1)
            {
                setTimeout( function(){ 
                    $("#tbUsersAddress").load( "/admin/users/"+idUser+"/ #tbUsersAddress > *");
                } , 1000);
            }
        
        }

    })

});

// Form Orders User
$('.formOrdersUser').on('submit', function(e) { 

    e.preventDefault();

    var id = $(this).attr("data-id");
    var store = $(this.children[0]).val();
    var status = $(this.children[1]).val();
    var dateIni = $(this.children[2]).val();
    var dateFin = $(this.children[3]).val();
    var url = "/admin/users/"+id+"/?store="+store+"&status="+status+"&ini="+dateIni+"&fin="+dateFin;
    
    $("#tbOrdersUsers").load( url +  " #tbOrdersUsers > *"); 

});

$(".inputsOrdersUser").on("change input", function(e){
   
    $("#formOrdersUser").submit();

});