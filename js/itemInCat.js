function itemInCat(){  

    	$.ajax({
       url:"classes/preview.Class.php",
	   method:"POST",
	   data:{itemInCat:"itemInCat"},
	   success:function(data)
	   {
        $('.itemInCat').html(data);
           
	   }
	  });
}
itemInCat();

//when user click the order link in the home page
function submitForm(thelink){  
    var foodId = (thelink.getAttribute('data-info'));
    $.ajax({
	   url:"classes/addFood.Class.php",
	   method:"POST",
	   data:{foodId:foodId},
	   success:function(data)
	   {
		$('.order').html(data);
              itemInCat();
            cartTbl();
            displayOrderNowButton();

	   }
	  });
}

//display cat item in table
function cartTbl(){  
    	$.ajax({
       url:"classes/preview.Class.php",
	   method:"POST",
	   data:{cartTbl:"cartTbl"},
	   success:function(data)
	   {
        $('.cartTbl').html(data);
	   }
	  });
}
cartTbl();


//delete from cart when user clicks
function deleteFromCart(thelink){  
    var cartId = (thelink.getAttribute('data-remove-cart'));
    $.ajax({
	   url:"classes/delete.Class.php",
	   method:"POST",
	   data:{cartId:cartId},
	   success:function(data)
	   {
		$('.order').html(data);
              itemInCat();
              cartTbl();
           displayOrderNowButton();
	   }
	  });
}



//whe placed order now buton s clicked
function placeOrder(){  
//    var cartId = (thelink.getAttribute('data-place-order'));
    var placeOrderBtn = "";
    $.ajax({
	   url:"classes/update.Class.php",
	   method:"POST",
	   data:{placeOrderBtn:"placeOrderBtn"},
	   success:function(data)
	   {
		$('.placeOrder').html(data);
              itemInCat();
              cartTbl(); 
	   }
	  });
}



function displayOrderNowButton(){  
//    var cartId = (thelink.getAttribute('data-place-order'));
    var displayOrderButtonForClick = "";
    $.ajax({
	   url:"classes/preview.Class.php",
	   method:"POST",
	   data:{displayOrderButtonForClick:"displayOrderButtonForClick"},
	   success:function(data)
	   {
		$('.displayOrderButtonForClick').html(data);
             
	   }
	  });
}

displayOrderNowButton();


// display food details to modal 
function foodDetails(thelink){  
    var foodIdDetailsId = (thelink.getAttribute('data-info'));
        $.ajax({
	   url:"classes/preview.Class.php",
	   method:"POST",
	   data:{foodIdDetailsId:foodIdDetailsId},
	   success:function(data)
	   {
		$('.foodIdDetailsId').html(data);
         

	   }
	  });
}