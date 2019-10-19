<?php    
require_once('conf.php');
session_start();
$dbh = getDBH();
$sql = "Select * From variables";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $variables = $stmt->fetchAll(PDO::FETCH_ASSOC);  
        //var_dump($variables);

$tmp = array();        
$tmp['gia_1_ram_C300']=$variables[0]['value'];
$tmp['gia_1_ram_C250']=$variables[1]['value'];
$tmp['gia_1_ram_C200']=$variables[2]['value'];
$tmp['gia_1_ram_C150']=$variables[3]['value'];
$GLOBALS['variables']=$tmp;
//var_dump($GLOBALS['variables']);

?>

<?php 
/* functions */
function getAllUsers(){
    $dbh = getDBH();
    $sql = 'SELECT * FROM users ORDER BY fullname';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

function display_select_users($selected=0){
    echo '<option value="0">-- Giao cho --</option>';
    $users = getAllUsers();
    foreach($users as $u){
        if($u['ID']==$selected){
            echo '<option selected="selected" value="'.$u['ID'].'">'.$u['fullname'].'</option>';
        }else{
            echo '<option value="'.$u['ID'].'">'.$u['fullname'].'</option>';
        }
    }
}

function getTimelineByPID($pid){
    //error_log(print_r($pid, true));die;
    $dbh = getDBH();
    $sql = 'SELECT * FROM timeline WHERE PID=? ORDER BY PID ASC';
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array($pid));
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
}

function display_number($num, $so0cuoi=0){
    return number_format($num, $so0cuoi, '.', '.');
}

function is_login(){
    if(isset($_SESSION['user'])){
        return TRUE;
    }
    return FALSE;
}

function user_login($name, $pass){
    $dbh = getDBH();
     $sql = "Select * From users WHERE name=? AND password=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($name, md5($pass)));
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    if(!empty($users)){
        $users=$users[0];
        return $users;
    }
    return FALSE;
}

function user_load($uid){
    $dbh = getDBH();
     $sql = "Select * From users WHERE ID=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($uid));
        $staff = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    if(!empty($staff)){
       return $staff[0];
    }
    return FALSE;
}


 function tinhGiaGiay($soTo, $loai){
        if($loai == 'mythuat'){
            return 15000*$soTo;
        }
        switch($loai){
            case 'C150':
                return $soTo/500* $GLOBALS['variables']['gia_1_ram_C150'];
            case 'C200':
                 return $soTo/500* $GLOBALS['variables']['gia_1_ram_C200'];
            case 'C250':
                 return $soTo/500* $GLOBALS['variables']['gia_1_ram_C250'];
            case 'C300':
                 return $soTo/500* $GLOBALS['variables']['gia_1_ram_C300'];   
        }
        
    }

// https://docs.google.com/spreadsheets/d/1xnfDQw6xw2ib4ER29Edjl28dlvCqzLHF_Q1axVfmcBc/edit#gid=1079513478
function tinhGiaInOffset($size, $soBanIn, $mau=4){
    if($size=='32x43'){
        if($mau==4){
            if($soBanIn <= 3000){
                return 600000;
            }else{
                return 700000;
            }
        }else{
            return 300000;
        }
    }else if($size=='43x65'){
        if($mau==4){
            if($soBanIn <= 3000){
                return 820000;
            }else if($soBanIn  > 3000 && $soBanIn <=5000){
                return 910000;
            }else if($soBanIn  > 5000){
                return ($soBanIn*40*4)+220000;
            }
        }else{
            if($soBanIn <= 3000){
                return 400000;
            }else if($soBanIn  > 3000 && $soBanIn <=5000){
                return 450000;
            }else if($soBanIn  > 5000){
                return ($soBanIn*40)+220000;
            }
        }
    }else if($size=='65x86'){
        if($mau==4){
            if($soBanIn <= 3000){
                return 1250000;
            }else if($soBanIn  > 3000 && $soBanIn <=5000){
                return 1350000;
            }else if($soBanIn  > 5000 && $soBanIn <=20000){
                return ($soBanIn*60*4)+380000;
            }else if($soBanIn  > 20000){
                return ($soBanIn*55*4)+380000;
            }
        }else{
            if($soBanIn <= 3000){
                return 500000;
            }else if($soBanIn  > 3000 && $soBanIn <=5000){
                return 600000;
            }else if($soBanIn  > 5000 && $soBanIn <=20000){
                return ($soBanIn*60)+380000;
            }else if($soBanIn  > 20000){
                return ($soBanIn*55)+380000;
            }
        }
    }else if($size=='54x79'){
        if($mau==4){
            if($soBanIn <= 3000){
                return 910000;
            }else if($soBanIn  > 3000 && $soBanIn <=5000){
                return 1010000;
            }else if($soBanIn  > 5000){
                return ($soBanIn*45*4)+260000;
            }
        }else{
            if($soBanIn <= 3000){
                return 400000;
            }else if($soBanIn  > 3000 && $soBanIn <=5000){
                return 450000;
            }else if($soBanIn  > 5000){
                return ($soBanIn*45)+260000;
            }
        }
    }
}     

// hoàn thành bước A và tự assign bước B lại cho người tiếp theo
function reAssignProject($pid){
    $dbh = getDBH();

    $timeline = getTimelineByPID($pid);
    //error_log(print_r($timeline, true));die;
    foreach ($timeline as $t) {
        if($t['finish']==0){
            $sql = "UPDATE projects SET assigned=? WHERE PID=?";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array($t['UID'],$pid));
            break;
        }
    }
 }   

function display_site_header(){    
    if(is_login()){
        $user = $_SESSION['user'];
        echo '<div id="header-right">';
            echo '<span>Welcome, '.$user['fullname'].'</span>';
            echo '<a href="/logout.php">Thoát</a>';
        echo '</div>';

        if($user['role']==ROLE_ADMIN){
            echo '<div id="header-left">';
                echo '<a href="/manager/admin">Đơn Hàng</a>';
                echo '<a href="/manager/staff">Nhân Sự</a>';
                //echo '<a href="/manager/supplies">Vật Tư</a>';                
            echo '</div>';
        }
    }
}

 function mylog($var){
    error_log(print_r($var, true));die;
 }
