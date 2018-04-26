// $(document).ready(function() {
//   uploadOnChange();

//   )};
$(document).ready(function() {

$('.banner-silder').owlCarousel({
     items:1,
    autoHeight:true
});



$('.also-featured').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
    dotData:true,
    responsive:{
        0:{
            items:1
        },
		400:{
            items:1
        },

        600:{
            items:2
        },
        1000:{
            items:3
        },
		1200:{
            items:3
        },
		1400:{
            items:3
        },
		1600:{
            items:3
        }
    }
});

$('.project-post-payment-option').owlCarousel({
    loop:true,
    margin:0 ,
    nav:false,
    dotData:true,
    responsive:{
        0:{
            items:1
        },
		400:{
            items:1
        },

        600:{
            items:2
        },
        1000:{
            items:3
        },
		1200:{
            items:3
        },
		1400:{
            items:3
        },
		1600:{
            items:3
        }
    }
});








// tag removed

$(".required-skills-list li span").click(function() {
    $(".required-skills-list li").eq(0).remove();
});


// upload removed

$(".project-details-attachment ul li span").click(function() {
    $(".project-details-attachment ul li").eq(0).remove();
});













$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
$(function () {
  $("#datepicker1").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

$(function () {
  $("#datepicker2").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

$(function () {
  $("#datepicker3").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
$(function () {
  $("#datepicker4").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

$(function () {
  $("#datepicker5").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
$(function () {
  $("#datepicker6").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});





$('.header-search').select2({
  minimumResultsForSearch: -1
});

$('.project-filter-select').select2({
  minimumResultsForSearch: -1
});

$('.project-categories').select2({
});

$('.project-time').select2({
	minimumResultsForSearch: -1
});


// bootstrap tag active
$('.required-skills').tagsinput({
  typeahead: {
    source: function(query) {
      return $.getJSON('citynames.json');
    }
  }
});

// Prevent users from submitting a form by hitting Enter

// $(window).keydown(function(event){
//     if(event.keyCode == 13) {
//       event.preventDefault();
//       return false;
//     }
//   });

// $(.skillenter).keydown(function(event){
//       if(event.keyCode == 13) {
//         event.preventDefault();
//         return false;
//       }
//     });



/* Number Input +and- */
jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fa fa-plus" aria-hidden="true"></i></div><div class="quantity-button quantity-down"><i class="fa fa-minus" aria-hidden="true"></i></div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
	input = spinner.find('input[type="number"]'),
	btnUp = spinner.find('.quantity-up'),
	btnDown = spinner.find('.quantity-down'),
	min = input.attr('min'),
	max = input.attr('max');

  btnUp.click(function() {
	var oldValue = parseFloat(input.val());
	if (oldValue >= max) {
	  var newVal = oldValue;
	} else {
	  var newVal = oldValue + 1;
	}
	spinner.find("input").val(newVal);
	spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
	var oldValue = parseFloat(input.val());
	if (oldValue <= min) {
	  var newVal = oldValue;
	} else {
	  var newVal = oldValue - 1;
	}
	spinner.find("input").val(newVal);
	spinner.find("input").trigger("change");
  });

});














// image upload 
function initImageUpload(box) {
  let uploadField = box.querySelector('.image-upload');

  uploadField.addEventListener('change', getFile);

  function getFile(e){
    let file = e.currentTarget.files[0];
    checkType(file);
  }
  
  function previewImage(file){
    let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();

    reader.onload = function() {
      thumb.style.backgroundImage = 'url(' + reader.result + ')';
    }
    reader.readAsDataURL(file);
    thumb.className += ' js--no-default';
  }

  function checkType(file){
    let imageType = /image.*/;
    if (!file.type.match(imageType)) {
      throw 'Datei ist kein Bild';
    } else if (!file){
      throw 'Kein Bild gewählt';
    } else {
      previewImage(file);
    }
  }
  
}

// initialize box-scope
var boxes = document.querySelectorAll('.box');

for(let i = 0; i < boxes.length; i++) {
  let box = boxes[i];
  initDropEffect(box);
  initImageUpload(box);
}


/* file upload js */
/// drop-effect
function initDropEffect(box){
  let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
  
  // get clickable area for drop effect
  area = box.querySelector('.js--image-preview');
  area.addEventListener('click', fireRipple);
  
  function fireRipple(e){
    area = e.currentTarget
    // create drop
    if(!drop){
      drop = document.createElement('span');
      drop.className = 'drop';
      this.appendChild(drop);
    }
    // reset animate class
    drop.className = 'drop';
    
    // calculate dimensions of area (longest side)
    areaWidth = getComputedStyle(this, null).getPropertyValue("width");
    areaHeight = getComputedStyle(this, null).getPropertyValue("height");
    maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));

    // set drop dimensions to fill area
    drop.style.width = maxDistance + 'px';
    drop.style.height = maxDistance + 'px';
    
    // calculate dimensions of drop
    dropWidth = getComputedStyle(this, null).getPropertyValue("width");
    dropHeight = getComputedStyle(this, null).getPropertyValue("height");
    
    // calculate relative coordinates of click
    // logic: click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center
    x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10)/2);
    y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10)/2) - 30;
    
    // position drop and animate
    drop.style.top = y + 'px';
    drop.style.left = x + 'px';
    drop.className += ' animate';
    e.stopPropagation();
    
  }
}




});



