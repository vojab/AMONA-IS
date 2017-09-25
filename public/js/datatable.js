$(document).ready(function() {

    var dataTableFilter = $(".dataTables_filter");
    if (dataTableFilter) {
        $(dataTableFilter).remove();
    }

    var dataTablePaginationInfo = $("#dataTableBuilder_info");
    if (dataTablePaginationInfo) {
        $(dataTablePaginationInfo).remove();
    }

    var dataTablePagination = $("#dataTableBuilder_paginate");
    if (dataTablePagination) {
        $(dataTablePagination).remove();
    }
});