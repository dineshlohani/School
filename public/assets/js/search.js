$(document).ready(function(){
  $(document).off('submit', '.search-form').on('submit', '.search-form', function(e){
      e.preventDefault();
      var obj = $(this),
      url = obj.attr('action');
      form_data = new FormData(obj[0]);
      $.ajax({
        url : url,
        dataType: 'json',
        contentType: false,
        processData: false,
        data : form_data,
        type : "POST",
        beforeSend: function () {
         obj.find('.search-btn').html('<i class="fa fa-spinner fa-spin"></i> Loading...');
        },
        success: function(resp) {
         $('.details').html(resp.view);
         obj.find('.search-btn').html('<i class="fa fa-search"></i> खोज्नुहोस');

        }, 
        error: function() {
          console.log('Internal Server Error!');
        }
      });
    });
});