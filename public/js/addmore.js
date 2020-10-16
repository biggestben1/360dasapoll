



var i = 1;



$("#add").click(function(){

   // alert('test');

    ++i;



    //$("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
     $("#dynamicTable").append('<div class="remove">' +
         '<div> ' +
         '<div class="form-group"> ' +
         '<label for="answer'+i+'">' +
         'Choice</label> <input type="text" name="answers[][answer]"value="" required class="form-control" id="purpose" aria-describedby="purpose" placeholder="Enter Answer '+i+'"> ' +
         '<button type="button" class="btn btn-danger remove-tr">Remove</button></div> </div>' +
         '</div>');

});



$(document).on('click', '.remove-tr', function(){

    $(this).parents('.remove').remove();

});



