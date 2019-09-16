function sortOnChangeEvent() {
    var sortValue = document.getElementById('sortValue').value;
      $.ajax({
	   url:"classes/display.class.php",
	   method:"POST",
	   data:{sortValue:sortValue},
	   success:function(data)
	   {
		$('.displayOrderRecord').html(data);
             
	   }
	  });
}
  
sortOnChangeEvent();