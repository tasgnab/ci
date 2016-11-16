var messageReqiured = '*this field is required';
$(document).ready(function() {
	$('#login').submit(function () {
		// Check if empty of not
		if ($.trim($('#username').val()) === '') {
			if ($("#username").parent().next(".validation").length == 0) {
				// only add if not added
				$("#username").parent().after("<div class='validation'>"+messageReqiured+"</div>");
			}
			return false;
		}
		if ($.trim($('#password').val()) === '') {
			if ($("#password").parent().next(".validation").length == 0) {
				// only add if not added
				$("#password").parent().after("<div class='validation'>"+messageReqiured+"</div>");
			}
			return false;
		}
	});

	$("#username").keyup(function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode !== 9){
			if ($.trim($('#username').val()) === '') {
				if ($("#username").parent().next(".validation").length == 0) {
					// only add if not added
					$("#username").parent().after("<div class='validation'>"+messageReqiured+"</div>");
				}
			} else {
				if ($("#username").parent().next(".validation").length > 0) {
					$("#username").parent().next(".validation").remove();
				}
			}	
		}
	});

	$("#password").keyup(function(e) {
		var keyCode = e.keyCode || e.which;
		if (keyCode !== 9){
			if ($.trim($('#password').val()) === '') {
				if ($("#password").parent().next(".validation").length == 0) {
					// only add if not added
					$("#password").parent().after("<div class='validation'>"+messageReqiured+"</div>");
				}
			} else {
				if ($("#password").parent().next(".validation").length > 0) {
					$("#password").parent().next(".validation").remove();
				}
			}
		}
			
	});

	$('#username').focusout(function(){
		if($(this).val() === ''){
			if ($("#username").parent().next(".validation").length == 0) {
				// only add if not added
				$("#username").parent().after("<div class='validation'>"+messageReqiured+"</div>");
			}
		} else {
			if ($("#username").parent().next(".validation").length > 0) {
				$("#username").parent().next(".validation").remove();
			}
		}
	});

	$('#password').focusout(function(){
		if($(this).val() === ''){
			if ($("#password").parent().next(".validation").length == 0) {
				// only add if not added
				$("#password").parent().after("<div class='validation'>"+messageReqiured+"</div>");
			}
		} else {
			if ($("#password").parent().next(".validation").length > 0) {
				$("#password").parent().next(".validation").remove();
			}
		}
	});

});
			