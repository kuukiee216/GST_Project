function fillDashboardTotals(){
    $.ajax({
        type: 'GET',
        url: '../PHPFiles/Admin/Dashboard/dashboardtotalsget.php',
        datatype: 'html',
        success: function(response){
            if(response == '1'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Dashboard Totals!',
                    message: 'Something went wrong while retrieving dashboard totals. Data handling failed, please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '2'){
                $.notify({
                    // options
                    icon: 'flaticon-error',
                    title: 'Failed to Retrieve Dashboard Totals!',
                    message: 'Something went wrong while retrieving dashboard totals. Please try again later.'
                },{
                    // settings
                    type: 'danger'
                });
            }
            else if(response == '3'){
                $.notify({
                    // options
                    icon: 'flaticon-exclamation',
                    title: 'No Dashboard Totals Found!',
                    message: 'Currently, there is no dashboard total statistics. Please try and check again later.'
                },{
                    // settings
                    type: 'info'
                });
            }
            else{
                var decodedResponse = JSON.parse(response);

                $('#lblTotalCandidates').text(decodedResponse.TotalCandidates);
                $('#lblTotalListedJobs').text(decodedResponse.TotalListedJobs);
                $('#lblTotalEmployers').text(decodedResponse.TotalEmployers);
            }
        },
        error: function(){
            $.notify({
                // options
                icon: 'flaticon-error',
                title: 'Failed to Connect to Server!',
                message: 'Something went wrong while connecting to server. Please try again later.'
            },{
                // settings
                type: 'danger'
            });
        }
    });
}