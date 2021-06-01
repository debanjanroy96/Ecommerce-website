$(document).ready(function(){
	$(".buynow").on("click",function() {
		var flag=1;
		var qty=$("#qty").val();
		var pi=$(this).attr("data-pi");
		var ui=$(this).attr("data-ui");
		var pnm=$(this).attr("data-pnm");
		var prc=$(this).attr("data-prc");
		var bi=$(this).attr("data-bi");
		if(qty==0 || qty=="")
		{
			flag=0;
		}
		if(pi=="")
		{
			flag=0;	
		}
		if(ui=="")
		{
			flag=0;	
		}
		if(pnm=="")
		{
			flag=0;	
		}
		if(prc=="")
		{
			flag=0;	
		}
		if(bi=="")
		{
			flag=0;	
		}
		if(flag)
		{
			$.ajax({
				url:'bp/BuyNowBP.php',
				data:{qty:qty,pi:pi,ui:ui,pnm:pnm,prc:prc,bi:bi},
				type:'POST',
				success:function(response) 
				{
					if(response.isError)
					{
						if(response.err.e_w)
						{
							iziToast.show({
							id: null, 
							class: '',
							title: 'Error',
							titleColor: 'white',
							titleSize: '22',
							titleLineHeight: '28',
							message: response.err.e_w,
							messageColor: 'black',
							messageSize: '14',
							messageLineHeight: '20',
							backgroundColor: '#ff464f',
							theme: 'light', // dark
							color: 'red', // blue, red, green, yellow
							icon: 'fas fa-exclamation-triangle',
							iconText: '',
							iconColor: 'white',
							iconUrl: null,
							image: '',
							imageWidth: 50,
							maxWidth: 300,
							zindex: 9999,
							layout: 1,
							balloon: false,
							close: true,
							closeOnEscape: true,
							closeOnClick: true,
							displayMode: 0, // once, replace
							position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
							target: '',
							targetFirst: true,
							timeout: 20000,
							rtl: false,
							animateInside: true,
							drag: true,
							pauseOnHover: true,
							resetOnHover: false,
							progressBar: true,
							progressBarColor: '',
							progressBarEasing: 'linear',
							overlay: true,
							overlayClose: true,
							overlayColor: 'rgba(0, 0, 0, 0.6)',
							transitionIn: 'fadeInUp',
							transitionOut: 'fadeOut',
							transitionInMobile: 'fadeInUp',
							transitionOutMobile: 'fadeOutDown',
							});
							flag=0;
						}
					}else
					{
						if(response.err.s)
						{
							iziToast.show({
							id: null, 
							class: '',
							title: 'Success',
							titleColor: 'white',
							titleSize: '22',
							titleLineHeight: '28',
							message: response.err.s,
							messageColor: 'black',
							messageSize: '14',
							messageLineHeight: '20',
							backgroundColor: '#41eb1e',
							theme: 'light', // dark
							color: 'red', // blue, red, green, yellow
							icon: 'fas fa-check',
							iconText: '',
							iconColor: 'white',
							iconUrl: null,
							image: '',
							imageWidth: 50,
							maxWidth: 300,
							zindex: 9999,
							layout: 1,
							balloon: false,
							close: true,
							closeOnEscape: true,
							closeOnClick: true,
							displayMode: 0, // once, replace
							position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
							target: '',
							targetFirst: true,
							timeout: 20000,
							rtl: false,
							animateInside: true,
							drag: true,
							pauseOnHover: true,
							resetOnHover: false,
							progressBar: true,
							progressBarColor: '',
							progressBarEasing: 'linear',
							overlay: true,
							overlayClose: true,
							overlayColor: 'rgba(0, 0, 0, 0.6)',
							transitionIn: 'fadeInUp',
							transitionOut: 'fadeOut',
							transitionInMobile: 'fadeInUp',
							transitionOutMobile: 'fadeOutDown',
						});
						}
					}
				}
			});
		}
	});
	$(".buyofferproduct").on("click",function() {
		var flag=1;
		var ui=$(this).attr("data-ui");
		var oi=$(this).attr("data-oi");
		var prc=$(this).attr("data-prc");
		if(ui=="")
		{
			flag=0;	
		}
		if(oi=="")
		{
			flag=0;	
		}
		if(prc=="")
		{
			flag=0;	
		}
		if(flag)
		{
			$.ajax({
				url:'bp/buyOfferProductBP.php',
				data:{ui:ui,oi:oi,prc:prc},
				type:'POST',
				success:function(response) 
				{
					if(response.isError)
					{
						if(response.err.e_w)
						{
							iziToast.show({
							id: null, 
							class: '',
							title: 'Error',
							titleColor: 'white',
							titleSize: '22',
							titleLineHeight: '28',
							message: response.err.e_w,
							messageColor: 'black',
							messageSize: '14',
							messageLineHeight: '20',
							backgroundColor: '#ff464f',
							theme: 'light', // dark
							color: 'red', // blue, red, green, yellow
							icon: 'fas fa-exclamation-triangle',
							iconText: '',
							iconColor: 'white',
							iconUrl: null,
							image: '',
							imageWidth: 50,
							maxWidth: 300,
							zindex: 9999,
							layout: 1,
							balloon: false,
							close: true,
							closeOnEscape: true,
							closeOnClick: true,
							displayMode: 0, // once, replace
							position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
							target: '',
							targetFirst: true,
							timeout: 20000,
							rtl: false,
							animateInside: true,
							drag: true,
							pauseOnHover: true,
							resetOnHover: false,
							progressBar: true,
							progressBarColor: '',
							progressBarEasing: 'linear',
							overlay: true,
							overlayClose: true,
							overlayColor: 'rgba(0, 0, 0, 0.6)',
							transitionIn: 'fadeInUp',
							transitionOut: 'fadeOut',
							transitionInMobile: 'fadeInUp',
							transitionOutMobile: 'fadeOutDown',
							});
							flag=0;
						}
					}else
					{
						if(response.err.s)
						{
							iziToast.show({
							id: null, 
							class: '',
							title: 'Success',
							titleColor: 'white',
							titleSize: '22',
							titleLineHeight: '28',
							message: response.err.s,
							messageColor: 'black',
							messageSize: '14',
							messageLineHeight: '20',
							backgroundColor: '#41eb1e',
							theme: 'light', // dark
							color: 'red', // blue, red, green, yellow
							icon: 'fas fa-check',
							iconText: '',
							iconColor: 'white',
							iconUrl: null,
							image: '',
							imageWidth: 50,
							maxWidth: 300,
							zindex: 9999,
							layout: 1,
							balloon: false,
							close: true,
							closeOnEscape: true,
							closeOnClick: true,
							displayMode: 0, // once, replace
							position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
							target: '',
							targetFirst: true,
							timeout: 20000,
							rtl: false,
							animateInside: true,
							drag: true,
							pauseOnHover: true,
							resetOnHover: false,
							progressBar: true,
							progressBarColor: '',
							progressBarEasing: 'linear',
							overlay: true,
							overlayClose: true,
							overlayColor: 'rgba(0, 0, 0, 0.6)',
							transitionIn: 'fadeInUp',
							transitionOut: 'fadeOut',
							transitionInMobile: 'fadeInUp',
							transitionOutMobile: 'fadeOutDown',
						});
						}
					}
				}
			})
		}
	})
})