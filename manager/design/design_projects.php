<?php

require_once '../mylib.php';
$dbh = getDBH();

//update single record in db.
function updateSingle($pdo, $PID){
    $dbh = getDBH();

    //$discontinued = boolToInt($r['Discontinued']);
    $user = $_SESSION['user'];
    $sql = 'SELECT MIN(TID) AS TID FROM timeline WHERE PID=? AND UID=?';
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($PID, $user['ID']));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    $TID = $result[0]['TID'];
    //mylog($TID);

    
    $now = time();
    $sql = "UPDATE timeline SET finish=1, created=? WHERE TID =?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($now, $TID));
    // asign lai cho nhan vien in an
    reAssignProject($PID);

    if($result == false) {
        throw new Exception(print_r($stmt->errorInfo(),1).PHP_EOL.$sql);
    }
}


if( isset($_REQUEST['PID'] )){
    $PID = $_REQUEST['PID'];
    updateSingle($dbh, $PID);
    echo "1";
    
}else{
    //session_start();
   // if (!isset($_SESSION["Projects"]))
    //{ 
        //add in session["Projects"];
        $user = $_SESSION['user'];
        //var_dump($user);
        $sql = "Select * From projects Where assigned = ? ORDER BY PID ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($user['ID']));
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);       
        //$_SESSION["Projects"]= json_encode($projects);            
    //} 
    
    //$projects = json_decode($_SESSION["Projects"], true);
    
    
    $sb = "{\"data\":".json_encode($projects)."}";
    echo $sb;
}






