<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

$dataResult = array();

if(isset($_POST['EmployerID'])){

    $EID = $_POST['EmployerID'];

    try{

        $sQryGetCompanyJobs = "SELECT 
                                cj.JobTitle,
                                cj.Status,
                                cou.CountryName,
                                pro.ProvinceName,
                                city.CityName
                            FROM
                                tbl_companyjob as cj
                            INNER JOIN
                                tbl_jobposting as jp ON jp.JobID = cj.JobID    
                            INNER JOIN
                                tbl_joblocation as jl ON jl.JobPostingID = jp.JobPostingID
                            INNER JOIN
                                tbl_country as cou ON cou.CountryID = jl.CountryID
                            INNER JOIN
                                tbl_province as pro ON pro.ProvinceID = jl.ProvinceID
                            INNER JOIN
                                tbl_city as city ON city.CityID = jl.CityID
                            INNER JOIN
                                tbl_employerinfo as te ON te.EmployerID = cj.EmployerID
                            WHERE
                                te.EmployerID = ?";
    
        $stmtGetCompanyJobs = $connection->prepare($sQryGetCompanyJobs);
        $stmtGetCompanyJobs->bindValue(1, $EID, PDO::PARAM_INT);
        $stmtGetCompanyJobs->execute();

        if($stmtGetCompanyJobs->rowCount() > 0){
            while($row = $stmtGetCompanyJobs->fetch(PDO::FETCH_ASSOC)){
                $JobTitle = $row['JobTitle'];
                $Country = $row['CountryName'];
                $Province = $row['ProvinceName'];
                $City = $row['CityName'];
                $Status = mapStatus($row['Status']);
                $BadgeStatus = mapBadgeStatus($row['Status']);

                $jobCard = '<div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div><i class="fas fa-map-marker-alt"></i>'. $Province .', '. $Country .'</div>
                            <div><i class="far fa-clone"></i> '. $JobTitle .'y</div>
                        </div>
                
                        <div class="col">
                            <div><i class="fas fa-database"></i> 60,000 - 80,000 Yen</div>
                            <div><i class="far fa-clock"></i> Full-Time</div>
                        </div>
                
                        <div class="col">
                            <span class="'. $BadgeStatus .'">'. $Status  .'</span>
                        </div>
                    </div>
                </div>
                </div>';
                $rowData['JobCard'] = $jobCard;
                $dataResult[] = $rowData;
            }
            
                
            echo json_encode($dataResult);
        }
    
    
    }catch(PDOException $err){
        echo $err;
    }
    
   

}else{
    echo '3';
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


function mapBadgeStatus($status){
    switch($status){
        case 1:
            return "badge badge-success";
        case 2:
            return "badge badge-default";
        case 3:
            return "badge badge-info";
        case 4: 
            return "badge badge-warning";
        case 5: 
            return "badge badge-danger";
        case 6: 
            return "badge badge-danger";
    }
}

?>