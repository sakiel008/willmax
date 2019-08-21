jQuery(document).ready(function($){
	$("form.wpcf7-form .wpcf7-submit").parent().prepend($(".g-recaptcha.jc.wp7"));
	$("input.submit,input#wp-submit,.submit-wrap input.ninja-forms-field,.wpcf7-submit,.comment-form #submit").on('click', function(event) {
		var texareaVal = $("textarea#comment").val();
		if ($("#g-recaptcha-response").val()=="") {
			$(".jc-required").remove();
			$(".g-recaptcha.jc").prepend('<p class="jc-required">Required</p>');
			event.preventDefault();
		}else{
			if(grecaptcha){
				grecaptcha.reset();	
			}
		}
	});
});