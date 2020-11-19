<?php if(!class_exists('Rain\Tpl')){exit;}?><script>

    $('#filterProduct').val("<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?>");

    $('.subSearch').on('submit', function(e) {

        var url = $(this).attr("action");
        var sub = this.searchSub.value;

        e.preventDefault();

        window.location.href = url + '?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&subs='+sub+'<?php if( !empty($dep["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>';

    });

    $('.filterPrice').on('submit', function(e) {

        var url = $(this).attr("action");
        var min = this.minPrice.value;
        var max = this.maxPrice.value;

        e.preventDefault();

        window.location.href = url + '?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["subs"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&min='+min+'&max='+max;

    });

    $('#filterProduct').on("change", function(e) {

        var val = $(this).val();
        var param = "&order="+val;

        if(val == 0){
            param = "";
        }

        window.location.href = '/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/?'+param+'<?php if( $dep["subs"] != 0 ){ ?>&subs=<?php echo htmlspecialchars( $dep["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>';

    });

    $('.closeSubs').on("click", function(e) {
        window.location.href = '/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/departaments/<?php echo htmlspecialchars( $dep["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>-<?php echo htmlspecialchars( $dep["cat"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/?<?php if( $dep["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $dep["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($dep["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $dep["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $dep["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $dep["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $dep["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>';
    });

</script>