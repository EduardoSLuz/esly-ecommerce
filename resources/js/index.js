    var SizeDesktop = window.matchMedia("(min-width: 992px)");
	var SizeMobile = window.matchMedia("(max-width: 991px)");

// Sidenav 
/* Set the width of the side navigation to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "325px";
    $('#BtnWhatsapp').addClass("d-none");		
    $('#BtnCart').addClass("d-none");		
    $('#BtnFilter').addClass("d-none");		

}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    $('#BtnWhatsapp').removeClass("d-none");		
    $('#BtnCart').removeClass("d-none");		
    $('#BtnFilter').removeClass("d-none");		

} 
    
function showCart(IdCard, MySubCard, CardPr){
    
    if (SizeMobile.matches){
        document.getElementById(CardPr).style.border = "solid 1px grey";
    }
    else{
        document.getElementById(CardPr).style.borderColor = "grey";
        document.getElementById(CardPr).style.borderBottomLeftRadius = "20px";
        document.getElementById(CardPr).style.borderBottomRightRadius = "20px";
    }
    document.getElementById(IdCard).style.display = "block";

}

function hideCart(IdCard, MySubCard, CardPr, InputCard = 1){
    var Item = parseInt(document.getElementById(InputCard).value, 10);		
    
    if (SizeDesktop.matches){
        document.getElementById(IdCard).style.display = "none";
        document.getElementById(CardPr).style.border = "solid 1px lightgray";
        document.getElementById(CardPr).style.borderBottomLeftRadius = "5px";
        document.getElementById(CardPr).style.borderBottomRightRadius = "5px";
    }
    
    else{
        document.getElementById(IdCard).style.display = "block";
        document.getElementById(CardPr).style.border = "none";
        document.getElementById(CardPr).style.borderBottomLeftRadius = "20px";
        document.getElementById(CardPr).style.borderBottomRightRadius = "20px";
    }
    
    if(Item < 1 || !parseInt(Item)){
        document.getElementById(InputCard).value = 1;
    }
}

function alterPriceItem(cardPriceInt, cardPriceDec, newPriceInt, newPriceDec){
    document.getElementById(cardPriceInt).innerHTML = newPriceInt;
    document.getElementById(cardPriceDec).innerHTML = "," + newPriceDec;
}

function addItem(InputCard){
    var Item = parseInt(document.getElementById(InputCard).value, 10);
    
    if(Item <= 0 || !parseInt(Item)){
        Item = 1;
    }
    else{
        Item = Item + 1;
    }
    
    document.getElementById(InputCard).value = Item;
}

function removeItem(InputCard){
    var Item = parseInt(document.getElementById(InputCard).value, 10);
    
    if(Item > 1){
        Item = Item - 1;
    }
        
    document.getElementById(InputCard).value = Item;
}

function ShowHideBarMobile(){
    var Bar = document.getElementById("BarMobile");
    var Menu = document.getElementById("MenuMobile");

    if(Bar.style.display == "block"){
        Bar.style.display = "none";
        //Menu.innerHTML = "<i class='fas fa-bars'></i>";
        Menu.classList.remove("fa-times");
        Menu.classList.add("fa-bars");
    }
    else{
        Bar.style.display = "block";
        //Menu.innerHTML = "<i class='fas fa-times'></i>";
        Menu.classList.remove("fa-bars");
        Menu.classList.add("fa-times");
    }
}

function ShowHideSubBarMobile(BarMb, MenuMb){ // 'show', 'fa-chevron-down', 'fa-chevron-up'
    var Bar = document.getElementById(BarMb);
    var Menu = document.getElementById(MenuMb);

    if(Bar.classList.contains("show")){
        Menu.classList.remove("fa-chevron-up");
        Menu.classList.add("fa-chevron-down");
    }
    else{
        Menu.classList.remove("fa-chevron-down");
        Menu.classList.add("fa-chevron-up");
    }
}

function AlterNavbar(NavbarOne, NavbarTwo){

    document.getElementById(NavbarOne).style.display="none";
    document.getElementById(NavbarTwo).style.display="block";

}

function AlterDisplay(DivOne, DivTwo){

    $('#'+DivOne).removeClass("d-none");
    $('#'+DivTwo).addClass("d-none");

}

function AlterTypeInput(input, icon, classIconOne, classIconTwo){

    var input = document.getElementById(input);
    var icon = document.getElementById(icon);

    if(input.type == "password"){
        input.type = "text";
        icon.innerHTML = "<i class='"+ classIconTwo +"'></i>";
    } else{
        input.type = "password";
        icon.innerHTML = "<i class='"+ classIconOne +"'></i>";
    }
}

function SelectBtnEn_Rt(BtnOne, BtnTwo){

    $('#'+BtnOne).removeClass("text-secondary");
    $('#'+BtnOne).addClass("text-white");
    $('.'+BtnOne).addClass("border-dark");
    
    $('#'+BtnTwo).addClass("text-secondary");
    $('#'+BtnTwo).removeClass("text-white");
    $('#'+BtnTwo).removeClass("active");
    $('.'+BtnTwo).removeClass("border-dark");
}

function SelectBtnRadios(CkPrime, CkClass, BtnClass = 0, ClassOne = 0){
    if(ClassOne != 0){
        $('.'+CkClass).removeClass(ClassOne);
        $('#'+CkPrime).addClass(ClassOne);  
    }

    if(BtnClass != 0){
        $('.'+BtnClass).removeClass('active');
    }
}

function SelectIptTable(IptPrime, IptClass, ClassOne = 0, ClassTwo = 0){

    if(ClassOne != 0){
        $('.'+IptClass).removeClass(ClassOne);
        $("[data-id='"+IptPrime+"']").addClass(ClassOne); 
    }

    if(ClassTwo != 0){
        $('.'+IptClass).removeClass(ClassTwo);
        $("[data-id='"+IptPrime+"']").addClass(ClassTwo); 
    }

}

function AlterClass(ObjPrime, ObjClass, ClassOne = 0, ClassTwo = 0){
    
    if(ClassOne != 0){
        $('.'+ObjClass).removeClass(ClassOne);
        $('#'+ObjPrime).addClass(ClassOne); 
    }

    if(ClassTwo != 0){
        $('.'+ObjClass).removeClass(ClassOne);
        $('#'+ObjPrime).addClass(ClassOne); 
    }

}


function ExecuteClick(ItemOne){
    document.getElementById(ItemOne).click();
}

function PrinterHTML(){
    window.print();
}

function ExitPopover(){
    $('#PopoverRemoveCart').popover('hide');
}


window.addEventListener('resize', function () {
    //var altura = window.innerHeight;
    var largura = window.innerWidth;

    if (largura < 992){

        /* Page Search */
        $('#ColSearchMaster').removeClass("col-md-10").addClass("col-md-12"); 
        $('.ColunaCardsSearch').removeClass("col-md-3").addClass( "col" );  
        /* End Page Search */

        $('#FooterInfo').removeClass("mt-5"); /* Footer Info */		
        $('#BarProductDetails').addClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').addClass("w-100"); /* Bar Cart Products Details */
        
    }
    else{

        /* Page Search */
        $('#ColSearchMaster').removeClass("col-md-12").addClass("col-md-10");
        $('.ColunaCardsSearch').removeClass("col").addClass("col-md-3");
        /* End Page Search */

        $('#FooterInfo').addClass("mt-5"); /* Footer Info */
        $('#BarProductDetails').removeClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').removeClass("w-100"); /* Bar Cart Products Details */

    }

    if(largura < 356){
        $('#iconCart').addClass("d-none"); /* Icone Cart */
    }
    else{
        $('#iconCart').removeClass("d-none"); /* Icone Cart */
    }

});

$(document).ready(function(){
    //var altura = window.innerHeight;
    var largura = window.innerWidth;

    if (largura < 992){
        
        /* Page Search */
        $('#ColSearchMaster').removeClass("col-md-10").addClass("col-md-12"); 
        $('.ColunaCardsSearch').removeClass("col-md-3").addClass( "col" );  
        /* End Page Search */

        $('#FooterInfo').removeClass("mt-5"); /* Footer Info */
        $('#BarProductDetails').addClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').addClass("w-100"); /* Bar Cart Products Details */

    }
    else{
        
        /* Page Search */
        $('#ColSearchMaster').removeClass("col-md-12").addClass("col-md-10");
        $('.ColunaCardsSearch').removeClass("col").addClass("col-md-3");
        /* End Page Search */

        $('#FooterInfo').addClass("mt-5"); /* Footer Info */	
        $('#BarProductDetails').removeClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').removeClass("w-100"); /* Bar Cart Products Details */

    }

    if(largura < 356){
        $('#iconCart').addClass("d-none"); /* Icone Cart */
    }
    else{
        $('#iconCart').removeClass("d-none"); /* Icone Cart */
    }
    
 });