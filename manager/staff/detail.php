<?php
    require_once '../mylib.php';
    require_once '../include.php';
    if(!is_login()){        
        header("Location: /");
        die;
    }
    $user = $_SESSION['user'];
    if($user['role']!=ROLE_ADMIN){
        header("Location: /");
        die;    
    }

    display_site_header();

    $staff = user_load($_REQUEST['uid']);
?>
<h3 id="page-title">Các Tasks của <b><?php echo $staff['fullname']; ?></b></h3>
<script class="ppjs">
    $.paramquery.pqSelect.prototype.options.bootstrap.on = true;

    
   
     
    $(function () {
        var colM = [
            { title: "PID", width: 10, dataIndx: "PID", editable: false },     
            { title: "Tên Khách", width: 100, dataIndx: "name", editable: false},
            {   title: "Mô Tả", width: 300, dataIndx: "summary",
                editable: false,
                render: function (ui) {
                    var val = ui.cellData ? ui.cellData.replace(/\n/g, "<br/>") : "";
                    return val;
                },
            }, 
             { title: "Ghi Chú", width: 300, dataIndx: "steps",
                 editable: false,
                editModel: { keyUpDown: false, saveKey: ''},
                render: function (ui) {
                    var val = ui.cellData ? ui.cellData.replace(/\n/g, "<br/>") : "";
                    return val;
                },
            },            
            { title: "Ngày đăng", width: "100", dataIndx: "created", dataType: 'date',	editable:false,	       
		        render: function (ui) {
		            var cellData = ui.cellData;
                    var ts = new Date(cellData * 1000);
                    return ts.toLocaleDateString();		           
		        }		       
		    }
                   
        ];
        var dataModel = {
            dataType: "JSON",
            location: "local",
            recIndx: "PID"            
        }

        var obj = { 
            title: "Tasks",
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
        $.ajax({ url: "staff.php",
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
            $.ajax({ url: "staff.php",
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
    });
    
    
    
    
  
</script>    
<div id="grid_php" style="margin:5px auto;"></div>
</body>
</html>