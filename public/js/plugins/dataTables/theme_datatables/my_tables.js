var today = new Date,
    dd = today.getDate(),
    mm = today.getMonth() + 1,
    yyyy = today.getFullYear();
dd < 10 && (dd = "0" + dd), mm < 10 && (mm = "0" + mm),
     $(document).ready(function() {
        $("#user_managment").DataTable({
            dom: "Bfrtip",
            buttons: [{
                extend: "excelHtml5",
                title: "Tag Management System",
                messageTop: "Report Name : ScannedTags \n Date: " + today,
                exportOptions: {
                    rows: {
                        selected: !0
                    },
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }, {
                extend: "pdfHtml5",
                pageSize: "LEGAL",
                title: "Tag Management System",
                messageTop: "Report Name : ScannedTags \n Date: " + today,
                exportOptions: {
                    rows: {
                        selected: !0
                    },
                    columns: [0, 1, 2, 3, 4, 5]
                }
            }]
        })
    });