<?php

require_once '../mylib.php';
$dbh = getDBH();


if(isset($_REQUEST['action']) && $_REQUEST['action']=='updateTimeLine' ){
	$pid = $_REQUEST['pid'];
	
	$sql = "UPDATE timeline SET UID=? WHERE TID=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_REQUEST['saleUID'], $_REQUEST['saleTID']));


    $sql = "UPDATE timeline SET UID=? WHERE TID=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_REQUEST['xuLyFileUID'], $_REQUEST['xuLyFileTID']));


    $sql = "UPDATE timeline SET UID=? WHERE TID=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_REQUEST['inUID'], $_REQUEST['inTID']));


    $sql = "UPDATE timeline SET UID=? WHERE TID=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_REQUEST['giaCongUID'], $_REQUEST['giaCongTID']));


    $sql = "UPDATE timeline SET UID=? WHERE TID=?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($_REQUEST['giaoHangUID'], $_REQUEST['giaoHangTID']));

    // set lại assign project đó cho row nào chưa hoàn thành (đang thực hiện)
    
    reAssignProject($pid);

    echo "1";
}