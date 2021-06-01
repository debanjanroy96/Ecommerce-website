$(document).ready(function() {
	$("#add_product").submit(function() {
		var flag=1;
		var p_name=$("#p_name").val();
		var price=$("#price").val();
		var qty=$("#qty").val();
		var brand=$("#brand").val();
		/*alert(p_name);
		alert(price);
		alert(qty);
		alert(brand);*/
		$("#p_name").css("border-color","#CCCCCC");
		$("#price").css("border-color","#CCCCCC");
		$("#qty").css("border-color","#CCCCCC");
		$("#brand").css("border-color","#CCCCCC");
		$("#e_p_name,#e_price,#e_qty,#e_brand").html("");
		if(p_name=="")
		{
			$("#p_name").css("border-color","red");
			$("#e_p_name").html("Please enter product name");
			$("#e_p_name").show();
			flag=0;
		}
		if(price=="")
		{
			$("#price").css("border-color","red");
			$("#e_price").html("Please enter product price");
			$("#e_price").show();
			flag=0;
		}
		if(price!="" && (isNaN(price) || price==0) )
		{
			$("#price").css("border-color","red");
			$("#e_price").html("Please enter valid product price");
			$("#e_price").show();
			flag=0;
		}
		if(qty=="")
		{
			$("#qty").css("border-color","red");
			$("#e_qty").html("Please enter product quantity");
			$("#e_qty").show();
			flag=0;
		}
		if(qty!="" && (isNaN(qty) || qty==0))
		{
			$("#qty").css("border-color","red");
			$("#e_qty").html("Please enter valid product quantity");
			$("#e_qty").show();
			flag=0;
		}
		if(brand=="")
		{
			$("#brand").css("border-color","red");
			$("#e_brand").html("Please select Brand");
			$("#e_brand").show();
			flag=0;
		}
		if(flag)
		{
			$(".add_product_btn").prop("disabled",true);
			$.ajax({
				url:'bp/addProductBP.php',
				data:{p_name:p_name,price:price,qty:qty,brand:brand},
				type:'POST',
				dataType:'JSON',
				success:function(response) 
				{
					if(!response.isError)
					{
						if(response.err.s!="")
						{
							$(".msg").html(response.err.s);
							$(".msg").show();
							$(".add_product_btn").prop("disabled",false);
						}
						
					}
				}
			});
			$(".add_product_btn").prop("disabled",false);
		}
		return false;
	});
});