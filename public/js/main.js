$( document ).ready(function() {
    // flash message auto remove
    	window.setTimeout(function() {
    		 $(".alert").fadeTo(500, 0).slideUp(500, function(){
    		 $(this).remove(); 
    				 });
    	}, 4000);

    	markAsRead();
	     $(".hidenoti").click(function(){
	     	alert('called');
	          $(".noti").hide();
        }); 
});

function markAsRead(notificationCount) {
  if(notificationCount != 0)
  $.get('/markAsRead');
}
    // end flash message