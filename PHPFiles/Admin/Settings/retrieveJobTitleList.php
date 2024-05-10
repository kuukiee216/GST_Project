<?php

require_once '../../../PHPFiles/Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

try{
    $dataResultArray = array();
    $sQryGetJobTitles = "SELECT
                        jd.JobDescriptiveID,
                        jt.JobTitleName,
                        jc.Classification,
                        js.SubClassification
                    FROM
                        tbl_jobdescriptive as jd
                    INNER JOIN
                        tbl_jobtitle as jt ON jt.JobTitleID = jd.JobTitleID

                    INNER JOIN
                        tbl_jobclassification as jc ON jc.ClassificationID = jd.ClassificationID

                    INNER JOIN
                        tbl_subclassification as js ON js.SubClassificationID = jd.SubClassificationID";

    $stmtGetJobTitles = $connection->prepare($sQryGetJobTitles);
    $stmtGetJobTitles->execute();

    if($stmtGetJobTitles->rowCount() > 0){

        while($rowJobs = $stmtGetJobTitles->fetch(PDO::FETCH_ASSOC)){
            $rowData = array();    

            $JID = $rowJobs['JobDescriptiveID'];
            $rowData['JobDescriptiveID'] = $JID;
            $rowData['JobTitle'] = $rowJobs['JobTitleName'];
            $rowData['Classification'] = $rowJobs['Classification'];
            $rowData['SubClassification'] = $rowJobs['SubClassification'];

            $rowData['Action'] = '<button class="btn-secondary" id="btnViewJobTitle'.$JID.'" onclick="viewJobTitle(this.id);" name="btnViewJobTitle"><i class="far fa-eye"></i></button>
            <button class="btn-danger"><i class="fas fa-trash" id="btnDeleteJobTitle'.$JID.'" onclick="deleteJobTitle(this.id);" name="btnDeleteJobTitle"></i></button>';

            $dataResultArray[] = $rowData;
        }
        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    }else{
        echo '1';
    }


}catch(PDOException $err){
    echo '2';
}


?>