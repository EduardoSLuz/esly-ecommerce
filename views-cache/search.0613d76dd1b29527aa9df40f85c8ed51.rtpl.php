<?php if(!class_exists('Rain\Tpl')){exit;}?><script>
    
    $('#filterProduct').val("<?php echo htmlspecialchars( $search["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?>");

    $('.subSearch').on('submit', function(e) {

        var url = $(this).attr("action");
        var sub = this.searchSub.value;

        e.preventDefault();

        window.location.href = url + '?s=<?php echo htmlspecialchars( $search["s"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $search["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $search["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&subs='+sub+'<?php if( !empty($search["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $search["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $search["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $search["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>';

    });

    $('.filterPrice').on('submit', function(e) {

        var url = $(this).attr("action");
        var min = this.minPrice.value;
        var max = this.maxPrice.value;

        e.preventDefault();

        window.location.href = url + '?s=<?php echo htmlspecialchars( $search["s"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $search["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $search["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($search["subs"]) ){ ?>&mark=<?php echo htmlspecialchars( $search["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($search["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $search["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>&min='+min+'&max='+max;

    });

    $('#filterProduct').on("change", function(e) {

        var val = $(this).val();
        var param = "&order="+val;

        if(val == 0){
            param = "";
        }

        window.location.href = '/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/?s=<?php echo htmlspecialchars( $search["s"], ENT_COMPAT, 'UTF-8', FALSE ); ?>'+param+'<?php if( $search["subs"] != 0 ){ ?>&subs=<?php echo htmlspecialchars( $search["subs"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($search["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $search["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $search["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $search["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["page"] > 1 ){ ?>&page=<?php echo htmlspecialchars( $search["page"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>';

    });

    $('.closeSubs').on("click", function(e) {
        window.location.href = '/loja-<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>/search/?s=<?php echo htmlspecialchars( $search["s"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php if( $search["or"] != 0 ){ ?>&order=<?php echo htmlspecialchars( $search["or"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( !empty($search["mark"]) ){ ?>&mark=<?php echo htmlspecialchars( $search["mark"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?><?php if( $search["filter"] != 0 ){ ?>&min=<?php echo htmlspecialchars( $search["filter"]["min"], ENT_COMPAT, 'UTF-8', FALSE ); ?>&max=<?php echo htmlspecialchars( $search["filter"]["max"], ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>';
    });
    
</script>