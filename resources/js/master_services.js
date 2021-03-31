// Atualizar Services Constantemente
setInterval(function() {

    //refreshServices();

}, 60000);

setInterval(function() {

    //refreshServices(1);

}, 10000);

function refreshServices(type = 0)
{

    $.ajax({
        url: "/master/services/",
        method: "POST",
        data: "id=MGJVMDRjZEN4SC82NUpJb1JxM042Zz09&type="+type
    }).done(function(response){
        
        if(response != 0 && response != "" && isJson(response))
        {
            let json = JSON.parse(response);
            
            console.log(`Servidor: ${json.msg}`);

        }
         
    }).fail(function(response) {
        console.log("ERRO CRÍTICO!");
    })

}
