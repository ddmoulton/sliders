function splashResize() {  
    var windowSize = $(window).height();
    console.log(windowSize);
    $('.splash').css("min-height", (windowSize * .6)); 
}
function sectionResize() {
    var windowSize = $(window).height();
    console.log(windowSize);
    $('.boxes div').css("min-height", windowSize * .4); 
}
$(document).ready(function() {
    splashResize();
    sectionResize();
});

$( window ).resize(function() {
    splashResize();
    sectionResize();
});
