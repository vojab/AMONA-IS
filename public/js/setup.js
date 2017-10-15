$(document).ready(function() {

    // Apply select2

    $(".products-drop-down").select2();
    $(".taxes-drop-down").select2();
    $(".customers-drop-down").select2();
    $(".invoices-drop-down").select2();

    // Apply date selector and set date to Today

    $(".invoiceDate").datepicker({
        currentText: "Now",
        dateFormat: "yy-mm-dd"
    });

    var today = getTodayDate();
    $(".invoiceDate").val(today);

});

var getTodayDate = function()
{
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if ( dd < 10 ){
        dd = '0' + dd;
    }

    if (mm < 10 ) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;

    return today;
};