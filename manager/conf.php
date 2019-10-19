<?php

// mysql example



define('DB_HOSTNAME','localhost'); // database host name

define('DB_USERNAME', 'innhanhf_root');     // database user name

define('DB_PASSWORD', 'mysqlHaoilaHa'); // database password

define('DB_NAME', 'innhanhf_crm'); // database name 



define('STT_DA_HUY', 0);

define('STT_MOI', 1);

define('STT_DA_BAO_GIA', 2);

define('STT_DA_KY', 3);

define('STT_DA_LAM_XONG', 4);

define('STT_DA_GIAO_HANG', 5);

define('STT_DA_HOAN_THANH', 6);

define('STT_DA_XU_LY_FILE', 10);

define('STT_DA_IN', 11);





define('ROLE_ADMIN', 1);

define('ROLE_SALE', 2);

define('ROLE_DESIGN', 3);

define('ROLE_PRINT', 4);

define('ROLE_PROCESS', 5);

define('ROLE_DELIVERY', 6);





function getDBH(){

    $dsn = 'mysql:host='.DB_HOSTNAME.';dbname='.DB_NAME;

    $options = array(

        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

    ); 

    $dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);

    return $dbh;

}

//check every column name

function isValidColumn($dataIndx){

    if (preg_match('/^[a-z,A-Z]*$/', $dataIndx))

    {

        return true;

    }

    else

    {

        return false;

    }    

}

function pageHelper(&$pq_curPage, $pq_rPP, $total_Records){

    $skip = ($pq_rPP * ($pq_curPage - 1));



    if ($skip >= $total_Records)

    {        

        $pq_curPage = ceil($total_Records / $pq_rPP);

        $skip = ($pq_rPP * ($pq_curPage - 1));

    }    

    return $skip;

}



//for mapping of boolean values to TINYINT column in db.

function boolToInt($val){

    //return $val;

    if($val=='true'){

        return 1;

    }

    else if($val =='false'){

        return 0;

    }

}

//for mapping of number to booleans.

function intToBool($val){

    if($val==1){

        return true;

    }

    else if($val ==0){

        return false;

    }

}





?>

