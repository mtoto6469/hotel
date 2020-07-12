/**
 * Created by halesh on 6/29/2018.
 */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    // $("#wrap-hidden").css({"opacity":" 0.6","filter":"Alpha(opacity=50"});
    $("#wrap-hidden").css("display","block");
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    // $("#wrap-hidden").css({ "opacity":"1"});
    $("#wrap-hidden").css("display","none");
}



function openSearch() {
    document.getElementById("mySidenav").style.width = "0";
    $("#navigation").css("display", "none");
    $("#navigation2").css("display", "block");
}

function closeSearch() {

    $("#navigation2").css("display", "none");
    $("#navigation").css("display", "block");


}