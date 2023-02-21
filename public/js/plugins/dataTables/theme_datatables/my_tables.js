$(document).ready(function () {
    function createExport(idName, title, rporttitleName, selectedColumn, tableColumns) {
        let todayDate = new Date().toLocaleDateString();
        $(idName).DataTable({
            dom: "Bfrtip",
            buttons: [{
                extend: "excelHtml5",
                title: title,
                messageTop: `Report Name : ${rporttitleName} \n Date: ` + todayDate,
                exportOptions: {
                    rows: {
                        selected: !selectedColumn
                    },
                    columns: tableColumns
                }
            }, {
                extend: "pdfHtml5",
                pageSize: "LEGAL",
                title: title,
                messageTop: `Report Name : ${rporttitleName} \n Date: ` + todayDate,
                exportOptions: {
                    rows: {
                        selected: !selectedColumn
                    },
                    columns: tableColumns
                }
            }]
        })
    }

    // User Management
    createExport('#user_managment', 'Asset Management', 'All Users', 0, [0, 1, 2, 3, 4, 5, 6]);

    // Company Management
    createExport('#company_management', 'Asset Management', 'All Companies', 0, [0, 1, 2]);

    // Project Management
    createExport('#projetc_management', 'Asset Management', 'Job Management', 0, [0, 1, 2, 3]);

    // Current Management
    createExport('#current_excel', 'Asset Management', 'Current Excel', 0, [0, 1, 2, 3, 4, 5]);

    // audit Management
    createExport('#scanned_tags', 'Asset Management', 'Scanned Tags', 0, [0, 1, 2, 3, 4, 5]);

    // audit Management
    createExport('#unscanned_tags', 'Asset Management', 'Unscanned Tags', 0, [0, 1, 2, 3, 4, 5]);

});