
$(document).ready(function(){
    var i = 0;
    // repeater fields for समस्या र चुनौती
    $(".add-pbl1").click(function(){
        ++i;
        $("#pbl1").append('<tr><td><div class="input-group"><input type="text" name="problem[]" class="form-control" placeholder="समस्या र चुनौती" aria-label=""><div class="input-group-append"><button class="btn btn-sm btn-danger remove-pbl1" type="button" id="add-pbl1"><i class="fa fa-minus"></i></button></div></div></td></tr>');
    });
    $(document).on('click', '.remove-pbl1', function(){  
         $(this).parents('tr').remove();
    }); 

    $(".add-pbl2").click(function(){
        ++i;
        $("#pbl2").append('<tr><td><div class="input-group"><input type="text" name="solution[]" class="form-control" placeholder="समस्या समाधानको लागि गरिएको प्रयासहरु" aria-label=""><div class="input-group-append"><button class="btn btn-sm btn-danger remove-pbl2" type="button" id="add-pbl1"><i class="fa fa-minus"></i></button></div></div></td></tr>');
    });
    $(document).on('click', '.remove-pbl2', function(){  
         $(this).parents('tr').remove();
    });

    $(".add-pbl3").click(function(){
        ++i;
        $("#pbl3").append('<tr><td><div class="input-group"><input type="text" name="suggestion[]" class="form-control" placeholder="सुझाबहरु" aria-label=""><div class="input-group-append"><button class="btn btn-sm btn-danger remove-pbl3" type="button" id="add-pbl1"><i class="fa fa-minus"></i></button></div></div></td></tr>');
    });
    $(document).on('click', '.remove-pbl3', function(){  
        $(this).parents('tr').remove();
    });
});