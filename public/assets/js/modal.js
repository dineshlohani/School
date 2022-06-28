$(document).ready(function(){
 	$(document).on('show.bs.modal','#frmadd', function (e) {
    var url = $(e.relatedTarget).data('url');
     $.ajax({
        type : 'GET',
        url : url, //Here you will fetch records 
        data: {}, //Pass $id
        success : function(data){
          //console.log(data);
          $("#frmadd").find('.modal-content').html(data.view);
        }
      });
  });

  $(document).on('show.bs.modal','#frmedit', function (e) {
    var id = $(e.relatedTarget).data('id');
    var url = $(e.relatedTarget).data('url');
    $.ajax({
      type : 'GET',
      url : url, //Here you will fetch records 
     data: {id:id},
      success : function(data){
        console.log(data);
        $("#frmedit").find('.modal-content').html(data.view);
      }
    });
  });

})