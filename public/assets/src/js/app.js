// sandbox disable popups
if (window.self !== window.top && window.name != "view1") {
  window.alert = function() {
    /*disable alert*/
  };
  window.confirm = function() {
    /*disable confirm*/
  };
  window.prompt = function() {
    /*disable prompt*/
  };
  window.open = function() {
    /*disable open*/
  };
}

// prevent href=# click jump
document.addEventListener(
  "DOMContentLoaded",
  function() {
    var links = document.getElementsByTagName("A");
    for (var i = 0; i < links.length; i++) {
      if (links[i].href.indexOf("#") != -1) {
        links[i].addEventListener("click", function(e) {
          console.debug("prevent href=# click");
          if (this.hash) {
            if (this.hash == "#") {
              e.preventDefault();
              return false;
            } else {
              /*
                  var el = document.getElementById(this.hash.replace(/#/, ""));
                  if (el) {
                    el.scrollIntoView(true);
                  }
                  */
            }
          }
          return false;
        });
      }
    }
  },
  false
);


$(document).ready(function() {
  $("[data-toggle=offcanvas]").click(function() {
    $(".row-offcanvas").toggleClass("active");
  });

  // dataTable
  $('#company-list').DataTable();

  // Shop List
    $('#shop-list').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
});
