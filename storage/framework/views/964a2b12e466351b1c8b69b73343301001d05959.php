
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-3.2.1.slim.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-1.12.4.js')); ?>"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.2.0/js/ion.rangeSlider.js'></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=7l9cwatx9v7nbuhitapj8m93plhiugcdcs7yknme455h58bl"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="<?php echo e(asset('js/jquery.sticky.js')); ?>"></script>
<script src="<?php echo e(asset('js/smoothscroll.js')); ?>"></script>
<script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/hammer.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap-tagsinput.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>

<script type="text/javascript">

	$('.range-slider--single').ionRangeSlider({
		min: 0,
		max: 500,
		from: 0,
		type: 'single',
		decorate_both: true,
		postfix: ' $',
		values_separator: ' to ',
	});

	window.setTimeout(function() {
		 $(".alert").fadeTo(500, 0).slideUp(500, function(){
		 $(this).remove(); 
				 });
	}, 4000);


	$(document).ready(function() {

		$('.asearch').change(function()  {
	        var searchID = $(this).val();

	        if(searchID == 'project'){
	        	$("#setvalue").attr("value", 'project');
	        	var setvar = $('.search-input').val();
		    	$("#setkey").attr("placeholder", "Find Project");

		    }else if(searchID == 'freelancer'){
		    	$("#setvalue").attr("value", 'freelancer');
		    	var setvar = $('.search-input').val();
		    	$("#setkey").attr("placeholder", "Find Freelancer");
		    }else{
		    	$("#setvalue").attr("value", '');
		    	$("#setkey").attr("placeholder", "Find your write choice!");
		    }
	    });
	    markAsRead();
	    $(".hidenoti").click(function(){
	          $(".noti").hide();
        }); 
	});

	function markAsRead(notificationCount) {
	  if(notificationCount != 0)
	  $.get('/markAsRead');
	}

	// $(document).ready(function() {

	// 	$('.asearch').change(function()  {
	//         var searchID = $(this).val();

	//         if(searchID == 'project'){
	//         	$("#setvalue").attr("value", 'project');
	//         	var setvar = $('.search-input').val();
	// 	    	$("#setkey").attr("placeholder", "Find Project");

	// 	    	$("input").keyup(function(){
	// 		    	var searchkey = $(this).val();
	// 		    	console.log(setvar);
	// 				console.log(searchkey);
	// 					if(searchID) {
	// 		            $.ajax({
	// 		                url: '/greatneighbor/getSearch/'+searchID,
	// 		                type: "GET",
	// 		                data: {
	// 			               'searchID':searchID,
	// 			               'searchkey':searchkey,
	// 			             },
	// 		                dataType: "html",
	// 		                success:function(data) {
	// 		                 	$('.searchshow').html(data);
	// 		                    window.location = "projects";
	// 		                }
	// 		            });
	// 		        }else{
	// 		             $('.searchshow').empty();
	// 		        }
	// 			});

					

	// 	    }else if(searchID == 'freelancer'){
	// 	    	$("#setvalue").attr("value", 'freelancer');
	// 	    	var setvar = $('.search-input').val();
	// 	    	//alert(setvar);
	// 	    	$("#setkey").attr("placeholder", "Find Freelancer");

	// 	    	$("input").keyup(function(){
	// 		    	var searchkey = $(this).val();
	// 		    	console.log(setvar);
	// 				console.log(searchkey);

	// 					if(searchID) {
	// 		            $.ajax({
	// 		                url: '/greatneighbor/getSearch/'+searchID,
	// 		                type: "GET",
	// 		                data: {
	// 			               'searchID':searchID,
	// 			               'searchkey':searchkey,
	// 			             },
	// 		                dataType: "html",
	// 		                success:function(data) {
	// 		                 	$('.searchshow').html(data);
	// 		                 	//window.location = "freelancers";
	// 		                }
	// 		            });
	// 		        }else{
	// 		             $('.searchshow').empty();
	// 		        }
	// 			});

	// 	    }else{
	// 	    	$("#setkey").attr("placeholder", "Find your write choice!");
	// 	    }
	//     });
	// });



</script>