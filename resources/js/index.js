var SizeDesktop = window.matchMedia("(min-width: 992px)");
var SizeMobile = window.matchMedia("(max-width: 991px)");
    
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
    var Max = document.getElementById(InputCard).max;
    
    if(Max == ""){
        Max = 999;
    }
    
    if(Item <= 0 || !parseInt(Item || Item == Max)){
        Item = 1;
    }
    else if(Item < Max){
        Item = Item + 1;
    }
    
    document.getElementById(InputCard).value = Item;
}

function removeItem(InputCard){
    var Item = parseInt(document.getElementById(InputCard).value, 10);
    var Max = document.getElementById(InputCard).max;
    
    if(Max == ""){
        Max = 999;
    }

    if(Item > 1){
        Item = Item - 1;
    } else if(Item == Max){
        Item = 1;
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

function AlterOneObjClass(ObjPrime, ClassOne, ClassTwo){
    if(ClassOne != 0){
        $('.'+ObjPrime).removeClass(ClassOne);
        $('#'+ObjPrime).addClass(ClassTwo); 
    }
}

function alterPrice(btn, input){
    var btn = document.getElementById(btn);
    return document.getElementById(input).innerHTML = btn.dataset.value;
}

function barCardVs(bar, card){
    document.getElementById(bar).style.visibility = "visible";
    $('#'+card).addClass('border-dark'); 
}

function barCardHidden(bar, card){
    var largura = window.innerWidth;
    $('#'+card).removeClass('border-dark'); 

    if(largura > 992){
        document.getElementById(bar).style.visibility = "hidden";
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

function alterText(id, text){
    document.getElementById(id).innerHTML=text;
}

// Funções Page index
function alterStores(select){
    var slt = document.getElementById(select);

    if(slt.value == 0)
    {
        $('.allStores').removeClass('d-none');
    } else{
        $('.allStores').addClass('d-none');
        $('.addressStore' + slt.value).removeClass('d-none');
    }

    window.scrollTo(0, 350);
}

// Funções Page home
function alterDeliveryType(select){
    var slt = document.getElementById(select);

    if(slt.value == 0)
    {
        $('.dvHorarys').addClass('d-none');
    } else{
        $('.dvHorarys').addClass('d-none');
        $('.dvHorary' + slt.value).removeClass('d-none');
    }
}

window.addEventListener('resize', function () {
    //var altura = window.innerHeight;
    var largura = window.innerWidth;

    if (largura < 992){

        $('#FooterInfo').removeClass("mt-5"); /* Footer Info */		
        $('#BarProductDetails').addClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').addClass("w-100"); /* Bar Cart Products Details */
        $('.sticky-top-esly').removeClass("sticky-top");
    }
    else{

        $('#FooterInfo').addClass("mt-5"); /* Footer Info */
        $('#BarProductDetails').removeClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').removeClass("w-100"); /* Bar Cart Products Details */
        $('.sticky-top-esly').addClass("sticky-top");

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
        
        /* End Page Search */
        $('#FooterInfo').removeClass("mt-5"); /* Footer Info */
        $('#BarProductDetails').addClass("text-center"); /* Bar Products Details */
        $('#BarCartProductDetails').addClass("w-100"); /* Bar Cart Products Details */

    }
    else{
        
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

 $('.selectType').on('click', function(e) {

    $('.titleSelect').addClass('font-weight-normal');
    $('.selectType').removeClass('border-dark');
    $('.selectType #iconCheck').removeClass();
    $('.selectType .inputType').removeAttr('checked');

    $(this.children[0]).removeClass('font-weight-normal');
    $(this.children[1]).addClass('fas fa-check');
    $(this.children[2]).prop('checked', 'checked');
    $(this).addClass('border-dark');
    
    $("#textType").text($(this).attr("data-text"));

});

$('.selectFreigth').on('click', function(e) {

    $('.selectFreigth').removeClass('border-dark');
    $('.selectFreigth #iconCheck').removeClass();
    $('.selectFreigth .inputFreigth').removeAttr('checked');

    $(this.children[1]).addClass('fas fa-check');
    $(this.children[2]).prop('checked', 'checked');
    $(this).addClass('border-dark');
    
});

$('.selectAddress').on('click', function(e) {

    $('.selectAddress').removeClass('border-dark');
    $('.selectAddress #iconCheck').removeClass();
    $('.selectAddress .inputAddress').removeAttr('checked');

    $(this.children[1]).addClass('fas fa-check');
    $(this.children[2]).prop('checked', true);
    $(this).addClass('border-dark');
    
});

$('.selectHorary').on('click tap', function(e) {

    $('.selectHorary').removeClass('border-dark');
    $('.selectHorary .inputType').removeAttr('checked');
    $('.selectHorary .inputDate').removeAttr('checked');

    $(this.children[0]).attr('checked', "checked");
    $(this.children[1]).attr('checked', "checked");
    $(this).addClass('border-dark');
});

$('.selectPay').on('click tap', function(e) {

    $('.divPay').addClass('d-none');
    $('.titleSelect').addClass('font-weight-normal');
    $('.selectPay').removeClass('border-dark');
    $('.selectPay #iconCheck').removeClass();
    $('.selectPay .inputType').removeAttr('checked');
    $('#inputMoney').attr('disabled', true);

    $(this.children[0]).removeClass('font-weight-normal');
    $(this.children[1]).addClass('fas fa-check');
    $(this.children[2]).attr('checked', true);
    $(this).addClass('border-dark');
    
    $("#div"+$(this).attr("data-div")).removeClass('d-none');

    if($(this).attr("data-div") == 'Dinheiro'){
        $('#inputMoney').removeAttr('disabled');
    } else {
        $('#inputMoney').val(0);
    }

});

$(document).on('click', '.selectList', function(){

    $('.selectList').removeClass('border-dark');
    $('.checkList').removeAttr('checked');
    
    $(this).addClass('border-dark');
    $(this).children('.checkList').attr('checked', "checked");

});

$('.inputQtdCart').on("blur", function(e){
    
    let qtd = $(this).val();
    let max = $(this).attr('max') !== undefined ? parseFloat($(this).attr('max')) : 0;

    if(qtd == "" || qtd == 0)
    {
        $(this).val(1);
    }

    if(qtd > max)
    {
        $(this).val(max);
    }

});

// click me
$(".clickMe").click();
$(".clickMe").removeClass("clickMe");

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}