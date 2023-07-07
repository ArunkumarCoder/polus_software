$(document).ready(function() {

    // Denotes total number of rows
    var rowIdx = 0;

    // jQuery button click event to add a row
    $('#addBtn').on('click', function() {
         rowIdx++;
        // Adding a row inside the tbody.
        $('#tbody').append(`<tr id="R${rowIdx}">
            <td><input type="text" class="form-control" id="item_name_${rowIdx}" name="item_name[]" value="" placeholder="Item Name"></td>
            <td><input type="number" class="form-control" id="quantity_${rowIdx}" name="quantity[]" min="0" value="0" placeholder="Quantity"></td>
            <td><input type="number" class="form-control" id="unit_price_${rowIdx}" name="unit_price[]" min="0" value="0" placeholder="Unit Price"></td>
            <td>
                <select class="form-control" id="tax_percentage_${rowIdx}" name="tax_percentage[]">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
            </td>
            <td><div class="total_price">0</div></td>
            <td><div class="total_tax_price">0</div></td>
            <td class="text-center"><button class="btn btn-sm btn-danger remove" type="button">Remove</button></td>
         </tr>`);
    });

    // jQuery button click event to remove a row.
    $('#tbody').on('click', '.remove', function() {

        // Getting all the rows next to the row
        // containing the clicked button
        var child = $(this).closest('tr').nextAll();

        // Iterating across all the rows 
        // obtained to change the index
        child.each(function() {

            // Getting <tr> id.
            var id = $(this).attr('id');

            // Getting the <p> inside the .row-index class.
            var idx = $(this).children('.row-index').children('p');

            // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));

            // Modifying row index.
            idx.html(`Row ${dig - 1}`);

            // Modifying row id.
            $(this).attr('id', `R${dig - 1}`);
        });

        // Removing the current row.
        $(this).closest('tr').remove();

        // Decreasing total number of rows by 1.
        rowIdx--;
    });

   /* Quantity input change */
   $("#item_table").on("change", "input[name^='quantity']", function () {
      var row = $(this).closest("tr");
      calculate_total_price(row);
   });

   /* Unit price input change */
   $("#item_table").on("change", "input[name^='unit_price']", function () {
      var row = $(this).closest("tr");
      calculate_total_price(row);
   });

   /* tax percentage input change */
   $("#item_table").on("change", "select[name^='tax_percentage']", function () {
      var row = $(this).closest("tr");
      calculate_total_price(row);
   });

   /* Discount Apply */
   $('#discount_apply_btn').on('click', function(e) {
      if ( $('#discount').val() == "DISCOUNT10" ) {
         var subtotal_with_tax = $('#subtotal_with_tax').val();
         var discount_price = (10/100) * subtotal_with_tax;
         var subtotal_after_discount = parseFloat(subtotal_with_tax) - parseFloat(discount_price);
         $('#subtotal_with_tax_after_discount_wrapper').html('<h5><b>Discounted Subtotal:</b></h5> <input type="text" class="form-control" id="subtotal_with_tax_after_discount" name="subtotal_with_tax_after_discount" value="' + subtotal_after_discount.toFixed(2) + '" readonly>');
      } else {
         alert('Invalid Coupon Code.');
      }
   });

   /* Generate Invoice */
   $('#generate_invoice').on('click', function() {
      $.ajaxSetup({
         headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $.ajax({
         type: 'POST',
         url:'/invoice',
         data: $('form').serialize(),
         processData: false,
         contentType: false,
         success: function(data) {
            console.log(data);
         }
      });
   });

});

/* Amount calculation functions */

function calculate_total_price(row) {
   var quantity = row.find("input[name^='quantity']").val();
   if( !quantity ) {
      quantity = 0;
   }

   var unitPrice = row.find("input[name^='unit_price']").val();
   if( !unitPrice ) {
      unitPrice = 0;
   }

   var taxPercentage = row.find("select[name^='tax_percentage']").val();
   if( !taxPercentage ) {
      taxPercentage = 0;
   }

   var total_price = parseFloat(quantity) * parseFloat(unitPrice);
   var total_tax = ( parseFloat(taxPercentage)/100 ) * total_price;
   var total_tax_price = total_price + total_tax;
   row.find('.total_price').text(total_price);
   row.find('.total_tax_price').text(total_tax_price);
   calculate_subtotal_without_tax();
   calculate_subtotal_with_tax();
}

function calculate_subtotal_without_tax() {
   let gross = 0;
   $(".total_price").each(function() {
      let $el = $(this);
      gross += parseFloat($el.text());
   });

   $('#subtotal_without_tax').val(gross.toFixed(2));
}

function calculate_subtotal_with_tax() {
   let gross = 0;
   $(".total_tax_price").each(function() {
      let $el = $(this);
      gross += parseFloat($el.text());
   });
   
   $('#subtotal_with_tax').val(gross.toFixed(2));
}
