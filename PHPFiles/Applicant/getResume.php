<?php
require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}


if(isset($_SESSION['AccountID'])){


    $FoundFile = "";
    $AccountID = $_SESSION['AccountID'];
    /* 
        - QUERY TO GET RESUME DOCUMENT FILE NAME
        - CHECK IF FILE NAME EXISTS
        - IF EXISTS, COPY NAME FROM DIRECTORY AND TO TEMP

    */

    $sQryGetApplicantResume = "SELECT 
                            dc.Location
                        FROM
                            tbl_documents as dc
                        WHERE
                            ApplicantID 
                        IN
                            (SELECT ai.ApplicantID 
                                    FROM 
                                        tbl_applicantinfo as ai
                                    WHERE 
                                        AccountID = ?)";
        $stmtGetApplicantResume = $connection->prepare($sQryGetApplicantResume);
        $stmtGetApplicantResume->bindValue(1, $AccountID, PARAM::STR);
        $stmtGetApplicantResume->execute();

        $result = $stmtGetApplicantResume->fetch(PARAM::FETCH_ASSOC);

        if($result->rowCount() > 0){
            $FoundFile = $result['Location'];
            echo $FoundFile;
        }
}


?>