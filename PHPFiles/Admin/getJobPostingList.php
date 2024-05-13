<?php

require_once '../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ActiveTable'])){
    // 1 - ACTIVE  2 - INACTIVE  3 - REQUEST  4 - EXPIRED  5  - Marked Deletion  6 - Rejected

    $activeTable = $_POST['ActiveTable'];
    $sQryGetJobList = '';
    try {
        if($activeTable >= 4){
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
                                cj.Status IN (4, 5 ,6);";
            $stmtGetJobList = $connection->prepare($sQryGetJobList);
        } else{
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
        }
        $stmtGetJobList->execute();

        if($stmtGetJobList->rowCount() > 0){
            $dataResultArray = array();
            while($rowJobList = $stmtGetJobList->fetch(PDO::FETCH_ASSOC)){
                $rowData = array();

                # Join Employer's Name
                $EmployerName = "";

                # Map Status
                $JobStatus = mapStatus($rowJobList['Status']);
                $ButtonAction = mapActionButtons($rowJobList['Status'], $rowJobList['JobID']);

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
                $rowData['Action'] = $ButtonAction;

                $dataResultArray[] = $rowData;
            }

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }else{
            echo '2';
        }
        
    } catch(PDOException $err){
        echo $err;
    }
}

// Mapping Functions
function mapActionButtons($status, $id){

    if($status == 1){  // ACTIVE
        return '<button class="btn-secondary" id="btnViewJob'.$id.'" onclick="viewJobPost(this.id);" name="btnViewJob"><i class="far fa-eye"></i></button>
            <button class="btn-warning" id="btnHideJob'.$id.'" onclick="archiveJobPost(this.id);" name="btnHideJob"><i class="fas fa-ban"></i></button>
            <button class="btn-danger" id="btnDeleteJob'.$id.'" name="btnDeleteJob" onclick= "deleteJobPost(this.id);"><i class="far fa-trash-alt"></i></button>';
    }
    else if($status == 2){ // INACTIVE
        return '<button class="btn-secondary" id="btnViewJob'.$id.'" onclick="viewJobPost(this.id);" name="btnViewJob"><i class="far fa-eye"></i></button>
            <button class="btn-success" id="btnRepostJob'.$id.'" name="btnRepostJob" onclick= "repostJobPost(this.id);"><i class="fas fa-sync-alt"></i></button>
            <button class="btn-danger" id="btnDeleteJob'.$id.'" name="btnDeleteJob" onclick= "deleteJobPost(this.id);"><i class="far fa-trash-alt"></i></button>';
    }
    else if($status == 3){ // REQUEST
        return '<button class="btn-secondary" id="btnViewJob'.$id.'" onclick="viewJobPost(this.id);" name="btnViewJob"><i class="far fa-eye"></i></button>
            <button class="btn-success" id="btnAcceptJob'.$id.'" onclick="acceptJobPost(this.id);" name="btnAcceptJob"><i class="fas fa-check"></i></button>
            <button class="btn-danger" id="btnRejectJob'.$id.'" onclick="rejectJobPost(this.id);" name="btnRejectJob"><i class="fas fa-times"></i></button>
            <button class="btn-warning"><i class="far fa-trash-alt"></i></button>';
    }
    else if($status == 4){ // EXPIRED
        return '<button class="btn-secondary" id="btnViewJob'.$id.'" onclick="viewJobPost(this.id);" name="btnViewJob"><i class="far fa-eye"></i></button>
            <button class="btn-success" id="btnAcceptJob'.$id.'" onclick="acceptJobPost(this.id);" name="btnAcceptJob"><i class="fas fa-check"></i></button>
            <button class="btn-danger" id="btnRejectJob'.$id.'" onclick="rejectJobPost(this.id);" name="btnRejectJob"><i class="fas fa-times"></i></button>
            <button class="btn-warning" id="btnDeleteJob'.$id.'" name="btnDeleteJob" onclick= "deleteJobPost(this.id);"><i class="far fa-trash-alt"></i></button>';
    }
    else if($status == 5){ // Pending Deletion
        return '<button class="btn-secondary" id="btnViewJob'.$id.'" onclick="viewJobPost(this.id);" name="btnViewJob"><i class="far fa-eye"></i></button>
        <button class="btn-success" id="btnRecoverJob'.$id.'" name="btnRecoverJob" onclick= "recoverJobPost(this.id);"><i class="fas fa-sync-alt"></i></button>';
    }
    else if($status == 6){ // Rejected
        return '<button class="btn-secondary" id="btnViewJob'.$id.'" onclick="viewJobPost(this.id);" name="btnViewJob"><i class="far fa-eye"></i></button>';
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