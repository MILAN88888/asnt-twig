$('#signup').click(function(){
    $('#containers').show(1000);
    
});
$('#closes').click(function () 
{
    $('#containers').slideUp(1000);
});
jQuery(document).ready(function() {
	$('#emails').change(function(){
		var email = $('#emails').val();
		$.ajax({
			url : 'http://localhost/asnt-twig/src/view/action.php?type=LoginValid',
			type : 'post',
			data : 'email='+email,
			success : function(result)
			{
				if(result == true )
				{
					$('#emailerrors').html('email is already present');
				}
				else
				{
					$('#emailerrors').html('');
				}	
			}
			
		});
	});
	
jQuery("#logforms").validate({
	
	
    rules: {
        email:{
            required:true,
            email:true
        },
        pass:{
            required:true,
			minlength:8,
			maxlength:20,
        },
		name:{
            required: true,
			maxlength: 20,
			minlength:5,
        },
		phone_no:{
            required:true,
			number : true,
			minlength:10,
			maxlength:10,
			
        },
		company:"required"
	},
        messages:{
            email:{
				required: "Please provide a email",
                email:"** Please enter a valid email address **",
            },
            pass:{
                required: "** Password is mandatory **",
				minlength: "password must be 10 character ",
				maxlength : "Password must not morethan 20 character",
				
            },
			name:{
				required: "Please enter name",
				minlength: "Name must have at leat 5 character",
			},
			phone_no:{
				required: "Please provide a phone",
				number : "please provide number only",
				minlength:"phone no. must have 10 digit",
				maxlength:"phone no. must have 10 digi",
			},
			company:"Please provide a company ",
        }
    
	
});
});
