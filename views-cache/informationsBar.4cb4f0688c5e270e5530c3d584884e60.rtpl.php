<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="myBarnav" class="shadow cart-BtnFloat">
		
    <nav id="menu-site">
        
        <div class="backdrop"></div>
        <div class="menu-info border px-2">
            
            <div class="text-right">
                <a class="close-menu h4 cursorPointer"><i class="fas fa-times text-second-site-section"></i></a>
            </div>
            
            <?php require $this->checkTemplate("informationsLinks");?>
        </div>

    </nav>

</div>