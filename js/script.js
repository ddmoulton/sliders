function splashResize() {  
    var windowSize = $(window).height();
    console.log(windowSize);
    $('.splash').css("height", (windowSize * .6)); 
}
function sectionResize() {
    var windowSize = $(window).height();
    console.log(windowSize);
    $('section').css("height", windowSize); 
}
$(document).ready(function() {
    splashResize();
    sectionResize();
});

$( window ).resize(function() {
    splashResize();
    sectionResize();
});
