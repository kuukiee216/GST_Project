<?php
require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{

    $dataResultArray = array();

    $sQryGetApplicationsList = "SELECT
                                app.ApplicationID,
                                app.DateTimeStamp,
                                app.Status,
                                ai.FirstName,
                                ai.LastName,
                                ai.MiddleName
                            FROM
                                tbl_application as app
                            INNER JOIN
                                tbl_applicantinfo as ai ON ai.ApplicantID = app.ApplicantID";
    $stmtGetApplicantList = $connection->prepare($sQryGetApplicationsList);
    $stmtGetApplicantList->execute();
    
    if($stmtGetApplicantList->rowCount() > 0){

        while($rowApplications = $stmtGetApplicantList->fetch(PDO::FETCH_ASSOC)){
            $dataRow = array();

            $AID = $rowApplications['ApplicationID'];
            $ApplicantName = "";
            $Status = mapStatus($rowApplications['Status']);

            if(strlen($rowApplications['MiddleName']) > 0){
                $ApplicantName = $rowApplications['LastName'].", ".$rowApplications['FirstName']." ".substr($rowApplications['MiddleName'], 0, 1).".";
            }
            else{
                $ApplicantName = $rowApplications['LastName'].", ".$rowApplications['FirstName'];
            }    

            $dataRow['ApplicationID'] = $AID;
            $dataRow['ApplicantName'] = $ApplicantName;
            $dataRow['ApplicationReview'] = '<a href="application_2.php#'. $AID .'" class="btn btn-secondary">View</a>';
            $dataRow['SubmittedDate'] = $rowApplications['DateTimeStamp'];
            $dataRow['Status'] = $Status;

            $dataResultArray[] = $dataRow;

        }
        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '2';
    }
                                        


}catch(PDOException $err){  
    echo '3';
}

function mapStatus($status){
    switch($status){
        case 1:
            return "Active";
        case 2:
            return "Inactive";
        case 3:
            return "Pending";
        case 4: 
            return "Expired";
    }
}

?>