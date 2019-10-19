<?php    
$prefix = array('','đặt', 'chỗ', 'xưởng', 'nơi', 'địa chỉ', 'báo giá', 'bảng giá', 'công ty');
$dongtu = array('in', 'làm', 'sản xuất', 'thiết kế');
$danhtu = array('kỷ yếu');
$tinhtu = array('', 'uy tín', 'đẹp', 'chất lượng', 'giá rẻ', 'hcm', 'lấy liền', 'lấy ngay');

foreach($prefix as $p){
    foreach($dongtu as $dong){
        foreach($danhtu as $danh){
            foreach($tinhtu as $t){
                echo '"';
                if(!empty($p)){
                    echo $p.' ';
                }
                echo $dong.' ';
                echo $danh;
                if(!empty($t)){
                    echo ' '.$t;
                }
                echo '"<br/>';
            }
        }    
    }
}