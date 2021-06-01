$(document).ready(function() {
	$("#signup").submit(function() {
		var flag=1;
		var name=$("#name").val();
		var email=$("#email").val();
		var phone=$("#phone").val();
		var pwd=$("#pwd").val();
		$("#name").css("border-color","#CCCCCC");
		$("#email").css("border-color","#CCCCCC");
		$("#phone").css("border-color","#CCCCCC");
		$("#pwd").css("border-color","#CCCCCC");
		$("#e_name,#e_email,#e_phone,#e_pwd").html("");
		if(name=="")
		{
			$("#name").css("border-color","red");
			$("#e_name").html("Please enter your name");
			$("#e_name").show();
			flag=0;
		}
		if(name!="")
		{
			var p_name=/^[a-zA-Z ]+$/;
			if(!p_name.test(name))
			{
				$("#name").css("border-color","red");
				$("#e_name").html("Please enter valid name");
				$("#e_name").show();
				flag=0;
			}
		}
		if(email=="")
		{
			$("#email").css("border-color","red");
			$("#e_email").html("Please enter your email");
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
		if(phone=="")
		{
			$("#phone").css("border-color","red");
			$("#e_phone").html("Please enter your contact number");
			$("#e_phone").show();
			flag=0;
		}
		if(phone!="")
		{
			var pattern_phone=/^[6-9]\d{9}$/;
			if(!pattern_phone.test(phone))
			{
				$("#phone").css("border-color","red");
				$("#e_phone").html("Please enter valid contact number");
				$("#e_phone").show();
				flag=0;
			}
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
			$(".submit_btn").prop("disabled",true);
			$.ajax({
				url:'bp/SaveUserBP.php',
				data:{name:name,email:email,phone:phone,pwd:pwd},
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
				}
			})
			$(".submit_btn").prop("disabled",false);
		}
		return false;
	});
});