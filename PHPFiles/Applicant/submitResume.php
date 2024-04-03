<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

session_start();


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_FILES['ResumeFile']) && isset($_SESSION['AccountID'])){
    $ResumeFile = $_FILES['ResumeFile'];
    $AccountID = $_SESSION['AccountID'];
    $FileLocation = "";

    $targetFile =  "../../Documents/applicant-resume/" . basename($ResumeFile["name"]);

    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $FileLocation = basename($ResumeFile["name"]);
    $uploadStatus = 0;

    if(file_exists($targetFile)){
        if(unlink($targetFile)){
            // do nothing
        }
        else{
            $uploadStatus = 2;
        }
        
    }

    if($fileType != "pdf" && $fileType != "docx" && $fileType != "jpg" && $fileType != "jpeg" && $fileType != "png"){
        $uploadStatus = 3;
    }

    if($uploadStatus == 0){
        try{
            $sQryGetApplicantID = "SELECT 
                                    ai.ApplicantID
                                FROM
                                    tbl_applicantinfo as ai
                                WHERE
                                    AccountID = ?";
                $stmtGetApplicantID  = $connection->prepare($sQryGetApplicantID);
                $stmtGetApplicantID->bindValue(1, $AccountID, PDO::PARAM_INT);
                $stmtGetApplicantID->execute();


                $result_applicantid = $stmtGetApplicantID->fetch(PDO::FETCH_ASSOC);

            
            // Checks if applicant has resume record in tbl_document
            $sQryGetApplicantDocuments = "SELECT
                                            dc.Location
                                        FROM
                                            tbl_documents as dc
                                        WHERE 
                                            ApplicantID = ?";

                $stmtGetApplicantDocuments = $connection->prepare($sQryGetApplicantDocuments);
                $stmtGetApplicantDocuments->bindValue(1, $result_applicantid['ApplicantID'], PDO::PARAM_INT);
                $stmtGetApplicantDocuments->execute();

                $result_applicantDocuments = $stmtGetApplicantDocuments->fetch(PDO::FETCH_ASSOC);

                    /*
                        - INSERT IF NO DOCUMENT FOUND
                        - UPDATE IF DOCUMENT FOUND
                    */
                    if($result_applicantid && !$result_applicantDocuments){

                        move_uploaded_file($ResumeFile["tmp_name"], $targetFile);
                        
                        $sQrySetApplicantResume = "INSERT INTO tbl_documents (ApplicantID, Location) VALUES (?,?) ";
                            $stmtSetApplicantResume = $connection->prepare($sQrySetApplicantResume);
                            $stmtSetApplicantResume->bindValue(1, $result_applicantid['ApplicantID'], PDO::PARAM_INT);
                            $stmtSetApplicantResume->bindValue(2, $FileLocation, PDO::PARAM_STR);
                            $stmtSetApplicantResume->execute();
                            
                            echo "0";
                    }else if($result_applicantid && $result_applicantDocuments){
                        // edit this ----------------- LEFT OFF HERE
                        // Checking if the applicant's file in database does exist
                        $location_of_document = "../../Documents/applicant-resume/" . $result_applicantDocuments['Location'];
                        if(file_exists($location_of_document)){
                            if(unlink($location_of_document)){
                                // do nothing
                            }
                            else{
                                $uploadStatus = 2;
                            }
                            
                        }

                        move_uploaded_file($ResumeFile["tmp_name"], $targetFile);

                        $sQrySetApplicantResume = "UPDATE tbl_documents SET Location = :document WHERE ApplicantID = :applicantid ";
                            $stmtSetApplicantResume = $connection->prepare($sQrySetApplicantResume);
                            $stmtSetApplicantResume->bindParam(':document', $FileLocation, PDO::PARAM_STR);
                            $stmtSetApplicantResume->bindParam(':applicantid', $result_applicantid['ApplicantID'], PDO::PARAM_INT);
                            
                            $stmtSetApplicantResume->execute();
                            
                            echo "0";
                    }
        }catch(PDOException $err){
            echo $err;
        }
    }

}

?>