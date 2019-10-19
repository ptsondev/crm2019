<?php
    require_once '../mylib.php';
    require_once '../include.php';
    if(!is_login()){        
        header("Location: /");
        die;
    }
    $user = $_SESSION['user'];
    if($user['role']!=ROLE_DELIVERY || $user['role']!=ROLE_ADMIN){
        // tạm thời ai vô xem giao hàng cũng được
    //    header("Location: /");
    //   die;    
    }

    display_site_header();
?>
<script class="ppjs">
    $.paramquery.pqSelect.prototype.options.bootstrap.on = true;

    
   
     
    $(function () {
        var colM = [
            { title: "PID", width: 10, dataIndx: "PID", editable: false },            
            { title: "Tên Khách", width: 100, dataIndx: "name", editable: false},
            { title: "SDT", width: 100, dataIndx: "phone",   editable: false},
            { title: "Email", width: 170, dataIndx: "email",   editable: false},
            { title: "Địa chỉ giao", width: 200, dataIndx: "address",  editable: false},    
            { title: "Note Giao Hàng", width: 200, dataIndx: "note_for_de",  editable: false},    
            { title: "Giao Hàng", width: 120,render: function(ui){
                return '<div class="submit_finish" project_id="'+ui.rowData['PID']+'"><input type="button" value="Đã Giao" /></div>';
            }},              
        ];
        var dataModel = {
            dataType: "JSON",
            location: "local",
            recIndx: "PID"            
        }

        var obj = { 
            title: "Giao Hàng",
            width:'98%',
            height:'98%',
            showBottom: false,
            dataModel: dataModel,
            scrollModel: {lastColumn: null},
            colModel: colM,
            numberCell: { show: false },
             
            editModel: {
                //allowInvalid: true,
                saveKey: $.ui.keyCode.ENTER,
                uponSave: 'next'
            },            
            load: function (evt, ui) {
                var grid = $(this).pqGrid('getInstance').grid,
                    data = grid.option('dataModel').data;
                $(this).pqTooltip();
                var ret = grid.isValid({ data: data, allowInvalid: false });                       
            },
            refresh: function () {
                $("#grid_editing").find("button.delete_btn").button({ icons: { primary: 'ui-icon-scissors'} })
                .unbind("click")
                .bind("click", function (evt) {
                    var $tr = $(this).closest("tr");
                    var rowIndx = $grid.pqGrid("getRowIndx", { $tr: $tr }).rowIndx;
                    $grid.pqGrid("deleteRow", { rowIndx: rowIndx });
                });
                
            }            
        };
        
        var $grid = $("div#grid_php").pqGrid(obj);
       
        
        //load all data at once
        $grid.pqGrid("showLoading");
        $.ajax({ url: "delivery_projects.php",
            cache: false,
            async: true,
            dataType: "JSON",
            success: function (response) {
                var grid = $grid.pqGrid("getInstance").grid;
                grid.option("dataModel.data", response.data);


                grid.refreshDataAndView();
                grid.hideLoading();
            }
        });

        
        setInterval(function(){

            $grid.pqGrid("showLoading");
            $.ajax({ url: "delivery_projects.php",
                cache: false,
                async: true,
                dataType: "JSON",
                success: function (response) {
                    var grid = $grid.pqGrid("getInstance").grid;
                    grid.option("dataModel.data", response.data);

                    grid.refreshDataAndView();
                    grid.hideLoading();
                }
            });

            
        }, 60000);
        


        $(document).on('click', '.submit_finish',function(){
            var PID = $(this).attr('project_id');
             $.ajax({ url: "delivery_projects.php",
                            async: false,
                            dataType: "JSON",
                            data:{PID:PID},
                            success: function (response) {                                
                            }
            });
            $(this).parents('tr').remove();
        });
    });
    
    
    
    
  
</script>    
<div id="grid_php" style="margin:5px auto;"></div>
</body>
</html>