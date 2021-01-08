<?php if(!class_exists('Rain\Tpl')){exit;}?><style>

    @media (min-width: 0px)
    {

        .img-LogoIni
        { 
            background: url("");
            text-align: center;
        }

    }

    @media (min-width: 992px)
    {
        .img-LogoIni
        { 
            background: url("..<?php echo htmlspecialchars( $imgs["1"]["src"], ENT_COMPAT, 'UTF-8', FALSE ); ?>");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            text-align: left;
        }
    }

    .btn-app>.badge{
        font-size: 10px;
        font-weight: 400;
        position: absolute;
        right: -10px;
        top: -3px;
    }

    /* HEADER */
    .bg-site-header{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON MAIN HEADER */
    .btn-main-site-header{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-main-site-header:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
    }

    .btn-outline-main-site-header{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-outline-main-site-header:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON DEP HEADER */
    .btndep-site-header{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["btndep"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btndep-site-header:hover{
        box-shadow: 0 0 0.4em grey, 100vw 100vw 100vw rgb(0, 0, 0, 0.1) inset;
    }

    /* DROPDOWN DEP HEADER */
    .text-dep-site-header, .text-dep-site-header:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .dropdown-menu > li a:hover,
    .dropdown-menu > li.show {
        background: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .dropdown-menu > li.show > a{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }
    
    /* TEXT MAIN HEADER */
    .text-main-site-header, .text-main-site-header:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* TEXT HEADER */
    .text-site-header, .text-site-header:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    a.text-site-header:hover{
        filter: brightness(85%); 
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["hd"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* SECTION */
   
    /* BG SECTION */
    .bg-site-section{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* TEXT MAIN SECTION */
    .text-main-site-section, a.text-main-site-section:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .text-main-site-section:hover{
        filter: brightness(85%); 
    }

    /* TEXT SECOND SECTION */
    .text-second-site-section, .text-second-site-section:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["txsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .text-second-site-section:hover{
        filter: brightness(85%); 
    }

    /* TEXT LINK SECTION */
    .text-link-site-section, .text-link-site-section:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["txlk"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    a.text-link-site-section:hover{
        filter: brightness(85%); 
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["txlk"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON MAIN SECTION */
    .btn-main-site-section{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-main-site-section:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
    }

    .btn-outline-main-site-section{
        border: 1px solid <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-outline-main-site-section:hover{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["txbtn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON SECOND SECTION */
    .btn-second-site-section{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-second-site-section:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
    }

    .btn-outline-second-site-section{
        border: 1px solid <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-outline-second-site-section:hover{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["txbtn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON CART SECTION */
    .btn-cart-site-section{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["btncr"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-cart-site-section:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
    }

    /* TEXT BUTTONS SECTION */
    .text-btn-site-section, .text-btn-site-section:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["sc"]["options"]["txbtn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* FOOTER SOCIAL */
   
    /* BG FOOTER SOCIAL */
    .bg-site-footer-social{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ftsc"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* TEXT FOOTER SOCIAL */
    .text-site-footer-social, .text-site-footer-social:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ftsc"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    a.text-site-footer-social:hover{
        filter: brightness(85%); 
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ftsc"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* FOOTER MAIN */
   
    /* BG FOOTER MAIN */
    .bg-site-footer-main{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* TEXT FOOTER MAIN */
    .text-site-footer-main, .text-site-footer-main:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    a.text-site-footer-main:hover{
        filter: brightness(85%); 
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON MAIN FOOTER MAIN */
    .btn-main-site-footer-main{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-main-site-footer-main:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
    }

    .btn-outline-main-site-footer-main{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-outline-main-site-footer-main:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["btn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* BUTTON SECOND FOOTER MAIN */
    .btn-second-site-footer-main{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-second-site-footer-main:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
    }

    .btn-outline-second-site-footer-main{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    .btn-outline-second-site-footer-main:hover{
        box-shadow: 100vw 100vw 100vw rgb(0, 0, 0, 0.15) inset;
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["btnsec"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* TEXT BUTTONS FOOTER MAIN */
    .text-btn-site-footer-main, .text-btn-site-footer-main:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ft"]["options"]["txbtn"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* FOOTER COPY */
   
    /* BG FOOTER COPY */
    .bg-site-footer-copy{
        background-color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ftcp"]["options"]["bck"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    /* TEXT FOOTER COPY */
    .text-site-footer-copy, .text-site-footer-copy:hover{
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ftcp"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

    a.text-site-footer-copy:hover{
        filter: brightness(85%); 
        color: <?php echo htmlspecialchars( $layoutColor["0"]["options"]["ftcp"]["options"]["tx"]["value"], ENT_COMPAT, 'UTF-8', FALSE ); ?>;
    }

</style>