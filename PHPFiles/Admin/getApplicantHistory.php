<?php

require_once '../db_config.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ApplicantID'])){

    $AID = $_POST['ApplicantID'];
    $dataResultArray = array();

    try{
         $sQryGetApplicantHistory = "SELECT
                                        app.ApplicationID,
                                        jp.JobPostingID,
                                        cj.JobTitle,
                                        cj.Status,
                                        ci.CompanyName,
                                        loc.Country,
                                        loc.City
                                    FROM
                                        tbl_application as app
                                    INNER JOIN
                                        tbl_jobposting as jp ON jp.JobPostingID = app.JobPostingID
                                    INNER JOIN
                                        tbl_companyjob as cj ON cj.JobID = jp.JobID
                                    INNER JOIN
                                        tbl_employerinfo as ei ON ei.EmployerID = cj.EmployerID
                                    INNER JOIN
                                        tbl_companyinfo as ci ON ci.CompanyID = ei.CompanyID       
                                    INNER JOIN
                                        tbl_location as loc ON loc.LocationID = cj.LocationID     
                                        
                                    WHERE 
                                        app.ApplicantID = ?";

        $stmtGetApplicantHistory = $connection->prepare($sQryGetApplicantHistory);
        $stmtGetApplicantHistory->bindValue(1, $AID, PDO::PARAM_INT);
        $stmtGetApplicantHistory->execute();


        if($stmtGetApplicantHistory->rowCount() > 0){

            while($rowApplicantHistory = $stmtGetApplicantHistory->fetch(PDO::FETCH_ASSOC)){
                $dataRow = array();

                

                $AppID = $rowApplicantHistory['ApplicationID'];
                $JobTitle = $rowApplicantHistory['JobTitle'];
                $Location = $rowApplicantHistory['City'] . ", " . $rowApplicantHistory['Country'];
                $Company = $rowApplicantHistory['CompanyName'];
                $Status = mapStatus($rowApplicantHistory['Status']);

                $dataRow['Application'] = create_Card($AppID, $JobTitle, $Location, $Company, $Status);

                $dataResultArray[] = $dataRow;
            }

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;

        }else{
            $dataRow = array();
            $dataRow['Application'] = create_Card_NoApplication();
            $dataResultArray[] = $dataRow;

            $jsonDataResult = json_encode($dataResultArray);
            echo $jsonDataResult;
        }

        

    }catch(PDOExeption $err){
        echo '2';
    }
}else{
    echo '3';
}

function create_Card($AppID, $JobTitle, $Location, $Company, $Status){

    $card = '<div class="card" id ="card'. $AppID .'">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4>'. $JobTitle .'</h4>
                            <div>'. $Location .'</div>
                        </div>

                        <div class="col">
                            <div>'. $Company  .'</div>
                        </div>

                        <div class="col">
                            <span class="badge badge-success">'. $Status .'</span>
                        </div>
                    </div>
                </div>
            </div>';

    return $card;
}

function create_Card_NoApplication(){
    
    $card = '<div class="card" id ="cardNoFound">
                <div class="card-body">
                    <div class="row">

                        <div class="col">
                            <div>No Application as of now</div>
                        </div>

                    </div>
                </div>
            </div>';

    return $card;
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