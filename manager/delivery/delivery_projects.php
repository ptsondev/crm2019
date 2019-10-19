<?php

require_once '../mylib.php';
$dbh = getDBH();

//update single record in db.
function updateSingle($pdo, $PID){
    //$discontinued = boolToInt($r['Discontinued']);
 
    $sql = 'UPDATE projects SET assigned=0, status=? WHERE PID=?'; 
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(array(STT_DA_GIAO_HANG, $PID));
 
    
    $now = time();
    $sql = "UPDATE timeline SET finish=1, created=? WHERE PID =?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($now, $PID));


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
        $sql = "Select * From projects Where status=? ORDER BY PID ASC";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(STT_DA_LAM_XONG));
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);       
        //$_SESSION["Projects"]= json_encode($projects);            
    //} 
    
    //$projects = json_decode($_SESSION["Projects"], true);
    
    
    $sb = "{\"data\":".json_encode($projects)."}";
    echo $sb;
}






