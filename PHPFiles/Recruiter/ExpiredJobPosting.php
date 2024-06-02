<?php

require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

try {
    $dataResultArray = array();

    $sQryRetrieveApplicantList = " SELECT  c.JobTitle, c.Status, j.DateTimeStamp, COUNT(a.ApplicationID) AS ApplicationCount
    FROM
        tbl_companyjob c
    INNER JOIN
        tbl_jobposting j ON j.JobID = c.JobID
    LEFT JOIN
    tbl_application a ON a.JobPostingID = j.JobPostingID
    WHERE
        c.status = 3
    GROUP BY 
        j.JobPostingID
    ORDER BY
        j.DateTimeStamp DESC;";

    $stmtRetrieveApplicantList = $connection->prepare($sQryRetrieveApplicantList);
    $stmtRetrieveApplicantList->execute();

    if ($stmtRetrieveApplicantList->rowCount() > 0) {

        while ($rowJob = $stmtRetrieveApplicantList->fetch(PDO::FETCH_ASSOC)) {
            $rowData = array();

            $rowData['JobTitle'] = $rowJob['JobTitle'];
            $rowData['Status'] = $rowJob['Status'];
            $rowData['ApplicationCount'] = $rowJob['ApplicationCount'];

            $dataResultArray[] = $rowData;
        }

        $jsonDataResult = json_encode($dataResultArray);
        echo $jsonDataResult;

    } else {
        echo 'No records found.';
    }

} catch (PDOException $err) {
    echo 'Error: ' . $err->getMessage();
}
