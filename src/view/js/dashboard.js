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

});

function mydelete(str)
{	
	$.ajax(
	{
		url:'http://localhost/asnt-3/controller/user.php?type=Delete',
		type : 'post',
		data : 'id='+str,
		success:function(res)
		{
			if ( res==true)
			{
				$('#delete'+str).hide();
			}
		}
	});
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
		console.log('hllo');
		var newname = $('#editname').val();
		var newemail =$('#editemail').val();
		var newcompany =$('#editcompany').val();
		var newphone =$('#editphone').val();
		console.log(newname);
		console.log(newemail);
		console.log(newcompany);
		console.log(newphone);
		console.log(str);
		$.ajax({
			url:'http://localhost/asnt-3/controller/user.php?type=Update',
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
					}
					else
					{
						console.log('fail');
					}
			}
		});
	});
	
}

