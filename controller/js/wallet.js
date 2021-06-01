$(document).ready(function() {
	$("#wallet").submit(function() {
		var flag=1;
		var ui=$("#ui").val();
		var amount=$("#amount").val();
		$("#amount").css("border-color","#CCCCCC");
		$("#e_amount").html("");
		if(ui=="" || ui==0)
		{
			flag=0;
		}
		if(amount=="")
		{
			$("#amount").css("border-color","red");
			$("#e_amount").html("Please enter amount");
			$("#e_amount").show();
			flag=0;	
		}
		if(amount!="" && (isNaN(amount) || amount==0))
		{
			$("#amount").css("border-color","red");
			$("#e_amount").html("Please enter valid amount");
			$("#e_amount").show();
			flag=0;
		}
		if(flag)
		{
			$.ajax({
				url:'bp/AddWalletAmountBP.php',
				data:{ui:ui,amount:amount},
				type:'POST',
				success:function(response) 
				{
					if(!response.isError)
					{
						$(".available_balance").html("Available Balance:&nbsp;"+response.wallet_amount);
						if(response.redirect)
						{
							$(location).attr("href",response.redirect);
						}
					}
					
				}
			});
		}
		return false;
	});
})