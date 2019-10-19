<?php 
    require_once '../mylib.php';
    require_once '../include.php';
    
?>

<body class="page-print">
   <div class="container">
        <h1>Tính Giá Catalogue</h1>             
        <div id="main-content">                        
            <div class="row">                
            <div class="col-sm-4 col-xs-12">
            <?php                        
            $size= "a4dung";            
            $quantity = 500;
            $pages = 12;
            $bGiay = 'C250';
            $bCan = true;
            $rGiay = 'C150';
            $rCan = false;
            $heSoLoi = 0.4;
            $bmau = $rmau = 4;
            $bchiDinhIn = $rchiDinhIn = 'innhanh';
            $kieuDong ='bamkim';

            if(isset($_REQUEST['slSize'])){
                $size = $_REQUEST['slSize'];
            }                                
            if(isset($_REQUEST['txtQuantity'])){
                $quantity = $_REQUEST['txtQuantity'];
            }
            if(isset($_REQUEST['txtPages'])){
                $pages = $_REQUEST['txtPages'];
            }
            if(isset($_REQUEST['txtQuantity'])){
                $quantity = $_REQUEST['txtQuantity'];
            }
            if(isset($_REQUEST['bGiay'])){
                $bGiay = $_REQUEST['bGiay'];
            }
            if(isset($_REQUEST['bCan'])){
                $bCan = $_REQUEST['bCan'];
            }
            if(isset($_REQUEST['rGiay'])){
                $rGiay = $_REQUEST['rGiay'];
            }
            if(isset($_REQUEST['rCan'])){
                $rCan = $_REQUEST['rCan'];
            }
            if(isset($_REQUEST['heSoLoi'])){
                $heSoLoi = $_REQUEST['heSoLoi'];
            }
            if(isset($_REQUEST['bmau'])){
                $bmau = $_REQUEST['bmau'];
            }
            if(isset($_REQUEST['rmau'])){
                $rmau = $_REQUEST['rmau'];
            }
            if(isset($_REQUEST['bchiDinhIn'])){
                $bchiDinhIn = $_REQUEST['bchiDinhIn'];
            }
            if(isset($_REQUEST['rchiDinhIn'])){
                $rchiDinhIn = $_REQUEST['rchiDinhIn'];
            }
            if(isset($_REQUEST['kieuDong'])){
                $kieuDong = $_REQUEST['kieuDong'];
            }


        ?>
        <form id="frmBrochure">
            <label> Kích thước: </label>
            <select name="slSize">
                <option value="a4dung" <?php if($size=='a4dung') echo "selected"; ?> >A4 Đứng</option> 
                <option value="a4ngang" <?php if($size=='a4ngang') echo "selected"; ?> >A4 Ngang</option> 
                <option value="a5" <?php if($size=='a5') echo "selected"; ?> >A5</option>                
            </select> <br />
            
            <label>Số trang:</label>
            <input type="numeric" name="txtPages" value="<?php if($pages!=0) echo $pages; ?>" />  <br />
            
            <label>Số thành phẩm: </label>
            <input type="numeric" name="txtQuantity" value="<?php if($quantity!=0) echo $quantity; ?>" />  <hr />
            
            <h4>Bìa</h4>
            <label>Loại giấy:</label>
            <select name="bGiay">
                <option value="C150" <?php if($bGiay=='C150') echo "selected"; ?> >C150</option>
                <option value="C200" <?php if($bGiay=='C200') echo "selected"; ?> >C200</option>
                <option value="C250" <?php if($bGiay=='C250') echo "selected"; ?> >C250</option>
                <option value="C300" <?php if($bGiay=='C300') echo "selected"; ?> >C300</option>
                <option value="mythuat" <?php if($bGiay=='mythuat') echo "selected"; ?> >Mỹ Thuật</option>
            </select>  <br />            
            <label>In Mấy Màu:</label>
            <select name="bmau">
                <option value="4" <?php if($bmau==4) echo "selected"; ?> >4 màu</option>   
                <option value="1" <?php if($bmau==1) echo "selected"; ?> >1 màu</option>                             
            </select>  <br />
            <label><b>Loại In</b></label>
            <select name="bchiDinhIn">
                <option value="innhanh" <?php if($bchiDinhIn == 'innhanh') echo "selected"; ?> >In Nhanh</option>
                <option value="inoffset" <?php if($bchiDinhIn == 'inoffset') echo "selected"; ?> >In Offset</option>
            </select> <br />
            <label>Cán màng?</label>
            <input type="checkbox" name="bCan" <?php if($bCan) echo "checked"; ?> /> <hr />
            
            
             <h4>Ruột</h4>
            <label>Loại giấy:</label>
            <select name="rGiay">
                <option value="C150" <?php if($rGiay=='C150') echo "selected"; ?> >C150</option>
                <option value="C200" <?php if($rGiay=='C200') echo "selected"; ?> >C200</option>
                <option value="C250" <?php if($rGiay=='C250') echo "selected"; ?> >C250</option>
                <option value="C300" <?php if($rGiay=='C300') echo "selected"; ?> >C300</option>   
                <option value="mythuat" <?php if($rGiay=='mythuat') echo "selected"; ?> >Mỹ Thuật</option>                             
            </select>  <br />        
            <label>In Mấy Màu:</label>
            <select name="rmau">
                <option value="4" <?php if($rmau==4) echo "selected"; ?> >4 màu</option>   
                <option value="1" <?php if($rmau==1) echo "selected"; ?> >1 màu</option>                             
            </select>  <br />    
            <label><b>Loại In</b></label>
            <select name="rchiDinhIn">
                <option value="innhanh" <?php if($rchiDinhIn == 'innhanh') echo "selected"; ?> >In Nhanh</option>
                <option value="inoffset" <?php if($rchiDinhIn == 'inoffset') echo "selected"; ?> >In Offset</option>
            </select> <br />
            <label>Cán màng?</label>
            <input type="checkbox" name="rCan" <?php if($rCan) echo "checked"; ?> /> <hr />
            
            <label>Kiểu đóng cuốn</label>
            <select name="kieuDong">
                <option value="bamkim" <?php if($kieuDong == 'bamkim') echo "selected"; ?> >Bấm Kim</option>
                <option value="keonhiet" <?php if($kieuDong == 'keonhiet') echo "selected"; ?> >Keo Nhiệt</option>
                <option value="loxo" <?php if($kieuDong == 'loxo') echo "selected"; ?> >Lò Xo</option>
            </select> <br />
            <label>Hệ số lời</label>
            <select name="heSoLoi">
                <option value="0.3" <?php if($heSoLoi == 0.3) echo "selected"; ?> >0.3</option>
                <option value="0.4" <?php if($heSoLoi == 0.4) echo "selected"; ?> >0.4</option>
                <option value="0.5" <?php if($heSoLoi == 0.5) echo "selected"; ?> >0.5</option>
                <option value="0.6" <?php if($heSoLoi == 0.6) echo "selected"; ?> >0.6</option>
                <option value="0.7" <?php if($heSoLoi == 0.7) echo "selected"; ?> >0.7</option>
                <option value="0.8" <?php if($heSoLoi == 0.8) echo "selected"; ?> >0.8</option>
                <option value="0.9" <?php if($heSoLoi == 0.9) echo "selected"; ?> >0.9</option>
                <option value="1" <?php if($heSoLoi == 1) echo "selected"; ?> >1</option>
            </select> <br />
            
            <input type="submit" name="btnSubmit" /><br />
            
        </form>
        
        </div>
                
        <div class="col-sm-8 col-xs-12">
            <h3>Kết Quả</h3>
        <?php                 
            if(isset($_REQUEST['btnSubmit'])){
                // kiem tra chia het cho 4
                if($pages%4!=0){
                    echo 'Loi! Tong so trang phai chia het cho 4';
                    return '';
                }
                echo '<table id="tbResult">';
                    echo '<tr><td class="title" colspan="3">Bìa - '.$bchiDinhIn.'</td></tr>';
                $phi = $phiIn = $phiGiay = $phiGiaCong = 0;
                // tính bìa riêng, ruột riêng    

                /* bia */                
                if($bchiDinhIn =='innhanh'){
                    $clickBia = 0;
                    $soTo6586_inbia = 0;
                    if($size=='a4dung'){
                        $clickBia = $quantity * 4;
                        $soTo6586_inbia = ceil($quantity/4);
                    }else if($size=='a4ngang'){
                        $clickBia = $quantity * 6;
                        $soTo6586_inbia = ceil($quantity/4);
                    }else if($size=='a5'){
                        $clickBia = $quantity * 2;
                        $soTo6586_inbia = ceil($quantity/8);
                    }
                    $phiInBia = $clickBia * 660;                    
                    $displayPhiInBia = '('.$clickBia.' click)';
                    if($bmau==1){ // trang den
                        $phiInBia = $clickBia * 240;
                        $displayPhiInBia = '('.$clickBia.' click trắng đen)';
                    }
                    $phiGiayBia = tinhGiaGiay($soTo6586_inbia, $bGiay);
                    $displayPhiGiayBia = '('.$soTo6586_inbia.' tờ 65x86 '.$bGiay.')';
                    echo '<tr><td>Phí In</td><td>'.display_number($phiInBia).'</td><td>'.$displayPhiInBia.'</td></tr>';
                    echo '<tr><td>Phí Giấy</td><td>'.display_number($phiGiayBia).'</td><td>'.$soTo6586_inbia.' tờ 65x86 '.$bGiay.'</td></tr>';
                }else{ // in offset
                    //if($size=='a4dung' || $size == 'a4ngang'){
                        $soBai6543 = ceil($quantity/2)+50;
                        $phiInBia = tinhGiaInOffset('43x65', $soBai6543, $bmau);
                        $displayPhiInBia = '1 bài 43x65';
                        $soTo6586_inbia = ceil($soBai6543/2);
                    
                    if($size=='a5'){
                        $soBai3243 = ceil($quantity/2)+50;
                        $phiInBia = tinhGiaInOffset('32x43', $soBai3243, $bmau);
                        $displayPhiInBia = '1 bài 32x43';
                        $soTo6586_inbia = ceil($soBai6543/4);
                    }
                    $phiGiayBia = tinhGiaGiay($soTo6586_inbia, $bGiay);
                    $displayPhiGiayBia = '('.$soTo6586_inbia.' tờ 65x86 '.$bGiay.')';
                    echo '<tr><td>Phí In</td><td>'.display_number($phiInBia).'</td><td>'.$displayPhiInBia.'</td></tr>';
                    echo '<tr><td>Phí Giấy</td><td>'.display_number($phiGiayBia).'</td><td>'.$soTo6586_inbia.' tờ 65x86 '.$bGiay.'</td></tr>';
                }


                echo '<tr class="split"><td colspan="3"></td></tr>';
                echo '<tr><td class="title" colspan="3">Ruột - '.$rchiDinhIn.'</td></tr>';

                /* ruot */
                $soTrangConLai = $pages - 4;
                if($rchiDinhIn =='innhanh'){
                    $clickRuot = 0;
                    $soTo6586_inruot = 0;                    
                    if($size=='a4dung'){
                        $clickRuot = $quantity * $soTrangConLai;
                        $soTo6586_inruot = ceil($quantity * $soTrangConLai/8);
                    }else if($size=='a4ngang'){
                        $clickRuot = ceil($quantity * $soTrangConLai * 3 / 2);
                        $soTo6586_inruot = ceil($quantity * $soTrangConLai/8);
                    }else if($size=='a5'){
                        $clickRuot = $quantity * $soTrangConLai / 2;
                        $soTo6586_inruot = ceil($quantity * $soTrangConLai/16);
                    }
                    $phiInRuot = $clickRuot * 660;
                    $displayPhiInRuot = '('.$clickRuot.' click)';
                    if($rmau==1){
                        $phiInRuot = $clickRuot * 240;
                        $displayPhiInRuot = '('.$clickRuot.' click trắng đen)';
                    }
                    $phiGiayInRuot = tinhGiaGiay($soTo6586_inruot, $rGiay);
                    echo '<tr><td>Phí In</td><td>'.display_number($phiInRuot).'</td><td>'.$displayPhiInRuot.'</td></tr>';
                    echo '<tr><td>Phí Giấy</td><td>'.display_number($phiGiayInRuot).'</td><td>'.$soTo6586_inruot.' tờ 65x86 '.$rGiay.'</td></tr>';
                }else{ // in offset

                    $soBai6586 = $soBai6543 = $soBai3243 = 0;   
                    if($size=='a5'){
                        $soBai6586 = $soBai6543 = $soBai3243 = 0;     
                        $soTo6586 = 0;                   
                        $phiInRuot = 0;
                        while($soTrangConLai>=4){
                            if($soTrangConLai>=16){
                                $soBai6586+=1;
                                $soBanIn = ceil($quantity/2)+50;
                                $phiInRuot += tinhGiaInOffset('65x86', $soBanIn, $rmau);
                                $soTo6586 += $soBanIn;
                                $soTrangConLai-=16;
                            }else if($soTrangConLai>=8){
                                $soBai6543+=1;
                                $soBanIn = ceil($quantity/2)+50;
                                $phiInRuot += tinhGiaInOffset('43x65', $soBanIn, $rmau);
                                $soTo6586 += ceil($soBanIn/2);
                                $soTrangConLai-=8;
                            }else if($soTrangConLai>=4){
                                $soBai3243+=1;
                                $soBanIn = ceil($quantity/2)+50;
                                $phiInRuot += tinhGiaInOffset('32x43', $soBanIn, $rmau);
                                $soTo6586 += ceil($soBanIn/4);
                                $soTrangConLai-=4;
                            }
                        }
                        if($soTrangConLai>0){ // còn xót mấy trang < 8 trang
                            $soBai3243+=1;
                            $soBanIn = ceil($quantity/2)+50;
                            $phiInRuot += tinhGiaInOffset('32x43', $soBanIn, $rmau);
                            $soTo6586 += ceil($soBanIn/4);
                        }
                    }else{ // a4 đứng hoặc a4 ngang đều đúng case này
                        $soBai6586 = $soBai6543 = $soBai3243 = 0;     
                        $soTo6586 = 0;                   
                        $phiInRuot = 0;
                        while($soTrangConLai>4){
                            if($soTrangConLai>=8){
                                $soBai6586+=1;
                                $soBanIn = ceil($quantity/2)+50;
                                $phiInRuot += tinhGiaInOffset('65x86', $soBanIn, $rmau);
                                $soTo6586 += $soBanIn;
                                $soTrangConLai-=8;
                            }else if($soTrangConLai>=4){
                                $soBai6543+=1;
                                $soBanIn = ceil($quantity/2)+50;
                                $phiInRuot += tinhGiaInOffset('43x65', $soBanIn, $rmau);
                                $soTo6586 += ceil($soBanIn/2);
                                $soTrangConLai-=4;
                            }                            
                        }
                        if($soTrangConLai>0){ // còn xót mấy trang < 8 trang
                              $soBai6543+=1;
                                $soBanIn = ceil($quantity/2)+50;
                                $phiInRuot += tinhGiaInOffset('43x65', $soBanIn, $rmau);
                                $soTo6586 += ceil($soBanIn/2);
                                $soTrangConLai-=4;
                        }
                    }
                    $displayPhiInRuot = '';
                    if($soBai6586>0){
                        $displayPhiInRuot.= ' + '.$soBai6586.' bài 65x86';
                    }
                    if($soBai6543>0){
                        $displayPhiInRuot.= ' + '.$soBai6543.' bài 43x65';
                    }
                    if($soBai3243>0){
                        $displayPhiInRuot.= ' + '.$soBai3243.' bài 32x43';
                    }
                    $phiGiayInRuot = tinhGiaGiay($soTo6586, $rGiay);
                    echo '<tr><td>Phí In</td><td>'.display_number($phiInRuot).'</td><td>('.$displayPhiInRuot.')</td></tr>';
                    echo '<tr><td>Phí Giấy</td><td>'.display_number($phiGiayInRuot).'</td><td>'.$soTo6586.' tờ 65x86 '.$rGiay.'</td></tr>';

                }

                // gia cong
                $phiGiaCong = 0;
                if($bCan){
                    $phiGiaCong += 1200*$quantity;    
                }
                if($rCan){
                    $phiGiaCong += 600*$pages*$quantity;    
                }
                if($kieuDong == 'keonhiet'){
                    if($quantity <= 50){
                        $phiGiaCong += (10000 * $quantity);
                    }else if($quantity > 50 && $quantity <= 200){
                        $phiGiaCong += (8000 * $quantity);
                    }else if($quantity > 200 && $quantity <= 500){
                        $phiGiaCong += (6000 * $quantity);                    
                    }else if($quantity > 500 && $quantity <= 2000){
                        $phiGiaCong += (5000 * $quantity);
                    }else if($quantity > 2000){
                        $phiGiaCong += (4000 * $quantity);
                    }
                }
                if($kieuDong == 'bamkim'){
                    if($quantity <= 50){
                        $phiGiaCong += (2100 * $quantity);
                    }else if($quantity > 50 && $quantity <= 200){
                        $phiGiaCong += (1500 * $quantity);
                    }else if($quantity > 200 && $quantity <= 500){
                        $phiGiaCong += (1000 * $quantity);                    
                    }else if($quantity > 500 && $quantity <= 2000){
                        $phiGiaCong += (600 * $quantity);
                    }else if($quantity > 2000){
                        $phiGiaCong += (300 * $quantity);
                    }
                }
                if($kieuDong == 'loxo'){
                    if($quantity <= 50){
                        $phiGiaCong += (6000 * $quantity);
                    }else if($quantity > 50 && $quantity <= 200){
                        $phiGiaCong += (5000 * $quantity);
                    }else if($quantity > 200 && $quantity <= 500){
                        $phiGiaCong += (4000 * $quantity);                    
                    }else if($quantity > 500 && $quantity <= 2000){
                        $phiGiaCong += (3000 * $quantity);
                    }else if($quantity > 2000){
                        $phiGiaCong += (2000 * $quantity);
                    }
                }
                echo '<tr class="split"><td colspan="3"></td></tr>';
                echo '<tr><td class="title"  colspan="3">Gia Công</td></tr>';
                echo '<tr><td>Phí Gia Công</td><td>'.display_number($phiGiaCong).'</td><td>Cán màng + Đóng cuốn</td></tr>';

                $giaGoc = $phiInBia + $phiGiayBia + $phiInRuot +$phiGiayInRuot + $phiGiaCong;
                $loi = $giaGoc * $heSoLoi;
                $giaBao = $giaGoc + $loi;
                $donGia = ceil($giaBao/$quantity);
                echo '<tr class="split"><td colspan="3"></td></tr>';
                echo '<tr><td class="title"  colspan="3">Tổng</td></tr>';
                echo '<tr><td>Giá Báo</td><td>'.display_number($giaBao).'</td><td>(Đơn giá: '.display_number($donGia).')</td></tr>';
                echo '<tr><td>Giá Gốc</td><td>'.display_number($giaGoc).'</td><td>(Lời: '.display_number($loi).')</td></tr>';                
                
            }
                    
        ?>
        </div>
    </div>
    </div>
</body>

