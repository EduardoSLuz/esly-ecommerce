// Atualizar Services Constantemente
setInterval(function() {

    refreshServices();
    console.log("Service: Refresh List Products");

}, 60000);

setInterval(function() {

    refreshServices(1);

}, 10000);

function refreshServices(type = 0)
{

    $.ajax({
        url: "/master/services/",
        method: "POST",
        data: "id=MGJVMDRjZEN4SC82NUpJb1JxM042Zz09&type="+type
    }).done(function(response){
    })

}
