<?php

require_once '../../Essentials/db_config_local.php';
$clsConnect = new dbConnection();
$connection = $clsConnect->dbConnect();

if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    exit(); 
}

if(isset($_POST['ActiveTable'])){
    // 1 - EMPLOYER  2 - COMPANY  

    $activeTable = $_POST['ActiveTable'];
    try {
        //Company
        if($activeTable == '1'){
            $sQryGetEmployerList = "SELECT
                                    te.EmployerID,
                                    te.FirstName, 
                                    te.MiddleName, 
                                    te.LastName,
                                    te.EmailAddress, 
                                    ci.CompanyName,
                                    acc.Status  
                            FROM
                                tbl_employerinfo as te
                            INNER JOIN
                                tbl_companyinfo as ci ON ci.CompanyID = te.CompanyID
                            INNER JOIN
                                tbl_account as acc ON acc.AccountID = te.AccountID";
            $stmtGetEmployerList = $connection->prepare($sQryGetEmployerList);
            $stmtGetEmployerList->execute();
            if($stmtGetEmployerList->rowCount() > 0){
                $dataResultArray = array();
                while($rowEmployerList = $stmtGetEmployerList->fetch(PDO::FETCH_ASSOC)){
                    $rowData = array();
    
                    # Join Employer's Name
                    $EmployerName = "";
    
                    # Map Status
                    $EmployerStatus = mapStatus($rowEmployerList['Status']);
                    
    
                    if($rowEmployerList['MiddleName'] != NULL){
                        $EmployerName = $rowEmployerList['LastName'].", ".$rowEmployerList['FirstName']." ".substr($rowEmployerList['MiddleName'], 0, 1).".";
                    }
                    else{
                        $EmployerName = $rowEmployerList['LastName'].", ".$rowEmployerList['FirstName'];
                    }    
    
                    $rowData['CompanyName'] = $rowEmployerList['CompanyName'];
                    $rowData['EmployerName'] = $EmployerName;
                    $rowData['Email'] = $rowEmployerList['EmailAddress'];
                    $rowData['Status'] = $EmployerStatus;
                    
                    if($rowEmployerList['Status'] != 3)
                        $ButtonAction = mapActionButtons($activeTable, $rowEmployerList['EmployerID']);
                    else if($rowEmployerList['Status'] == 3)
                        $ButtonAction = mapActionButtonsForDelete($activeTable, $rowEmployerList['EmployerID']);

                    $rowData['Action'] = $ButtonAction;
    
                    $dataResultArray[] = $rowData;
                }
    
                $jsonDataResult = json_encode($dataResultArray);
                echo $jsonDataResult;
            }else{
                echo '3';
            }


        } else if($activeTable == 2){
            $sQryGetCompanyList = "SELECT   
                                        ci.CompanyID,
                                        ci.CompanyName, 
                                        ci.ContactNumber1,
                                        CONCAT(cou.CountryName, ', ', city.CityName, ' ', pro.ProvinceName) AS Location
                                FROM
                                    tbl_companyinfo as ci
                                INNER JOIN
                                    tbl_country as cou ON cou.CountryID = ci.country
                                INNER JOIN
                                    tbl_province as pro ON pro.ProvinceID = ci.state
                                INNER JOIN
                                    tbl_city as city ON city.CityID = ci.city";
            $stmtGetCompanyList = $connection->prepare($sQryGetCompanyList);
            $stmtGetCompanyList->execute();

            if($stmtGetCompanyList->rowCount() > 0){
                while($row = $stmtGetCompanyList->fetch(PDO::FETCH_ASSOC)){
                    $rowData = array();
                    $rowData['CompanyName'] = $row['CompanyName'];
                    $rowData['ContactNumber1'] = $row['ContactNumber1'];
                    $rowData['Location'] = $row['Location'];
                    $rowData['Action'] = mapActionButtons($activeTable, $row['CompanyID']);

                    $dataResultArray[] = $rowData;
                }
                $jsonDataResult = json_encode($dataResultArray);
                echo $jsonDataResult;
            }
        }

        
        
    } catch(PDOException $err){
        echo $err;
    }
}

// Mapping Functions
function mapActionButtons($activeTable, $id){

    if($activeTable == 1){  // Employers
        return '<button class="btn-secondary" id="btnViewEmployer'.$id.'" onclick="ViewEmployer(this.id);" name="btnViewEmployer"><i class="far fa-eye"></i></button>
            <button class="btn-danger" id="btnDeleteEmployer'.$id.'" name="btnDeleteEmployer" onclick= "DeleteEmployer(this.id);"><i class="far fa-trash-alt"></i></button>';
    }
    else if($activeTable == 2){ // Companies
        return '<button class="btn-secondary" id="btnViewCompany'.$id.'" onclick="ViewCompany(this.id);" name="btnViewCompany"><i class="far fa-eye"></i></button>
            <button class="btn-danger" id="btnDeleteCompany'.$id.'" name="btnDeleteCompany" onclick= "DeleteCompany(this.id);"><i class="far fa-trash-alt"></i></button>';
    }
}

function mapActionButtonsForDelete($activeTable, $id){

    if($activeTable == 1){  // Employers
        return '<button class="btn-secondary" id="btnViewEmployer'.$id.'" onclick="ViewEmployer(this.id);" name="btnViewEmployer"><i class="far fa-eye"></i></button>
            <button class="btn-success" id="btnRecoverEmployer'.$id.'" name="btnRecoverEmployer" onclick= "RecoverEmployer(this.id);"><i class="fas fa-sync-alt"></i></button>';
    }
    else if($activeTable == 2){ // Companies
        return '<button class="btn-secondary" id="btnViewCompany'.$id.'" onclick="ViewCompany(this.id);" name="btnViewCompany"><i class="far fa-eye"></i></button>
            <button class="btn-danger" id="btnDeleteCompany'.$id.'" name="btnDeleteCompany" onclick= "DeleteCompany(this.id);"><i class="fas fa-sync-alt"></i></button>';
    }
}

function mapStatus($status){
    switch($status){
        case 0:
            return "Inactive";
        case 1:
            return "Active";
        case 3:
            return "Will be Deleted";
    }
}

?>