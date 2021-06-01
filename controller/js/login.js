$(document).ready(function() {
	$("#admin_login").submit(function() {
		var flag=1;
		var email=$("#email").val();
		var password=$("#pwd").val();
		$("#e_email,#e_pwd").html();
		/*alert(email);
		alert(password);*/
		$("#e_email,#e_pwd,#e_msg").html("");
		$("#email").css("border-color","#CCCCCC");
		$("#pwd").css("border-color","#CCCCCC");
		if(email=="")
		{
			$("#email").css("border-color","red");
			$("#e_email").html("Please enter email");
			$("#e_email").show();
			flag=0;
		}
		if(email!="")
		{
			var pattern_email=/^(([^<>()\[\]\+\-\*\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(!pattern_email.test(email))
			{
				$("#email").css("border-color","red");
				$("#e_email").html("Please enter valid email");
				$("#e_email").show();
				flag=0;
			}
		}
		if(password=="")
		{
			$("#pwd").css("border-color","red");
			$("#e_pwd").html("Please enter password");
			$("#e_pwd").show();
			flag=0;
		}
		if(flag)
		{
			$.ajax({
				url:'bp/LoginBP.php',
				data:{email:email,pwd:password},
				type:'POST',
				dataType:'JSON',
				success:function(response) 
				{
					if(response.isError)
					{
						if(response.err.e_msg!="")
						{
							$("#e_msg").html(response.err.e_msg);
							$("#e_msg").show();
							flag=0;
						}
					}
					else
					{
						if(response.redirect)
						{
							$(location).attr('href',response.redirect);
						}
					}
				}
			});
		}
		return false;
	});
})