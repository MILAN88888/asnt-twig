$('#signin').click(function(){
    $('#container').show(1000);
    
});
$('#close').click(function () 
{
        $('#container').slideUp(1000);
});
jQuery(document).ready(function() {
jQuery("#logform").validate({
    rules: {
        email:{
            required:true,
            email:true,
			maxlength: 255,
        },
        pass:{
            required:true, 
        }
    },
        messages:{
            email:{
				required: "** Please provide a email **",
                email:"** Please enter a valid email address **",
            },
            pass:{
                required: "** Password is mandatory **",  
            }
        }
    
	
});
});