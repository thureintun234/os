$(document).ready(function(){
	getData();
	count();

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	//modal
	$('.row').on('click','.view_detail',function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var photo = $(this).data('photo');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var brand = $(this).data('brand');
		var subcategory = $(this).data('subcategory');
		var description = $(this).data('description');

		$(".pimg").attr('src',"backend/"+photo);
		$(".pname").text("Name: "+name);
		$(".pprice").text("Price: "+price);
		$(".pdiscount").text("Discount: "+discount);
		$(".pbrand").text("Brand: "+brand);
		$(".cart").attr({'data-cid':id,'data-cname':name,'data-cphoto':photo,'data-cprice':price,'data-cdiscount':discount});
	});


	// cart status for index page
	$('.cart').on('click',function(){
		var item_qty=parseInt($('#qty').val());
		var cid = $(this).data('cid');
		var cname = $(this).data('cname');
		var cphoto = $(this).data('cphoto');
		var cprice = $(this).data('cprice');
		var cdiscount = $(this).data('cdiscount');

		var qty=1;
		if (item_qty) {
				qty+=item_qty;
				}

		var product_item={
			id:cid,
			name:cname,
			photo:cphoto,
			price:cprice,
			discount:cdiscount,
			qty:qty
		};

		var productString = localStorage.getItem('online_shop');
		var productArray;
		if(productString == null){
			productArray=Array();
		}else{
			productArray=JSON.parse(productString);
		}

		var status=false;
		$.each(productArray,function(i,v){
			if(cid==v.id){
				status=true;
				if (!item_qty) {
					v.qty++;
				}else{
					v.qty+=item_qty;
				}
			}
		});
		if(status==false){
			productArray.push(product_item);
		}

		var productData = JSON.stringify(productArray);
		localStorage.setItem('online_shop',productData);
		count();

	});

	// checkout status
	function getData(){
		var productString=localStorage.getItem('online_shop');
		if(productString){
			var productArray = JSON.parse(productString);

			var total=0;
			var no=1;
			var html='';
			$.each(productArray,function(i,v){
				var name=v.name;
				var photo=v.photo;
				var unit_price=v.price;
				var discount=v.discount;
				var qty=v.qty;

				if (discount) {
					var price_show=discount+'<del class="d-block">'+unit_price+'</del>';
					var price = discount;
				}else{
					var price_show = unit_price;
					var price = unit_price;
				}

				html+=`<tr>
							<td>${no++}</td>
							<td>${name}</td>
							<td><img src="${photo}" width="100"></td>
							<td>${price_show}</td>
							<td>
								<button class="min" data-product_i="${i}">-</button>${qty}<button class="max" data-product_i="${i}">+</button>
							</td>
							<td>${price*qty}</td>
						</tr>`
						total+=price*qty;
			});
				html+=`<tr>
							<td colspan="5">Total</td>
							<td>${total}</td>
						</tr>`
						$('tbody').html(html);
						$('.total').val(total);
		}else{
			html='';
			$('tbody').html(html);
		}
		count();
	}

	//increment
	$('tbody').on('click','.max',function(){
		var product_i=$(this).data('product_i');

		var productString=localStorage.getItem('online_shop');
		if(productString){
			var productArray=JSON.parse(productString);

			$.each(productArray,function(i,v){
				if(product_i==i){
					v.qty++;
				}
				var productData=JSON.stringify(productArray);
				localStorage.setItem('online_shop',productData);
				getData();
			});
		}
	});

	//decrement
	$('tbody').on('click','.min',function(){
		var product_i=$(this).data('product_i');

		var productString=localStorage.getItem("online_shop");
		if(productString){
			var productArray=JSON.parse(productString);

						//loop for check all data
				$.each(productArray,function(i,v){
					if(product_i==i){
						v.qty--;
						if(v.qty==0){
							productArray.splice(product_i,1);
						}
					}
					var productData=JSON.stringify(productArray);
					localStorage.setItem('online_shop',productData);
					getData();
					});
				}
			});

	//order
	// $("#product_order").click(function(){
	// 	var ans=confirm("Are you sure Order!");
	// 	if(ans){
	// 		localStorage.clear();
	// 		getData();
	// 	}
	// });

	//count
	function count(){
	var productString=localStorage.getItem('online_shop');
	if(productString){
		var	productArray=JSON.parse(productString);
		if(productArray!=0){
			var count=productArray.length;
			$('#count').text('('+count+')');
		}
		
	}else{
			$('#count').text('()');
		}
}



	// For Buy Now
	$('.buy_now').on('click',function(){

		var notes = $('.notes').val();
		// var total = $('.total').val();

		var shopString = localStorage.getItem("online_shop");
		if (shopString) {
			// var shopArray = JSON.parse(shopString);

			$.post('/orders',{shop_data:shopString,notes:notes},function(response){
				if (response) {
					alert(response);
					localStorage.clear();
					getData();
					location.href="/";
				}
			});
		}
	});


});