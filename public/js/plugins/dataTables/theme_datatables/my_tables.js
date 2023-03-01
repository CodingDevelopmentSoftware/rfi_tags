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
    createExport('#user_managment', 'Tag Management System', 'All Users', 0, [0, 1, 2, 3, 4, 5, 6]);

    // Company Management
    createExport('#company_management', 'Tag Management System', 'All Companies', 0, [0, 1, 2]);

    // Project Management
    createExport('#projetc_management', 'Tag Management System', 'Job Management', 0, [0, 1, 2, 3]);

    // Current Management
    createExport('#current_excel', 'Tag Management System', 'Current Excel', 0, [0, 1, 2, 3, 4, 5]);

    // audit Management
    createExport('#scanned_tags', 'Tag Management System', 'Scanned Tags', 0, [0, 1, 2, 3, 4, 5]);

    // audit Management
    createExport('#unscanned_tags', 'Tag Management System', 'Unscanned Tags', 0, [0, 1, 2, 3, 4, 5]);

    // audit Management
    createExport('#summary_report', 'Tag Management System', 'Summary Report', 0, [0, 1, 2, 3]);

});