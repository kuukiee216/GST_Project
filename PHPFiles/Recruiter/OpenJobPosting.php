<?php

require_once '../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit();
}

try {
    $dataResultArray = array();

    $sQryRetrieveApplicantList = " SELECT 
    c.JobID,
    c.JobTitle, 
    c.Status,
    j.ViewCount, 
    COUNT(a.ApplicationID) AS ApplicationCount
FROM
    tbl_companyjob c
INNER JOIN
    tbl_jobposting j ON j.JobID = c.JobID
LEFT JOIN
    tbl_application a ON a.JobPostingID = j.JobPostingID
WHERE
    c.Status IN (1, 2)
GROUP BY
    j.JobPostingID
ORDER BY
    j.DateTimeStamp DESC
LIMIT 5;";

    $stmtRetrieveApplicantList = $connection->prepare($sQryRetrieveApplicantList);
    $stmtRetrieveApplicantList->execute();

    if ($stmtRetrieveApplicantList->rowCount() > 0) {

        while ($rowJob = $stmtRetrieveApplicantList->fetch(PDO::FETCH_ASSOC)) {
            $rowData = array();
            $rowData['JobID'] = $rowJob['JobID'];
            $rowData['JobTitle'] = $rowJob['JobTitle'];
            $rowData['ViewCount'] = $rowJob['ViewCount'];
            $rowData['ApplicationCount'] = $rowJob['ApplicationCount'];
            $rowData['Status'] = $rowJob['Status'];

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
