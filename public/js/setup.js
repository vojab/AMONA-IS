$(document).ready(function() {

    // Apply select2

    $(".products-drop-down").select2();
    $(".taxes-drop-down").select2();
    $(".customers-drop-down").select2();
    $(".invoices-drop-down").select2();

    // Apply date selector and set date to Today

    $(".invoiceDate").datepicker({
        currentText: "Now",
        dateFormat: "dd.mm.yy"
    });

    var invoiceDate = $(".invoiceDate").val();
    console.log(invoiceDate);
    if (!invoiceDate) {

        var today = getTodayDate();
        $(".invoiceDate").val(today);

    } else {

        var formattedInvoiceDate = formatInvoiceDate(invoiceDate);
        $(".invoiceDate").val(formattedInvoiceDate);
    }

});

var formatInvoiceDate = function(invoiceDate)
{
    var formattedInvoiceDate = invoiceDate.split('-');

    var dd = formattedInvoiceDate[2];
    var mm = formattedInvoiceDate[1];
    var yyyy = formattedInvoiceDate[0];

    return dd + '.' + mm + '.' + yyyy;
};

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

    //today = yyyy + '-' + mm + '-' + dd;
    today = dd + '.' + mm + '.' + yyyy;

    return today;
};