$(document).ready(function() {
$('.btn__menu__arrow').click(function() {
var currentWidth = $('.navbar').css('width');
if (currentWidth === '40px') {
$('.navbar').animate({
width: '170px'
}, 'slow');
$('.nav--arrow').animate({
left: '+=125px'
}, 'slow');
} else {
$('.navbar').animate({
width: '40px'
}, 'slow');
$('.nav--arrow').animate({
left: '-=125px'
}, 'slow');
}
});
});