$(document).ready(function() {
	$('#submit').click(function() {
		var x = $('#x').val();
		var y = $('#y').val();
		console.log(x);
		console.log(y);
		$.ajax({
			url: "calculo/linear",
			type: 'post',
			data: {x:x,y:y},
			dataType: 'json',
			success: function(result){
        		console.log(result);
    		}
    	});
    	$.ajax({
			url: "calculo/exponencial",
			type: 'post',
			data: {x:x,y:y},
			dataType: 'json',
			success: function(result){
        		console.log(result);
    		}
    	});
    	$.ajax({
			url: "calculo/polinomial",
			type: 'post',
			data: {x:x,y:y},
			dataType: 'json',
			success: function(result){
        		console.log(result);
    		}
    	});
	});
});