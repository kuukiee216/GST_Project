<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['JobPostID'])){

    $JID = $_POST['JobPostID'];
    echo $JID;
    $dataResultArray = array();

    $sQryGetJobContents = "SELECT 
                            cj.JobID, 
                            cj.JobTitle, 
                            cj.Status, 
                            te.FirstName, 
                            te.MiddleName, 
                            te.LastName, 
                            jp.DateTimeStamp
                        FROM
                        tbl_companyjob as cj
                        INNER JOIN
                        tbl_employerinfo as te ON te.EmployerID = cj.EmployerID
                        INNER JOIN
                        tbl_jobposting as jp ON jp.JobID = cj.JobID
                        WHERE
                        cj.JobID = ?;";
    $stmtGetJobContents = $connection->prepare($sQryGetJobContents);
    $stmtGetJobContents->bindValue(1, $JID, PDO::PARAM_STR);
    $stmtGetJobContents->execute();

    if($stmtGetJobContents->rowCount() == 1){
        $rowJobContent = $stmtGetJobContents->fetch(PDO::FETCH_ASSOC);

        # Join Employer's Name
        $EmployerName = "";

        # Map Status
        $JobStatus = mapStatus($rowJobContent['Status']);

        if(strlen($rowJobContent['MiddleName']) > 0){
            $EmployerName = $rowJobContent['LastName'].", ".$rowJobContent['FirstName']." ".substr($rowJobContent['MiddleName'], 0, 1).".";
        }
        else{
            $EmployerName = $rowJobContent['LastName'].", ".$rowJobContent['FirstName'];
        }    

        $dataResultArray['JobID'] = $rowJobContent['JobID'];
        $dataResultArray['JobTitle'] = $rowJobContent['JobTitle'];
        $dataResultArray['EmployerName'] = $EmployerName;
        $dataResultArray['Status'] = $JobStatus;
        $dataResultArray['Date'] = $rowJobContent['DateTimeStamp'];

        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '2';
    }


}

function mapStatus($status){
    switch($status){
        case 0:
            return "Active";
        case 1:
            return "Hidden";
        case 2:
            return "Inactive";
        case 3:
            return "Request";
        case 4:
            return "Expired";
    }
}

?>