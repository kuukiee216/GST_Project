function fillApplicantList(activeTable){
    
    $.ajax({
        type: "POST",
        datatype: "html",
        data:{
            ActiveTable: activeTable
        },
        url: "../PHPFiles/Admin/getJobPostingList.php",
        success: function(data){
            console.log(data);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                if($.fn.DataTable.isDataTable('#tblActiveJobPosting')){
                    $('#tblActiveJobPosting').DataTable().destroy();
                }

                $('#tblActiveJobPosting').DataTable({
                    pageLength: 10,
                    data: decodedData,
                    columns: [
                        { data: 'JobID' },
                        { data: 'JobTitle' },
                        { data: 'EmployerName' },
                        { data: 'Status' },
                        { data: 'Date' },
                        { data: 'Action' }
                    ]
                });

                //$('#tblActiveJobPosting').DataTable.destroy();
                //$('#tblexamineelist').html(data);
            }

        }, 
        error: function(data){


        }

    })

    
}