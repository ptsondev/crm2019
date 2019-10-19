function formatNumber (num) {
    num = num.toString();
    num = num.replace(/\./g, '');
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function removeFormatNumber(num){
    if(!num){
        return 0;
    }
    return parseInt(num.replace(/\./g, ''));
}

function showStatus(status){  
        if(status==0){
            return 'Hủy - Không làm';            
        }else if(status==1){
            return 'Mới';            
        }else if(status==2){
            return 'Đã Báo Giá';            
        }else if(status==3){
            return 'Đã Ký';            
        }else if(status==4){
            return 'Đã Làm Xong';            
        }else if(status==5){
            return 'Đã Giao Hàng';            
        }else if(status==6){
            return 'Đã Hoàn Thành';            
        }
        return "---";  
}

function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}


jQuery(document).ready(function($){ 
    $('#btnUpdateTimeline').click(function(){
        var pid = $(this).attr('pid');
        var saleUID = $('#slNhanDon').val();
        var saleTID = $('#slNhanDon').attr('tid');
        var xuLyFileUID = $('#slXuLyFile').val();
        var xuLyFileTID = $('#slXuLyFile').attr('tid');
        var inUID = $('#slIn').val();
        var inTID = $('#slIn').attr('tid');
        var giaCongUID = $('#slGiaCong').val();
        var giaCongTID = $('#slGiaCong').attr('tid');
        var giaoHangUID = $('#slGiaoHang').val();
        var giaoHangTID = $('#slGiaoHang').attr('tid');

        $.ajax({
            url: '/manager/admin/ajax.php',
            data: {
                action:'updateTimeLine',
                pid:pid,
                saleUID:saleUID,
                saleTID:saleTID,
                xuLyFileUID:xuLyFileUID,
                xuLyFileTID:xuLyFileTID,
                inUID:inUID,
                inTID:inTID,
                giaCongUID:giaCongUID,
                giaCongTID:giaCongTID,
                giaoHangUID:giaoHangUID,
                giaoHangTID:giaoHangTID,
            },
            async: false,
            success:function(response) {
                //alert(response);        
                var today = new Date();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                $('#result').text('Update thành công! ' +time);
            }
        });              
    });
});