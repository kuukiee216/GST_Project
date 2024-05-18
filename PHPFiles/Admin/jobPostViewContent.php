<?php

require_once '../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['JobPostID'])){

    $JID = $_POST['JobPostID'];
    $dataResultArray = array();

    $sQryGetJobContents = "SELECT 
                            cj.JobTitle, 
                            cj.Status, 
                            cj.Description,
                            ci.CompanyName,
                            ei.FirstName, 
                            ei.MiddleName, 
                            ei.LastName, 
                            jp.DateTimeStamp
                        FROM
                            tbl_companyjob as cj
                        INNER JOIN
                            tbl_employerinfo as ei ON ei.EmployerID = cj.EmployerID
                        INNER JOIN
                            tbl_companyinfo as ci ON ci.CompanyID = ei.CompanyID
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

        $dataResultArray['JobTitle'] = $rowJobContent['JobTitle'];
        $dataResultArray['EmployerName'] = $EmployerName;
        $dataResultArray['CompanyName'] = $rowJobContent['CompanyName'];
        $dataResultArray['Status'] = $JobStatus;
        $dataResultArray['Date'] = $rowJobContent['DateTimeStamp'];
        $dataResultArray['Description'] = $rowJobContent['Description'];

        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '2';
    }


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
        case 5: 
            return "Pending Deletion";
        case 6: 
            return "Rejected";
    }
}

?>