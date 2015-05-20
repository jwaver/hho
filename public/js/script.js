/*
*	Plugin Initialization
*/
$(".datepicker").datepicker({
	autoclose: true,
	todayHighlight: true,
	format: 'yyyy-mm-dd',
	todayBtn: true,
	setDate: new Date()
});

$('#profile').imageViewer('img[for=profile]');

$('#camera').on('shown.bs.modal', function (event) {
	$('#photobooth').photobooth().on("image",function( event, dataUrl ){
		$( "img[for=profile]" ).attr('src', dataUrl);
	}).data( "photobooth" ).resize( 500, 400 );
}).on('hide.bs.modal', function (event) {
	$('input[name=dataUri]').val($('img[for=profile]').attr('src'));
	$( '#photobooth' ).data( "photobooth" ).destroy();
});

$(document).ready(function () {
	$('.flash').fadeOut(3000);
});