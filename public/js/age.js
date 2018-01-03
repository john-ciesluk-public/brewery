$(window).on('load',function(){
	$('#ageModal').modal('show');
});
$('#ageModal').modal({
	keyboard: false,
	backdrop: 'static'
});
$(document).ready(function() {
	$(".btn-twentyone").on("click",function(){
		$.ajax({
			type: "GET",
			data: "",
			url: "/age",
		})
		.done(function(data) {
		})
		.fail(function(data) {
			$.each(data.responseJSON, function(key,value) {
				console.log(key);
				console.log(value);
			})
		})
	});
});
