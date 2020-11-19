<?php if(!class_exists('Rain\Tpl')){exit;}?><script>

    var type = '<?php if( $order != 0 ){ ?> <?php echo htmlspecialchars( $order["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';
    var freigth = '<?php if( $order != 0 ){ ?> <?php echo htmlspecialchars( $order["freigth"]["type"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';
    var address = '<?php if( $order != 0 && $order["address"] != 0 ){ ?> <?php echo htmlspecialchars( $order["address"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';
    var horary = '<?php if( $order != 0 && $order["horary"] != 0 ){ ?> <?php echo htmlspecialchars( $order["horary"]["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';
    var time = '<?php if( $order != 0 && $order["horary"] != 0 ){ ?> <?php echo htmlspecialchars( $order["horary"]["time"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';
    var pay = '<?php if( $order != 0 && $order["payment"] != 0 ){ ?> <?php echo htmlspecialchars( $order["payment"]["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';
    var value = '<?php if( $order != 0 && $order["payment"] != 0 ){ ?> <?php echo htmlspecialchars( $order["payment"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?> <?php }else{ ?> 0 <?php } ?>';

    if(type == 1)
    {
        freigth = ("#divFreigth"+freigth).replace(/ /gi, "");
        $("#divDelivery").click();
        $(freigth).click();

    } 
    
    if(address != 0)
    {
        add = ("#divAddress"+address).replace(/ /gi, "");
        $(add).click();
    }

    if(horary != 0 && time != 0)
    {
        hr = ("#divHorary"+horary+"-"+time).replace(/ /gi, "");
        $(hr).click();
    }

    if(pay != 0)
    {
        pay = ("#divPay"+pay).replace(/ /gi, "");
        $(pay).click();
    }

    if(value > 0)
    {
        $("#inputMoney").val('<?php if( $order != 0 && $order["payment"] != 0 ){ ?><?php echo maskPrice($order["payment"]["value"]); ?><?php }else{ ?>0<?php } ?>');
    }

</script>