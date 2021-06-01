$(document).ready(function() {
	$("#offer").submit(function() {
		var flag=1;
		var o_name=$("#o_name").val();
		var price=$("#price").val();
		var ui=$("#ui").val();
		var product=[];
		$.each($("input[name='products']:checked"),function() {
			product.push($(this).val());
		});
		var product_str=product.toString();
		$("#o_name").css("border-color","#CCCCCC");
		$("#price").css("border-color","#CCCCCC");
		$("#e_o_name,#e_price,#e_products").html("");
		if(o_name=="")
		{
			$("#o_name").css("border-color","red");
			$("#e_o_name").html("Please enter offer name");
			$("#e_o_name").show();
			flag=0;
		}
		if(price=="")
		{
			$("#price").css("border-color","red");
			$("#e_price").html("Please enter offer price");
			$("#e_price").show();
			flag=0;
		}
		if(price!="" && (isNaN(price) || price==0))
		{
			$("#price").css("border-color","red");
			$("#e_price").html("Please enter valid offer price");
			$("#e_price").show();
			flag=0;
		}
		if(product.length<=0)
		{
			$("#e_products").html("Please select product");
			$("#e_products").show();
			flag=0;
		}
		if(flag)
		{
			$.ajax({
				url:'bp/addOfferBP.php',
				data:{ui:ui,o_name:o_name,price:price,product:product_str},
				type:'POST',
				success:function(response) 
				{
					if(!response.isError)
					{
						if(response.err.s!="")
						{
							$(".msg").html(response.err.s);
							$(".msg").show();
						}
					}
				}
			});
		}
		return false;
	});
});