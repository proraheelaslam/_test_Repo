//scripts for priview image in add subjects categories subcategories and cards from
$("document").ready(function () {

    $('#regenrate_modal').on('hidden.bs.modal', function(){
        $(this).find('input[type=password]').val('');
        $(this).find('.ajaxerrors').html('');
    });

    $(".gallerypdf").fancybox({
        openEffect: 'elastic',
        closeEffect: 'elastic',
        autoSize: true,
        type: 'iframe',
        iframe: {
            preload: false // fixes issue with iframe and IE
        }
    });

    //on change input type img
    $("#input_img").change(function(){
        var prev_id = $(this).data('prev-id');
        readURL(this,prev_id);
    });

    function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    //on change input type pdf
    $(".input_file_prev").change(function(){
        var prev_id = $(this).data('prev-id');
        readPDFURL(this,prev_id);
    });

    function readPDFURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+id).attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    // $("#input_img1").change(function(){
    //     readURL(this,'prev_uploaded_img1');
    // });
    // $("#input_back_img").change(function(){
    //     readURL(this,'prev_uploaded_back_img');
    // });
});

$(".clickcheckbox").change(function(){
    var isChecked = $(this).is(":checked");
    if (isChecked) {
        $(this).parent('span').addClass('custom-checked');
        $(this).parent('span').removeClass('custom-unchecked');
    }else{
        $(this).parent('span').addClass('custom-unchecked');
        $(this).parent('span').removeClass('custom-checked');
    }
});

function validateInput(e){
    id = e.attr('id');
    $('#' + id).focus();
    $('.btn-loader').button('reset');
}


// // Install input numbers filters.
// $(document).ready(function() {
//     $(".onlynumbers").inputFilter(function(value) {
//         return /^\d*$/.test(value);
//     });
// });

// // Restricts input for each element in the set of matched elements to the given inputFilter.
// (function($) {
//     $.fn.inputFilter = function(inputFilter) {
//         return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
//         if (inputFilter(this.value)) {
//             this.oldValue = this.value;
//             this.oldSelectionStart = this.selectionStart;
//             this.oldSelectionEnd = this.selectionEnd;
//         } else if (this.hasOwnProperty("oldValue")) {
//             this.value = this.oldValue;
//             this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
//         }
//         });
//     };
// }(jQuery));
// // end Install input filters.

// $('#Your_Modal').on('hidden', function () {
//     $('form').find('input[type=password],').val('');
// });

// forceNumeric() plug-in implementation
jQuery.fn.forceNumeric = function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.which || e.keyCode;

            if (!e.shiftKey && !e.altKey &&
                // !e.ctrlKey &&
            // numbers   
                key >= 48 && key <= 57 ||
            // Numeric keypad
                key >= 96 && key <= 105 ||
            // comma, period and minus, . on keypad
                // key == 190 || key == 188 || key == 109 || key == 110 ||
            // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
            // Home and End
                key == 35 || key == 36 ||
            // left and right arrows
                key == 37 || key == 39 ||
            // Del and Ins and V and C
                key == 46 || key == 45 || key == 86 || key == 67 ||
            // A and X and Z
                key == 65 || key == 88 || key == 90)
                return true;

            return false;
        });
    });
}