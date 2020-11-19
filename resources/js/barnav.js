$(".open-menu").on("click", function(e){
    $("#menu-site").addClass("open");
    $(".BtnsFloat").addClass("d-none");
    $("#Navbar-Desktop").removeClass("sticky-top");
});

$(".close-menu").on("click", function(e){
    $("#menu-site").removeClass("open");
    $(".BtnsFloat").removeClass("d-none");
    $("#Navbar-Desktop").addClass("sticky-top");
});

$(".backdrop").on("click", function(e){
    $("#menu-site").removeClass("open");
    $(".BtnsFloat").removeClass("d-none");
    $("#Navbar-Desktop").addClass("sticky-top");
});
