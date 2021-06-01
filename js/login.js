$(document).ready(function() {
	$("#login").submit(function() {
		var flag=1;
		var email=$("#email").val();
		var pwd=$("#pwd").val();
		$("#email").css("border-color","#CCCCCC");
		$("#pwd").css("border-color","#CCCCCC");
		$("#e_email,#e_pwd,#e_msg").html("");
		if(email=="")
		{
			$("#email").css("border-color","red");
			$("#e_email").html("Please enter your email");
			$("#e_email").show();
			flag=0;
		}
		if(pwd=="")
		{
			$("#pwd").css("border-color","red");
			$("#e_pwd").html("Please enter password");
			$("#e_pwd").show();
			flag=0;
		}
		if(flag)
		{
			$(".login_btn").prop("disabled",true);
			$.ajax({
				url:'bp/loginBP.php',
				data:{email:email,pwd:pwd},
				type:'POST',
				dataType:'JSON',
				success:function(response)
				{
					if(!response.isError)
					{
						if(response.redirect)
						{
							$(location).attr("href",response.redirect);
						}
					}
					else
					{
						if(response.err.e_msg!="")
						{
							$("#email").css("border-color","red");
							$("#pwd").css("border-color","red");
							$("#e_msg").html(response.err.e_msg);
							$("#e_msg").show();
						}
					}
				}
			})
			$(".login_btn").prop("disabled",false);
		}
		return false;
	});
});