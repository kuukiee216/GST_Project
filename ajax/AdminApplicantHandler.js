function fillApplicantList(){

    $.ajax({
        type: "POST",
        datatype: "html",
        url: "../PHPFiles/Admin/getJobPostingList.php",
        success: function(data){
            console.log(data);
            if(data != null){
                var decodedData = JSON.parse(data);
                
                $('#basic-datatable25').DataTable({
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
                //$('#tblexamineelist').html(data);
            }

        }, 
        error: function(data){


        }

    })

    
}