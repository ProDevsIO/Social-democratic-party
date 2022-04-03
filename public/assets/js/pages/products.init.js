$(document).ready(function () {
    "use strict";
    $("#products-datatable").DataTable({
        responsive: false,
        aaSorting: [],

        language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
            },
            info: "Showing Brands _START_ to _END_ of _TOTAL_",
            lengthMenu:
                'Display <select class=\'form-select form-select-sm ms-1 me-1\'><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> brands',
        },
        pageLength: 10,
        columns: [
            { orderable: !0 },
            { orderable: !0 },
            { orderable: !0 },
            { orderable: !0 },
            { orderable: !1 },
        ],
        select: { style: "multi" },
        drawCallback: function () {
            $(".dataTables_paginate > .pagination").addClass(
                "pagination-rounded"
            ),
                $(".dataTables_length label").addClass("form-label"),
                $(".dataTables_filter label").addClass("form-label");
        },
    });
});
