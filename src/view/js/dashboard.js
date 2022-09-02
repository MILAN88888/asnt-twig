
$('#btn').click(function()
{
    $('#msge').hide();
});
$('#user').click(function(){
	//('#user').css('background-color','green');
	$('#udiv').show();
	$('#ddiv').hide();
	$('#viewdiv').hide();

});
$('#document').click(function(){
	$('#ddiv').show();
	$('#udiv').hide();
	$('#viewdiv').hide();

});
$('#vdocument').click(function(){
	$('#viewdiv').show();
	$('#udiv').hide();

})
$('#adduser').click(function()
	{
		$('#containers1').show();
	});

function mydelete(str)
{	
	var conf = confirm("Are you sure want to delete user");
	if( conf == true) {
	$.ajax(
	{
		url:'action.php?type=Delete',
		type : 'post',
		data : 'id='+str,
		success:function(res)
		{	
			console.log('hello');
			if (res == true)
			{
				$('#delete'+str).hide();
				$('#editmsg').html('Deleted successfully');
			}
			else{
				console.log('failed');
			}
		}
	

	});
}
}
function myedit(str)
{
	var name = $('#name'+str).text();
	var email = $('#email'+str).text();
	var company = $('#company'+str).text();
	var phone = $('#phone'+str).text();
	$('#editname').val(name);
	$('#editemail').val(email);
	$('#editcompany').val(company);
	$('#editphone').val(phone);
	$('#editdiv').show();
	$('#editbtn').click(function(){
		
		var newname = $('#editname').val();
		var newemail =$('#editemail').val();
		var newcompany =$('#editcompany').val();
		var newphone =$('#editphone').val();
		
		$.ajax({
			url:'action.php?type=Update',
			type:'post',
			data: 'id='+str+'&name='+newname+'&email='+newemail+'&company='+newcompany+'&phone='+newphone,
			success: function(res)
			{
				if(res == true){
					$('#name'+str).text(newname);
					$('#email'+str).text(newemail);
					$('#company'+str).text(newcompany);
					$('#phone'+str).text(newphone);
					$('#editdiv').hide();
					$('#editmsg').html('edited successfully');
					}
					else
					{
						console.log('fail');
					}
			}
		});
	});
	
}

