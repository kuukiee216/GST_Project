<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ActiveTable'])){
    $activeTable = $_POST['ActiveTable'];

    try {
        $sQryGetJobList = "SELECT 
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
                            cj.Status = ?;";
        $stmtGetJobList = $connection->prepare($sQryGetJobList);
        $stmtGetJobList->bindValue(1, $activeTable, PDO::PARAM_INT);
        $stmtGetJobList->execute();

        
        if($stmtGetJobList->rowCount() > 0){

            $dataResultArray = array();
            while($rowJobList = $stmtGetJobList->fetch(PDO::FETCH_ASSOC)){
                
                $rowData = array();

                # Join Employer's Name
                $EmployerName = "";

                # Map Status
                $JobStatus = mapStatus($rowJobList['Status']);

                if(strlen($rowJobList['MiddleName']) > 0){
                    $EmployerName = $rowJobList['LastName'].", ".$rowJobList['FirstName']." ".substr($rowJobList['MiddleName'], 0, 1).".";
                }
                else{
                    $EmployerName = $rowJobList['LastName'].", ".$rowJobList['FirstName'];
                }    

                $rowData['JobID'] = $rowJobList['JobID'];
                $rowData['JobTitle'] = $rowJobList['JobTitle'];
                $rowData['EmployerName'] = $EmployerName;
                $rowData['Status'] = $JobStatus;
                $rowData['Date'] = $rowJobList['DateTimeStamp'];
                $rowData['Action'] = '<button class="btn-secondary"><i class="far fa-eye"></i></button>
                                    <button class="btn-success"><i class="fas fa-check"></i></button>
                                    <button class="btn-danger"><i class="fas fa-times"></i></button>
                                    <button class="btn-warning"><i class="far fa-trash-alt"></i></button>';

                $dataResultArray[] = $rowData;
            }
            
            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }
        
    } catch(PDOException $err){


    }
}


function mapStatus($status){
    switch($status){
        case 1:
            return "Active";
        case 2:
            return "Inactive";
        case 3:
            return "Request";
        case 4:
            return "Expired";
    }
}

?>